@extends('blog.layouts.main')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center text-center py-5">
        <div class="container">
            <h1 class="text-gray-400 display-4 fw-bold mb-4" style="font-family: 'Dancing Script', cursive;">
                Do you want to have a good trip?
            </h1>
            <a href="/index" class="btn btn-secondary btn-lg text-uppercase" style="font-family: 'Dancing Script', cursive;
font-family: 'EB Garamond', serif;">Read More</a>
        </div>
    </div>

    <div class="container my-5">
        @foreach($posts as $post)
            <article class="article-preview my-4">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('qh/blog/images/') }}/{{ $post->thumb }}" class="img-fluid" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-2xl text-uppercase font-bold mt-2">
                            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="mb-1">Created by <span class="italic">{{ $post->author_name }}</span>, on {{ date('jS M Y', strtotime($post->updated_at)) }}</p>
                        <div class="post-preview">
                            <p>{{ $post->description }}</p>
                        </div>
                        <div class="author mt-2">
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-info btn-sm rounded-pill">Find Out More</a>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
        <div class="d-flex justify-content-center pt-3">
            <div class="pagination">
                {{ $posts->links('admin.layouts.pagination') }}
            </div>
        </div>
    </div>


    </div>

@endsection
