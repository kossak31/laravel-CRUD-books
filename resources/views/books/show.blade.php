@extends('layouts.app')

@section('title', 'show book')

@section('content')
<h1>book name: {{ $book->name }}</h1>
<h2>editor name: <a href="{{ route('editor.show',['editor' => $book->editors->id]) }}">{{$book->editors->name }}</a></h2>
<p>pages: {{ $book->pages }}</p>
<p>description: {{ $book->description }}</p>

authors:
@foreach ($book->authors as $author)
    <p><a href="{{ route('author.show', ['author' => $author->id]) }}">{{ $author->name }}</a></p>
@endforeach

@endsection