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

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="active" type="radio" id="active"
                           name="status" {{ $category->status === 'active' ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="inactive" type="radio" id="no_active"
                           name="status" {{ $category->status === 'inactive' ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
                @error("active")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa Danh Mục</button>
        </div>

    </form>
@endsection
