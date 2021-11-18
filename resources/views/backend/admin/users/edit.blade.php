@extends('backend.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('title', 'Cập Nhật User')
@section('content')
	<div class="col-lg-6" style="padding-bottom:120px">
        <form action="{{ route('users.update', ['id'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label>Tên User</label>
                <input type="text" name="txtUsername" class="form-control" value="{{ $user->username }}" />
            </div>
           <div class="form-group">
                <label>Email</label>
                <input type="email" name="txtEmail" class="form-control" value="{{ $user->email }}" readonly/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="txtPassword" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Vai Trò</label>
                <select class="form-control select2_init" name="sltRoleId[]" multiple>
                    <option value="" ></option>
                    @foreach($roles as $role)
                        <option {{ $rolesOfUser->contains('id', $role->id)? 'selected' : '' }} value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach   
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
            'placeholder':'Chọn vai trò'
        });
    </script>
@endsection