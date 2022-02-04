<?php

namespace Database\Factories;

use App\Models\Background;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
     /**
      * The name of the factory's corresponding model.
      *
      * @var string
      */
     protected $model = Note::class;

     /**
      * Define the model's default state.
      *
      * @return array
      */
     public function definition()
     {
          $title = $this->faker->sentence(5);
          $body = $this->faker->text(200);

          return [
               'title' => $title,
               'slug' => Str::slug($title),
               'abstract' => Str::of($body)->limit(250),
               'body' => $body,
               'delete' => $this->faker->randomElement([0, 1]),
               'background_id' => Background::all()->random()->id,
               'user_id' => User::all()->random()->id
          ];
     }
}
