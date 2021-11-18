@extends('backend.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/vendors/role/role.css') }}" />
@endsection
@section('title', 'Thêm mới Vai Trò')
@section('content')
    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12" style="padding-bottom:10px">
            <div class="form-group">
                <label>Tên vai trò</label>
                <input type="text" name="txtRole" class="form-control" placeholder= "Nhập tên vai trò.." />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="txtDescription" rows="2" class="form-control" placeholder= "Mô tả vai trò" ></textarea>
            </div>  
        </div>
        @foreach($permissionsParent as $permissionsParentItem)
            <div class="panel panel-default mb-3 col-lg-12">
                <div class="panel-heading">
                    <label for="">
                        <input type="checkbox" value="{{ $permissionsParentItem->id }}" class="checkbox_wrapper" />
                        {{ $permissionsParentItem->permission_name }}
                    </label> 
                </div>
                <div class="row">    
                    @foreach($permissionsParentItem->permissionChildrent as $permissionChildrentItem)
                        <div class="panel-body menus col-lg-3">
                            <label for="">
                                <input type="checkbox" name="chbPermission[]" 
                                    value="{{ $permissionChildrentItem->id }}" class="checkbox_childrent" />
                                {{ $permissionChildrentItem->permission_name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Add New</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('public/vendors/role/role.js') }}"></script>
@endsection