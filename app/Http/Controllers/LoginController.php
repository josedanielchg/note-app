<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
     public function index()
     {
          return view('user.login');
     }

     public function authenticate(Request $request)
     {
          $credentials = $request->validate([
               'email' => ['required', 'email'],
               'password' => ['required'],
          ]);

          if (Auth::attempt($credentials)) {
               $request->session()->regenerate();
               return redirect()->route('notes.index');
          }

          return back()->withErrors([
               'email' => 'The provided credentials do not match our records.',
          ]);
     }

     public function register()
     {
          return view('user.register');
     }

     public function registerUser(StoreUserRequest $request)
     {
          User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password)
          ]);
          return redirect()->route("login.index")->with('info', 'User created successfully ');
     }

     public function logout(Request $request)
     {
          Auth::logout();

          $request->session()->invalidate();
          $request->session()->regenerateToken();
          return redirect('/');
     }
}
