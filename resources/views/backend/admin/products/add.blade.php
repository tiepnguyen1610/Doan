@extends('backend.master')
@section('css')
    <link href="{{ asset('public/vendors/backend/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('title', 'Thêm Mới Sản Phẩm')
@section('content')
	
	<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf
    	<div class="col-lg-6" style="padding-bottom:120px">
	        <div class="form-group">
	            <label>Tên sản phẩm</label>
	            <input type="text" name="txtProname" value="{{old('txtProname')}}" class="form-control" placeholder= "Nhập tên sản phẩm" />
	            @error('txtProname')
			    	<div class="alert alert-danger">{{ $message }}</div>
				@enderror
	        </div>
	        <div class="form-group">
	        	<label for="">Thuộc danh mục</label>
	        	<select class="form-control select2_init" name="slrCategory">
				  	<option value="" ></option>
				  	{!! $htmlOption !!}	
				</select>	
	        </div>
	        <div class="form-group">
	        	<label for="">Nhà cung cấp</label>
	        	<select class="form-control select2_init" name="slrProvider">
				  	<option value="" ></option>
				  	@foreach($providers as $provider)
				  		<option value="{{ $provider->id }}">{{ $provider->name }}</option>
				  	@endforeach	
				</select>
	        </div>
	        <div class="form-group">
	            <label>Số lượng</label>
	            <input type="number" name="txtQuanty" class="form-control" placeholder= "Nhập số lượng" />
	        </div>
	        <div class="form-group">
	            <label>Giá bán</label>
	            <input type="number" name="txtSalePrice" value="{{old('txtSalePrice')}}" class="form-control" />
	            @error('txtSalePrice')
			    	<div class="alert alert-danger">{{ $message }}</div>
				@enderror
	        </div>
	        
	        <div class="form-group">
	            <label>Giá khuyến mãi</label>
	            <input type="number" name="txtPromotionPrice" class="form-control" />
	        </div>
            <div class="form-group">
                <label for="">Màu sắc</label>
                <div class="checkbox">
                	@foreach($colors as $data)
	                    <label class="checkbox-inline inputcheck">
	                        <input type="checkbox" name="chbColor[]" value="{{ $data->id }}">
	                        <i class="glyphicon glyphicon-star" style="color: {{ $data->color }}"></i>
	                    </label>
                    @endforeach
                    @error('chbColor')
			    		<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Kích thước</label>
                <div class="checkbox">
                	@foreach($sizes as $data)
	                    <label class="checkbox-inline">
	                        <input type="checkbox" name="chbSize[]" value="{{ $data->id }}">{{ $data->size }}
	                    </label>
                    @endforeach
                    @error('chbSize')
			    		<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                </div>
            </div>
	        <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="imagePro" value="{{old('imagePro')}}">
                @error('imagePro')
			    	<div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
    		<button type="reset" class="btn btn-default">Reset</button>   
	    </div>
        <div class="col-lg-6">
	        <div class="form-group">
	        	<label for="">Mô tả ngắn</label>
	        	<textarea class="form-control" name="txtDescription" id="description" rows="3"></textarea>
	        </div>
	        <div class="form-group">
	        	<label for="">Nội dung</label>
	        	<textarea class="form-control " name="txtContent" id="content" rows="5"></textarea>
	        </div>
	        <div class="form-group">
                <label for="">Ảnh chi tiết</label>
                <input type="file" name="imageDetail[]" multiple />
            </div>
	    </div> 
    <form>
@endsection
@section('js')
    <script src="{{ asset('public/vendors/backend/select2/select2.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            'placeholder':'Chọn danh mục'
        });

        CKEDITOR.replace('content', {
        	filebrowserBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html') }}',
        	filebrowserImageBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html?type=Images') }}',
        	filebrowserFlashBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html?type=Flash') }}',
        	filebrowserUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        	filebrowserImageUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        	filebrowserFlashUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
@endsection
