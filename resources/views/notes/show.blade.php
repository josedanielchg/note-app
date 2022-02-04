@extends('layouts.template')

@section('title',  isset($title) ? $title : 'Note App' )

@section('styles')
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('header')
     @include('notes.components.header', ['method' => 'put'])
@endsection

@section('content')

     <input type="text" name="title" value="{{ old('note-title') ?? $note->title }}" placeholder="Title" class="title-input" id="title-input" @isset($readOnly) readonly @endisset>
     
     <div class="editor-container">
          <div id="editor" @isset($readOnly) class="readonly" @endisset>
               @if(old('body'))
                    @if( old('body') == "<p><br></p>")
                         {!! $note->body !!}
                    @else
                         {!! old('body') !!}
                    @endif
               @else
                    {!! $note->body !!}
               @endif
          </div>
     </div>

     <div class="label-container">
          <h3>Labels:</h3>
          @foreach ($note->labels as $label)
               <a href="{{ route('labels.show', $label) }}" class="label">{{ $label->name }}</a>
          @endforeach
          <button class="material-icons-outlined add-bttn" id="add-bttn">&#xe145;</button>
     </div>
@endsection

@section('scripts')
     <script src="{{ asset("/js/app.js") }}""></script>
     @include('notes.components.alerts-js')
     @include('notes.components.alert-label')
@endsection