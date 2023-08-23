@extends('user.layouts.main')

@section('content')
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{ route('home') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
            Shoping Cart
        </span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-130 p-b-85" method="post">
        @if (count($products) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0; $qty = 0;@endphp
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                        <th class="column-6">&nbsp;</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                        @php
                                            $price = $product->price;
                                            $priceEnd = $price * $carts[$product->id];
                                            $total += $priceEnd;
                                            $qty += $carts[$product->id];
                                        @endphp
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $product->thumb }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $product->name }}</td>
                                            <td class="column-3">{{ number_format($price, 0, '', '.') }}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                           name="num_product[{{ $product->id }}]"
                                                           value="{{ $carts[$product->id] }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5">{{ number_format($priceEnd, 0, '', '.') }}</td>
                                            <td class="p-r-15">
                                                <a href="/carts/delete/{{ $product->id }}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                           name="coupon" placeholder="Coupon Code">

                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Apply coupon
                                    </div>
                                </div>

                                <input type="submit" value="Update Cart" formaction="/update-cart"
                                       class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Thông Tin Khách Hàng
                                        </span>

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="Name"
                                                   class="form-control @error("name") border border-danger @enderror"
                                                   value="{{old('name')}}">
                                            @error("name")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" placeholder="email@gmail.com"
                                                   class="form-control @error("email") border border-danger @enderror"
                                                   value="{{old('email')}}">
                                            @error("email")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" placeholder="Number Phone"
                                                   class="form-control @error("phone") border border-danger @enderror"
                                                   value="{{old('phone')}}">
                                            @error("phone")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" placeholder="Address"
                                                   class="form-control @error("address") border border-danger @enderror"
                                                   value="{{old('address')}}">
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

                                    </div>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Đặt Hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    @else
        <div class="text-center"><h2>Giỏ hàng trống</h2></div>
    @endif

@endsection
