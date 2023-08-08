@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">

        <div class="form-group" >
            <label for="menu">Tên Sản Phẩm</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="menu">Giá Sản Phẩm</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control" >
        </div>
        <div class="form-group">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ old('qty') }}" min="1" class="form-control" data-max="120" pattern="[0-9]*">
        </div>

        <div class="form-group">
            <label>Danh Mục</label>
            <select class="form-control" name="category_id" value="{{ old('category_id') }}">
                <option value="0"> Danh Mục </option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Author ID</label>
            <select class="form-control" name="author_id" value="{{ old('author_id') }}">
                <option value="0"> Author </option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Author Type</label>
            <input type="text" value="{{ old('author_type') }}" name="author_type" id="" class="form-control">

        </div>

        <div class="form-group">
            <label>Mô Tả Chi Tiết</label>
            <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
        </div>


        <div class="form-group">
            <label for="menu">Ảnh Sản Phẩm</label>
            <input type="file"  class="form-control" id="upload">
            <div id="image_show">
                <a href="{{ old('thumb') }}" target="_blank">
                    <img src="{{ old('thumb') }}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo Sản phẩm</button>
    </div>
</form>
@endsection
@section('footer')
<script>
    CKEDITOR.replace( 'content' );
    </script>
@endsection