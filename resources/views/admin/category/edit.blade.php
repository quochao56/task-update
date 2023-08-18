@extends('admin.layouts.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $category->name }}"
                       class="form-control @error("name") border border-danger @enderror"
                       placeholder="Nhập tên danh mục">
                @error("name")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control @error("description") border border-danger @enderror">{{ $category->description }}</textarea>
                @error("description")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
        </div>

    </form>
@endsection
