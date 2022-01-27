<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Label;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          $notes = Note::factory(30)->create();

          foreach ($notes as $note) {
               Image::factory(2)->create([
                    'imageable_id' => $note->id,
                    'imageable_type' => Note::class
               ]);

               //note_user table
               $note->users()->sync([
                    rand(1, 2),
                    rand(3, 5),
               ]);
               $rand_role = rand(1, 2);
               $note->users->first()->pivot->role_id = $rand_role;
               $note->users->last()->pivot->role_id = $rand_role === 1 ? 2 : 1;
               $note->users->first()->pivot->save();
               $note->users->last()->pivot->save();

               //label_note table
               foreach ($note->users as $user) {
                    $labelsCollection = Label::all()->where('user_id', $user->id);

                    //random label from the same user 
                    $note->labels()->attach([
                         $labelsCollection[array_rand($labelsCollection->all())]->id,
                         $labelsCollection[array_rand($labelsCollection->all())]->id
                    ]);
               }
          }
     }
}
