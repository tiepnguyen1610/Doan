@extends('backend.master')
@section('title', 'Danh Sách Sản Phẩm')
@section('content')
<div class="col-lg-12">
	@can('product-add')
		<a href="{{ route('products.create') }}" id="btn-add" class="btn btn-primary">Thêm mới</a>
	@endcan
</div>
<div class="col-lg-12">
	<table class="table table-bordered table-hover" id="myTable">
	  	<thead>
		    <tr>
		      <th>#</th>
		      <th>Tên S.Phẩm</th>
		      <th>Giá Bán</th>
		      <th>Khuyến Mãi</th>
		      <th>Hình Ảnh</th>
		      <th>Thực Thi</th>
		    </tr>
	  	</thead>
	  	<tbody>
	  		@foreach($products as $product)
			    <tr>
			      	<td>{{ $product->id }}</td>
			      	<td>
			      		{{ $product->pro_name }}
			      		<ul style="padding-left: 20px;">	
			      			<li><span>Danh mục : {{ optional($product->categories)->cat_name}}</span></li>
			      			<li><span>NCC: {{$product->provider->name}}</span></li>
			      			<li><span>Số lượng : {{ $product->quanty }}</span></li>
			      		</ul>
			      	</td>
			      	<td>{!! number_format($product->sale_price) !!}₫</td>
			      	<td>{{ ($product->promotional_price > 0)? $product->promotional_price : 'Chưa có' }}</td>
			      	<td>
			      		<img width="100px" height="100px" style="object-fit:cover;" src="{{ asset('public'.$product->image_path) }}" alt="{{ $product->image_name }}">
			      	</td>
			      	<td>
			      		@can('product-edit',$product->id)
			      		<a href="{{ route('products.edit', ['id'=>$product->id ]) }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
			      		@endcan

			      		@can('product-delete',$product->id)
			      			<a data-url ="{{ route('products.destroy', ['id'=>$product->id ]) }}" class="btn btn-danger action_delete"><i class="fa fa-trash-o"></i></a>
			      		@endcan
			      	</td>	
			    </tr>
			@endforeach
	  	</tbody>
	</table>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('public/vendors/listdelete.js') }}" ></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#myTable').DataTable();
	});
</script>
@endsection