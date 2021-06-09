<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'index'])
    ->name('books.index');
Route::post('books', [BookController::class, 'store'])
    ->name('books.store');
Route::put('books/{book}', [BookController::class, 'update'])
    ->name('books.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])
    ->name('books.destroy');
Route::get('books/search', [BookController::class, 'search'])
    ->name('books.search');
