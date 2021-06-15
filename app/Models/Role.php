<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     use HasFactory;

     protected $guarded = [
          'id',
          'created_at',
          'updated_at'
     ];

     // One to many relationship
     public function noteUsers()
     {
          return $this->hasMany(NoteUser::class);
     }
}
