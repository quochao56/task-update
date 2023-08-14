@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumb</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
            <tr>
                <td>{{ $purchase->product->id }}</td>
                <td><img src="{{ $purchase->product->thumb }}" width="60" alt=""></td>
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->qty }}</td>
                <td>{{ $purchase->product->price }}</td>
                <td>{{ $purchase->total_amount }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
