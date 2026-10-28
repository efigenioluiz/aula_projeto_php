<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

Route::get('books',function(){

    $book= Book::create(['title'=> 'Noites Brandas',
        'author'=> 'Machado de Assis',
        'description'=> 'Livro de contos',
        'isbn'=> '978-85-359-0277-0',
        'gender'=> 'Romance']);

    $books = Book::all();

    return '<h1>Olááá turma!!</h1> <br> ' . $books;
});
