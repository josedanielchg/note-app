<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
     use HasFactory;

     protected $fillable = ['color'];

     // One to many relationship
     public function notes()
     {
          return $this->hasMany(Note::class);
     }
}
