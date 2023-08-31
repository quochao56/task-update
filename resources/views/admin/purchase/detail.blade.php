@extends('admin.layouts.main')
@section('content')
    <style>
        .warehouse-header {
            font-size: 24px;
            font-weight: bold;
            color: #333; /* Customize the color */
            margin-bottom: 10px;
        }

        .purchase-table {
            width: 100%; /* Adjust the table width as needed */
        }
    </style>
    @php
        $currentWarehouseName = null; // Initialize a variable to keep track of the current warehouse name
    @endphp
    @foreach ($purchases as $purchase)
        @if ($currentWarehouseName !== $purchase->warehouse->name)
            @if ($currentWarehouseName !== null)
                </tbody>
    </table>
    @endif

    <div class="warehouse-header">
        {{ $purchase->warehouse->name }}
    </div>
    <div class="table-responsive">
        <table class="table table-bordered purchase-table">
            <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th class="col-4">Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
            @php
                $currentWarehouseName = $purchase->warehouse->name;
            @endphp
            @endif

            <tr>
                <td>{{ $purchase->product->id }}</td>
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->qty }}</td>
                <td>{{ $purchase->product->price }}</td>
                <td>{{ $purchase->total_amount }}</td>
            </tr>
            @endforeach

            @if ($currentWarehouseName !== null)
            </tbody>
        </table>
    </div>
    @endif


@endsection
