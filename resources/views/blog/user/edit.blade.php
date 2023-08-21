@extends('blog.layouts.main')
@section('head')
    <script src="{{asset('qh/blog/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="w-4/5 m-auto text-center">
            <div class="py-4 border-bottom border-gray-200">
                <h1 class="display-3">
                    Update Post
                </h1>
            </div>
        </div>
    </div>
    <div class="container pt-3">

        <form action="{{route('user.blog.update',$post->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$post->title}}" placeholder="Title"
                           class="form-control text-uppercase">
                </div>
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" placeholder="Description" class="form-control">
                        {{$post->description}}
                    </textarea>
                </div>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="content"
                              class="form-control">{{ $post->content }}</textarea>
                    @error("content")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="active" type="radio" id="active"
                               name="status" {{ $post->status === 'active' ? 'checked=""' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="inactive" type="radio" id="no_active"
                               name="status" {{ $post->status === 'inactive' ? 'checked=""' : '' }}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                    @error("status")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

            </div>


            <input type="hidden" name="user_id" value="{{$post->user->id}}">
            <div class="mb-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-info rounded-pill">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
