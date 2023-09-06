@extends('admin.layouts.main')
@section('head')
    <script src="{{asset('qh/dashboard/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Sản Phẩm*</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control @error("name") border border-danger @enderror"
                       placeholder="Nhập tên sản phẩm">
                @error("name")
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá Sản Phẩm*</label>
                        <input type="text" name="price" value="{{ old('price') }}"
                               class="form-control @error("price") border border-danger @enderror">
                        @error("price")
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_sale">Giá Giảm</label>
                        <input type="text" name="price_sale" value="{{ old('price_sale', 0.0) }}"
                               class="form-control @error('price_sale') border border-danger @enderror">

                        @error("price_sale")
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="qty">Số lượng*</label>
                <input type="number" name="qty" value="{{ old('qty') }}" min="1"
                       class="form-control @error("qty") border border-danger @enderror" data-max="120"
                       pattern="[0-9]*">
                @error("qty")
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>

            <div class="form-group">
                <label>Danh Mục*</label>
                <select class="form-control @error('category_id') border border-danger @enderror" name="category_id">
                    <option value="">Danh Mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error("category_id")
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="form-group">
                <label>Kho*</label>
                <select class="form-control @error('warehouse_id') border border-danger @enderror" name="warehouse_id">
                    <option value="">Kho</option>
                    @foreach($warehouses as $warehouse)
                        <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
                            {{ $warehouse->name }}
                        </option>
                    @endforeach
                </select>

                @error("warehouse_id")
                <p class="text-danger">{{$message}}</p>
                @enderror

            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết*</label>
                <textarea name="content" id="content"
                          class="form-control @error("content") border border-danger @enderror">{{ old('content') }}</textarea>
                @error("content")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Ảnh Sản Phẩm*</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ old('thumb') }}" target="_blank">
                        <img src="{{ old('thumb') }}" width="100px">
                    </a>
                </div>
                @error("file")
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="hidden" name="thumb" id="thumb">
                @error("thumb")
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
                @error("thumbs")
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div id="image-preview" class="image-preview">
                    <a href="{{ old('thumbs') }}" target="_blank">
                        <img src="{{ old('thumbs') }}" width="100px">
                    </a>
                    <!-- Thumbnails of selected images will be displayed here -->
                </div>
            </div>

            <div class="form-group" style="clear: both;">
                <label>Kích Hoạt*</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="active" type="radio" id="active" name="status"
                           checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="inactive" type="radio" id="no_active" name="status">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
                @error('status')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary text-primary">Tạo Sản phẩm</button>
        </div>
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
