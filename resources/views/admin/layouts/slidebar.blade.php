<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link text-decoration-none">
        <img src="{{asset("qh/dashboard/template/admin/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-ligh" >AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("qh/dashboard/template/admin/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2 " alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.home')}}" class="d-block text-decoration-none">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p> Danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.add_category') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p> Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.add_product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-blog"></i>
                        <p> Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo bài viết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách bài viết</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-phone-volume"></i>
                        <p> Purchase
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhập vào kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.orders.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Đơn hàng</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-phone-volume"></i>
                        <p> Warehouse
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.warehouses.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.warehouses.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách kho</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.stores.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo cửa hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.stores.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách cửa hàng</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.stores.index') }}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Nhập vào cửa hàng</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{ route('admin.stores.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách sản phẩm</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-truck"></i>
                        <p> Sale
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sale.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Xuất hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sale.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Xuất hàng</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.history.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-clock-rotate-left"></i>
                        <p> History </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
