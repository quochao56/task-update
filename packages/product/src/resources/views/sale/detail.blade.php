@extends('admin.main')
@section('content')
    <div class="card card-cyan mt-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Khách hàng</h3>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
            </tr>
            </tbody>
        </table>

    </div>
    <div>
        <div class="card card-cyan mt-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">Đơn hàng</h3>
                    </div>
                </div>
            </div>
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
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->product->id }}</td>
                    <td><img src="{{ $sale->product->thumb }}" width="60" alt=""></td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->qty }}</td>
                    <td>{{ $sale->product->price }}</td>
                    <td>{{ $sale->total_amount }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
            </div>
    </div>

@endsection
