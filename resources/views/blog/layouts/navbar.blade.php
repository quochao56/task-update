<div id="navbar" class="navbar navbar-expand-lg navbar-default navbar-page-title">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target=".navbar-responsive-collapse">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#"><i class="fa fa-leaf"></i> Iconic Locations</a>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('user.blog.') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.blog.') }}">Blog</a>
                </li>
                @if(Auth::check())
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    My Account ({{ Auth::user()->name }})
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    My Account ({{ Auth::user()->name }})
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form" method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endif
                    @endauth
                @else
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('login') }}">Login {{auth()->user()}} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
