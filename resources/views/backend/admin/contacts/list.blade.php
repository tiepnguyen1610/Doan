@extends('backend.master')
@section('title', 'Danh Sách TT Liên Hệ')
@section('content')
	<div class="col-lg-12">
		@can('contact-add')
			<a href="{{ route('contacts.create') }}" id="btn-add" class="btn btn-primary">Add New</a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Mô Tả</th>
			      <th scope="col">Địa Chỉ</th>
			      <th scope="col" >Email</th>
			      <th scope="col">Số Điện Thoại</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($contacts as $item)
				    <tr>
					    <th scope="row">{{ $item->id }}</th>
					    <td>{{ $item->description }}</td>
					    <td>{{ $item->address }}</td>
					    <td>{{ $item->email }}</td>
					    <td>{{ $item->phone }}</td>
					    @can('contact-edit')
						    <td>
							   <a href="{{ route('contacts.edit', ['id'=>$item->id]) }}" class="btn btn-default">
							    	<i class="fa fa-pencil-square-o"></i>
							    </a>
						    </td>
					    @endcan
					    @can('contact-delete')
						    <td>
						      	<a href="" data-url="{{ route('contacts.destroy',['id'=>$item->id]) }}" class="btn btn-danger action_delete">
						      		<i class="fa fa-trash-o"></i>
						      	</a>
						    </td>
					    @endcan
				    </tr>
				@endforeach
		  	</tbody>
		</table>
	</div>
	<div class="col-lg-12"></div>
@endsection
@section('js')
<script src="{{ asset('public/vendors/listdelete.js') }}" type="text/javascript"></script>
@endsection