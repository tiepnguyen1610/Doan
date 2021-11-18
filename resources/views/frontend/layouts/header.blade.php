<div class="header_area">
   <!--header top--> 
    <div class="header_top">
       <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="header_links">
                    <ul>
                        {{-- <li><a href="my-account.html" title="My account">Tài Khoản</a></li>
                        <li><a href="wishlist.html" title="wishlist">Yêu Thích</a></li> --}}
                        <li><a href="{{ route('cart.index') }}" title="My cart">Giỏ Hàng</a></li>
                        <li><a href="login.html" title="Login">Đăng Nhập</a></li>
                    </ul>
                </div>   
            </div>
       </div> 
    </div> 
    <!--header top end-->

    <!--header middel--> 
     <div class="header_middel">
        <div class="row align-items-center">
           <!--logo start-->
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('public\user\img\logo\logo.jpg.png')}}" alt=""></a>
                </div>
            </div>
            <!--logo end-->
            <div class="col-lg-9 col-md-9">
                <div class="header_right_info">
                    <div class="search_bar">
                        <form action="#">
                            <input placeholder="Từ khoá tìm kiếm..." type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div id="change_cart">
                        @if($carts->count() > 0 )
                            <div class="shopping_cart">
                                <a href="#"><i class="fa fa-shopping-cart"></i> {{ Cart::count() }} sản phẩm<i class="fa fa-angle-down"></i></a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    @php $total = 0; @endphp
                                    @foreach($carts as $item)
                                        @php
                                            $total += $item->subtotal;
                                        @endphp
                                        <div class="cart_item">
                                           <div class="cart_img">
                                               <a href=""><img src="{{ asset('public'. $item->options->image) }}" alt=""></a>
                                           </div>
                                            <div class="cart_info">
                                                <a href="#">{{ $item->name }}</a>
                                                <span class="cart_price">{{ number_format($item->price) }}</span>
                                                <span class="quantity">Số lượng: {{ $item->qty }}</span>
                                            </div>
                                            <div class="cart_remove">
                                                <a title="Xoá" href="{{ route('deleteCart', $item->rowId) }}"><i class="fa fa-times-circle"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="total_price">
                                            <span> Tổng Tiền </span>
                                            <span class="prices">{{ number_format($total) }} VNĐ</span>
                                        </div>
                                        <div class="cart_button">
                                            <a href="{{ route('getCheckout') }}"> Thanh Toán</a>
                                        </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        @else
                            <div class="shopping_cart">
                                <a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng <i class="fa fa-angle-down"></i></a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item">
                                       <span>Không có sản phẩm nào.</span>
                                    </div> 
                                </div>
                            </div>
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <!--header middel end-->      
    @include('frontend.layouts.homemenu')
</div>