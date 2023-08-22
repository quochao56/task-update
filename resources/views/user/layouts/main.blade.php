<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.layouts.head')
</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('user.layouts.header')

<!-- Cart -->
@include('user.layouts.cart')

@yield('content')

@include('user.layouts.footer')

</body>
</html>
