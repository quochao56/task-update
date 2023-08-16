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

    <div class="sm:grid gid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>

        </div>
        <div>

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
                    <p>By <span><strong><em>Lorem</em></strong></span>, 1 day ago</p>
                    <div class="post-preview"><p>Naturales divitias dixit parabiles esse, quod parvo esset natura
                            contenta. Rationis enim perfectio
                            est virtus.</p></div>
                    <div class="author">
                        <a href="/blog" class="btn btn-info btn-sm">Find Out More</a>
                    </div>

                </div>
            </div>
        </article>
    </div>

@endsection
