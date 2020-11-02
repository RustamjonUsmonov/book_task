<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books/list',[\App\Http\Controllers\ApiController::class,'getBooks']);

Route::get('books/{id}',[\App\Http\Controllers\ApiController::class,'getOne']);

Route::post('books/update/{id}',[\App\Http\Controllers\ApiController::class,'updateBook']);

Route::delete('books/{id}',[\App\Http\Controllers\ApiController::class,'deleteBook']);
