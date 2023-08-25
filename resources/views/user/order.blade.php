@extends('user.layouts.main')
@section('content')
    <div class="container mt-auto" style="padding: 30px 0;">
        <div class="row justify-content-center"> <!-- Center the content -->
            <div class="col-md-10"> <!-- Adjust the column width as needed -->
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 24px;"> <!-- Increase the font size -->
                        All Orders
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Total Quantity</th>
                                <th>Shipping Cost</th>
                                <th>Total Amount</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->total_qty}}</td>
                                    <td>{{ $order->shipping_cost}}</td>
                                    <td>{{ $order->total_amount}}</td>
                                    <td>{{ $order->note}}</td>
                                    <td>{!! \QH\Customer\Helpers\Helper::status($order->status)  !!}</td>
                                    <td>{{ $order->created_at}}</td>
                                    <td>
                                         <a href="{{ route('orders.detail', $order) }}"><i class="fa-solid fa-circle-info" style="color: #e6ea10;"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $orders->links('user.layouts.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

