<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          User::create([
               'name' => 'José Daniel Chacón',
               'email' => 'j.daniel.chg@gmail.com',
               'password' => bcrypt('28324600daniel08')
          ]);

          User::factory(5)->create();

          $users = User::all();

          foreach ($users as $user)
               Image::factory(1)->create([
                    'imageable_id' => $user->id,
                    'imageable_type' => User::class
               ]); 
     }
}
