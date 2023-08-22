@extends('blog.layouts.main')
@section('head')
    <script src="{{asset('qh/blog/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="w-4/5 m-auto text-center">
            <div class="py-4 border-bottom border-gray-200">
                <h1 class="display-3">
                    Create Post
                </h1>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <form action="{{route('user.blog.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" placeholder="Title"
                           class="form-control text-uppercase">
                </div>
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" value="{{old('description')}}" placeholder="Description"
                              class="form-control"></textarea>
                </div>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content"
                              class="form-control">{{ old('content') }}</textarea>
                    @error("content")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="file">Image</label>
                    <input type="file" name="thumb" class="form-control">
                </div>
                @error('thumb')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="active" type="radio" id="active" name="status" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="inactive" type="radio" id="no_active" name="status">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
                @error('status')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-info rounded-pill">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('footer.blade.php')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection

