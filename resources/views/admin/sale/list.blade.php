@extends('admin.layouts.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
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
            @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->customer->name }}</td>
                <td>{{ $sale->total_qty}}</td>
                <td>{{ $sale->shipping_cost}}</td>
                <td>{{ $sale->total_amount}}</td>
                <td>{{ $sale->note}}</td>
                <td>{!! \QH\Product\Helpers\Helper::active($sale->status)  !!}</td>
                <td>{{ $sale->created_at}}</td>
                <td>
                    <a href="{{ route('admin.sale.detail', $sale->id) }}"><i class="fa-solid fa-circle-info" style="color: #e6ea10;"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="card-footer clearfix  d-flex justify-content-center align-items-center">
        {!! $sales->links('admin.layouts.pagination') !!}
    </div>
@endsection
