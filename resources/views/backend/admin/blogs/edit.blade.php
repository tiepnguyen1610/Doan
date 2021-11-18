@extends('backend.master')
@section('title', 'Cập nhật Blog')
@section('css')
    <link href="{{ asset('public/vendors/backend/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/vendors/editlist.css') }}">
@endsection
@section('content')
	<form action="{{ route('blogs.update', ['id'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="col-lg-6" style="padding-bottom:20px">
			<div class="form-group">
	            <label>Tiêu Đề</label>
	            <input type="text" name="txtTitle" value="{{ $blog->title }}" class="form-control" placeholder= "Nhập tiêu đề blog" />
	       
	        </div>
	        <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="imageBlog" value="{{old('imageBlog')}}">
               	<img class="blog" src="{{ asset('public'.$blog->image_path) }}">
            </div>
            <div class="form-group">
	        	<label for="">Mô tả ngắn</label>
	        	<textarea class="form-control" name="txtDescription" rows="2">{!! $blog->description !!}</textarea>
	        </div>
	        <div class="form-group">
	        	<label for="">Thẻ Tag</label>
	        	<select class="form-control select2_init" name="tags[]" multiple>	
	        		@foreach($blog->tags as $tagItem)
	        			<option value="{{ $tagItem->tag_name }}" selected>{{ $tagItem->tag_name }}</option>
	        		@endforeach
				</select>
	        </div>
		</div>
		<div class="col-lg-12" style="padding-bottom:120px">
			<div class="form-group">
	       		<label for="">Nội Dung</label>
	        	<textarea class="form-control" name="txtContent" id="content" rows="10">{!! $blog->content !!}</textarea>
	    	</div>
	    	<button type="submit" class="btn btn-primary">Update</button>
    		<button type="reset" class="btn btn-default">Reset</button>   
		</div>
		
	</form>
@endsection
@section('js')
    <script src="{{ asset('public/vendors/backend/select2/select2.min.js') }}"></script>
    <script>
        $('.select2_init').select2({
            tags: true,
            tokenSeparators: [',']
        });

        CKEDITOR.replace('content', {
        	filebrowserBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html') }}',
        	filebrowserImageBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html?type=Images') }}',
        	filebrowserFlashBrowseUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/ckfinder.html?type=Flash') }}',
        	filebrowserUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        	filebrowserImageUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        	filebrowserFlashUploadUrl: '{{ asset('/public/vendors/backend/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        })
    </script>
@endsection