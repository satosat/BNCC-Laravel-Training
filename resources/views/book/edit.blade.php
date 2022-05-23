@extends('templates.master')

@section('content')
    <!-- Content -->
    <h1>Edit Book</h1>
    <form action="{{ route('update_book', ['id' => $book->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="@error('title') is-invalid @enderror form-control" name="title" id="title" value="{{ $book->title }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Book Author</label>
            <input type="text" class="@error('author') is-invalid @enderror form-control" name="author" id="author" value={{ $book->author }}>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Book Description</label>
            <input type="text" class="@error('description') is-invalid @enderror form-control" name="description" id="description" value="{{ $book->detail->description }}">
        </div>

        <div class="mb-3">
            <label for="length" class="form-label">Book Length</label>
            <input type="number" class="@error('length') is-invalid @enderror form-control" name="length" id="length" value="{{ $book->detail->length }}">
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Book Publisher</label>
            <input type="text" class="@error('publisher') is-invalid @enderror form-control" name="publisher" id="publisher" value="{{ $book->detail->publisher }}">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Book Stock</label>
            <input type="number" class="@error('stock') is-invalid @enderror form-control" name="stock" id="stock" value="{{ $book->detail->stock }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Book Price</label>
            <input type="number" class="@error('price') is-invalid @enderror form-control" name="price" id="price" value="{{ $book->detail->price }}">
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Submit Button -->
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
@endsection
