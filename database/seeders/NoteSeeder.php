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
          $notes = Note::factory(40)->create();

          foreach ($notes as $note) {
               $user = $note->user;
               $labelsCollection = Label::all()->where('user_id', $user->id);

               $note->labels()->attach([
                    $labelsCollection[array_rand($labelsCollection->all())]->id,
                    $labelsCollection[array_rand($labelsCollection->all())]->id
               ]);
          }
     }
}
