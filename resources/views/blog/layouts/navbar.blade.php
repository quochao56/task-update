<div id="navbar" class="navbar navbar-default navbar-page-title">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-responsive-collapse"><i class="fa fa-bars"></i></button>
            <a class="navbar-brand" href="#"><i class="fa fa-leaf"></i> Iconic Locations</a>
        </div>
        <div class="navbar-collapse navbar-responsive-collapse collapse out" aria-expanded="true" style="">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{request()->routeIs('blog') ? 'active': '' }}"><a href="{{route('blog')}}">Home</a></li>
                <li class="{{request()->routeIs('user.blog.') ? 'active': '' }}"><a
                        href="{{route('user.blog.')}}">Blog</a></li>
                @if(Auth::check())
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="menu-item menu-item-has-children parent">
                                <a title="My Account" href="#">My Account (
                                    @if (Auth::user()->name)
                                        ({{ Auth::user()->name }})
                                    @endif
                                                        )<i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency">
                                    <li class="menu-item">
                                        <a title="Dashboard" href="#">Dashboard</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            {{-- Normal user --}}
                            <li class="menu-item menu-item-has-children parent">
                                <a title="My Account" href="#">My Account (@if (Auth::user()->name)
                                        ({{ Auth::user()->name }})
                                    @endif)<i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="submenu curency">
                                    <li class="menu-item">
                                        <a title="Dashboard" href="#">Dashboard</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                        {{-- User is not authenticated --}}
                        <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                        <li class="menu-item"><a title="Register or Login" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="menu-item menu-item-has-children parent">
                            <a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i
                                    class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="submenu curency">
                                <li class="menu-item">
                                    <a title="Dashboard" href="#">Dashboard</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</div>

