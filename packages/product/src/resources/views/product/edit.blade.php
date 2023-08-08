@extends('admin.main')
@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="card-body">

        <div class="form-group" >
            <label for="menu">Tên Sản Phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="menu">Giá Sản Phẩm</label>
            <input type="text" name="price" value="{{ $product->price }}"  class="form-control" >
        </div>
        <div class="form-group">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ $product->qty }}" min="1" class="form-control" data-max="120" pattern="[0-9]*">
        </div>

        <div class="form-group">
            <label>Danh Mục</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Author ID</label>
            <select class="form-control" name="author_id" >
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $product->author_id == $user->id ? 'selected' : '' }}>{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Author Type</label>
            <input type="text" value="{{ $product->author_type }}" name="author_type" id="" class="form-control">

        </div>

        <div class="form-group">
            <label>Mô Tả Chi Tiết</label>
            <textarea name="content" id="content" class="form-control">{{$product->content }}</textarea>
        </div>


        <div class="form-group">
            <label for="menu">Ảnh Sản Phẩm</label>
            <input type="file"  class="form-control" id="upload">
            <div id="image_show">
                <a href="{{ $product->thumb }}" target="_blank">
                    <img src="{{ $product->thumb }}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Sửa Sản phẩm</button>
    </div>
</form>
@endsection
@section('footer')
<script>
    CKEDITOR.replace( 'content' );
    </script>
@endsection