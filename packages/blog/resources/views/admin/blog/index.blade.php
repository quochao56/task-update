@extends('admin.layouts.main')

@section('content')
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
                        <p>Created on {{date('jS M Y', strtotime($post->updated_at))}}</p>
                        <div class="post-preview"><p>{{$post->description}}</p></div>

                        <a href="{{route('admin.blogs.show',$post->slug)}}" class="btn btn-info btn-sm rounded-pill">Find
                            Out More</a>

                        <span class="float-end">
                            <a href="{{ route('admin.blogs.edit', $post->slug) }}" class="btn btn-link text-secondary">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $post->slug) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </span>
                    </div>
                </div>
            </article>
        @endforeach
        <div class="d-flex justify-content-center pt-3">
            <div class="pagination">
                {{$posts->links('admin.layouts.pagination')}}
            </div>
        </div>

    </div>

@endsection
