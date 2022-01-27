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
          ]);

          $note->users()->attach(Auth::user()); //Add note to user
          $note->background()->associate($request['background-color']); //Add background
          $note->users->first()->pivot->role_id = 1; //Asign "owner" role

          $note->save();
          $note->users->first()->pivot->save();

          return redirect()->route('notes.show', $note)->with('info', 'Note created successfully');
     }

     //Show note
     public function show(Note $note)
     {
          $colors =  Background::all();
          $edit = true;
          return view('notes.show', compact('note', 'colors', 'edit'));
     }

     public function showReadOnly(Note $note)
     {
          $colors =  Background::all();
          $readOnly = true;
          return view('notes.show', compact('note', 'colors', 'readOnly'));
     }

     //Update note
     public function update(StoreNote $request, Note $note)
     {
          $note->title = $request['note-title'];
          $note->body = $request->body;
          $note->background()->associate($request['background-color']);
          $note->save();
          return redirect()->route('notes.show', $note)->with('info', 'Note updated successfully');
     }

     //Delete note
     public function destroy(Note $note)
     {
          $note->delete();
          return redirect()->route('notes.trash')->with('info', 'Note deleted successfully');
     }

     //Send note to trash
     public function sendTrash(Note $note)
     {
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

          return view('notes.index', compact('user', 'notes', 'useMenu', 'trash'));
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
          $note->delete = 0;
          $note->save();
          return redirect()->route('notes.trash')->with('info', 'Note restored successfully');
     }
}
