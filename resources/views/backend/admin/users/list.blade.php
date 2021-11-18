@extends('backend.master')
@section('title', 'Danh Sách Quản Trị Viên')
@section('content')
	<div class="col-lg-12">
		@can('user-add')
			<a href="{{ route('users.create') }}" id="btn-add"><i class="fa fa-user-plus fa-2x"></i></a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Họ Tên</th>
			      <th scope="col">Email</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($users as $user)
				    <tr>
				      	<th scope="row">{{ $user->id }}</th>
				      	<td>{{ $user->username }}</td>
				      	<td>{{ $user->email }}</td>
				      	
				      	<td>
				      		@can('user-edit')
				      		<a href="{{ route('users.edit',['id' =>$user->id]) }}" class="btn btn-default" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
				      		@endcan
				      		@can('user-delete')
				      		<a href="" data-url="{{ route('users.destroy',['id' =>$user->id]) }}" class="btn btn-danger action_delete" title="Xoá"><i class="fa fa-trash-o"></i></a>
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
@endsection
