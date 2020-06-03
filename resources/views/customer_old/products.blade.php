@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Products</h3>
	</div>
</div>
<!---728x90--->

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div>
				
			</div>

			<div class="community-poll">
				<h4>Filter</h4>
				<div class="swit form">	
					<form method="get" action="{{ url('/products') }}">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Store</label>
									<select class="form-control" id="select_supermarket" name="supermarket_id">
										<option  value="">Select Store</option>
										@if($supermarkets->count() != 0)
											@foreach($supermarkets as $supermarket)
											<option value="{{ $supermarket->id }}">{{ $supermarket->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Select Category</label>
									<select name="category_id" class="form-control" id="select_category">
										<option value="">Select Category</option>
										@foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Min Price</label>
									<input class="form-control" type="number" name="min_price" min="0">
								</div>
							</div>

							<div class="col-sm-6 col-lg-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Max Price</label>
									<input class="form-control" type="number" name="max_price" min="0">
								</div>
							</div>

							<input type="hidden" name="page" value="1">

						</div>
						
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			
			<?php //i assign default value to GET variable incase if they are not assign. if not it will trow undefined variable error
				if(!isset($_GET['page'])) {
					$_GET['page'] = 1;
				}

				if(!isset($_GET['supermarket_id'])) {
					$_GET['supermarket_id'] = '';
				}

				if(!isset($_GET['category_id'])) {
					$_GET['category_id'] = '';
				}

				if(!isset($_GET['min_price'])) {
					$_GET['min_price'] = '';
				}

				if(!isset($_GET['max_price'])) {
					$_GET['max_price'] = '';
				}

			?>

			@foreach($products->forPage($_GET['page'], 15) as $product)
				<div class="col-md-4 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">

							<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-front">

							<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-back">
							
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ url('/product/' . $product->slug) }}" class="link-product-add-cart">View Details</a>
									</div>
								</div>
						</div>
						<div class="item-info-product ">

							<h4 class="text-truncate"><a href="{{ url('/product/' . $product->slug) }}" title="{{ $product->name ?? '' }}">{{ $product->name }}</a></h4>

							<small class="text-truncate" title="{{ $product->supermarket->name}}">{{ $product->supermarket->name}}</small>
							<div class="info-product-price">
								@if($product->sales_price != 0)
									<span class="item_price">₦{{ number_format("$product->sales_price",2)}}</span>
									<del>₦{{ number_format("$product->price",2) }}</del>
								@else
									<span class="item_price">₦{{ number_format("$product->price",2)}}</span>
								@endif
								
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								
								<input type="submit" name="submit" value="Add to cart" class="button" onclick="add_to_cart('{{$product->id}}')">
							
							</div>								
						</div>
					</div>
				</div>
			@endforeach
			<div class="clearfix"></div>
				<div class="col">
					<nav aria-label="...">
						<ul class="pagination pagination-xm">
							@for($i = 1; $i <= ceil($products->count()/15) ; $i++)
							<li class="page-item {{$_GET['page'] == $i ? 'disabled' : ''}}"><a class="page-link" href="{{ url('/products?supermarket_id=' . $_GET['supermarket_id'] . '&category_id=' . $_GET['category_id'] . '&min_price=' . $_GET['min_price'] . '&max_price=' . $_GET['max_price'] . '&page=' . $i) }}">{{$i}}</a></li>
							@endfor
						</ul>
					</nav>
				</div>
				
				<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</div>	
<!-- //mens -->

@endsection

@section('js')


@endsection