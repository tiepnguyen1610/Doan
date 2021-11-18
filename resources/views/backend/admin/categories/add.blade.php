@extends('backend.master')
@section('css')
    <link href="{{ asset('public/vendors/backend/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('title', 'Thêm Danh Mục Sản Phẩm')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px;margin-bottom: 25px;">
        <form action="{{ route('categories.store') }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="txtCatname" value="{{old('txtCatname')}}" class="form-control" placeholder= "Nhập tên danh mục" />
                @error('txtCatname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
            	<label for="">Thuộc danh mục cha</label>
            	<select class="form-control select2_init" name="slrParent">
				  	<option value="0" >Chọn danh mục cha</option>
				  		{!! $htmlOption !!}
				</select>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection
@section('js')
    <script src="{{ asset('public/vendors/backend/select2/select2.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            
        });
    </script>
@endsection