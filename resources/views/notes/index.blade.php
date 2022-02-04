@extends('layouts.template')

@section('title',  isset($title) ? $title : 'Note App' )

@section('content')

     @include('components/header', [$user, $notes])

     @isset($search)
          @if($notes->count() > 0)
               <h2 class="title-result">Results to: "{{ $search }}"</h1>
          @endif
     @endisset

     <section class="notes-section grid" id="notes-section">
          @foreach ($notes as $note)
               @include('components/card', $note)
          @endforeach

          @if($notes->count() == 0)
               @isset($search)
                    <h2 class="no-notes">No matches found. Try a different search... <h2>
               @else
                    <h2 class="no-notes">There are no notes...</h2>  
               @endisset
          @endif
     </section>

     <a href="{{ route('notes.create') }}" class="add-note-bttn" role="button">
          <span class="material-icons-outlined">&#xe145;</span>
     </a>

@endsection

@section('scripts')
    <script src="{{asset("/js/home.js")}}""></script>
    @include('notes.components.alerts-js')
    @include('components.alert-label')

    @isset($trash)
        @include('notes.components.alert-empty-trash')
    @endisset
@endsection
