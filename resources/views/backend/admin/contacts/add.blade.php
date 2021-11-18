@extends('backend.master')
@section('title', 'Thêm Mới Contact')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('contacts.store') }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" rows="3" name="txtDescription"></textarea>
            </div>
            <div class="form-group">
            	<label for="">Địa Chỉ</label>
            	<input type="text" name="txtAddress" class="form-control" />
            </div>
            <div class="form-group">
            	<label for="">Email</label>
            	<input type="email" class="form-control" name="txtEmail" />
            </div>
            <div class="form-group">
            	<label for="">Số Điện Thoại</label>
            	<input type="text" name="txtPhone" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection