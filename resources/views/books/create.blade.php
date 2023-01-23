@extends('layouts.app')

@section('title', 'new book')

@section('content')


    <h1>new book</h1>
    <form action="{{ route('book.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label class="form-label">name:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">description:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30"
                rows="5"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">
            <label class="form-label">pages:</label>
            <input class="form-control @error('pages') is-invalid @enderror" type="text" name="pages">
            @error('pages')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="mb-3">
            <label class="form-label">editor:</label>
            <select class="form-select  @error('editor_id') is-invalid @enderror" name="editor_id">
                @foreach ($editors as $editor)
                    <option value="{{ $editor->id }}">{{ $editor->name }}</option>
                @endforeach
            </select>
            @error('editor_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">author:</label>
            <select class="form-select  @error('author_id') is-invalid @enderror" name="author_id">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('editor_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <button class="btn btn-primary" type="submit">new book</button>
    </form>

@endsection
