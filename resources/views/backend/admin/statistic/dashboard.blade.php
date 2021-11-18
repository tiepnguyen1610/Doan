@extends('backend.master')
@section('title','Tổng Quan')
@section('content')
<!-- //market-->
<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-shopping-bag fa-3x"></i>
			</div>
			<div class="col-md-8 market-update-left">
			   <h4>Sản Phẩm</h4>
			   <h3>{{ $products }}</h3>
			   
		    </div>
		    <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
			<h4>Nhân Viên</h4>
				<h3>{{ $users }}</h3>
				
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-usd"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Doanh Thu</h4>
				<h3>{{ number_format($totalRevenue) }}</h3>
				
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-4">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Đơn Hàng Mới</h4>
				<h3>{{ $orders }}</h3>
				
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
   <div class="clearfix"> </div>
</div>
<!-- //market-->
@endsection
