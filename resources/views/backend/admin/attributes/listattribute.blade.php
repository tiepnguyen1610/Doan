@extends('backend.master')
@section('title', 'Danh Sách Thuộc Tính')
@section('content')
<div class="col-lg-6">
	<div class="col-lg-0">
		<a href="{{ route('attributes.color.create') }}" class="btn btn-primary add-form">Add New</a>
	</div>
		<table class="table table-bordered table-hover">
	  <thead>
	    <tr>
		    <th scope="col">#</th>
		    <th scope="col">Color</th>
		    <th scope="col">Name</th>
	      	<th scope="col">Thực Thi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@php $stt = 1; @endphp
	  	@foreach($colors as $color)
		    <tr>
		      	<td scope="row">{{ $stt++ }}</td>
			    <td>
			    	<span class="glyphicon glyphicon-stop" style="color: {{ $color->color }}"></span>
			    </td>
			    <td>{{ $color->name }}</td>
		      	<td>
		      		<a href="{{ route('attributes.color.edit',['id'=>$color->id]) }}" title="Sửa" class="btn btn-default"><i class="fa fa-pencil-square-o" ></i></a>
		      		<a href="" data-url="{{ route('attributes.color.destroy',['id'=>$color->id]) }}" class="btn btn-danger action_delete" title="Xoá"><i class="fa fa-trash-o"></i>
		      		</a>
		      	</td>
		    </tr>
	   	@endforeach
	  </tbody>
	</table>
	{{ $colors->links() }}
</div>
<div class="col-lg-6">
	<div class="col-lg-0">
		<a href="{{ route('attributes.size.create') }}" class="btn btn-primary add-form">Add New</a>
	</div>
	<table class="table table-bordered table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Size</th>
	      <th scope="col">Thực Thi</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($sizes as $size)
		    <tr>
		      	<td scope="row">{{ $size->id }}</td>
		      	<td>{{ $size->size }}</td>
		      	<td>
		      		<a href="{{ route('attributes.size.edit',['id'=>$size->id]) }}" class="btn btn-default" title="Sửa"><i class="fa fa-pencil-square-o" ></i>
		      		</a>
		      		<a href="" data-url="{{ route('attributes.size.destroy',['id'=>$size->id]) }}" class="btn btn-danger action_delete" title="Xoá"><i class="fa fa-trash-o"></i>
		      		</a>
		      	</td>
		    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>
@endsection
@section('js')
<script src="{{ asset('public/vendors/listdelete.js') }}" type="text/javascript"></script>
@endsection