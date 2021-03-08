<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--    <a href="index3.html" class="brand-link">--}}
{{--      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--      style="opacity: .8">--}}
{{--      <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
{{--    </a>--}}

<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 d-flex justify-content-center">
            <div style="color: #fff; text-transform: uppercase">
                Quản Lý Xưởng Mộc
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item" style="border-bottom: 1px solid #4f5962;">
                    <a href="/quan-tri" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng Điều Khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style="display: block;padding: .5rem 1rem;margin-bottom: .2rem;text-transform: uppercase;font-size: 14px">Quản trị hệ thống</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            QL Tài Khoản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.order.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            QL Đơn Hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style="display: block;padding: .5rem 1rem;margin-bottom: .2rem;text-transform: uppercase;font-size: 14px">Quản trị nội dung</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            QL Danh Mục
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.banner.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            QL Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.about.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            QL Giới Thiệu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            QL Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.material.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            QL Chất Liệu
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('quan-tri.vendors.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            QL Đối Tác
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('quan-tri.article.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            QL Tin Tức
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('quan-tri.contact.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-compress-alt"></i>
                        <p>
                            QL Liên Hệ
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('quan-tri.setting.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
