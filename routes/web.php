<?php

use Illuminate\Support\Facades\Route;


Route::get('/books', function () {
    return view('book.index');
});

Route::get('/books/create', function () {
    return view('book.create');
});

require __DIR__.'/auth.php';
