<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
     public function index()
     {
          //
     }

     public function show(Label $label)
     {
          // $user = Auth::user();
          // $notes = $user->notes()->where("delete", 1)->orderByDesc('updated_at')->get();
          return $label->notes;
     }

     public function addLabel($id)
     {
          //
     }

     public function store(Request $request)
     {
          //
     }

     public function update(Request $request, $id)
     {
          //
     }

     public function destroy($id)
     {
          //
     }
}
