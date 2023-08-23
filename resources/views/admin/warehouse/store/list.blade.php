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
    <div class="container m-3">
        <form action="{{ route('admin.stores.index') }}" method="get">
            <div class="row">
                <div class="col-md-5 my-auto">
                    <label for="warehouse" class="form-label">Select a Warehouse:</label>
                    <select id="warehouse" name="warehouse" class="form-select">
                        @foreach($warehouses as $wh)
                            <option value="{{$wh->id}}">{{$wh->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 my-auto">
                    <label for="store" class="form-label">Select a Store:</label>
                    <select id="store" name="store" class="form-select">
                        @foreach($stores as $st)
                            <option value="{{$st->id}}">{{$st->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
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
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->productWarehouses->first()->qty }}</td>
                <td>{{ $product->category->name }}</td>
                <td><img src="{{ $product->thumb }}" width="60" alt=""></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links('admin.layouts.pagination') !!}
    </div>
@endsection
