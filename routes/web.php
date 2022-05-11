<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect('/books');
// });

Route::redirect('/', '/books');

// Route::get('/banned', function () {
//     return abort(500);
// });

// display semua buku
Route::get('/books', [BookController::class, 'index'])->name('home');

// membuat sebuah buku baru
Route::get('/books/create', function () {
    return view('book.create');
})->name('create_book');

// mengupdate sebuah buku yang udah ada
Route::get('/books/{id}/edit', function () {
    return view('book.edit');
})->name('edit_book');

require __DIR__.'/auth.php';
