<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
     use HandlesAuthorization;

     public function author(User $user, Note $note)
     {
          if ($user->id === $note->user->id) {
               return true;
          }
          return false;
     }
}
