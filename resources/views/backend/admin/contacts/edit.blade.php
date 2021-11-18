@extends('backend.master')
@section('title', 'Cập Nhật Contact')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('contacts.update', ['id'=>$contact->id]) }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{{ $contact->description }}</textarea>
            </div>
            <div class="form-group">
            	<label for="">Địa Chỉ</label>
            	<input type="text" name="txtAddress" value="{{ $contact->address }}" class="form-control" />
            </div>
            <div class="form-group">
            	<label for="">Email</label>
            	<input type="email" class="form-control" value="{{ $contact->email }}" name="txtEmail" />
            </div>
            <div class="form-group">
            	<label for="">Số Điện Thoại</label>
            	<input type="text" name="txtPhone" value="{{ $contact->phone }}" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection