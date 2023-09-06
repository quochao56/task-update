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
        @foreach ($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->id }}</td>
                <td>{{ $warehouse->name }}</td>
                <td>{!! \QH\Product\Helpers\Helper::status($warehouse->status)  !!}</td>
                <td>{{ $warehouse->phone }}</td>
                <td>{{ $warehouse->location }}</td>
                <td>{{ $warehouse->created_at }}</td>
                <td>{{ $warehouse->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm"
                       href="{{ route('admin.warehouses.edit', $warehouse) }} "><i class="fas fa-edit"></i></a>
                    <form id="deleteForm{{ $warehouse->id }}" method="POST" action="{{ route('admin.warehouses.destroy', $warehouse) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger text-danger btn-sm" onclick="removeRow({{ $warehouse->id }})"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
