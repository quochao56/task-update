@extends('blog.layouts.main')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to have a good trip?
                </h1>
                <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">Read
                    More</a>
            </div>
        </div>
    </div>


    <div class="container foreground" style="padding: 30px 0;">
        <article class="article-preview">
            <div class="row">
                <div class="col-sm-4" style="margin-top: 26px">
                    <img
                        src="https://th.bing.com/th/id/R.3d5e83cff1717817b67fbf5a7d8a2acf?rik=DYfXNvEL9Fhzww&pid=ImgRaw&r=0"
                        width="210" alt="">
                </div>
                <div class="col-sm-8">
                    <h2 class="post-title"><a href="#"> Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h2>
                    <h3 class="post-subtitle">Surfing Away on Pennies a Day</h3>
                    <div class="post-preview"><p>Naturales divitias dixit parabiles esse, quod parvo esset natura contenta. Rationis enim perfectio
                            est virtus.</p></div>
                    <div class="author">
                        <a href="/blog" class="btn btn-info btn-sm">Find Out More</a>
                    </div>

                </div>
            </div>
        </article>
    </div>


@endsection
