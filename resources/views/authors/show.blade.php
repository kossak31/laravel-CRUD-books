@extends('layouts.app')

@section('title', 'show book')

@section('content')
    <h1>author name: {{ $author->name }}</h1>

    <h2>books from this author:</h2>

    @foreach ($author->books as $book)
        <p><a href="{{ route('book.show', ['book' => $book->id]) }}">{{ $book->name }}</a></p>
    @endforeach

@endsection
