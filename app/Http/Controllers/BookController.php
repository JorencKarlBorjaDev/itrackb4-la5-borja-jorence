<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index(Request $request)
    {
        $genre = $request->query('genre', null);
        $year = $request->query('year', null);

        $books = $this->books();

        if ($genre !== null) {
            $books = array_filter($books, function ($book) use ($genre) {
                return $book['genre'] === $genre;
            });
        }

        if ($year !== null) {
            $books = array_filter($books, function ($book) use ($year) {
                return $book['year'] == $year;
            });
        }

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year' => $year,
        ]);
    }

    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(string $id)
    {
        $books = $this->books();

        if (!isset($books[$id]))
        {
            abort(404);
        }
        return view('books.show', ['book' => $books[$id]]);
    }
    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    
    public function destroy(string $id)
    {
        //
    }
    public function featured()
    {
        $books = $this->books();
        $book = $books[1];

        return view('books.featured', ['book' => $book]);
    }
    
    private function books()
    {
        return [
            1 => ['id' => 1, 'title' => 'The Civil War Awakening', 'author' => 'Adam Goodheart', 'year' => 1861, 'genre' => 'History'],
            2 => ['id' => 2, 'title' => 'Countdown To War', 'author' => 'Richard Overy', 'year' => 1939, 'genre' => 'History'],
            3 => ['id' => 3, 'title' => 'The War Of Souls', 'author' => 'Whitley Strieber', 'year' => 2012, 'genre' => 'Fiction'], 
            4 => ['id' => 4, 'title' => 'The Navys War', 'author' => 'George C. Daughan', 'year' => 1812, 'genre' => 'History'],
            5 => ['id' => 5, 'title' => 'The Year Germany Lost The War', 'author' => 'Andrew Nagorski', 'year' => 1941, 'genre' => 'History'],
            6 => ['id' => 6, 'title' => 'War and Peace', 'author' => 'Leo Tolstoy', 'year' => 1869, 'genre' => 'Fiction'],
        ];
    }
}

