@extends('user.layouts.main')
@section('content')
    <div class="container mt-auto" style="padding: 30px 0;">
        <div class="row justify-content-center"> <!-- Center the content -->
            <div class="col-md-10"> <!-- Adjust the column width as needed -->
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 24px;"> <!-- Increase the font size -->
                        Chi tiết đơn hàng
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
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
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->product->id }}</td>
                                    <td><img src="{{ $order->product->thumb }}" width="60" alt=""></td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
