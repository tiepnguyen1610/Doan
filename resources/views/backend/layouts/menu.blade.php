<div id="sidebar" class="nav-collapse">
    <!-- sidebar menu start-->
    <div class="leftside-navigation">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="{{ route('statistics.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Tổng Quan</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cog"></i>
                    <span>Quản Lý Hệ Thống</span>
                </a>
                <ul class="sub">
                    @can('user-list')
                        <li><a href="{{ route('users.index') }}">Quản Lý Nhân Viên</a></li>
                    @endcan
                    @can('role-list')
                        <li><a href="{{ route('roles.index') }}">Quản Lý Vai Trò</a></li>
                    @endcan
                    @can('permission-list')
                        <li><a href="{{ route('permissions.index') }}">Phân Quyền</a></li>
                    @endcan
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Quản Lý Danh Mục</span>
                </a>
                <ul class="sub">
					<li><a href="{{ route('categories.index') }}">Loại Sản Phẩm</a></li>
                    <li><a href="{{ route('providers.index') }}">Nhà Cung Cấp</a></li>
                    <li><a href="{{ route('blogs.index') }}">Blog</a></li>
                    <li><a href="{{ route('slides.index') }}">Slide</a></li>
                    <li><a href="{{ route('contacts.index') }}">Thông Tin Liên Hệ</a></li>        
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Quản Lý Bán Hàng</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('products.index') }}">Quản Lý Sản Phẩm</a></li>
                    <li><a href="{{ route('orders.index') }}">Quản Lý Đơn Hàng</a></li>  
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Quản Lý Thuộc Tính</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('attributes.index') }}">Danh Sách Thuộc Tính</a></li>
                    <li><a href="{{ route('attributes.color.create') }}">Thêm Mới Màu Sắc</a></li>
                    <li><a href="{{ route('attributes.size.create') }}">Thêm Mới Kích Thước</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Báo Cáo Thống Kê</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ route('statistics.index') }}">Báo Cáo Doanh Thu</a></li>
                    <li><a href="{{ route('statistics.warehouse') }}">Báo Cáo Tồn Kho</a></li>
                </ul>
            </li>
        </ul>            
    </div>
    <!-- sidebar menu end-->
</div>