<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

          // return $credentials;

          if (Auth::attempt($credentials)) {
               $request->session()->regenerate();
               return redirect()->intended('notes');
          }

          return back()->withErrors([
               'email' => 'The provided credentials do not match our records.',
          ]);
     }

     public function register()
     {
          //
     }

     public function checkRegister(Request $request)
     {
          //
     }
}
