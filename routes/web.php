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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/authors',[\App\Http\Controllers\AuthorsController::class,'getAllAuthors'])->name('authors');

Route::post('/store-author',[\App\Http\Controllers\AuthorsController::class,'storeAut'])->name('storeAut');

Route::get('/books',[\App\Http\Controllers\BooksController::class,'getAllBooks'])->name('allBooks');

Route::get('/books/edit/{id}',[\App\Http\Controllers\BooksController::class,'edit_book'])->name('edit');

Route::post('/books/submit/{id}',[\App\Http\Controllers\BooksController::class,'submit'])->name('sub');

Route::get('/books/delete/{id}',[\App\Http\Controllers\BooksController::class,'delete_book'])->name('del');

Route::get('/books/add-new',[\App\Http\Controllers\AutBooksController::class,'addNew'])->name('add');
