<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
     use HasFactory;

     protected $fillable = ['name', 'user_id'];

     // One to many relationship (inverse)
     public function user()
     {
          return $this->belongsTo(User::class);
     }

     // Many to many relationship
     public function notes()
     {
          return $this->belongsToMany(Note::class);
     }
}
