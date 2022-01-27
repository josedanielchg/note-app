<?php

namespace Database\Seeders;

use App\Models\Background;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          Background::create(['color' => '#f3f3f3']);
          Background::create(['color' => '#f28b82']);
          Background::create(['color' => '#fbbc04']);
          Background::create(['color' => '#fff475']);
          Background::create(['color' => '#ccff90']);
          Background::create(['color' => '#97ffeb']);
          Background::create(['color' => '#cbf0f8']);
          Background::create(['color' => '#aecbfa']);
          Background::create(['color' => '#d7aefb']);
          Background::create(['color' => '#fdcfe8']);
          Background::create(['color' => '#e6c998']);
          Background::create(['color' => '#e8eaed']);
     }
}
