<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNote;
use App\Models\Background;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
     //Display views
     public function index()
     {
          $user = Auth::user();
          $notes = $user->notes()->where("delete", 0)->orderByDesc('updated_at')->get();
          $useMenu = true;
          return view('notes.index', compact('user', 'notes', 'useMenu'));
     }

     //Create view
     public function create()
     {
          $colors =  Background::all();
          return view('notes.create', compact('colors'));
     }

     //Create note
     public function store(StoreNote $request)
     {
          $note = Note::create([
               'title' => $request['note-title'],
               'slug' => Str::slug($request['note-title']),
               'body' => $request->body,
               'abstract' => $this->closetags(Str::of($request->body)->limit(200)),
               'user_id' => Auth::user()->id
          ]);

          $note->background()->associate($request['background-color']); //Add background
          $note->save();

          return redirect()->route('notes.show', $note)->with('info', 'Note created successfully');
     }

     //Show note
     public function show(Note $note)
     {
          $this->authorize('author', $note);
          $user = Auth::user();
          $colors =  Background::all();
          $edit = true;
          $title = $note->title . ' - Note App';
          return view('notes.show', compact('user', 'note', 'colors', 'edit', 'title'));
     }

     //Show note and display alert
     public function showLabelsEdit(Note $note)
     {
          $this->authorize('author', $note);
          return redirect()->route('notes.show', $note)->with('labels_active_event', true);
     }

     //Make a note copy
     public function makeCopy(Note $note)
     {
          $this->authorize('author', $note);

          $clone = $note->replicate();
          $clone->push();
          $clone->title .= " - Copy";
          $clone->labels()->sync($note->labels);
          $clone->save();
          return redirect()->route('notes.index')->with('info', 'Note created successfully');
     }

     //Show note. Only edit
     public function showReadOnly(Note $note)
     {
          $this->authorize('author', $note);

          $user = Auth::user();
          $colors =  Background::all();
          $readOnly = true;
          $title = $note->title . ' - Note App';
          return view('notes.show', compact('user', 'note', 'colors', 'readOnly', 'title'));
     }

     //Update note
     public function update(StoreNote $request, Note $note)
     {
          $this->authorize('author', $note);

          $note->title = $request['note-title'];
          $note->body = $request->body;
          $note->abstract = $this->closetags(Str::of($request->body)->limit(200));
          $note->background()->associate($request['background-color']);
          $note->save();
          return redirect()->route('notes.show', $note)->with('info', 'Note updated successfully');
     }

     //Delete note
     public function destroy(Note $note)
     {
          $this->authorize('author', $note);
          $note->delete();
          return redirect()->route('notes.trash')->with('info', 'Note deleted successfully');
     }

     //Send note to trash
     public function sendTrash(Note $note)
     {
          $this->authorize('author', $note);
          $note->delete = 1;
          $note->save();
          return redirect()->route('notes.index')->with('info', 'Note moved to trash');
     }

     //Trash view
     public function trash()
     {
          $user = Auth::user();
          $notes = $user->notes()->where("delete", 1)->orderByDesc('updated_at')->get();
          $useMenu = true;
          $trash = true;
          $title = 'Trash - Note App';

          return view('notes.index', compact('user', 'notes', 'useMenu', 'trash', 'title'));
     }

     //Empty notes in trash
     public function emptyTrash(Request $request)
     {
          $notes = Auth::user()->notes->where("delete", 1);
          $nNotes = $notes->count();

          if ($nNotes > 0)
               foreach ($notes as $note)
                    $note->delete();

          if ($nNotes == 0) {
               $message = "There are no notes";
               return redirect()->route('notes.trash')->withErrors($message);
          }

          if ($nNotes == 1) $message = "Note deleted forever";
          else $message = "Notes Delete forever";

          return redirect()->route('notes.trash')->with('info', $message);
     }

     //Restore Note
     public function restore(Note $note)
     {
          $this->authorize('author', $note);
          $note->delete = 0;
          $note->save();
          return redirect()->route('notes.trash')->with('info', 'Note restored successfully');
     }

     //search post route
     public function search(Request $request)
     {
          $search = $request->search;
          return redirect()->route("notes.searchView", $search);
     }

     public function searchView($search)
     {
          $user = Auth::user();
          $notes = Note::where([
               ["user_id", $user->id],
               ["delete", 0]
          ])->where(function ($query) use ($search) {
               $query
                    ->where("title", 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%");
          })->get();

          $useMenu = true;
          return view('notes.index', compact('user', 'notes', 'useMenu', 'search'));
     }

     //Close tags - funtion to build abstract notes
     public function closetags($html)
     {
          preg_match_all('#<(?!meta|img|br|hr|input\b)\b([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
          $openedtags = $result[1];
          preg_match_all('#</([a-z]+)>#iU', $html, $result);
          $closedtags = $result[1];
          $len_opened = count($openedtags);
          if (count($closedtags) == $len_opened) {
               return $html;
          }
          $openedtags = array_reverse($openedtags);
          for ($i = 0; $i < $len_opened; $i++) {
               if (!in_array($openedtags[$i], $closedtags)) {
                    $html .= '</' . $openedtags[$i] . '>';
               } else {
                    unset($closedtags[array_search($openedtags[$i], $closedtags)]);
               }
          }
          return $html;
     }
}
