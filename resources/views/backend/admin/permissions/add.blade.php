@extends('backend.master')
@section('css')
    <link href="{{ asset('public/vendors/backend/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('title', 'Thêm Quyền')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px;margin-bottom: 25px;">
        <form action="{{ route('permissions.store') }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Tên Module Phân Quyền</label>
                <input type="text" name="txtPermissionName" class="form-control" placeholder= "Nhập tên module, quyền.." />
            </div>
             <div class="form-group">
                <label>Mô tả về quyền </label>
                <textarea rows="2" name="txtDescription" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Key</label>
                <input type="text" name="txtKey" class="form-control" placeholder="Nhập key..." />
            </div>
            <div class="form-group">
            	<label for="">Thuộc danh mục quyền</label>
            	<select class="form-control select2_init" name="slrParent">
				  	<option value="0" >Chọn danh mục quyền</option>
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