@extends('backend.master')
@section('title', 'Cập Nhật Màu Sắc')
@section('content')
<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('attributes.color.update',['id'=>$color->id]) }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Mã Màu</label>
                <input type="color" value="{{ $color->color }}" class="form-control" name="txtColor" />
            </div>
            <div class="form-group">
                <label>Tên Màu</label>
                <input type="text" class="form-control" name="txtName" value="{{ $color->name }}" placeholder="Chú thích mã màu."/>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection