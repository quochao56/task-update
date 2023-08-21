@extends('admin.layouts.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Description</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{!! \QH\Product\Helpers\Helper::status($category->status)  !!}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm"
                       href="{{ route('admin.category.edit_category', $category) }} "><i class="fas fa-edit"></i></a>
                    <form id="deleteForm{{ $category->id }}" method="POST" action="{{ route('admin.category.destroy', $category) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeRow({{ $category->id }})"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
