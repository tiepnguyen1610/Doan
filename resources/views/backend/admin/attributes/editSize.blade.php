@extends('backend.master')
@section('title', 'Cập Nhật Size')
@section('content')
<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('attributes.size.update',['id'=>$size->id]) }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Kích Thước</label>
                <input type="text" name="txtSize" value="{{ $size->size }}" class="form-control" placeholder= "S,M,L..." />
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <button type="reset" class="btn btn-default">Đặt Lại</button>
        <form>
@endsection