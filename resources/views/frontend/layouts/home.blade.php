@extends('frontend.app')
@section('title', 'Tracy Shop')
@section('content')
<div class="pos_home_section">
	<!--banner slider start-->
	@include('frontend.layouts.components.slider')
	<!--banner slider end-->
	<div class="row pos_home"> 
	  	<!--sidebar start-->
	  	@include('frontend.layouts.components.sidebar')
	  	<!--sidebar end-->
	  	<div class="col-lg-9 col-md-12">
		<!--new product area start-->
		@include('frontend.layouts.components.newproduct')
		<!--new product area start-->  

		<!--featured product start--> 
		@include('frontend.layouts.components.featured_product')     
		<!--featured product end--> 

		<!--banner area start-->
		@include('frontend.layouts.components.banner')     
		<!--banner area end--> 

		<!--brand logo strat--> 
		@include('frontend.layouts.components.brand')       
		<!--brand logo end-->        
	  </div>
	</div>  
@endsection