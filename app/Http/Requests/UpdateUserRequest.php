<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
     /**
      * Determine if the user is authorized to make this request.
      *
      * @return bool
      */
     public function authorize()
     {
          return true;
     }

     /**
      * Get the validation rules that apply to the request.
      *
      * @return array
      */
     public function rules()
     {
          $user = Auth::user();

          $rules =  [
               'name' => ['required'],
               'email' => ['required', 'unique:users,email,' . $user->id],
               'image_profile' => ['max:500', 'image'],
          ];

          if ($this['new-password'] != null) {
               $rules = array_merge($rules, [
                    'current-password' => ['required'],
                    'new-password' => ['required', 'min:8']
               ]);
          }

          return $rules;
     }

     public function messages()
     {
          return [
               'image_profile.image' => 'The profile image must be an image file',
          ];
     }

     public function attributes()
     {
          return [
               'current-password' => 'current password',
               'new-password' => 'new password',
          ];
     }
}
