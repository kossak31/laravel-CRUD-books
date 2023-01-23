@extends('layouts.app')

@section('title', 'show editor')

@section('content')
    <h1>editor name: {{ $editor->name }}</h1>

    <h2>books:</h2>

    @foreach ($editor->books as $item)
        <hr>
        <p><a href="{{ route('book.show', ['book' => $item->id]) }}">{{ $item->name }}</a></p>
        @foreach ($item->authors as $author)
            <p>author: <a href="{{ route('author.show', ['author' => $author->id]) }}">{{ $author->name }}</a></p>
        @endforeach
    @endforeach
@endsection
