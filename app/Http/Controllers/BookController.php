<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        // return Inertia::render('BookIndex', ['books' => $books]);
        // Check if the request is for API
        if ($request->wantsJson()) {
            return response()->json($books);
        }

        // Otherwise, return the Inertia response for the web
        return Inertia::render('BookIndex', ['books' => $books]);
    }

    public function create()
    {
        return Inertia::render('BookForm');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4',
            'genre' => 'required|string|max:255',
        ]);
        Book::create($validated);
        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return Inertia::render('BookForm', ['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4',
            'genre' => 'required|string|max:255',
        ]);
        $book->update($validated);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}