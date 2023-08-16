<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('blog.layouts.head')
</head>
<body>
<header>
    <div>
        @include('blog.layouts.navbar')
    </div>
</header>

<div>
    @yield('content')
</div>

<div>
    @include('blog.layouts.footer')
</div>
</body>
</html>
