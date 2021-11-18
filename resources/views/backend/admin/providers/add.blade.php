@extends('backend.master')
@section('content')
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            Thêm Nhà Cung Cấp
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{ route('providers.store') }}" method="POST">
                	@csrf
	                <div class="form-group">
	                    <label for="">Tên Nhà Cung Cấp</label>
	                    <input type="text" name="txtName" value="{{ old('txtName') }}" class="form-control"  placeholder="Nhập tên nhà cung cấp">
                        @error('txtName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
	                </div>
    				<div class="form-group">
	                    <label for="">Địa Chỉ</label>
	                    <input type="text" name="txtAddress" value="{{ old('txtAddress') }}" class="form-control"  placeholder="Nhập địa chỉ">
                        @error('txtAddress')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
	                </div>
	                <div class="form-group">
	                    <label for="">Điện Thoại Liên Hệ</label>
	                    <input type="text" class="form-control" value="{{ old('txtPhone') }}" name="txtPhone" placeholder="Nhập số điện thoại">
                        @error('txtPhone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
	                </div>
                	<button type="submit" class="btn btn-primary">Add New</button>
           			<button type="reset" class="btn btn-default">Reset</button>
            	</form>
            </div>

        </div>
    </section>
</div>
@endsection