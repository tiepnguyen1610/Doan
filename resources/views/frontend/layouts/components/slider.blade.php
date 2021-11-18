<div class="row">
	<!--banner slider start-->
	<div class="col-12">
		<div class="banner_slider slider_two">
			<div class="slider_active owl-carousel">
				@foreach($sliders as $slider)
			  	<div class="single_slider" style="background-image: url({{ asset('public' . $slider->slide_path)  }})">
					<div class="slider_content">
						<div class="slider_content_inner">  
					  		<h1>{{ $slider->name }}</h1>
					  			<p>{{ $slider->description }}</p>
					  		<a href="#">Xem ngay</a>
						</div>     
					</div>    
			  	</div>
			  	@endforeach 
			</div>
		</div>
	</div>
	<!--banner slider start-->    
</div>