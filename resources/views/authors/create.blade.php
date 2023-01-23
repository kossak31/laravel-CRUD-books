@extends('layouts.app')

@section('title', 'new author')

@section('content')


    <h1>new author</h1>
    <form action="{{ route('author.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">author name:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button class="btn btn-primary" type="submit">new author</button>
    </form>

@endsection
