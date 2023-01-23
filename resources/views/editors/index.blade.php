@extends('layouts.app')

@section('title', 'List Editors')


@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="45%">Editor</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($editors as $editor)
                <tr>
                    <th scope="row">{{ $editor->id }}</th>

                    <td>
                        <a href="{{ route('editor.show', ['editor' => $editor->id]) }}">
                            {{ $editor->name }}
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('editor.edit', ['editor' => $editor->id]) }}"><span
                                class="material-symbols-outlined">edit</span>
                        </a>

                    </td>
                    <td>
                        <form style="display:inline" action="{{ route('editor.destroy', ['editor' => $editor->id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
