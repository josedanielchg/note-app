<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="shortcut icon" href="{{asset("/img/favicon.ico")}}" type="image/x-icon">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round" rel="stylesheet">
     @yield('styles')
     <link rel="stylesheet" href="{{asset("/css/app.css")}}">
</head>

<body 
     @if(request()->routeIs("notes.show")) 
          style="background: {{$note->background->color}};"
     @endif
>

     @yield('header' )

     <div class="container">
          @yield('content')
     </div>

     @isset($useMenu)
          @include('components/menu')
     @endisset

     @yield('scripts')
</body>

</html>