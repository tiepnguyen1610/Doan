@extends('backend.master')
@section('title', 'Phân Quyền Hệ Thống')
@section('content')
	<div class="col-lg-12">
		@can('permission-add')
			<a href="{{ route('permissions.create') }}" id="btn-add" class="btn btn-primary">Add New</a>
		@endcan
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Module Cha</th>
			      <th scope="col">Mô tả</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@php $stt = 0;@endphp
		  		@foreach($permissions as $permission)
		  			@php
		  				$stt++;
		  			@endphp
				    <tr>
					    <th scope="row">#{{ $stt }}</th>
					    <td>{{ $permission->permission_name }}</td>
					    <td>{{ $permission->display_name }}</td>
					    <td>
					    	@can('permission-edit')
						   		<a href="{{ route('permissions.edit',['id'=>$permission->id]) }}" class="btn btn-default" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
						    @endcan
						    @can('permission-delete')
						    <a href="" data-url="{{ route('permissions.destroy',['id'=>$permission->id]) }}"  class="btn btn-danger action_delete" title="Xoá"><i class="fa fa-trash-o"></i></a>
						    @endcan
					    </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
	</div>
	<div class="col-lg-12">
		<h3> Chi tiết các quyền</h3><br>
	</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Module Con</th>
			      <th scope="col">Mô tả</th>
			      <th scope="col">Từ Khoá</th>
			      <th scope="col">Thuộc Module</th>
			      <th scope="col" colspan="2" >Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@foreach($permissionsChild as $permissionChild)
				    <tr>
					    <th scope="row">#{{ $permissionChild->id }}</th>
					    <td>{{ $permissionChild->permission_name }}</td>
					    <td>{{ $permissionChild->display_name }}</td>
					    <td>{{ $permissionChild->key_code }}</td>
					    <td>{!! $permissionChild->parent->permission_name ?? 'Cha' !!}</td>
					    <td>
					    	@can('permission-edit')
						   		<a href="{{ route('permissions.edit',['id'=>$permissionChild->id]) }}" class="btn btn-default" title="Sửa"><i class="fa fa-pencil-square-o"></i></a>
						    @endcan
						    @can('permission-delete')
						    <a href="" data-url="{{ route('permissions.destroy',['id'=>$permissionChild->id]) }}"  class="btn btn-danger action_delete" title="Xoá"><i class="fa fa-trash-o"></i></a>
						    @endcan
					    </td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
		<div class="col-lg-12">{{ $permissionsChild->links() }}</div>
	</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('public/vendors/listdelete.js') }}" ></script>
@endsection