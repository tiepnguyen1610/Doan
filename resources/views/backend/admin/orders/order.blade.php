@extends('backend.master')
@section('title', 'Danh Sách Đơn Hàng')
@section('content')
	<div class="col-lg-12">
		<table class="table table-bordered table-hover" id="myTable">
		  	<thead>
			    <tr>
			      	<th scope="col">#</th>
			      	<th scope="col">Họ Tên</th>
			      	<th scope="col">Phone</th>  	
			      	<th scope="col">Địa Chỉ</th>
			      	<th scope="col">Tổng Tiền</th>
			      	<th scope="col">Ghi Chú</th>
			      	<th scope="col">Trạng Thái</th>
			      	<th scope="col">Ngày Đặt Hàng</th>
			      	<th scope="col">View</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($orders as $order)
				    <tr>
					    <th scope="row">#{{$order->id}}</th>
					    <td>{{ $order->fullname }}</td>
					    <td>{{ $order->phone }}</td>
					    <td>{{ $order->address }}</td>
					    <td>{{ number_format($order->totalprice) }}VNĐ</td>
					    <td>{{ $order->note }}</td>
					    <td>
					    	@if($order->status == 0)
					    		<a href="{{ route('orders.active',$order->id) }}" class="label label-default">Chờ xác nhận</a>
					    	@elseif($order->status == 1)
					    		<a href="{{ route('orders.unactive',$order->id) }}" class="label label-success">Đã xác nhận</a>
					    	@else
					    		<a href="#" class="label label-danger">Huỷ đơn hàng</a>
					    	@endif
					    </td>
					    <td>{{ $order->created_at->format('d/m/Y') }}</td>
					    <td>
					    	<a href="{{ route('orders.detail',$order->id) }}" data-id="{{$order->id}}" class="btn btn-default order_detail">
							    <i class="fa fa-eye"></i>
							</a>
					    </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
		{{ $orders->links() }}
	</div>
	<!-- Modal -->
	<div id="myModalOrderDetail" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-lg">

	    <!-- Modal content-->
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Chi tiết đơn hàng #<b class="order_id"></b></h4>
		      	</div>
		      	<div class="modal-body" id="md_content">
		        	
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
		      	</div>
		    </div>
	  	</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		$(document).ready( function () {
    		$('#myTable').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(function(){
			$('.order_detail').click(function(event){
				event.preventDefault();
				let url = $(this).attr('href');
				$('.order_id').text('').text($(this).attr('data-id'));
				$('#myModalOrderDetail').modal('show');

				$.ajax({
					url: url,
				}).done(function(result) {
					if (result)
					{
						$('#md_content').html('').append(result);
					}
				});
			});

		})
	</script>
@endsection
