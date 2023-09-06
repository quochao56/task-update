@extends('admin.layouts.main')
@section('head')
    <script src="{{asset('qh/dashboard/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Adjust the gap between images as needed */
        }

        .product-image {
            max-width: 100px; /* Set a maximum width for the images */
            height: auto;
            border: 1px solid #ddd; /* Add a border to each image */
            border-radius: 5px; /* Add rounded corners to the images */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Add a subtle shadow to the images */
        }

        /* Optional: Style for the 'a' tags if needed */
        .image-container a {
            text-decoration: none;
            color: #333;
        }
    </style>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Sản Phẩm*</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                       placeholder="Nhập tên sản phẩm">
                @error("name")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá Sản Phẩm*</label>
                        <input type="text" name="price" value="{{  $product->price }}"
                               class="form-control @error("price") border border-danger @enderror">
                        @error("price")
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_sale">Giá Giảm</label>
                        <input type="text" name="price_sale" value="{{ $product->price_sale ?? 0.0}}"
                               class="form-control @error('price_sale') border border-danger @enderror">

                        @error("price_sale")
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="qty">Số lượng*</label>
                <input type="number" name="qty" value="{{ $product->qty }}" min="1" class="form-control" data-max="120"
                       pattern="[0-9]*">
                @error("qty")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label>Danh Mục*</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error("category_id")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
{{--            <div class="form-group">--}}
{{--                <label>Kho*</label>--}}
{{--                <select class="form-control @error("warehouse_id") border border-danger @enderror" name="warehouse_id"--}}
{{--                        value="{{ old('warehouse_id') }}">--}}
{{--                    <option value=""> Kho</option>--}}
{{--                    @foreach($warehouses as $warehouse)--}}
{{--                        <option--}}
{{--                            value="{{ $warehouse->id }}" {{ $product->warehouse_id == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error("warehouse_id")--}}
{{--                <p class="text-danger">{{$message}}</p>--}}
{{--                @enderror--}}

{{--            </div>--}}
            <input type="hidden" value="{{ Auth::user()->id }}" name="author_id" id="" class="form-control">

            <input type="hidden" value="{{ $product->author_type }}" name="author_type" id="" class="form-control">

            <div class="form-group">
                <label>Mô Tả Chi Tiết*</label>
                <textarea name="content" id="content" class="form-control">{{$product->content }}</textarea>
                @error("content")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm*</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->thumb }}" target="_blank" class="product-image">
                        <img src="{{ $product->thumb }}" width="100px">
                    </a>
                </div>
                @error("file")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="uploads">Gallery</label>
                <input type="file" id="uploads" class="form-control" name="images[]" multiple>

                @error("images")
                <p class="text-danger">{{$message}}</p>
                @enderror

                <input type="hidden" id="images" name="thumbs[]">

                <div id="image-preview" class="image-preview">
                    @php
                        $imageUrls = explode(',', $product->thumbs);
                    @endphp

                    <div class="image-container">
                        @forelse($imageUrls as $image)
                            <a href="{{ $image }}" target="_blank">
                                <img src="{{  $image }}" alt="Product Image" class="product-image">
                            </a>
                        @empty
                            <!-- Handle case when there are no images -->
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="form-group" style="clear: both">
                <label>Kích Hoạt*</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="active" type="radio" id="active"
                           name="status" {{ $product->status === 'active' ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="inactive" type="radio" id="no_active"
                           name="status" {{ $product->status === 'inactive' ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
                @error("active")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" name="thumb" id="thumb">
                @error("thumb")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary text-primary">Sửa Sản phẩm</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
