@extends('admin.main')

@section('content')
    <form action="" method="POST">
        @csrf
        @method("POST")
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
        </div>

    </form>
@endsection

