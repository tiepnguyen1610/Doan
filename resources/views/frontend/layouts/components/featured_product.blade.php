<div class="featured_product">
	<div class="block_title">
	  <h3>Sản Phẩm Nổi Bật</h3>
	</div>
	<div class="row">
	  	<div class="product_active owl-carousel">
	  		@foreach($productsRecommend as $productRecommend)
			<div class="col-lg-3">
				<div class="single_product">
				  	<div class="product_thumb">
					 	<a href="{{ route('product_detail', ['id'=>$productRecommend->id]) }}"><img src="{{ asset('public' . $productRecommend->image_path) }}" width="252px" height="324px" alt=""></a> 
					 	<div class="hot_img">
					   		<img src="public\user\img\cart\span-hot.png" alt="">
					 	</div>
					 	{{-- <div class="product_action">
					   		<a href="#" data-url="{{ route('addToCart', ['id'=>$productRecommend->id]) }}" class="add_to_cart"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</a>
					 	</div> --}}
				  	</div>
				  	<div class="product_content">
				  		@if($productRecommend->promotional_price == 0)
							<span class="product_price">{{ number_format($productRecommend->sale_price)}} ₫</span>
						@else
							<span class="product_price">{{ number_format($productRecommend->promotional_price)}} ₫</span>
						@endif
						<h3 class="product_title"><a href="{{ route('product_detail', ['id'=>$productRecommend->id]) }}">{{ $productRecommend->pro_name }}</a></h3>
				  	</div>
				  	<div class="product_info">
						<ul>
							<li><a href="#" title=" Add to Wishlist ">Thêm yêu thích</a></li>
							{{-- <li><a href="{{ route('showModal', ['id'=>$productRecommend->id]) }}" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li> --}}
						</ul>
				  	</div>
				</div>
			</div>
			@endforeach
	  </div> 
	</div> 
</div>