@extends('backend.master')
@section('title', 'Danh Sách Vai Trò')
@section('content')
	<div class="col-lg-12">
		@can('role-add')
			<a href="{{ route('roles.create') }}" id="btn-add" class="btn btn-primary">Add New</a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tên vai trò</th>
			      <th scope="col">Mô tả vai trò</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($roles as $role)
				    <tr>
				      	<th scope="row">{{ $role->id }}</th>
				      	<td>{{ $role->role_name }}</td>
				      	<td>{{ $role->display_name }}</td>
				      	@can('role-edit')
					      	<td>
					      		<a href="{{ route('roles.edit',['id'=>$role->id]) }}" class="btn btn-success" title="Sửa">
					      			<i class="fa fa-pencil-square-o"></i>
					      		</a>
					      		
					      	</td>
				      	@endcan
				      	@can('role-delete')
						    <td>
						    	
						      	<a href="" data-url="{{ route('roles.destroy',['id'=>$role->id]) }}" class="btn btn-danger action_delete" title="Xoá">
						      		<i class="fa fa-trash-o"></i>
						      	</a>
						      	
						    </td>
					    @endcan
				    </tr>
				@endforeach
		  	</tbody>
		</table>
		<div class="col-lg-12">{{ $roles->links() }}</div>
	</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('public/vendors/listdelete.js') }}" ></script>
@endsection
