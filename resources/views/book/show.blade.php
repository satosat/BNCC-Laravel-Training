@extends('templates.master')

@section('content')

    <!-- Content -->
    <h1 class="display-1">Book Title</h1>
    <h6 class="display-6">Book Author</h6>

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
                <tr>
                    <th scope="row">1</th>
                    <td>Name</td>
                    <td>Comment</td>
                    <td>2 May 2022</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Name</td>
                    <td>Comment</td>
                    <td>2 May 2022</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Name</td>
                    <td>Comment</td>
                    <td>2 May 2022</td>
                </tr>
        </tbody>
    </table>

    <form action="" method="">
        <input type="hidden" name="book_id" id="book_id" value="Book ID">

        <div class="mb-3">
            <label for="review" class="form-label display-6">Drop a review</label>
            <input type="text" class="form-control" id="review" name="review">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="d-flex justify-content-start pt-3">
        <!-- Edit Form -->
        <form action="" method="">
            <input type="submit" value="Edit Book" class="btn btn-primary me-3">
        </form>

        <!-- Delete Form -->
        <form action="" method="">
            <input type="submit" value="Delete Book" class="btn btn-danger">
        </form>
    </div>
@endsection
