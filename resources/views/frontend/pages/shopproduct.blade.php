@extends('frontend.app')
@section('title', 'Tracy Shop')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    @foreach($products as $productCategory)
                        <li>{{ optional($productCategory->categories)->cat_name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-12">
           <!--layere categorie"-->
              <div class="sidebar_widget shop_c">
                    <div class="categorie__titile">
                        <h4>Danh Mục Liên Quan</h4>
                    </div>
                    <div class="layere_categorie">
                        <ul>
                            @foreach($menuCategory as $itemMenuCategory)
                                <li>
                                    <input id="acces" type="checkbox">
                                    <label for="acces"><a href="{{ route('category.product', ['slug'=>$itemMenuCategory->slug, 'id'=>$itemMenuCategory->id]) }}">{{ $itemMenuCategory->cat_name }}</a><span> {{-- ({{ count($menuCategory) }}) --}}</span></label>   
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            <!--layere categorie end-->
            <!--color area start-->  
            <div class="sidebar_widget color">
                <h2>Màu sắc</h2>
                 <div class="widget_color">
                    <ul>
                        <li><a href="#">Black <span>(10)</span></a></li>

                        <li><a href="#">Orange <span>(12)</span></a></li>

                        <li> <a href="#">Blue <span>(14)</span></a></li>

                        <li><a href="#">Yellow <span>(15)</span></a></li>

                        <li><a href="#">pink <span>(16)</span></a></li>

                        <li><a href="#">green <span>(11)</span></a></li>
                    </ul>
                </div>
            </div>                 
            <!--color area end--> 
            <!--wishlist block start-->
            {{-- <div class="sidebar_widget wishlist mb-30">
                <div class="block_title">
                    <h3><a href="#">Danh Sách Yêu Thích</a></h3>
                </div>
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="#"><img src="{{ asset('public\user\img\cart\cart.jpg') }}" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="#">lorem ipsum dolor</a>
                        <span class="cart_price">$115.00</span>
                        <span class="quantity">Qty: 1</span>
                    </div>
                    <div class="cart_remove">
                        <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                    </div>
                </div>
                <div class="block_content">
                    <p>1  sản phẩm</p>
                    <a href="#">» Danh sách của tôi</a>
                </div>
            </div> --}}
            <!--wishlist block end-->
            <!--newsletter block start-->
            <div class="sidebar_widget newsletter mb-30">
                <div class="block_title">
                    <h3>Tin Tức</h3>
                </div> 
                <form action="#">
                    <p>Đăng ký để nhận những thông tin mới nhất</p>
                    <input placeholder="Nhập email của bạn" type="email">
                    <button type="submit">Đăng ký</button>
                </form>   
            </div>
            <!--newsletter block end-->
        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider mb-35">
                <img src="{{ asset('public\user\img\banner\bannner10.jpg')}}" alt="">
            </div> 
            <!--banner slider start-->

            <!--shop toolbar start-->
            <div class="shop_toolbar list_toolbar mb-35">
                <div class="list_button">
                    <ul class="nav" role="tablist">
                    </ul>
                </div>
                <div class="page_amount">
                    <p>Hiển thị 1–9 của {{ count($products) }} kết quả</p>
                </div>
                <div class="select_option">
                    
                </div>
            </div>
            <!--shop toolbar end-->

            <!--shop tab product-->
            <div class="shop_tab_product">   
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="large" role="tabpanel">
                        
                    </div>
                    <div class="tab-pane fade show active" id="list" role="tabpanel">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                           <a href="{{ route('product_detail', ['id'=>$product->id]) }}"><img src="{{ asset('public' . $product->image_path) }}" width="252px" height="324px"alt=""></a>
                                           @if($product->promotional_price > 0)
                                                <div class="hot_img">
                                                    <span class="sale_product">SALE OFF</span>
                                                </div>
                                           @endif
                                            {{-- <div class="product_action">
                                               <a href="#" data-url="{{ route('addToCart', ['id'=>$product->id]) }}" class="add_to_cart"><i class="fa fa-shopping-cart"></i> Thêm giỏ hàng</a>
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
                                                <li><a href="#" title=" Add to Wishlist ">Thêm Yêu Thích</a></li>
                                                {{-- <li><a href="{{ route('showModal', ['id'=>$product->id]) }}" data-toggle="modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a></li>  --}}  
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>                        
                    </div>

                </div>
            </div>    
            <!--shop tab product end-->

            <!--pagination style start--> 
            <div class="pagination_style">
                <div class="page_number">
                    @if(count($products) > 9)
                        <span>Trang: </span>
                    @endif
                    <ul>
                        {{ $products->links() }}
                    </ul>
                </div>
            </div>
            <!--pagination style end--> 
        </div>
    </div>  
</div>
<!--pos home section end-->
@endsection