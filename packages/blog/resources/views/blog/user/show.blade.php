@extends('blog.layouts.main')

@section('content')
    <div class="container">
        <div class="w-4/5 m-auto text-left">
            <div class="py-15">
                <h1 class="text-6xl text-uppercase">
                    {{$post->title}}
                </h1>
            </div>
        </div>
    </div>

    <div class="w-4/5 m-auto container">
        <p>By <span><strong><em>{{$post->user->name}}</em></strong></span>, Created
            on {{date('jS M Y', strtotime($post->updated_at))}}</p>

        <p>{!!$post->content!!}</p>
    </div>
@endsection
