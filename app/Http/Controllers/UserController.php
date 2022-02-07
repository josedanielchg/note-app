<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
     public function profile()
     {
          $user = Auth::user();
          return view('user.profile', compact('user'));
     }

     public function update(UpdateUserRequest $request)
     {
          $user = Auth::user();

          if ($request['new-password'] != null) {
               if (Hash::check($request['current-password'], $user->password)) {
                    $user->update([
                         "password" => Hash::make($request['new-password'])
                    ]);
               } else {
                    return redirect()->route('user.profile')->withErrors("Current password is incorrect");
               }
          }

          if ($request->file('image_profile')) {
               $url = Storage::disk('s3')->put('avatars', $request->file('image_profile'));

               if ($user->image) {
                    Storage::disk('s3')->delete(Str::remove('https://note-app-images.s3.amazonaws.com/', $user->image->path));
                    $user->image->delete();
               }

               Image::create([
                    'path' => 'https://note-app-images.s3.amazonaws.com/' . $url,
                    'user_id' => $user->id
               ]);
          }

          $user->update([
               "name" => $request->name,
               "email" => $request->email,
          ]);

          return redirect()->route('user.profile')->with('info', 'User profile updated successfully');
     }
}
