@extends('backend.master')
@section('content')
@section('title', 'Danh Sách Nhà Cung Cấp')
	<div class="col-lg-12">
		@can('provider-add')
			<a href="{{ route('providers.create') }}" class="btn btn-primary add-form">Add New</a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nhà Cung Cấp</th>
			      <th scope="col">Địa Chỉ</th>
			      <th scope="col" >Phone</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($providers as $item)
				    <tr>
				      	<th scope="row">{{ $item->id }}</th>
				      	<td>{!! $item->name !!}</td>
				      	<td>{{ $item->address }}</td>
				      	<td>{{ $item->phone }}</td>
				      	@can('provider-edit')
					      	<td>
						      	<a href="{{ route('providers.edit', ['id'=>$item->id]) }}" class="btn btn-default">
						      		<i class="fa fa-pencil-square-o"></i>
						      	</a>
					      	</td>
				      	@endcan
				      	@can('provider-delete')
					      	<td>
					      		<a href="" data-url="{{ route('providers.destroy', ['id'=>$item->id]) }}" class="btn btn-danger action_delete">
					      			<i class="fa fa-trash-o"></i>
					      		</a>
					      	</td>
				      	@endcan
				    </tr>
				@endforeach
		  	</tbody>
		</table>
	</div>
	<div class="col-lg-12">{{ $providers->links() }}</div>
@endsection
@section('js')
<script src="{{ asset('public/vendors/listdelete.js') }}" type="text/javascript"></script>
@endsection