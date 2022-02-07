@extends('layouts.template')

@section('title', 'Profile - Note App')

@section('header')
     <header class="header-note">
          <div class="container"">
               <a href="{{route("notes.index")}}" class="material-icons-outlined icons">&#xe5c4;</a>
          <h2 class="profile-title">Settings:</h2>
          </div>
     </header>
@endsection

@section('content')
     <form action="{{ route("user.update") }}" class="profile-form" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="input-container-image">
               <label class="profile-image" for="file">
                    <figure>
                         <img src=" @if($user->image) {{$user->image->path}} @else {{asset("/img/image-defaut.png")}} @endif" alt="Undisplayable image" id="picture">
                    </figure>
                    <span class="material-icons-outlined icons edit">&#xe3c9;</span>
               </label>
               <input type="file" name="image_profile" id="file" accept="image/*">
          </div>

          <div class="input-container">
               <label for="name">Name:</label>
               <span class="material-icons-round icon">&#xe853;</span> 
               <input type="text" name="name" id="name" value="{{ $user->name }}">
          </div>

          <div class="input-container">
               <label for="email">Email:</label>
               <span class="material-icons icon">&#xe158;</span>
               <input type="text" name="email" id="email" value="{{ $user->email }}">
          </div>

          <div class="input-container">
               <label for="current-password">[Optional] Current Password:</label>
               <span class="material-icons icon">&#xe897;</span>
               <input type="password" name="current-password" id="current-password" value="">
          </div>

          <div class="input-container">
               <label for="new-password">[Optional] New Password:</label>
               <span class="material-icons icon">&#xe897;</span>
               <input type="password" name="new-password" id="new-password" value="">
          </div>

          <div class="input-container">
               <input type="submit" value="Save">
          </div>
     </form>
@endsection

@section('scripts')
     @include('notes.components.alerts-js')
     
     {{-- Previsualization Image  --}}
     <script>
          document.getElementById("file").addEventListener('change', e=> {
               let file = e.target.files[0];
               let reader= new FileReader();

               reader.onload = e => document.getElementById("picture").setAttribute('src', e.target.result);
               reader.readAsDataURL(file);
          })
     </script>
@endsection