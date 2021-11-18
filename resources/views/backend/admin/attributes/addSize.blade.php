@extends('backend.master')
@section('title', 'Thêm Mới Size')
@section('content')
<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('attributes.size.store') }}" method="POST">
        	@csrf
            <div class="form-group">
                <label>Kích Thước</label>
                <input type="text" name="txtSize" class="form-control" placeholder= "S,M,L..." />
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
@endsection