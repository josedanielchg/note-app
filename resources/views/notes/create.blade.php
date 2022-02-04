@extends('layouts.template')

@section('title', 'Create Note - Note App')

@section('styles')
     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('header')
     @include('notes.components.header', ['method' => 'post'])
@endsection

@section('content')

     <input type="text" name="title" value="" placeholder="Title" class="title-input" id="title-input">
     <div class="editor-container">
          <div id="editor">
          </div>
     </div>

@endsection

@section('scripts')
     <script src="{{ asset("/js/app.js") }}""></script>
     @include('notes.components.alerts-js')
@endsection