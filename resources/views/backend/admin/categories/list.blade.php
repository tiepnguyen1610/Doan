@extends('backend.master')
@section('title', 'Danh Sách Loại Sản Phẩm')
@section('content')
	<div class="col-lg-12">
		@can('category-add')
			<a href="{{ route('categories.create') }}" id="btn-add" class="btn btn-primary">Add New</a>
		@endcan
	</div>
	<div class="col-sm-12" >
		<table class="table table-striped table-bordered table-hover" id="myTable" >
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tên Danh Mục</th>
			      <th scope="col">Thuộc Danh Mục</th>
			      <th scope="col">Slug</th>
			      <th scope="col"abbr="">Ngày Tạo</th>
			      <th scope="col">Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($categories as $item)
				    <tr>
					    <td scope="row">{{ $item->id }}</td>
					    <td>{!! $item->cat_name !!}</td>
					    <td>{!! $item->parent->cat_name ?? 'Danh Mục Gốc' !!}</td>
					    <td>{{ $item->slug }}</td>
					    <td>{{ $item->created_at->diffForHumans() }}</td>
						<td>
							@can('category-edit')
							    <a href="{{ route('categories.edit', ['id'=>$item->id]) }}" class="btn btn-default">
							    	<i class="fa fa-pencil-square-o"></i>
							    </a>
							@endcan
							@can('category-delete')
							    <a href="" data-url="{{ route('categories.destroy', ['id'=>$item->id]) }}" class="btn btn-danger action_delete">
						      		<i class="fa fa-trash-o"></i>
						      	</a>
						    @endcan
						</td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
		{{-- {{ $categories->links() }} --}}
	</div>
@endsection
@section('js')
<script src="{{ asset('public/vendors/listdelete.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#myTable').DataTable();
	});
</script>
@endsection