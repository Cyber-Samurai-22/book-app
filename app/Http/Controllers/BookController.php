<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $author = Author::firstOrCreate(['name' => $request->input('author_name')]);
        $book->author_id = $author->id;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }


    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        $author = Author::firstOrCreate(['name' => trim($validatedData['author_name'])]);
        $book->title = trim($validatedData['title']);
        $book->author_id = $author->id;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

}
