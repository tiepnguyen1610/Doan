@extends('backend.master')
@section('title', 'Cập Nhật Danh Mục Sản Phẩm')
@section('content')
	<div class="row">
		<div class="col-lg-6" style="padding-bottom:120px">
	        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
	        	@csrf
	            <div class="form-group">
	                <label>Tên danh mục</label>
	                <input type="text" name="txtCatname" class="form-control" value="{{ $category->cat_name }}" />
	            </div>
	            <div class="form-group">
	            	<label for="">Thuộc danh mục cha</label>
	            	<select class="form-control" name="slrParent">
					  	<option value="0" >Chọn danh mục cha</option>
					  		{!! $htmlOption !!}
					</select>
	            </div>
	            <button type="submit" class="btn btn-primary">Update</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	        <form>
	    </div>
	</div>
@endsection