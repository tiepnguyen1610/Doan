@extends('backend.master')
@section('title', 'Danh Sách Bài Viết')
@section('content')
<div class="col-lg-12">
	<a href="{{ route('blogs.create') }}" id="btn-add" class="btn btn-primary">Add New</a>	
</div>
	<div class="col-lg-12">
		<table class="table table-bordered table-hover">
		  	<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tiêu Đề</th>
			      <th scope="col">Ảnh Đại Diện</th>
			      <th scope="col" >Mô tả ngắn</th>
			      <th scope="col" >Ngày đăng bài</th>
			      <th scope="col" colspan="2">Thực Thi</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  		@php $stt = 1; @endphp
		  		@foreach($blogs as $blog)
				    <tr>
					    <th scope="row">{{ $stt++ }}</th>
					    <td>{{ $blog->title }}</td>
					    <td>
					    	<img src="{{ asset('public'.$blog->image_path) }}" width="50%" style="object-fit:cover;" alt="">
					    </td>
					    <td>{!! $blog->description !!}</td>
					    <td>{{ $blog->created_at->format('d/m/Y') }}</td>
					    <td>
						    <a href="{{ route('blogs.edit', ['id'=>$blog->id]) }}" class="btn btn-default"><i class="fa fa-pencil-square-o"></i></a>
					    	
					    </td>
						<td>
							<a href="" data-url="{{ route('blogs.destroy', ['id'=>$blog->id]) }}"  class="btn btn-danger action_delete"><i class="fa fa-trash-o"></i></a>
						</td>
				    </tr>
				@endforeach
		  	</tbody>
		</table>
		{{ $blogs->links() }}
	</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('public/vendors/listdelete.js') }}" ></script>
@endsection