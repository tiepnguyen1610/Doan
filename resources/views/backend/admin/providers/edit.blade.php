@extends('backend.master')
@section('content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Cập Nhật Nhà Cung Cấp
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{ route('providers.update', ['id'=> $provider->id]) }}" method="POST">
                    @csrf
	                <div class="form-group">
	                    <label for="">Nhà Cung Cấp</label>
	                    <input type="text" name="txtName" value="{{ $provider->name }}" class="form-control"  placeholder="Nhập tên nhà cung cấp">
	                </div>
    				<div class="form-group">
	                    <label for="">Địa Chỉ</label>
	                    <input type="text" name="txtAddress" value="{{ $provider->address }}" class="form-control"  placeholder="Nhập địa chỉ">
	                </div>
	                <div class="form-group">
	                    <label for="">Điện Thoại Liên Hệ</label>
	                    <input type="text" class="form-control" value="{{ $provider->phone }}" name="txtPhone" placeholder="Nhập số điện thoại">
	                </div>
                	<button type="submit" class="btn btn-primary">Update</button>
           			<button type="reset" class="btn btn-default">Reset</button>
            	</form>
            </div>

        </div>
    </section>
</div>
@endsection