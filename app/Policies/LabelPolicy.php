<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
     use HandlesAuthorization;

     public function author(User $user, $labels)
     {
          foreach ($labels as $label) {
               if (!$user->labels->pluck('id')->contains($label))
                    return false;
          }
          return true;
     }
}
