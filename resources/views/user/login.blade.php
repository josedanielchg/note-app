@extends('layouts.template')

@section('title', 'Login - Note App')

@section('content')

     <div class="card-form-container">
          <div class="form">
               <h1>Note App </h1>
               <h2>Sign In:</h2>
               
               <form action="{{route("login.index") }}" method="POST">
                    @csrf

                    <div class="input-container">
                         <label for="email">Email:</label>
                         <span class="material-icons icon">&#xe158;</span>
                         <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>

                    <div class="input-container">
                         <label for="password">Password:</label>
                         <span class="material-icons icon">&#xe897;</span>
                         <input type="password" name="password" id="password" value="">

                         <div class="show-password">
                              <input type="checkbox" id="show-password">
                              <label for="show-password">Show password</label>
                         </div>
                    </div>

                    <div class="input-container sumbit">
                         <input type="submit" value="Next">
                         <a href="{{ route("login.register")}}" class="create-account">Create account</a>
                    </div>
               </form>
          </div>
          
     </div>
     

@endsection

@section('scripts')
     @include('notes.components.alerts-js')
     <script>
          document.getElementById("show-password").addEventListener("change", e => {
               let $inputPassword = document.querySelector("#password");
               
               if($inputPassword.type == "password")
                    $inputPassword.type = "text";
               else
                    $inputPassword.type = "password";
          })
     </script>
@endsection