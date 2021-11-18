@extends('backend.master')
@section('title', 'Thêm mới Slide')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label>Tiêu Đề Slide</label>
                <input type="text" name="txtSlide" class="form-control" placeholder= "Nhập tên tiêu đề" />
            </div>
            <div class="form-group">
            	<label for="">Mô tả</label>
            	<textarea class="form-control" name="txtDescription"></textarea>
            </div>
            <div class="form-group">
                <label for="">Ảnh Slide</label>
                <input type="file" name="imageSlide" value="{{old('imageSlide')}}">
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="0" checked="" type="radio">Ẩn
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" type="radio">Hiện
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection