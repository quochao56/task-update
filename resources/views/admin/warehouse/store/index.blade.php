@extends('admin.layouts.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Phone</th>
            <th>Location</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($stores as $store)
            <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->name }}</td>
                <td>{!! \QH\Product\Helpers\Helper::status($store->status)  !!}</td>
                <td>{{ $store->phone }}</td>
                <td>{{ $store->location }}</td>
                <td>{{ $store->created_at }}</td>
                <td>{{ $store->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm"
                       href="{{ route('admin.stores.edit', $store) }} "><i class="fas fa-edit"></i></a>
                    <form id="deleteForm{{ $store->id }}" method="POST" action="{{ route('admin.stores.destroy', $store) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeRow({{ $store->id }})"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
