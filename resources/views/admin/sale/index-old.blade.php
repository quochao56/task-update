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
                    <form action="{{ route('admin.sale.add_product') }}" method="post">
                        <input class="text-104 cl3 txt-center num-product" data-max="120" min="1" max="{{$product->qty}}" pattern="[0-9]*"
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
                <button type="submit" class="btn btn-success m-1"
                        formaction="{{ route('admin.sale.update') }}">Update
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- ps blog selected --}}
                    @foreach ($products_selected as $ps)
                        @php
                            $priceEnd = $ps->price * $export[$ps->id];
                            $total += $priceEnd;
                            $qty += $export[$ps->id];
                        @endphp
                        <tr>
                            <td>{{ $ps->id }}</td>
                            <td><img src="{{ $ps->thumb }}" width="60" alt=""></td>
                            <td>{{ $ps->name }}</td>
                            <td>{{ $ps->price }}</td>
                            <td>
                                @csrf
                                <input id="number-product" data-max="120" pattern="[0-9]*" min="1" max="{{$ps->qty}}"
                                       class="text-104 cl3 txt-center num-product" type="number"
                                       name="num_product[{{ $ps->id }}]" value="{{ $export[$ps->id] }}"
                                >

                            </td>
                            <td>{{ number_format($priceEnd, 0, '', '.') }}</td>
                            <form action="" class="mr-1" method="POST">
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       href="{{ route('admin.sale.destroy', $ps->id) }}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </form>

        </div>
        <div class="col-md-3">

            <form action="{{ route('admin.sale.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name"  class="form-control @error("name") border border-danger @enderror" value="{{old('name')}}">
                    @error("name")
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="email@gmail.com" class="form-control @error("email") border border-danger @enderror" value="{{old('email')}}">
                    @error("email")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" placeholder="Number Phone" class="form-control @error("phone") border border-danger @enderror" value="{{old('phone')}}">
                    @error("phone")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="Address" class="form-control @error("address") border border-danger @enderror" value="{{old('address')}}">
                    @error("address")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea name="note" id="note" class="form-control"></textarea>
                    <input type="hidden" name="qty" value="{{ $qty }}">
                    <input type="hidden" name="total_amount" value="{{ $total }}">
                </div>
                <div class="summary">
                    <p class="summary-info"><span class="title">Số lượng:</span><b class="index">{{ $qty }}</b></p>

                    <p class="summary-info"><span class="title">Shipping:</span><b class="index">Free Shipping</b></p>

                    <p class="summary-info total-info "><span class="title">Tổng cộng:</span><b
                            class="index">{{ number_format($total, 0, '', '.') }}</b></p>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Order</button>
                </div>
            </form>

        </div>
    </div>
@endsection
