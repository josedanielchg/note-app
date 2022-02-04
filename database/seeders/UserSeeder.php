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
               'name' => 'Test User',
               'email' => 'example@gmail.com',
               'password' => bcrypt('password')
          ]);

          User::factory(5)->create();

          $users = User::all();

          foreach ($users as $user)
               Image::factory(1)->create([
                    'user_id' => $user->id,
               ]);
     }
}
