@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total Quantity</th>
                <th>Shipping Cost</th>
                <th>Total Amount</th>
                <th>Note</th>
                <th>Status</th>
                <th>Purchase Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)         
            <tr>
                <td>{{ $purchase->id }}</td>
                <td>{{ $purchase->total_qty}}</td>
                <td>{{ $purchase->shipping_cost}}</td>
                <td>{{ $purchase->total_amount}}</td>
                <td>{{ $purchase->note}}</td>
                <td>{!! \QH\Order\Helpers\OrderHelper::active($purchase->status)  !!}</td>
                <td>{{ $purchase->created_at}}</td>
                <td>
                    <a href="{{ route('admin.orders.detail', $purchase->id) }}"><i class="fa-solid fa-circle-info" style="color: #e6ea10;"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
