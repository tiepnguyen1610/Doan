@extends('backend.master')
@section('title', 'Thống Kê Tồn Kho')
@section('content')

<a href="" id="btn-add"><i class="fa fa-folder-open fa-2x">Xuất File</i></a>
<div class="col-lg-12">
	<table class="table table-bordered table-striped">
	  	<thead>
		    <tr>
		      <th colspan="4"></th>
		      <th colspan="2">Tồn Kho</th>
		      {{-- <th></th>
		      <th></th>
		      <th></th>
		      <th></th> --}}
		    </tr>
	  	</thead>
	  	<tbody>
	  		<tr>
	  			<th>STT</th>
	  			<th>Tên sản phẩm</th>
	  			<th>Danh mục</th>
	  			<th>Giá bán</th>
	  			<th>Số lượng</th>
	  			<th>Thành tiền</th>
	  		</tr>
	  	</tbody>
	  	<tfoot>
	  		@php
	  			$stt = 1;
	  			$total = 0; 
	  		@endphp
	  		@foreach($wareHouseProducts as $product)
	  			@php
	  				$total = $product->sale_price * $product->quanty;
	  			@endphp
		  		<tr>
		  			<td>{{ $stt++ }}</td>
		  			<td>{{ $product->pro_name }}</td>
		  			<td>{{ optional($product->categories)->cat_name}}</td>
		  			<td>{{ number_format($product->sale_price) }} VNĐ</td>
		  			<td>{{ $product->quanty }}</td>
		  			<td>{{ number_format($total) }} VNĐ</td>
		  		</tr>
			@endforeach	  	
	  	</tfoot>
	</table>
</div>
@endsection
