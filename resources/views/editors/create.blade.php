@extends('layouts.app')

@section('title', 'new editor')

@section('content')


    <h1>new editor</h1>
    <form action="{{ route('editor.store') }}" method="post">

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

        <button class="btn btn-primary" type="submit">new editor</button>
    </form>

@endsection
