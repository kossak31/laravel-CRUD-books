@extends('layouts.app')

@section('title', 'edit author')

@section('content')


    <h1>edit editor</h1>
    <form action="{{ route('editor.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">editor name:</label>
            <input value="{{ $editor->name }}" class="form-control @error('name') is-invalid @enderror" type="text" name="name">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button class="btn btn-primary" type="submit">update</button>
    </form>

@endsection
