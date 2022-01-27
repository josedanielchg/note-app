<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNote extends FormRequest
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
          return [
               'body' => 'required',
               'note-title' => ['required', 'max:255'],
               'background-color' => ['required', 'exists:backgrounds,id']
          ];
     }

     public function attributes()
     {
          return [
               'background-color' => 'background color',
               'note-title' => 'title',
          ];
     }

     public function withValidator($validator)
     {
          $validator->after(function ($validator) {
               if ($this->body == "<p><br></p>") {
                    $validator->errors()->add('body', 'The body is required');
               }
          });
     }
}
