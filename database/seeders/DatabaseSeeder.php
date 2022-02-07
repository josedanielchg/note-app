<?php

namespace Database\Seeders;

use App\Models\Background;
use App\Models\Label;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
     /**
      * Seed the application's database.
      *
      * @return void
      */
     public function run()
     {
          // Storage::deleteDirectory('notes');
          // Storage::makeDirectory('notes');

          // $this->call(UsersSeeder::class);

          $this->call(BackgroundSeeder::class);
          // Label::factory(40)->create();

          // $this->call(NoteSeeder::class);
     }
}
