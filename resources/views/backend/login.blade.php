<!DOCTYPE html>
<head>
<title>Login Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('/public/admin/css/bootstrap.min.css') }}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('/public/admin/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('/public/admin/css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('/public/admin/css/font.css') }}" type="text/css"/>
<link href="{{ asset('/public/admin/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{ asset('/public/admin/js/jquery2.0.3.min.js') }}"></script>
<style>
	body{
		font-family: 'Roboto', sans-serif;
		font-size: 100%;
		overflow-x: hidden;
		background: url(public/admin/images/bg.jpg) no-repeat 0px 0px;
		background-size:cover;			
	}
</style>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng Nhập</h2>
	@if(Session()->has('message')) 
        <div class="alert alert-{!! session()->get('level') !!}">
            {!! Session()->get('message')  !!}
        </div>
    @endif
		<form action="#" class="form" method="post">
			@csrf
			<input type="email" class="ggg" name="email" placeholder="Nhập Email" required="">
			<input type="password" class="ggg" name="password" placeholder="Nhập Password" required="">
			<span><input type="checkbox" name="remember" /> Nhớ mật khẩu</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
		</form>
		<p>Bạn chưa có tài khoản?<a href="registration.html">Tạo tài khoản tại đây</a></p>
</div>
</div>
<script src="{{ asset('/public/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('/public/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('/public/admin/js/scripts.js') }}"></script>
<script src="{{ asset('/public/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('/public/admin/js/jquery.nicescroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset('/public/admin/js/jquery.scrollTo.js') }}"></script>
<script type="text/javascript">
	$("div.alert").delay(3000).slideUp();
</script>
</body>
</html>
