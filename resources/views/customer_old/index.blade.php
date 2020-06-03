@extends('layouts.customer')

@section('content')
<!-- slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1" class=""></li>
		<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active"> 
			<div class="container">
				<div class="carousel-caption">
					<h3><sp><span>We Shop</span> For You and <span>Deliver</span> To Your <span>Door Step</span></sp></h3>
					<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item2"> 
			<div class="container">
				<div class="carousel-caption">
					<h3><sp><span>Shop online</span> with your favourite <span>supermarket</span></sp></h3>
					<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item3"> 
			<div class="container">
				<div class="carousel-caption">
					<h3><sp><span>Skipoutlet</span> make shopping fun</sp></h3>
					<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item4"> 
			<div class="container">
				<div class="carousel-caption">
					<h3><sp>Browse the <span>best mall</span> online</sp></h3>
					<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
				</div>
			</div>
		</div>
		<div class="item item5"> 
			<div class="container">
				<div class="carousel-caption">
					<h3><sp>The Biggest <span>Sale</span></sp></h3>
					<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
				</div>
			</div>
		</div> 
	</div>
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	<!-- The Modal -->
</div> 
	<!-- //banner -->



<!-- /categories --> 
<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container-fluid">	
		<h3 class="wthree_text_info">Top Categories</h3>	

		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">

					@foreach($categories->take(9) as $category)
						@if($category->products->count() != 0)
							@if($category->slug == 'uncategorized')
								@continue
							@endif
							<div class="col-sm-6 col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="{{ $category->images->first() ? asset('storage/uploads/categories/images/' . $category->images->first()->name) : asset('storage/uploads/categories/images/'. 'avatar.png') }}" alt="" class="pro-image-front">
										<img src="{{ $category->images->first() ? asset('storage/uploads/categories/images/' . $category->images->first()->name) : asset('storage/uploads/categories/images/'. 'avatar.png') }}" alt="" class="pro-image-back">
									</div>
									<div class="item-info-product ">
										<h4><a href="{{ url('/products?supermarket_id=&category_id=' . $category->id) }}">{{ $category->name }}</a></h4>
										<small style="display: block">{{ $category->products->count() }} Products</small>


										
										<a href="{{ url('/products?supermarket_id=&category_id=' . $category->id) }}" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											View Products
										</a>

									</div>
								</div>
							</div>
						@endif
					@endforeach

					<br>
					<div class="clearfix"></div>

					<div class="text-center" style="">


						<a class="hvr-outline-out button2 text-white" style="padding: 10px; color: white; margin-top: 20px !important" href="{{ url('/categories') }}">More Categories</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- //categories --> 



<!-- /we-offer -->
<div class="sale-w3ls">
	<div class="container">
		<h6>Enjoy <span style="color: red !important">40%</span> Discount to shop on Grand Square Suppermarket</h6>

		<a class="hvr-outline-out button2" href="{{ url('/products') }}">Shop Now </a>
	</div>
</div>
<!-- //we-offer -->



<!-- /new_arrivals --> 
<div class="new_arrivals_agile_w3ls_info"> 
	<div class="container-fluid">	
		<h3 class="wthree_text_info" style="color: red !important">Top Stores<span></span></h3>	
		<p style="text-align: center !important;"><i>Shop from your favourite supermarkets</i></p>
		<div id="horizontalTab">
			<div class="resp-tabs-container">

					@foreach($supermarkets->take(4) as $supermarket)
						<div class="col-sm-6 col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ $supermarket->images->count() ? asset('storage/uploads/supermarkets/images/logos/'. $supermarket->images->first()->name) : asset('storage/uploads/supermarkets/images/logos/'. 'avatar.png') }}" alt="" class="pro-image-front">
									<img src="{{ $supermarket->images->count() ? asset('storage/uploads/supermarkets/images/logos/'. $supermarket->images->first()->name) : asset('storage/uploads/supermarkets/images/logos/'. 'avatar.png') }}" alt="" class="pro-image-back">
								</div>
								<div class="item-info-product ">
									<h4><a href="{{ url('/products?supermarket_id=' . $supermarket->id . '&category_id=') }}">{{ $supermarket->name }}</a></h4>
									<small style="display: block">{{ $supermarket->area->name }}, {{ $supermarket->state->name }}</small>
										
									<a href="{{ url('/products?supermarket_id=' . $supermarket->id . '&category_id=') }}" class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
										Visit Store
									</a>

								</div>
							</div>
						</div>
					@endforeach

					<div class="clearfix"></div>

					<div class="text-center">


						<a class="hvr-outline-out button2 text-white" style="padding: 10px; color: white; margin-top: 20px !important" href="{{ url('/supermarkets') }}">More Stores</a>
					</div>



					<div class="clearfix"></div>
		
			</div>
		</div>	
	</div>
</div>
<!-- //new_arrivals --> 



	<!---728x90--->
<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
					<figure class="effect-roxy">
						<img src="customer/images/sec1.jpeg" alt=" " class="img-responsive" style="object-fit: contain;">
						<figcaption>
							<h3><strong>Lets shop for you</strong></h3>
						</figcaption>			
					</figure>
				</div>
				 <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
					<figure class="effect-roxy">
						<img src="customer/images/sec2.jpeg" alt=" " class="img-responsive" style="object-fit: contain;">
						<figcaption>
							<h3><strong>Checkout GROCERIES Stocks</strong></h3>
						</figcaption>			
					</figure>
				</div>
				<div class="clearfix"></div>
	    </div> 
	 </div> 
</div>
	<!---728x90--->



<!-- /new_arrivals --> 
<?php
	$featured_categories = $categories->where('featured', '!=', null)->sortByDesc('featured');
	$featured = [];

	foreach($featured_categories as $featured_category) {
		$featured[] = $featured_category;
	}
?>

@if(isset($featured[0]))
<div class=""> 
	<div class="container-fluid">	
		<h3 class="wthree_text_info" style="color: red">{{ $featured[0]->name }} Shopping</h3>	
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">

					@foreach($featured[0]->products->take(6) as $product)
						<div class="col-md-2 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">

									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-front">

									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-back">

									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{ url('/product/' . $product->slug) }}" class="link-product-add-cart">Quick View</a>
										</div>
									</div>

									@if((strtotime(date('m/d/Y h:i:s a')) - strtotime($product->created_at)) < 604800) <!-- 604800 is 7 days in seconds -->
									<span class="product-new-top">New</span>
									@endif
								</div>
								<div class="item-info-product ">
									<h4 class="text-truncate"><a href="{{ url('/product/' . $product->slug) }}">{{$product->name}}</a></h4>
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

					<br>
					<div class="clearfix"></div>

					<div class="text-center" style="">


						<a class="hvr-outline-out button2 text-white" style="padding: 10px; color: white; margin-top: 40px !important" href="{{ url('/products?supermarket_id=&category_id=' . $featured[0]->id ) }}">More Products</a>
						<br/>
						<br/>
						<br/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div>
@endif



<!-- /we-offer -->
<div class="sale-w3ls">
	<div class="container">
		<h6><span style="color: red !important">Quick Order</h6>

		<form>	
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1" style="float: left !important; color: red">Select Supermarket</label>
				    <select class="form-control">
						<option>Shoprite</option>
						<option>H Medix</option>
						<option>Next CaseNCarry</option>
					</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputPassword1" style="float: left !important; color: red">Select Product</label>
						<select class="form-control">
							<option>Product 1</option>
							<option>Product 2</option>
							<option>Product 3</option>
						</select>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputPassword1" style="float: left !important; color: red">Your full name</label>
					<input class="form-control" type="text">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputPassword1" style="float: left !important; color: red">Your phone number</label>
					<input class="form-control" type="text">
				</div>
			</div>

			<div class="col p-1" style="padding: 0px 15px">
				<div class="form-group">
				    <label for="exampleInputPassword1" style="float: left !important; color: red">Your delivery address</label>
					<input class="form-control" type="text">
				</div>
			</div>
		</div>

		<a class="hvr-outline-out button2" href="single.html">Checkout </a>
		  <br/>
		  <br/>
		  <br/>
		</form>
		

		
	</div>
</div>
<!-- //we-offer -->

<br/>
<br/>
<br/>

@if(isset($featured[1]))
<div class=""> 
	<div class="container-fluid">	
		<h3 class="wthree_text_info" style="color: red">{{ $featured[1]->name }} Shopping</h3>	
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">

					@foreach($featured[1]->products->take(6) as $product)
						<div class="col-md-2 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-front">
									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									@if((strtotime(date('m/d/Y h:i:s a')) - strtotime($product->created_at)) < 604800)<!-- 604800 is 7 days in seconds -->
									<span class="product-new-top">New</span>
									@endif
								</div>
								<div class="item-info-product ">
									<h4 class="text-truncate"><a href="single.html">{{$product->name}}</a></h4>
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

					<br>
					<div class="clearfix"></div>

					<div class="text-center" style="">


						<a class="hvr-outline-out button2 text-white" style="padding: 10px; color: white; margin-top: 50px !important" href="{{ url('/products?supermarket_id=&category_id=' . $featured[1]->id ) }}">More Products</a>
						<br/>
						<br/>
						<br/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div>
@endif 



	<!---728x90--->
<div class="banner_bottom_agile_info">
    <div class="container-fluid">
		<iframe width="100%" height="400" src="https://www.youtube.com/embed/3aG_ZJM4e9o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 </div> 
</div>
	<!---728x90--->



<!-- /new_arrivals --> 
@if(isset($featured[2]))
<div class=""> 
	<div class="container-fluid">	
		<h3 class="wthree_text_info" style="color: red">{{ $featured[2]->name }} Shopping</h3>	
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">

					@foreach($featured[2]->products->take(6) as $product)
						<div class="col-md-2 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-front">
									<img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									@if((strtotime(date('m/d/Y h:i:s a')) - strtotime($product->created_at)) < 604800) <!-- 604800 is 7 days in seconds -->
									<span class="product-new-top">New</span>
									@endif
								</div>
								<div class="item-info-product ">
									<h4 class="text-truncate"><a href="single.html">{{$product->name}}</a></h4>
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

					<br>
					<div class="clearfix"></div>

					<div class="text-center" style="">


						<a class="hvr-outline-out button2 text-white" style="padding: 10px; color: white; margin-top: 80px !important" href="{{ url('/products?supermarket_id=&category_id=' . $featured[2]->id ) }}">More Products</a>
						<br/>
						<br/>
						<br/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div>
@endif 
<!-- //new_arrivals --> 
@endsection