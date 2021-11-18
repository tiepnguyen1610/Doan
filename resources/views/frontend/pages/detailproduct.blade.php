@extends('frontend.app')
@section('title', 'Tracy Shop')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><a href="">{{ $product->categories->cat_name }}</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{ $product->pro_name }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--product wrapper start-->
<div class="product_details">
    <form action="{{ route('addToCart', ['id'=>$product->id]) }}" method="POST">
        @csrf
        <div class="row">   
            <div class="col-lg-5 col-md-6">
                <div class="product_tab fix"> 
                    <div class="product_tab_button">    
                        <ul class="nav" role="tablist">
                        	@foreach($images as $imageDetailProduct)
    	                        <li>
                                    <a data-toggle="tab" href="#p_tab{{ $imageDetailProduct->id }}" role="tab" aria-controls="p_tab{{ $imageDetailProduct->id }}" aria-selected="false"><img src="{{ asset('public' . $imageDetailProduct->image_detail_path) }}" alt=""></a>
    	                        </li>
                            @endforeach
                        </ul>
                    </div> 
                    <div class="tab-content produc_tab_c">
                        <div class="tab-pane fade show active" id="p_tab{{$product->id}}" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ asset('public' . $product->image_path) }}" alt=""></a>
                                <div class="view_img">
                                    <a class="large_view" href="{{ asset('public' . $product->image_path) }}"><i class="fa fa-search-plus"></i></a>
                                </div>    
                            </div>
                        </div>
                        @foreach($images as $imageDetailProduct)
                            <div class="tab-pane fade" id="p_tab{{$imageDetailProduct->id}}" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="{{ asset('public' . $imageDetailProduct->image_detail_path) }}" alt=""></a>
                                    <div class="view_img">
                                        <a class="large_view" href="{{ asset('public' . $imageDetailProduct->image_detail_path) }}"><i class="fa fa-search-plus"></i></a>
                                    </div>     
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> 
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product_d_right">
                    <h1>{{ $product->pro_name }}</h1>
                     <div class="product_ratting mb-10">
                        <ul>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"> Đánh giá </a></li>
                        </ul>
                    </div>
                    <div class="product_desc">
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="content_price mb-15">
                        @if($product->promotional_price != 0)
                            <span>{{ number_format($product->promotional_price) }} ₫</span>
                            <span class="old-price">{{ number_format($product->sale_price) }} ₫</span>
                        @else
                            <span>{{ number_format($product->sale_price) }} ₫</span>
                        @endif
                    </div>
                    <div class="box_quantity mb-20">
                        @if($product->quanty > 0)
                            <button type="submit" class="add_to_cart"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</button>
                            <a href="#" title="Thêm yêu thích"><i class="fa fa-heart" aria-hidden="true"></i></a>   
                        @else
                            <a href="#" title="Thêm yêu thích"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    <div class="product_d_size mb-20">
                        <label for="group_1">Kích Thước</label>
                        <select name="size_id" id="group_1">
                            @foreach($product->productsizes as $itemProductSize)
                                <option value="{{ $itemProductSize->id }}">{{ $itemProductSize->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="product_d_size mb-20">
                        <label for="group_1">Màu Sắc</label>
                        <select name="color_id" id="group_1">
                            @foreach($product->productcolors as $itemProductColor)
                                <option value="{{$itemProductColor->id}}">{{ $itemProductColor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sidebar_widget color">
                        <div class="widget_color">
                            <ul class="widget_product">
                                @foreach($product->productcolors as $itemProductColor)
                                    <li class="product_color">
                                        <input style="background-color: {{ $itemProductColor->color }}" type="button">     
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>                 
                    <div class="product_stock mb-20">
                        @if($product->quanty > 0)
                            <p>{{ $product->quanty }} sản phẩm</p>
                            <span> Trong Kho </span>
                        @else
                            <span style="background-color: #F4645F"><strike>Hết Hàng</strike></span>
                        @endif
                    </div>
                    <div class="wishlist-share">
                        <h4>Share on:</h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                        </ul>      
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--product details end-->
<!--product info start-->
<div class="product_d_info">
    <div class="row">
        <div class="col-12">
            <div class="product_d_inner">   
                <div class="product_info_button">    
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">THÔNG TIN CHI TIẾT</a>
                        </li>
                        <li>
                           <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                        <div class="product_info_content">
                            <p style="font-size: 15px;">{!! $product->content !!}</p>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="product_info_content">
                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                        </div>
                        <div class="product_info_inner">
                            <div class="product_ratting mb-10">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <strong>Posthemes</strong> 
                                <p>09/07/2018</p>
                            </div>
                            <div class="product_demo">
                                <strong>demo</strong>
                                <p>That's OK!</p>
                            </div>
                        </div> 
                        <div class="product_review_form">
                            <form action="#">
                                <h2>Add a review </h2>
                                <p>Your email address will not be published. Required fields are marked </p>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="review_comment">Your review </label>
                                        <textarea name="comment" id="review_comment"></textarea>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <label for="author">Name</label>
                                        <input id="author" type="text">
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <label for="email">Email </label>
                                        <input id="email" type="text">
                                    </div>  
                                </div>
                                <button type="submit">Submit</button>
                             </form>   
                        </div>     
                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>  
<!--product info end-->
<!--new product area start-->
@include('frontend.layouts.components.relatedproduct')
<!--new product area start-->  
@endsection
