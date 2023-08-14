@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $category->name }}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $category->description }}</textarea>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
        </div>

    </form>
@endsection
