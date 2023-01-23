@extends('layouts.app')

@section('title', 'List Books')


@section('content')

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Book Name</th>
                <th scope="col" width="15%">Editor Name</th>
                <th scope="col" width="15%">Authors</th>
                <th scope="col" width="5%">Edit</th>
                <th scope="col" width="5%">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>

                    <td>
                        <a href="{{ route('book.show', ['book' => $book->id]) }}">
                            {{ $book->name }}
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('editor.show', ['editor' => $book->editors->id]) }}">
                            {{ $book->editors->name }}
                    </td>
                    <td>
                        @foreach ($book->authors as $author)
                            <a href="{{ route('author.show', ['author' => $author->id]) }}">{{ $author->name }}</a>,
                        @endforeach

                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('book.edit', ['book' => $book->id]) }}"><span
                                class="material-symbols-outlined">edit</span></a>
                    </td>
                    <td>
                        <form style="display:inline" action="{{ route('book.destroy', ['book' => $book->id]) }}"
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




    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>

@endsection
