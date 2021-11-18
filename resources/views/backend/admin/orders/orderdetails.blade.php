@if($ordersdetail)
	<table class="table table-bordered">
	  	<thead>
		    <tr>
		      	<th scope="col">#</th>
		      	<th scope="col">Mã Đơn Hàng</th>
		      	{{-- <th scope="col">Ảnh</th> --}}
		      	<th scope="col">Sản Phẩm</th>  	
		      	<th scope="col">Size</th>
		      	<th scope="col">Màu Sắc</th>
		      	<th scope="col">Số Lượng</th>
		      	<th scope="col">Giá Tiền</th>
		      	<th scope="col">Thành Tiền</th>
		    </tr>
	  	</thead>
	  	<tbody>
	  		@foreach($ordersdetail as $orderdetail)
			    <tr>
				    <th scope="row">{{ $orderdetail->id }}</th>
				    <td>{{ $orderdetail->order_id }}</td>
				    {{-- <td>
				    	<img src="{{ asset('public'. $orderdetail->image)}}" style="width: 50%;height: 50px;object-fit: contain;">
				    </td> --}}
				    <td>
				    	<a href="{{ route('product_detail',$orderdetail->product_id) }}">{{ $orderdetail->product->pro_name }}</a>
				    </td>
				    <td>{{ $orderdetail->sizes->size }}</td>
				    <td>{{ $orderdetail->colors->name }}</td>
				    <td>{{ $orderdetail->quantity }}</td>
				    <td>{{ number_format($orderdetail->price) }} VNĐ</td>
				    <td>{{ number_format($orderdetail->subtotal) }} VNĐ</td>
			    </tr>
			@endforeach
	  	</tbody>
	</table>
@endif