<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/welcome', function () {
    return view('welcome');
});

/**
 * AuthorController
*/
Route::get('/authors',[\App\Http\Controllers\AuthorsController::class,'getAllAuthors'])->name('authors');

Route::post('/store-author',[\App\Http\Controllers\AuthorsController::class,'storeAut'])->name('storeAut');

Route::get('/authors/edit/{id}',[\App\Http\Controllers\AuthorsController::class,'editAuthor'])->name('editAuthor');

Route::post('/authors/submit/{id}',[\App\Http\Controllers\AuthorsController::class,'subAuthor'])->name('subAuthor');

Route::get('/authors/delete/{id}',[\App\Http\Controllers\AuthorsController::class,'deleteAuthor'])->name('deleteAuthor');

/**
 * BooksController
 */
Route::get('/books',[\App\Http\Controllers\BooksController::class,'getAllBooks'])->name('allBooks');

Route::get('/books/edit/{id}',[\App\Http\Controllers\BooksController::class,'edit_book'])->name('edit');

Route::post('/books/submit/{id}',[\App\Http\Controllers\BooksController::class,'submit'])->name('sub');

Route::post('/store-book',[\App\Http\Controllers\BooksController::class,'storeBook'])->name('storeBook');

Route::get('/books/delete/{id}',[\App\Http\Controllers\BooksController::class,'delete_book'])->name('del');

/**
 * AutBooksController
 */

Route::get('/',[\App\Http\Controllers\AutBooksController::class,'getAllData'])->name('home');

Route::get('/books/add-new',[\App\Http\Controllers\AutBooksController::class,'addNew'])->name('add');

Route::post('/store',[\App\Http\Controllers\AutBooksController::class,'store'])->name('store');

