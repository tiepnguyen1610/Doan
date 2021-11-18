@extends('frontend.app')
@section('title', 'Tracy Shop | Giỏ hàng ')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--shopping cart area start -->
@if (session('success'))
    <div class="alert alert-success" style="position: fixed;right: 20px;">
        {{ session('success') }}
    </div>
@endif
<div class="shopping_cart_area">
    <form action="#"> 
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table class="update_cart_url" data-url="{{ route('updateCart') }}">
                            <thead>
                                <tr>
                                    <th class="product_thumb">Ảnh</th>
                                    <th class="product_name">Sản Phẩm</th>
                                    <th class="product-price">Đơn Giá</th>
                                    <th class="product_quantity">Số Lượng</th>
                                    <th class="product_total">Thành Tiền</th>
                                    <th class="product_remove">Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($carts->count() === 0)
                                    <tr>
                                        <td colspan="6"><p class="cart_note">Không có sản phẩm nào trong giỏ hàng.</p></td>   
                                    </tr>
                                @else
                                    @php
                                        $contents = Cart::content();
                                        $total = 0;
                                    @endphp
                                    @foreach($contents as $item)
                                        @php
                                            $total += $item->subtotal;
                                        @endphp
                                        <tr>
                                            <td class="product_thumb">
                                                <a href="#"><img src="{{ asset('public'. $item->options->image) }}" style="width: 50%;height: 100px;object-fit: contain;" alt="">
                                                </a>
                                            </td>
                                            <td class="product_name">
                                                <a href="#"><h5>{{ $item->name }}</h5></a>
                                                <h6>{{ $item->options->size_name }}</h6>
                                                <h6>{{ $item->options->color_name }}</h6>
                                            </td>
                                            <td class="product-price">{{ number_format($item->price) }}</td>
                                            <td class="product_quantity">
                                                <input type="number" value="{{ $item->qty }}" name="qty" onchange="updateCart(this.value,'{{$item->rowId}}');" >   
                                            </td>
                                            <td class="product_total">{{ number_format($item->subtotal) }} VNĐ</td>
                                            <td class="product_remove"><a href="{{ route('deleteCart', $item->rowId) }}"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>   
                    </div>  
                    <div class="cart_submit">
                        <a href="{{ route('deleteAll') }}" class="btn btn-secondary">Xoá Tất Cả</a>
                    </div>      
                </div>
            </div>
        </div>
        <!--coupon code area start-->
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code">
                        <h3>GIỎ HÀNG</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>TỔNG TIỀN</p>
                                @if($carts->count() > 0)
                                    <p class="cart_amount">{{ number_format($total) }} VNĐ</p>
                                @else
                                    <p class="cart_amount">0 VNĐ</p>
                                @endif
                            </div>
                            {{-- <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                            </div> --}}
                            <a href="#"></a>
                            {{-- <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">£215.00</p>
                            </div> --}}
                            <div class="checkout_btn">
                                <a href="{{ route('getCheckout') }}">Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </form> 
</div>
 <!--shopping cart area end -->
@endsection
