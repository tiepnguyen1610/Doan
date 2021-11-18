<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/user/img/favicon.png') }}">
        <!-- all css here -->
        <link rel="stylesheet" href="{{ asset('public/user/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/user/css/plugin.css') }}">
        <link rel="stylesheet" href="{{ asset('public/user/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('public/user/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/user/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/user/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/vendors/frontend/alertifyjs/css/alertify.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/vendors/frontend/alertifyjs/css/themes/default.min.css') }}">
        <script src="{{ asset('public/user/js/vendor/modernizr-2.8.3.min.js') }}"></script>   
    </head>
    <body>
        <!-- Add your site or application content here -->
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                        @include('frontend.layouts.header')
                        <!--header end -->
                        <!--pos home section-->
                        @yield('content')
                        <!--pos home section end-->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
            
            <!--footer area start-->
            @include('frontend.layouts.footer')
            <!--footer area end-->
            
        <!-- all js here -->
        <script src="{{ asset('public/user/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('public/user/js/popper.js')}}"></script>
        <script src="{{ asset('public/user/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/user/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('public/user/js/plugins.js') }}"></script>
        <script src="{{ asset('public/user/js/main.js') }}"></script>
        <script src="{{ asset('/public/user/js/sweetalert2.js') }}"></script>
        <script src="{{ asset('public/vendors/frontend/cart.js') }}"></script>
        <script src="{{ asset('public/vendors/frontend/alertifyjs/alertify.min.js') }}"></script>
    </body>
</html>
