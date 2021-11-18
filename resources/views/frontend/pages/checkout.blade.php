@extends('frontend.app')
@section('title', 'Tracy Shop | Thanh Toán')
@section('content')
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thanh Toán</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section-->
<div class="Checkout_section">
    <div class="checkout_form">
        <form action="{{ route('postCheckout') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Thông Tin Hoá Đơn</h3>
                    <div class="row">
                        <div class="col-12 mb-30">
                            <label>Họ & Tên <span>*</span></label>
                            <input type="text" name="txtName" value="{{ old('txtName') }}" placeholder="Nhập thông tin họ và tên">    
                        </div>
                        <div class="col-lg-6 mb-30">
                            <label>Số Điện Thoại <span>*</span></label>
                            <input type="text" name="txtPhone" value="{{ old('txtPhone') }}" placeholder="Nhập số điện thoại liên lạc"> 
                        </div> 
                         <div class="col-lg-6 mb-30">
                            <label> Email <span>*</span></label>
                                <input type="email" name="txtEmail" value="{{ old('txtEmail') }}" placeholder="Nhập địa chỉ email"> 
                        </div> 
                        <div class="col-12 mb-30">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" placeholder="Nhập địa chỉ giao hàng" value="{{ old('txtAddress') }}" name="txtAddress" >     
                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Order Notes</label>
                                <textarea id="order_note" name="txtNote" value="{{ old('txtNote') }}"  placeholder="Ghi chú" rows="3"></textarea>
                            </div>
                        </div>     	    	    	    	    	    	    
                    </div>   
                </div>
                <div class="col-lg-6 col-md-6">   
                    <h3>Đơn Hàng Của Bạn</h3> 
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Size</th>
                                    <th>Màu sắc</th>
                                    <th>Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $total = 0; 
                                    $ship = 20000;
                                    $order_total = 0;
                                @endphp
                                @foreach($carts as $item)
                                    @php
                                        $total += $item->subtotal;
                                        $order_total = $total + $ship;
                                    @endphp
                                    <tr>
                                        <td style="font-weight: bold;">{{ $item->name }}<strong> x {{ $item->qty }} </strong></td>
                                        <td>{{ $item->options->size_name }}</td>
                                        <td>{{ $item->options->color_name }}</td>
                                        <td>{{ number_format($item->subtotal) }} VNĐ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng Tiền Đơn Hàng</th>
                                    <td colspan="2"></td>
                                    <td><strong> {{ number_format($total) }} VNĐ </strong></td>
                                </tr>
                                @if($carts->count() > 0)
                                    <tr>
                                        <th>Giao Hàng</th>
                                        <td colspan="2"></td>
                                        <td><strong> {{ number_format($ship) }} VNĐ </strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Tổng Tiền Thanh Toán</th>
                                        <td colspan="2"></td>
                                        <td><strong> {{ number_format($order_total) }} VNĐ</strong></td>
                                    </tr>
                                @endif
                            </tfoot>
                        </table>     
                    </div>
                    <div class="payment_method">
                       <div class="panel-default">
                            <input id="payment" name="check_method" type="radio" data-target="createp_account" value="COD" checked>
                            <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh toán khi nhận hàng</label>

                            <div id="method" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                   <p>Trả tiền sau khi nhận và kiểm tra hàng.</p>
                                </div>
                            </div>
                        </div> 
                       {{-- <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-target="createp_account">
                            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="{{ asset('\public\user\img\visha\papyel.png') }}" alt=""></label>

                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                   <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> 
                                </div>
                            </div>
                        </div> --}}
                        <div class="order_button">
                            <button type="submit">Đặt Hàng</button> 
                        </div>    
                    </div>        
                </div>
            </div>
        </form> 
    </div>        
</div>
<!--Checkout page section end-->
@endsection
