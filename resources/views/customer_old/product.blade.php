@extends('layouts.customer')

@section('header')

<!-- //tags -->
<link href="{{ asset('customer/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('customer/css/flexslider.css') }}" type="text/css" media="screen">
<link href="{{ asset('customer/css/font-awesome.css') }}" rel="stylesheet"> 
<link href="{{ asset('customer/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('customer/css/style.css') }}" rel="stylesheet" type="text/css" media="all">





@endsection

@section('content')

<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>Product Name</h3>
	</div>
</div>

<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}">
							<div class="thumb-image"> <img src="{{ $product->get_product_image(1) ? asset('storage/uploads/products/images/' . $product->get_product_image(1)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@if($product->get_product_image(2))
							<li data-thumb="{{ $product->get_product_image(2) ? asset('storage/uploads/products/images/' . $product->get_product_image(2)) : asset('storage/uploads/products/images/'. 'avatar.png') }}">
								<div class="thumb-image"> <img src="{{ $product->get_product_image(2) ? asset('storage/uploads/products/images/' . $product->get_product_image(2)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" data-imagezoom="true" class="img-responsive"> </div>
							</li>	
						@endif
						@if($product->get_product_image(3))
							<li data-thumb="{{ $product->get_product_image(3) ? asset('storage/uploads/products/images/' . $product->get_product_image(3)) : asset('storage/uploads/products/images/'. 'avatar.png') }}">
								<div class="thumb-image"> <img src="{{ $product->get_product_image(3) ? asset('storage/uploads/products/images/' . $product->get_product_image(3)) : asset('storage/uploads/products/images/'. 'avatar.png') }}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						@endif
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
			<h3>{{ $product->name }}</h3>

			@if($product->sales_price != 0)
				<p><span class="item_price">₦{{ number_format("$product->sales_price", 2)}}</span> <del>₦{{ number_format("$product->price",2)}}</del></p>
			@else
				<p><span class="item_price">₦{{ number_format("$product->price", 2)}}</span></p>
			@endif

			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked="">
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<div class="color-quality" style="display: none">
				<div class="color-quality-right" style="margin-bottom: 10px">
					<h5>Quality :</h5>
					<input class="" type="number" name="" value="1" style="width: 40px">
				</div>
			</div>
					
			<div class="occasion-cart">
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
					<input type="submit" name="submit" value="Add to cart" class="button" onclick="add_to_cart('{{$product->id}}')">
				</div>
			</div>
		</div>
	 	<div class="clearfix"> </div>
				<!---728x90--->
				<!-- /new_arrivals --> 
		<div class="responsive_tabs_agileits"> 
			<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li>
						<li>Reviews</li>
						<li style="display: none">Information</li>
					</ul>
				<div class="resp-tabs-container">
				<!--/tab_one-->
				   <div class="tab1">

						<div class="single_page_agile_its_w3ls">
						  <h6>{{$product->name}}</h6>
						   <p>{{$product->description}}</p>
						</div>
					</div>
					<!--//tab_one-->
					<div class="tab2">
						
						<div class="single_page_agile_its_w3ls">
							<div class="bootstrap-tab-text-grids">
								<div class="bootstrap-tab-text-grid" style="display: none">
									<div class="bootstrap-tab-text-grid-left">
										<img src="{{ asset('customer/images/t1.jpg') }}" alt=" " class="img-responsive">
									</div>
									<div class="bootstrap-tab-text-grid-right">
										<ul>
											<li><a href="#">Admin</a></li>
											<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
											suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
											vel eum iure reprehenderit.</p>
									</div>
									<div class="clearfix"> </div>
					             </div>
								 <div class="add-review">
									<h4>add a review</h4>
									<form action="#" method="post">
											<input type="text" name="Name" required="Name">
											<input type="email" name="Email" required="Email"> 
											<textarea name="Message" required=""></textarea>
										<input type="submit" value="SEND">
									</form>
								</div>
							 </div>
							 
						 </div>
					 </div>
					   <div class="tab3">

						<div class="single_page_agile_its_w3ls">
						  <h6>Big Wing Sneakers (Navy)</h6>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
						   <p class="w3ls_para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			</div>	
		</div>
	
	</div>
</div>

@endsection

@section('js')

<script src="{{ asset('customer/js/modernizr.custom.js') }}"></script>
	<!-- Custom-JavaScript-File-Links --> 
	<!-- cart-js -->
	<script src="{{ asset('customer/js/minicart.min.js') }}"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js --> 
	<!-- single -->
<script src="{{ asset('customer/js/imagezoom.js') }}"></script>
<!-- single -->
<!-- script for responsive tabs -->						
<script src="{{ asset('customer/js/easy-responsive-tabs.js') }}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion           
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- FlexSlider -->
<script src="{{ asset('customer/js/jquery.flexslider.js') }}"></script>
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
<!-- //script for responsive tabs -->		
<!-- start-smoth-scrolling -->







@endsection