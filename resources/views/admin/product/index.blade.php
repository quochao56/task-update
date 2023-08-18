@extends('admin.layouts.main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Thumb</th>
                <th>Created At</th>
                <th>Updated At</th>
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
                    <td><img src="{{ $product->thumb }}"
                        width="60" alt=""></td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm"
                            href="{{ route('admin.product.edit_product', $product) }} "><i class="fas fa-edit"></i></a>
                        <form id="deleteForm{{ $product->id }}" method="POST" action="{{ route('admin.product.destroy', $product) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeRow({{ $product->id }})"><i class="fa fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links("admin.layouts.pagination") !!}
    </div>
@endsection
