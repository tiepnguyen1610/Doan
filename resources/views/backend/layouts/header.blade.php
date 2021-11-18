<header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="{{ route('statistics.dashboard') }}" class="logo">
                Tracy
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                @if(Auth::check())
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('public/admin/images/1.png') }}">
                            <span class="username">{{ Auth::user()->username }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Đổi mật khẩu</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                @endif
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
</header>