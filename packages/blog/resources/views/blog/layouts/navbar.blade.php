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
                    <a class="nav-link" href="{{ route('blog') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('user.blog.') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Ecommerce</a>
                </li>
            </ul>
        </div>
    </div>
</div>
