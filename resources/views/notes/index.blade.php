@extends('layouts.template')

@section('title', 'Notes')

@section('content')

     @include('components/header', [$user, $notes])

     <section class="notes-section grid" id="notes-section">

          @foreach ($notes as $note)
               @include('components/card', $note)
          @endforeach

          @if($notes->count() == 0)
               <h2 class="no-notes">There are no notes...</h2>  
          @endif
     </section>

     <a href="{{ route('notes.create') }}" class="add-note-bttn" role="button">
          <i class="fas fa-plus"></i>
     </a>

@endsection

@section('scripts')
    <script src="{{asset("/js/home.js")}}""></script>
    @include('notes.components.alerts-js')
@endsection
