@extends('backend.master')
@section('css')
	<link rel="stylesheet" href="{{ asset('public/vendors/editlist.css') }}">
    <link href="{{ asset('public/vendors/backend/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('title', 'Cập Nhật Sản Phẩm')
@section('content')
	<form action="{{ route('products.update', ['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
    	@csrf
    	<div class="col-lg-6" style="padding-bottom:120px">
	        <div class="form-group">
	            <label>Tên sản phẩm</label>
	            <input type="text" value="{{ $product->pro_name }}" name="txtProname" class="form-control" placeholder= "Nhập tên sản phẩm" />
	        </div>
	        <div class="form-group">
	        	<label for="">Thuộc danh mục</label>
	        	<select class="form-control select2_init" name="slrCategory">
				  	<option value="0">Chọn danh mục</option>
				  	{!! $htmlOption !!}	
				</select>
	        </div>
	        <div class="form-group">
	        	<label for="">Nhà cung cấp</label>
	        	<select class="form-control select2_init" name="slrProvider">
				  	<option value="0" >Chọn danh mục cung cấp</option>
				  	@foreach($providers as $provider)
				  		<option value="{{ $provider->id }}" 
				  			{{ ($provider->id == $product->provider_id)?'selected':'' }}
				  		>{{ $provider->name }}</option>
				  	@endforeach	
				</select>
	        </div>
	        <div class="form-group">
	            <label>Số lượng</label>
	            <input type="number" value="{{ $product->quanty }}" name="txtQuanty" class="form-control" placeholder= "Nhập số lượng" />
	        </div>
	        <div class="form-group">
	            <label>Giá bán</label>
	            <input type="number" name="txtSalePrice" value="{{ $product->sale_price }}" class="form-control" />
	        </div>
	        <div class="form-group">
	            <label>Giá khuyến mãi</label>
	            <input type="number" name="txtPromotionPrice" value="{{ $product->promotional_price }}" class="form-control" />
	        </div>
            <div class="form-group">
                <label for="">Màu sắc</label>
                <div class="checkbox">
                	@foreach($colors as $color)
	                    <label class="checkbox-inline inputcheck">
	                        <input type="checkbox" name="chbColor[]" value="{{ $color->id }}"
	                        {{ $color_product->contains('id', $color->id)? 'checked': '' }}
	                        >
	                        <i class="glyphicon glyphicon-star" style="color: {{ $color->color }}"></i>
	                    </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="">Kích thước</label>
                <div class="checkbox">
                	@foreach($sizes as $size)
	                    <label class="checkbox-inline">
	                        <input type="checkbox" name="chbSize[]" value="{{ $size->id }}"
	                        {{ $size_product->contains('id', $size->id)? 'checked': '' }}
	                        >{{ $size->size }}
	                    </label>
                    @endforeach
                </div>
            </div>
	        <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="imagePro">
        		<img class="image_product" src="{{ asset('public').$product->image_path }}" alt="">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    		<button type="reset" class="btn btn-default">Reset</button>   
	    </div>
        <div class="col-lg-6">
	        <div class="form-group">
	        	<label for="">Mô tả ngắn</label>
	        	<textarea class="form-control" name="txtDescription" rows="3">{{ $product->description }}</textarea>
	        </div>
	        <div class="form-group">
	        	<label for="">Nội dung</label>
	        	<textarea class="form-control " name="txtContent" id="content" rows="5">{{ $product->content }}</textarea>
	        </div>
	        <div class="form-group">
                <label for="">Ảnh chi tiết</label>
                <input type="file" name="imageDetail[]" multiple />
                <div class="col-md-12">
                	<div class="row">
                	@foreach($product->images as $productImage)
                		<div class="col-md-3">
                			<img class="image_detail" src="{{ asset('public').$productImage->image_detail_path }}" alt="">
                		</div>
                	@endforeach	
                	</div>
                </div>
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
