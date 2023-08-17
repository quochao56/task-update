@extends('blog.layouts.main')

@section('content')
    <div class="container">
        <div class="w-4/5 m-auto text-center">
            <div class="py-4 border-bottom border-gray-200">
                <h1 class="display-3">
                    Blog Posts
                </h1>
            </div>
        </div>
    </div>

    @if(Auth::check() || auth()->user()->name === 'admin')
        <div class="py-2 container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('user.blog.create') }}" class="btn btn-primary btn-block rounded-pill">
                        Create Post
                    </a>
                </div>
            </div>
        </div>
    @endif
    <div class="container foreground" style="padding: 30px 0;">
        @foreach($posts as $post)
            <article class="article-preview">
                <div class="row">
                    <div class="col-sm-4 mt-2">
                        <img
                            src="{{asset('qh/blog/images/')}}/{{$post->thumb}}"
                            class="img-fluid" alt="">
                    </div>
                    <div class="col-sm-8">
                        <h2 class="post-title text-uppercase">{{$post->title}}</h2>
                        <p>By <span><strong><em>{{$post->user->name}}</em></strong></span>, Created
                            on {{date('jS M Y', strtotime($post->updated_at))}}</p>
                        <div class="post-preview"><p>{{$post->description}}</p></div>

                        <a href="{{route('user.blog.show',$post->slug)}}" class="btn btn-info btn-sm rounded-pill">Find
                            Out More</a>

                        @if((isset(Auth::user()->id) && Auth::user()->id === $post->user_id) || auth()->user()->name === 'admin')
                            <span class="float-end">
                            <a href="{{ route('user.blog.edit', $post->slug) }}" class="btn btn-link text-secondary">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <form action="{{ route('user.blog.destroy', $post->slug) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </span>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
        <div class="d-flex justify-content-center pt-3">
            <div class="pagination">
                {{$posts->links('blog.layouts.pagination')}}
            </div>
        </div>

    </div>

@endsection
