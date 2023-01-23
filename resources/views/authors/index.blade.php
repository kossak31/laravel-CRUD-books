@extends('layouts.app')

@section('title', 'List Authors')




@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="45%">Author</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id }}</th>

                    <td>
                        <a href="{{ route('author.show', ['author' => $author->id]) }}">
                            {{ $author->name }}
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('author.edit', ['author' => $author->id]) }}">
                            <span class="material-symbols-outlined">edit</span>
                        </a>

                    </td>
                    <td>
                        <form style="display:inline" action="{{ route('author.destroy', ['author' => $author->id]) }}"
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
