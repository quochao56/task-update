<!-- Header -->
<header class="header-v2">
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            Help & FAQs
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            My Account
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            EN
                        </a>

                        <a href="#" class="flex-c-m trans-04 p-lr-25">
                            USD
                        </a>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container navbar-expand-lg">

                    <!-- Logo desktop -->
                    <a href="#" class="logo">
                        <img src="/qh/dashboard/template/images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                            <li>
                                <a href="{{ route('shop') }}">Shop</a>
                            </li>

                            <li class="label1" data-label1="hot">
                                <a href="shoping-cart.html">Features</a>
                            </li>

                            <li>
                                <a href="{{route('blog')}}">Blog</a>
                            </li>

                            <li>
                                <a href="about.html">About</a>
                            </li>

                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                             data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                            <a href="{{route('carts')}}"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>

                        <a href="#"
                           class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                           data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>
                    </div>
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            @if(Auth::guard('web')->check() || Auth::guard('admin')->check())
                                @if (Auth::guard('admin')->user())
                                    <li class="nav-item dropdown">
                                        <a role="button">
                                            Xin chào <span class="font-weight-bold">{{ Auth::guard('admin')->user()->name }}</span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('admin.home') }}">Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            <form id="logout-form" method="POST"
                                                  action="{{ route('admin.logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a role="button">
                                            Xin chào <span class="font-weight-bold">{{ Auth::guard('web')->user()->name }}</span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Dashboard</a></li>
                                            <li><a href="{{route('orders')}}">Orders</a></li>
                                            <li><a href="{{ route('user.logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            <form id="logout-form" method="POST"
                                                  action="{{ route('user.logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">

                                    <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
