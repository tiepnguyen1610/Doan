@extends('backend.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title', 'Sửa Quyền')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px;margin-bottom: 25px;">
        <form action="{{ route('permissions.update',['id'=>$permission->id]) }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Tên Module Phân Quyền</label>
                <input type="text" name="txtPermissionName" value="{{ $permission->permission_name }}" class="form-control" placeholder= "Nhập tên module.." />
            </div>
             <div class="form-group">
                <label>Mô tả về quyền </label>
                <textarea rows="2" name="txtDescription" class="form-control">{{ $permission->display_name }}</textarea>
            </div>
            <div class="form-group">
                <label>Key</label>
                <input type="text" name="txtKey" class="form-control" value="{{ $permission->key_code }}" />
            </div>
            <div class="form-group">
            	<label for="">Thuộc danh mục quyền</label>
            	<select class="form-control select2_init" name="slrParent">
				  	<option value="0" >Chọn danh mục quyền</option>
				  		{!! $htmlOption !!}
				</select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2_init').select2({
            
        });
    </script>
@endsection