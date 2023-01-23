<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Editor;
use App\Models\Author;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$books = Book::all();
        $books = Book::latest()->paginate(5);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editors = Editor::all();
        $authors = Author::all();
        return view('books.create', [
            'editors' => $editors,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'pages' => ['required', 'min:3'],
            'editor_id' => ['required', 'exists:editors,id']
        ]);

        Book::create($validated);
        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $editors = Editor::all();
        $authors = Author::all();
        return view('books.edit', [
            'book' => $book,
            'editors' => $editors,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validated =  $request->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'pages' => ['required', 'min:3'],
            'editor_id' => ['required', 'exists:editors,id']
        ]);

        $book->update($validated);
        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('book.index'));
    }
}
