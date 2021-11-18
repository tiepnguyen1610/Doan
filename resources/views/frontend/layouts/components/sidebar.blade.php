<div class="col-lg-3 col-md-8 col-12"> 
	<!--categorie menu start-->
	@include('frontend.layouts.components.category')
	<!--categorie menu end-->

	<!--wishlist block start-->
	<div class="sidebar_widget wishlist mb-35">
		<div class="block_title">
		  	<h3><a href="#">Danh Sách Yêu Thích</a></h3>
		</div>
		<div class="cart_item">
		 	<div class="cart_img">
			 	<a href="#"><img src="public\user\img\cart\cart.jpg" alt=""></a>
		 	</div>
		  	<div class="cart_info">
				<a href="#">lorem ipsum dolor</a>
				<span class="cart_price">$115.00</span>
				{{-- <span class="quantity">Qty: 1</span> --}}
		  	</div>
		  	<div class="cart_remove">
				<a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
		  	</div>
		</div>
		<div class="cart_item">
			<div class="cart_img">
				<a href="#"><img src="public\user\img\cart\cart2.jpg" alt=""></a>
			</div>
		  	<div class="cart_info">
				<a href="#">Quisque ornare dui</a>
				<span class="cart_price">$105.00</span>
				{{-- <span class="quantity">Qty: 1</span> --}}
		  	</div>
		  	<div class="cart_remove">
				<a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
		  	</div>
		</div>
		<div class="block_content">
		  	<p>2  sản phẩm</p>
		  	<a href="#">» Danh sách của tôi</a>
		</div>
	</div>
	<!--wishlist block end-->

	<!--newsletter block start-->
	<div class="sidebar_widget newsletter mb-35">
		<div class="block_title">
		  	<h3>Đăng Ký Nhận Tin</h3>
		</div> 
		<form action="#">
		  	<p>Đăng ký để nhận những thông tin mới nhất</p>
		  	<input placeholder="Nhập email của bạn" type="email">
		  	<button type="submit">Đăng ký</button>
		</form>   
	</div>
	<!--newsletter block end--> 

	<!--sidebar banner-->
	<div class="sidebar_widget bottom ">
		<div class="banner_img">
		  	<a href="#"><img src="public\user\img\banner\banner9.jpg" alt=""></a>
		</div>
	</div>
	<!--sidebar banner end-->
</div>