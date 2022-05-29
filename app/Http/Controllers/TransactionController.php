<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.index', [
            'title' => 'My Transactions',
            'transactions' => Transaction::where('user_id', Auth::id())->get(),
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
        $request->validate([
            'book_id' => ['required', 'integer']
        ]);

        DB::transaction(function () use ($request) {
            Transaction::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id
            ]);

            BookDetail::where('book_id', $request->book_id)
                ->decrement('stock', 1);
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
        return view('transaction.show', [
            'title' => 'Checkout',
            'book' => Book::findOrFail($id),
        ]);
    }
}
