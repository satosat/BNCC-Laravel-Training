<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books');

Route::get('/books', [BookController::class, 'index'])->name('home');
Route::get('/books/create', [BookController::class, 'create'])->name('create_book');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit_book');
Route::post('/books', [BookController::class, 'store'])->name('store_book');
Route::get('/books/{id}', [BookController::class, 'show'])->name('show_book');

require __DIR__.'/auth.php';
