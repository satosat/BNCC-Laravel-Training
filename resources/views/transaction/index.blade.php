@extends('templates.master')

@section('content')
    <h6 class="display-6 text-center">My Transactions</h6>

    @if(!$transactions->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $transaction->book->title }}</td>
                        <td>{{ date_format($transaction->created_at, "d M Y H:i:s") }}</td>
                        <td>Rp. {{ number_format($transaction->price, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h6 class="display-6 text-center">You don't have any transactions yet</h6>
    @endif
@endsection
