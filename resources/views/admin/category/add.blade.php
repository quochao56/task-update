@extends('admin.layouts.main')

@section('content')
    <form action="" method="POST">
        @csrf
        @method("POST")
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" class="form-control @error("name") border border-danger @enderror" value="{{ old('name') }}" placeholder="Nhập tên danh mục">
                @error("name")
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="description" class="form-control @error("description") border border-danger @enderror" value="{{ old('description') }}"></textarea>
                @error("description")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
        </div>

    </form>
@endsection

