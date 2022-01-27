@extends('layouts.template')

@section('title', 'Notes')

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
               {!! old('body') ?? $note->body !!}
          </div>
     </div>

@endsection

@section('scripts')
     <script src="{{ asset("/js/app.js") }}""></script>
     @include('notes.components.alerts-js')
@endsection