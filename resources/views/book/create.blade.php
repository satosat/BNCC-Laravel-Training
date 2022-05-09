@extends('templates.master')

@section('content')
    <!-- Content -->
    <h1>Add New Book</h1>
    <form action="" method="">

        <div class="mb-3">
            <label for="title" class="form-label">Book Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Book Author</label>
            <input type="text" class="form-control" name="author" id="author">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Book Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="mb-3">
            <label for="length" class="form-label">Book Length</label>
            <input type="number" class="form-control" name="length" id="length">
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Book Publisher</label>
            <input type="text" class="form-control" name="publisher" id="publisher">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Book Stock</label>
            <input type="number" class="form-control" name="stock" id="stock">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Book Price</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end">
            <input type="submit" class="btn btn-primary">
        </div>
    </form>
@endsection
