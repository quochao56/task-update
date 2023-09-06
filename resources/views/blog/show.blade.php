@extends('blog.layouts.main')

@section('content')
    <div class="container">
        <div class="w-4/5 m-auto text-left">
            <div class="py-15">
                <h1 class="text-5xl text-uppercase">
                    {{$post->title}}
                </h1>
            </div>
        </div>
    </div>

    <div class="w-4/5 m-auto container mb-3 mt-3">
        <p>Created by <span class="font-bold italic">{{$post->author_name}}</span>, on {{date('jS M Y', strtotime($post->updated_at))}}</p>
        <p class="mt-3">{!!$post->content!!}</p>
    </div>
@endsection
