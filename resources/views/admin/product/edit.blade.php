@extends('admin.main')
@section('head')
    <script src="{{asset('qh/dashboard/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="card-body">

        <div class="form-group" >
            <label for="menu">Tên Sản Phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
            @error("name")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="menu">Giá Sản Phẩm</label>
            <input type="text" name="price" value="{{ $product->price }}"  class="form-control" >
            @error("price")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ $product->qty }}" min="1" class="form-control" data-max="120" pattern="[0-9]*">
            @error("qty")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Danh Mục</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error("category_id")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

            <input type="hidden" value="{{ Auth::user()->id }}" name="author_id" id="" class="form-control">

            <input type="hidden" value="{{ $product->author_type }}" name="author_type" id="" class="form-control">

        <div class="form-group">
            <label>Mô Tả Chi Tiết</label>
            <textarea name="content" id="content" class="form-control">{{$product->content }}</textarea>
            @error("content")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="menu">Ảnh Sản Phẩm</label>
            <input type="file" name="file" class="form-control" id="upload">
            <div id="image_show">
                <a href="{{ $product->thumb }}" target="_blank">
                    <img src="{{ $product->thumb }}" width="100px">
                </a>
            </div>
            @error("file")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div  class="form-group">
            <input type="hidden" name="thumb" id="thumb">
            @error("thumb")
            <p class="text-danger">{{$message}}</p>
            @enderror


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
