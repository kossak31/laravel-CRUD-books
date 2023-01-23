<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use \App\Models\Book;
Route::get('/x', function () {
   $books = Book::find(1);
   echo $books->authors;

});


Route::resource('book', BookController::class);
Route::resource('editor', EditorController::class);
Route::resource('author', AuthorController::class);