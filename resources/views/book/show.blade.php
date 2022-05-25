@extends('templates.master')

@section('content')

    <!-- Content -->
    <h1 class="display-1">{{ $book->title }}</h1>
    <h6 class="display-6">{{ $book->author }}</h6>

    <h3 class="display-6 pt-5">Reviews</h3>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Comment</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
            <!-- Individual Reviews -->
                @foreach ($book->reviews as $review)
                    <tr>
                        <th scope="row">{{ $loop->index + 1}}</th>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ date_format($review->created_at, "d F Y") }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    <form action="{{ route('store_review') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}">

        <div class="mb-3">
            <label for="review" class="form-label display-6">Drop a review</label>
            <input type="text" class="form-control" id="review" name="review">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if (Auth::user() && Auth::user()->is_admin)
        <div class="d-flex justify-content-start pt-3">
            <!-- Edit Form -->
            <form action="{{ route('edit_book', ['id' => $book->id]) }}" method="GET">
                <input type="submit" value="Edit Book" class="btn btn-primary me-3">
            </form>

            <!-- Delete Form -->
            <form action="{{ route('delete_book', ['id' => $book->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <input type="submit" value="Delete Book" class="btn btn-danger">
            </form>
        </div>
    @endif
@endsection
