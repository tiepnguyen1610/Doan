<div class="new_product_area">
	<div class="block_title">
		<a href="#"><h3>Sản Phẩm Mới</h3></a>
	</div>
	<div class="row">
	  	<div class="product_active owl-carousel">
	  		@foreach($products as $product)
				<div class="col-lg-3">
					<div class="single_product">
					    <div class="product_thumb">
						 	<a href="{{ route('product_detail', ['id'=>$product->id]) }}"><img src="{{ asset('public' . $product->image_path) }}" width="252px" height="324px" alt=""></a> 
							<div class="img_icone">
						    	<img src="public\user\img\cart\span-new.png" alt="">
							</div>
							{{-- <div class="product_action">
							   <a href="#" data-url="{{ route('addToCart', ['id'=>$product->id]) }}" class="add_to_cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
							</div> --}}
					  	</div>
					  	<div class="product_content">
					  		@if($product->promotional_price == 0)
								<span class="product_price">{{ number_format($product->sale_price)}} ₫</span>
							@else
								<span class="product_price">{{ number_format($product->promotional_price)}} ₫</span>
							@endif
							<h3 class="product_title"><a href="{{ route('product_detail', ['id'=>$product->id]) }}">{{ $product->pro_name }}</a></h3>
					  	</div>
					  <div class="product_info">
						<ul>
							<li><a href="#" title=" Add to Wishlist ">Thêm yêu thích</a></li>
							{{-- <li><a href="{{ route('showModal', ['id'=>$product->id]) }}" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem Chi Tiết</a></li> --}}
						</ul>
					  </div>
					</div>
				</div>
			@endforeach
	  </div> 
	</div>       
</div> 