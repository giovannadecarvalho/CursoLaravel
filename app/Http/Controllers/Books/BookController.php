<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Requests\BookStoreRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $bookModel = app(Book::class);
        $books = $bookModel->all();
        return view('Books\index', compact('books'));
    }

    public function create() 
    {
        return view('Books\create');
    }

    public function store(BookStoreRequest $request)
    {  
        $data = $request->all();
        $bookModel = app(Book::class);
        $book = $bookModel->create([
            'name'=> $data['name'],
            'writer'=> $data['writer'],
            'page_number'=> $data['page_number']
            ]);
        return redirect()->route('book.index');
    }

    public function show()
    {
        //
    }
}
