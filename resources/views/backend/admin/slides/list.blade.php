@extends('backend.master')
@section('title', 'Danh Sách Slide')
@section('content')
	<div class="col-lg-12">
		@can('slide-add')
			<a href="{{ route('slides.create') }}" id="btn-add" class="btn btn-primary">Add New</a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tiêu Đề</th>
			      <th scope="col">Mô Tả</th>
			      <th scope="col" >Hình Ảnh</th>
			      <th scope="col">Trạng Thái</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($slides as $item)
				    <tr>
				      	<th scope="row">{{ $item->id }}</th>
				      	<td>{{ $item->name }}</td>
				      	<td>{{ $item->description }}</td>
				      	<td>
				     		<img src="{{ asset('public'.$item->slide_path) }}" width="100%" style="object-fit:cover;" alt="">
				      	</td>
				      	<td>
				      		@if($item->status == 0)
				      			<a href="" class="label label-default">Hide</a>
				      		@else
				      			<a href="" class="label label-success">Active</a>
				      		@endif
				      	</td>
				      	@can('slide-edit')
					      	<td>
					      		<a href="{{ route('slides.edit', ['id'=>$item->id])}}" class="btn btn-default">
					      			<i class="fa fa-pencil-square-o"></i>
					      		</a>
					      	</td>
				      	@endcan
				      	@can('slide-delete')
						    <td>
						      	<a href="" data-url="{{ route('slides.destroy', ['id'=>$item->id]) }}" class="btn btn-danger action_delete">
						      		<i class="fa fa-trash-o"></i>
						      	</a>
						    </td>
					    @endcan
				    </tr>
				@endforeach
		  	</tbody>
		</table>
	</div>
	<div class="col-lg-12">{{ $slides->links() }}</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('public/vendors/listdelete.js') }}" ></script>
@endsection