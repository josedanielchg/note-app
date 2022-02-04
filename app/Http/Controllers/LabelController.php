<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabel;
use App\Models\Background;
use App\Models\Label;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
     //Show notes by labels
     public function show(Label $label)
     {
          $notes = $label->notes()
               ->where("delete", 0)
               ->orderByDesc('updated_at')
               ->get()->unique();

          $user = Auth::user();
          $useMenu = true;
          $currentLabel = $label;
          $title = $label->name . ' - Note App';
          return view('notes.index', compact('user', 'notes', 'useMenu', 'currentLabel', 'title'));
     }


     public function addLabel(StoreLabel $request, Note $note)
     {
          if ($request->labels != null) {
               $this->authorize('author', [Label::class, $request->labels]);
               $note->labels()->sync($request->labels);
          }

          if ($request['new_label'] !== null) {
               $label = Label::create([
                    'name' => $request['new_label'],
                    'user_id' => Auth::user()->id
               ]);
               $note->labels()->attach($label);
          }
          return redirect()->route('notes.show', $note)->with('info', 'Labels updated successfully');
     }

     public function update(StoreLabel $request)
     {
          $user = Auth::user();

          if ($request->labels != null) {
               $this->authorize('author', [Label::class, $request['id-labels']]);

               //Check if an edited tag has the same name as another tag
               if (count($request['labels']) !== count(array_unique($request['labels']))) {
                    return redirect()->route('notes.index')->withErrors("There are labels with the same name");
               }

               $requestLabels = array_combine($request["id-labels"], $request['labels']);

               //Update label names
               foreach ($requestLabels as $label_id => $name) {
                    $userLabel = $user->labels->find($label_id);

                    if ($userLabel->name != $name) {
                         $userLabel->name = $name;
                         $userLabel->save();
                    }
               }
          }

          if ($request['new_label'] !== null) {
               Label::create([
                    'name' => $request['new_label'],
                    'user_id' => Auth::user()->id
               ]);
          }

          if ($request['delete-labels'] != null) {
               $this->authorize('author', [Label::class, $request['delete-labels']]);

               foreach ($request['delete-labels'] as $labelToDelete)
                    $userLabel = $user->labels->find($labelToDelete)->delete();
          }

          return redirect()->route('notes.index')->with('info', "Complete!");
     }
}
