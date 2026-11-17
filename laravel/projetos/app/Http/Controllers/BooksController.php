<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    function index(){

        $books_dados= Book::all();

        #return view('books')->with('nome_variavel', $books_dados);
        return view('books', compact('books_dados'));
    }

    function indexApi(){

        $books_dados = Book::all();

        return response()->json($books_dados);
    }
}
