@extends('templates.master')

@section('content')
    <!-- Content -->
    <h1>Books</h1>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <!-- Individual Product -->
                @foreach ($books as $book)
                    <div class="col mb-5">
                        <div class="card h-100">

                            <!-- Product image-->
                            <img class="card-img-top" src="./Dummy Image.png"/>

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $book->title }}</h5>
                                    <small class="text-muted">{{ $book->author }}</small><br>
                                    <!-- Product price-->
                                    Rp. xx.xxx,00
                                </div>
                            </div>

                            <!-- Product actions-->
                            <div class="card-footer p-2 pt-0 border-top-0 bg-transparent d-flex justify-content-around">
                                <div class="text-center">
                                    <a class="btn mt-auto btn-primary" href="">Details</a>
                                </div>
                                <div class="text-center">
                                    <a class="btn mt-auto btn-success" href="">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection