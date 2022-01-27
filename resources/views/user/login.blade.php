@extends('layouts.template')

@section('title', 'Login')

@section('content')

     @error('email')
         <h3>{{$message}}</h3>
     @enderror

     <h1>Login</h1>
     <form action="/login" method="POST">
          @csrf
          <input type="text" name="email" placeholder="Email">
          <input type="password" name="password" placeholder="Password">
          <input type="submit" value="Submit">
     </form>

@endsection