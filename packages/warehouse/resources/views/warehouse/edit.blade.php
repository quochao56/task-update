@extends('admin.layouts.main')

@section('content')
    <form action="" method="POST">
        @csrf
        @method("PUT")
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên kho</label>
                <input type="text" name="name" class="form-control @error("name") border border-danger @enderror"
                       value="{{ $warehouse->name }}" placeholder="Nhập tên kho">
                @error("name")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input name="text" placeholder="Phone" class="form-control @error("phone") border border-danger @enderror"
                       value="{{ $warehouse->phone }}"></input>
                @error("phone")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea name="text" placeholder="Location" class="form-control @error("location") border border-danger @enderror"
                          value="{{ $warehouse->location }}"></textarea>
                @error("location")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="active" type="radio" id="active"
                           name="status" {{ $warehouse->status === 'active' ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="inactive" type="radio" id="no_active"
                           name="status" {{ $warehouse->status === 'inactive' ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
                @error("active")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
        </div>

    </form>
@endsection

