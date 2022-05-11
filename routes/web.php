<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect('/books');
// });

Route::redirect('/', '/books');

// Route::get('/banned', function () {
//     return abort(500);
// });

Route::get('/books', function () {
    return view('book.index');
})->name('home');

Route::get('/books/create', function () {
    return view('book.create');
})->name('create_book');

require __DIR__.'/auth.php';
