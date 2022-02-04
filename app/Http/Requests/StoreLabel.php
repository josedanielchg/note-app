<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreLabel extends FormRequest
{
     public function authorize()
     {
          return true;
     }

     public function rules()
     {
          return [
               'new_label' => ['nullable', 'unique:labels,name,NULL,id,user_id,' . Auth::user()->id],
               'labels' => ['nullable']
          ];
     }

     public function attributes()
     {
          return [
               'new_label' => 'label',
               'labels' => 'labels',
          ];
     }

     public function messages()
     {
          return [
               'new_label.unique' => 'This label already exists',
          ];
     }
}
