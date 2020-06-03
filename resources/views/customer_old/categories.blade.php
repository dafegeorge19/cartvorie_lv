@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Supermarket Cateories</h3>
	</div>
</div>
<!---728x90--->
<!-- /categories --> 
<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">

		

				<!--/tab_one-->
				<div class="tab1">

					@foreach($categories as $category)
							
							<div class="col-sm-6 col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="{{ $category->images->first() ? asset('storage/uploads/categories/images/' . $category->images->first()->name) : asset('storage/uploads/categories/images/'. 'avatar.png') }}" alt="" class="pro-image-front">
										<img src="{{ $category->images->first() ? asset('storage/uploads/categories/images/' . $category->images->first()->name) : asset('storage/uploads/categories/images/'. 'avatar.png') }}" alt="" class="pro-image-back">
									</div>
									<div class="item-info-product ">
										<h4 class="text-truncate"><a href="{{ url('/products?supermarket_id=&category_id=' . $category->id) }}">{{ $category->name }}</a></h4>
										<small>{{ $category->products->count() }} Products</small>
										
										<a href="{{ url('/products?supermarket_id=&category_id=' . $category->id) }}" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											View Products
										</a>

									</div>
								</div>
							</div>
					@endforeach
					

					<br>
					
					<div class="clearfix"></div>
					{{$categories}}

					<div class="text-center" style="">

					</div>
					<div class="clearfix"></div>
				</div>


	</div>
</div>
<!-- //categories --> 

@endsection