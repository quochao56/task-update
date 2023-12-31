@extends('admin.layouts.main')
@section('content')
    <style>
        .summary-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-right: 5px;
        }

        .title {
            margin-right: 5px;
        }

        .index {
            font-weight: bold;
        }

        .num-product {
            width: 80px;
        }

    </style>
    <div>

    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Thumb</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->category->name }}</td>
                <td><img src="{{ $product->thumb }}" width="60" alt=""></td>
                <td>
                    <form action="{{ route('admin.orders.add_product') }}" method="post">
                        <input class="mtext-104 cl3 txt-center num-product" data-max="120" min="1" pattern="[0-9]*"
                               type="number" name="num_product" value="1">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <button class="btn btn-lg" role="button"><i class="fa-solid fa-circle-plus"
                                                                    style="color: #295fbc;"></i></button>
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix d-flex justify-content-center align-items-center">
        {!! $products->links('admin.layouts.pagination') !!}
    </div>
    <div class="divider"></div>
    <div>
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Danh sách sản phẩm đã chọn</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $total = 0;
                    $qty = 0;
                @endphp
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success m-1"
                            formaction="{{ route('admin.orders.update') }}">Update
                    </button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumb</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Warehouse</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{-- ps blog selected --}}
                        @foreach ($products_selected as $ps)
                            @php
                                $priceEnd = $ps->price;
                                $qtyValue = isset($import[$ps->id]['qty']) ? $import[$ps->id]['qty'] : 0;
                                $priceEnd *= $qtyValue;
                                $total += $priceEnd;
                                $qty += $qtyValue;
                                $currentWarehouse = $import[$ps->id]['warehouse_id']; // Get the current warehouse from session
                            @endphp
                            <tr>
                                <td>{{ $ps->id }}</td>
                                <td><img src="{{ $ps->thumb }}" width="60" alt=""></td>
                                <td>{{ $ps->name }}</td>
                                <td>{{ $ps->price }}</td>
                                <td>
                                    <input id="number-product" data-max="120" pattern="[0-9]*" min="1"
                                           class="mtext-104 cl3 txt-center num-product" type="number"
                                           name="num_product[{{ $ps->id }}]" value="{{ $import[$ps->id]['qty'] }}">
                                </td>
                                <td>{{ number_format($priceEnd, 0, '', '.') }}</td>
                                <td>
                                    <select class="form-select"
                                            data-placeholder="Chọn kho" name="warehouse_id[{{ $ps->id }}]">
                                        @foreach($warehouses as $warehouse)
                                            <option
                                                value="{{ $warehouse->id }}" {{ $currentWarehouse == $warehouse->id ? 'selected' : '' }}>
                                                {{ $warehouse->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       href="{{ route('admin.orders.destroy', $ps->id) }}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
            <div class="col-md-3 p-3">
                <div class="summary">
                    <p class="summary-info"><span class="title">Số lượng:</span><b class="index">{{ $qty }}</b></p>

                    <p class="summary-info"><span class="title">Shipping:</span><b class="index">Free Shipping</b></p>

                    <p class="summary-info total-info "><span class="title">Tổng cộng:</span><b
                            class="index">{{ number_format($total, 0, '', '.') }}</b></p>
                </div>
                <form action="{{ route('admin.orders.store') }}" method="POST">
                    @csrf
                    {{--                    <div class="form-group">--}}
                    {{--                        <label>Kho</label>--}}
                    {{--                        <select class="form-select" id="multiple-select-warehouses" multiple data-placeholder="Chọn kho" name="warehouse_id[]">--}}
                    {{--                            @foreach($warehouses as $warehouse)--}}
                    {{--                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                        @error("warehouse_id")--}}
                    {{--                        <p class="text-danger">{{$message}}</p>--}}
                    {{--                        @enderror--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" id="note" class="form-control"></textarea>
                        <input type="hidden" name="qty" value="{{ $qty }}">
                        <input type="hidden" name="total_amount" value="{{ $total }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            @foreach ($products_selected as $ps)
            $('#multiple-select-warehouses-{{ $ps->id }}').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });
            @endforeach

        });
    </script>

@endsection
