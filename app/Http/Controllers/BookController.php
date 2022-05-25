<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    // function pertama yang dicall oleh sebuah class ketika class tersebut dijadikan instance
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'], ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'title' => 'Home Page',
            'books' => Book::simplePaginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'title' => 'Create New Book',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules dapat dilihat di: https://laravel.com/docs/9.x/validation#available-validation-rules
        $request->validate([
            'title' => ['required', 'max: 255'],
            'author' => ['required', 'max: 255'],
            'description' => ['required', 'max: 255'],
            'publisher' => ['required', 'max: 255'],
            'length' => ['required', 'integer', 'min: 1', 'max: 2147483647'],
            'stock' => ['required', 'integer', 'min: 0', 'max: 2147483647'],
            'price' => ['required', 'integer', 'min: 1', 'max: 2147483647'],
        ]);

        // Menggunakan transaction untuk memastikan atomicity
        // Atomicity: https://en.wikipedia.org/wiki/Atomicity_(database_systems)
        DB::transaction(function () use ($request) {
            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
            ]);

            BookDetail::create([
                'book_id' => $book->id,
                'description' => $request->description,
                'length' => $request->length,
                'publisher' => $request->publisher,
                'stock' => $request->stock,
                'price' => $request->price,
            ]);
        });

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book.show', [
            'title' => 'Show Book',
            'book' => Book::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book.edit', [
            'title' => 'Edit Book',
            'book' => Book::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => ['required'],
            'title' => ['required', 'max: 255'],
            'author' => ['required', 'max: 255'],
            'description' => ['required', 'max: 255'],
            'publisher' => ['required', 'max: 255'],
            'length' => ['required', 'integer', 'min: 1', 'max: 2147483647'],
            'stock' => ['required', 'integer', 'min: 0', 'max: 2147483647'],
            'price' => ['required', 'integer', 'min: 1', 'max: 2147483647'],
        ]);

        DB::transaction(function () use ($request, $id) {
            Book::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'author' => $request->author
            ]);

            BookDetail::where('book_id', $id)
                ->update([
                    'description' => $request->description,
                    'length' => $request->length,
                    'publisher' => $request->publisher,
                    'stock' => $request->stock,
                    'price' => $request->price,
            ]);
        });

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect(route('home'));
    }
}
