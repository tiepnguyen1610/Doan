@extends('backend.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/vendors/editlist.css') }}">
@endsection
@section('title', 'Cập nhật Slide')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('slides.update', ['id'=>$slide->id]) }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label>Tiêu Đề Slide</label>
                <input type="text" name="txtSlide" value="{{ $slide->name }}" class="form-control" placeholder= "Nhập tên tiêu đề" />
            </div>
            <div class="form-group">
            	<label for="">Mô tả</label>
            	<textarea name="txtDescription" class="form-control">{{ $slide->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Ảnh Slide</label>
                <input type="file" name="imageSlide" value="{{old('imageSlide')}}">
                <img class="slider" src="{{ asset('public'.$slide->slide_path) }}">
            </div>
            <div class="form-group">
                <label>Trạng Thái</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="0" type="radio"
                        @if ($slide->status == 0)
                            checked="checked" 
                        @endif
                    >Ẩn
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" type="radio"
                        @if ($slide->status == 1)
                            checked="checked" 
                        @endif
                    >Hiện
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection