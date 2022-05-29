@extends('templates.master')

@section('content')
    <h1 class="display-1">{{ $book->title }}</h1>
    <h6 class="display-6">{{ $book->author }}</h6>
    <h6 class="display-6">Rp. {{ number_format($book->detail->price, 2, ',', '.') }}</h6>
    <h6 class="display-6">Stock: {{ $book->detail->stock }}</h6>

    @if ($book->detail->stock)
        <form action="{{ route('store_transaction') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}">
            <input type="submit" name="submit" value="Buy" class="btn btn-success">
        </form>
    @else
        <button class="btn btn-danger" disabled>Not available</button>
    @endif

@endsection
