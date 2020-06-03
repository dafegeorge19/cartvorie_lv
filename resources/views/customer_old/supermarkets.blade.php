@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Stores</h3>
	</div>
</div>
<!---728x90--->
<!-- /supermarkets --> 
<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container">

		

				<!--/tab_one-->
				<div class="tab1">

					@foreach($supermarkets as $supermarket)
							
							<div class="col-sm-6 col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="{{ $supermarket->images->first() ? asset('storage/uploads/supermarkets/images/logos/' . $supermarket->images->first()->name) : asset('storage/uploads/supermarkets/images/logos/'. 'avatar.png') }}" alt="" class="pro-image-front">
										<img src="{{ $supermarket->images->first() ? asset('storage/uploads/supermarkets/images/logos/' . $supermarket->images->first()->name) : asset('storage/uploads/supermarkets/images/logos/'. 'avatar.png') }}" alt="" class="pro-image-back">
									</div>
									<div class="item-info-product ">
										<h4 class="text-truncate"><a href="{{ url('/products?supermarket_id=' . $supermarket->id . '&category_id=') }}">{{ $supermarket->name }}</a></h4>
										<small>{{ $supermarket->products->count() }} Products</small>
										
										<a href="{{ url('/products?supermarket_id=' . $supermarket->id . '&category_id=') }}" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											Visit Store
										</a>

									</div>
								</div>
							</div>
					@endforeach

					<br>
					<div class="clearfix"></div>
						{{$supermarkets}}
					<div class="text-center" style="">

					</div>
					<div class="clearfix"></div>
				</div>


	</div>
</div>
<!-- //supermarkets --> 

@endsection