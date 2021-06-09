<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = null;

        switch($request->search_by) {
            case 1:
                $books = Book::with('category')
                            ->where('title', 'like', '%' . $request->keyword . '%')
                            ->latest()
                            ->paginate(10);
                break;
            case 2:
                $books = Book::with('category')
                            ->where('isbn', 'like', '%' . $request->keyword . '%')
                            ->latest()
                            ->paginate(10);
                break;
            case 3:
                $books = Book::with('category')
                            ->where('author', 'like', '%' . $request->keyword . '%')
                            ->latest()
                            ->paginate(10);
                break;
            case 4:
                $books = Book::with('category')
                            ->where('publisher', 'like', '%' . $request->keyword . '%')
                            ->latest()
                            ->paginate(10);
                break;
            case 5:
                $books = Book::with('category')
                            ->where('year_published', $request->keyword)
                            ->latest()
                            ->paginate(10);
                break;
            case 6:
                $books = Book::whereHas('category', function($q) use ($request) {
                            $q->where('category_name', $request->keyword);
                        })
                        ->latest()
                        ->paginate(10);
                break;
            default:
                $books = Book::with('category')
                            ->latest()
                            ->paginate(10);
        }

        $categories = Category::all();

        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BookStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BookStoreRequest  $request
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

}
