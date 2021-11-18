<div class="sidebar_widget catrgorie mb-35">
	<h3>Danh Mục</h3>
	<ul>
		@foreach($categories as $category)
		<li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i>{{ $category->cat_name }}</a>
			<ul class="categorie_sub">
				@foreach($category->categoryChild as $categoryChildItem)
				<li>
					<a href="{{ route('category.product', ['slug'=>$categoryChildItem->slug, 'id'=>$categoryChildItem->id]) }}"><i></i>{{ $categoryChildItem->cat_name }}</a>
				  	<ul class="categorie_sub">
				  		@foreach($categoryChildItem->categoryChild as $itemChild)
							<li class="has-sub"><a href="#"><i class="fa fa-caret-right"></i>{{ $itemChild->cat_name }}</a></li>
						@endforeach
				  	</ul> 
				</li>
				@endforeach
				{{-- <li><a href="#"><i class="fa fa-caret-right"></i> Dresses</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i> Tops</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i> HandBags</a></li> --}}
			</ul>     
		</li>
		@endforeach
	</ul>
</div>