<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Skip Outlet</title>
<!--/tags -->
@yield('header')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--//tags -->
<link href="{{ asset('customer/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('customer/css/style.css') }}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('customer/css/font-awesome.css') }}" rel="stylesheet"> 
<link href="{{ asset('customer/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'>
<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
.menu__link::after {
    background: red !important;
}

.menu__link::before {
    background: red !important;
}

.box_1 {
     background: transparent; 
     padding: 15px 22px; 
    text-align: right;
}

.header-bot {
    padding: 15px 0 10px 0;
}



.header-middle form input[type="submit"] {
    background: url(customer/images/search.png) no-repeat 4px 0px black;
    width: 55px;
}

.dropdown-menu.columns-3 {
    min-width: 250px !important;
    padding: 30px 30px; 
}

.snipcart-details input.button {
    background: black;
 }

.snipcart-details input.button:hover {
    background: red;
 }

 .hvr-outline-out:before {
    border: red solid 4px;
    }

    .hvr-outline-out {
    background-color: red;
}


.men-thumb-item .pro-image-front {
	height: 200px;
	object-fit: cover;
}

.men-thumb-item .pro-image-back {
	height: 200px;
	object-fit: cover;
}

sp {
	background-color: rgba(0,0,0,0.5);
}

figure.effect-roxy img {
    height: 300px;
}

p.copy-right {
    margin-top: 0px;
}

.footer {
    padding: 4em 0px 3px 0px;
    background: #000;
}

.w3layouts_mail_grid_left2 h3 {
    padding-top: 25px;
}

.text-truncate {
	width: 100%;
	padding: 0px 10px;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}

.text-capitalize {
	text-transform: capitalize;
}









</style>

</head>
<body>



<meta name="robots" content="noindex">
<body>
	<!-- Demo bar start -->


<!-- sign in and sign out bar -->
<div class="header" id="home">
	<div class="container-fluid">
		<ul>
			@auth
			@else
				<li> <a href="{{ route('login') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
				<li> <a href="{{ route('register') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
			@endauth
		    
			
			<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 0808888888</li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@skipoutlet.com</a>  <i class="fa fa-facebook" aria-hidden="true"></i>   <i class="fa fa-twitter" aria-hidden="true"></i>   <i class="fa fa-instagram" aria-hidden="true"></i>   <i class="fa fa-linkedin" aria-hidden="true"></i></li>

		</ul>
	</div>
</div>
<!-- //header -->

<!-- logo and search bar -->
<div class="header-bot">
	<div class="">

		<div class="col-md-4 ">
			<img src="{{ asset('/skipoutlet_logo.png') }}" />
		</div>

		<div>
			
		</div>

		<div class="col-md-8 header-middle" style="margin-top: 30px">
			<form action="#" method="post">
				<input type="search" name="search" placeholder="Search here..." required="">
				<input type="submit" value=" " style="color: rgba(255, 0, 0, 0) !important; padding: 10px">
				<div class="clearfix"></div>
			</form>
		</div>
		<!-- header-bot -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->

<!-- menu navigation -->
<div class="ban-top" style="background-color: white; color: black !important">
	<div class="container-fluid">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">

				  	<li class="active menu__item menu__item--current"><a class="menu__link" href="{{ url('/') }}" style="color: black !important">Home <span class="sr-only">(current)</span></a></li>

				  	<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black !important">Top Categories <span class="caret"></span></a>
						<ul class="dropdown-menu multi-column columns-3">
							<ul class="multi-column-dropdown">
								@foreach($categories->take(5) as $category)
									<li class="text-capitalize" style="border-bottom: 1px solid red"><a href="{{ url('/products?supermarket_id=&category_id=' . $category->id) }}" style="color: black !important">{{ $category->name}}</a></li>
								@endforeach
							</ul>
							<div class="clearfix"></div>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black !important">Stores <span class="caret"></span></a>
						<ul class="dropdown-menu multi-column columns-3">
							<ul class="multi-column-dropdown">
								@foreach($supermarkets->take(5) as $supermarket)
									<li style="border-bottom: 1px solid red"><a href="{{ url('/products?supermarket_id='.$supermarket->id.'&category_id=') }}" style="color: black !important">{{$supermarket->name}}</a></li>
								@endforeach
							</ul>
							<div class="clearfix"></div>
						</ul>
					</li>

					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black !important">Agents <span class="caret"></span></a>
						<ul class="dropdown-menu multi-column columns-3">
							<ul class="multi-column-dropdown">
								<li style="border-bottom: 1px solid red"><a href="{{ url('/agent/become_an_agent') }}" style="color: black !important">Become an agent</a></li>
								<li style="border-bottom: 1px solid red"><a href="{{ url('/agent/all_agents') }}" style="color: black !important">View all agents</a></li>
							</ul>
							<div class="clearfix"></div>
						</ul>
					</li>

					<li class=" menu__item"><a class="menu__link" href="{{ url('/contact_us') }}" style="color: black !important">Contact</a></li>
					
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>

		<div class="top_nav_right" style="width: 20%">
			<div class="wthreecartaits  cart cart box_1"> 
					<li style="list-style-type: none; float: right; margin: 0px 2px">
						<button onclick="view_cart()" class="w3view-cart" style="background-color: red"><span class="fa fa-cart-arrow-down" aria-hidden="true" ></span></button>
					</li>

					<li class="dropdown" style="list-style-type: none; float: right; margin: 0px 2px;">
						@auth
							<button class="w3view-cart dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: red"><span class="fa fa-user" aria-hidden="true"></span></button>
							
							<ul class="dropdown-menu multi-column columns-3" style="float: left; position: absolute; left: -200px">
								<ul class="multi-column-dropdown">
									@if(auth::user()->hasRole('customer'))
										<li style="border-bottom: 1px solid red"><a href="javascript:void(0)" style="color: black !important">My Orders</a></li>
									@elseif(auth::user()->hasRole('subadmin'))
										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_products') }}" style="color: black !important">All products</a></li>
									@elseif(auth::user()->hasRole('agent'))
										<li style="border-bottom: 1px solid red"><a href="" style="color: black !important">ALL Agents</a></li>
									@elseif(auth::user()->hasRole('superadmin'))
										<li style="border-bottom: 1px solid red"><a href="{{ url('/admin/dashboard') }}" style="color: black !important">Dashboard</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_supermarkets') }}" style="color: black !important">All stores</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_agents') }}" style="color: black !important">All agents</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_products') }}" style="color: black !important">All products</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_categories') }}" style="color: black !important">All Categories</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_customers') }}" style="color: black !important">All Customers</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_subadmins') }}" style="color: black !important">All Sub-admins</a></li>

										<li style="border-bottom: 1px solid red"><a href="{{ url('/admin/all_orders') }}" style="color: black !important">All orders</a></li>
										
										<li style="border-bottom: 1px solid red"><a href="{{ url('admin/all_states') }}" style="color: black !important">All States</a></li>

										

									@endif

									<li style="border-bottom: 1px solid red; color: #000" >
									
										<a style="color: black" href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>

									</li>
									
								</ul>
								<div class="clearfix"></div>
							</ul>
							

						@endauth
					</li>
			</div>
		</div>

		<div class="top_nav_right" style="display: none">
			
			<div class="wthreecartaits  cart cart box_1"> 
				<li class="dropdown" style="list-style-type: none; float: right; margin: 0px 2px">
					<button onclick="view_cart()" class="w3view-cart" style="background-color: red"><span class="fa fa-cart-arrow-down" aria-hidden="true" ></span></button>
				</li>

				<li class="dropdown" style="list-style-type: none; float: right; margin: 0px 2px">
					

				</li>
			</div>
			
		</div>


		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->


@yield('content')













<!--/grids-->
<div class="coupons">
	<div class="coupons-grids text-center">
		<div class="w3layouts_mail_grid">
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-truck" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>Quick Delivery</h3>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-headphones" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>24/7 SUPPORT</h3>
				</div>
			</div>
			<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>TOP QUALITY GUARANTEE</h3>
				</div>
			</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
				<div class="w3layouts_mail_grid_left1 hvr-radial-out">
					<i class="fa fa-gift" aria-hidden="true"></i>
				</div>
				<div class="w3layouts_mail_grid_left2">
					<h3>SPECIAL GIFTS</h3>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
</div>
<!--grids-->





<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="javascript:void(0)">Logo </a></h2>
			<p>Lorem ipsum quia dolor
			sit amet, consectetur, adipisci velit, sed quia non 
			numquam eius modi tempora.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
				<li><a href="#" class="facebook">
					  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="twitter"> 
					  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="instagram">
					  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
				<li><a href="#" class="pinterest">
					  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
					  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
			</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-3 sign-gd">
					<h4>About Us </h4>
					<ul>
						<li><a href="javascript:void(0)">Terms & Conditions</a></li>
						<li><a href="javascript:void(0)">Categories</a></li>
						<li><a href="javascript:void(0)">Supermarkets</a></li>
						<li><a href="javascript:void(0)">Delivery Terms</a></li>
						<li><a href="javascript:void(0)">Agents</a></li>
						<li><a href="javascript:void(0)">Contact</a></li>
					</ul>
				</div>
				
				<div class="col-md-4 sign-gd-two">
					<h4>Store <span>Information</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>08151500327</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:example@email.com"> info@skipoutlet.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
						
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

				<div class="col-md-5  sign-gd flickr-post">
					<h4>SIGN UP FOR NEWSLETTER ! </h4>
					<div class="newsright">
						<form action="#" method="post">
							<input type="email" placeholder="Enter your email..." name="email" required=""><br/>
							<input type="submit" value="Submit">
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
		<p class="copy-right">&copy <?php echo Date('Y') ?>. All rights reserved</p>
	</div>
</div>
<!-- //footer -->

<!-- add to cart modal -->
<div class="modal fade" id="add_to_cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart Details</h5>
        
	  </div>
	  
		  <div class="modal-body" style="max-height: 300px; overflow-y: scroll; overflow-x: scroll">
		  	<span id="cart_details">

			</span>
			<span id="empty_cart"></span>
		  
			<div id="totals" style="display: none">
				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-5 text-left">
						
					</div>
					<div class="col-md-3 col-lg-3 col-sm-3">
						<p><strong>Items Total</strong></p>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4">
						<p style="float: left">₦ <span id="items_total"></span></p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-5 text-left">
						
					</div>
					<div class="col-md-3 col-lg-3 col-sm-3">
						<p><strong>Delivery Fee</strong></p>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4">
						<p style="float: left">₦ <span id="delivery_fee"></span></p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5 col-lg-5 col-sm-5 text-left">
						
					</div>
					<div class="col-md-3 col-lg-3 col-sm-3">
						<p><strong>Grand Total</strong></p>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4">
						<p style="float: left">₦ <span id="grand_total"></span></p>
					</div>
				</div>
			</div>

			
		</div>
      <div class="modal-footer">
		
		<form method="POST" action="{{ url('/checkout') }}">
			@csrf
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Shopping</button>
			<button type="submit" class="btn btn-primary" style="display: none" id="checkout_btn">Checkout</button>
		</form>
      </div>
    </div>
  </div>
</div>
<!-- add to cart modal -->


<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script type="text/javascript" src="{{ asset('customer/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('customer/js/modernizr.custom.js') }}"></script>
<script src="{{ asset('customer/js/minicart.min.js') }}"></script>					
<script src="{{ asset('customer/js/easy-responsive-tabs.js') }}"></script>
<!-- <script src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script> -->
<script src="{{ asset('customer/js/jquery.countup.js') }}"></script>
<!-- <script type="text/javascript" src="{{ asset('customer/js/move-top.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ asset('customer/js/jquery.easing.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('customer/js/bootstrap.js') }}"></script>



<script>
	const base_url = "{{ url('/') }}"
    const file_path = "{{ asset('/storage') }}"

	$(document).ready(function(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

		// all append to the checkout page
		if($('#cart_details_checkout')) {
			get_all_cart_products()
		}

	})

	
	function get_all_cart_products() {// return all product details and quantity in the cart

		$.ajax({
			type: 'POST',
			url: "{{ url('/get_all_cart_products') }}",
			dataType: 'json',

			success: function (data) {

				let total_amount = 0;
				let total_weight = 0;

				$('#cart_details').empty()
				$('#empty_cart').empty()
				if($('#cart_details_checkout')) {
					$('#cart_details_checkout').empty()
					$('#empty_cart_checkout').empty()
				}

				if(Object.keys(data).length > 0) {

					for(key in data) {
    					if(data.hasOwnProperty(key)) {
							// get import data
							const product_id = data[key]['product_details']['id'];
							const product_name = data[key]['product_details']['name'];
							const product_weight = data[key]['product_details']['weight'];
							const product_sales_price = data[key]['product_details']['sales_price'];
							let product_price = 0;

							if (product_sales_price <= 0) {
								product_price = data[key]['product_details']['price'];
							} else {
								product_price = data[key]['product_details']['sales_price'];
							}

							const product_quantity = data[key]['product_quantity'];
							const supermarket_name = data[key]['supermarket_details']['name'];
							const supermarket_state = data[key]['supermarket_state']['name']
							const supermarket_area = data[key]['supermarket_area']['name']

							let total_product_amount = product_price * product_quantity
							let total_product_weight = product_weight * product_quantity

							total_amount += total_product_amount
							total_weight += total_product_weight


							let cart_item_html = `<div class="row">
													<div class="col-md-5 col-lg-5 col-sm-5 text-left">
														<p><strong>`+ product_name +`</strong></p>
														<small>`+ supermarket_name +`, `+ supermarket_area +`, `+ supermarket_state +` </small>
													</div>
													<div class="col-md-3 col-lg-3 col-sm-3">
														<button class="btn btn-primary btn-sm" style="padding: 0px 7px" onclick="decrease_cart(`+ product_id +`)">-</button>
														<span>`+ product_quantity +`</span>
														<button class="btn btn-primary btn-sm" style="padding: 0px 7px" onclick="increase_cart(`+ product_id +`)">+</button>
													</div>
													<div class="col-md-4 col-lg-4 col-sm-4">
														<p style="float: left">₦ `+ total_product_amount +`</p>
														<span class="btn btn-danger btn-sm" style="padding: 0px 5px; float: right" onclick="remove_from_cart(`+ product_id +`)">x</span>
													</div>
												</div>
												<hr>`

							$('#cart_details').append(cart_item_html)
							// all append to the checkout page
							if($('#cart_details_checkout')) {
								$('#cart_details_checkout').append(cart_item_html)
							}
						}

					}
					
					// appen total price and weight
					let delivery_fee = calc_delivery_fee(total_weight)
					$('#items_total').html(total_amount)
					$('#delivery_fee').html(delivery_fee)
					$('#grand_total').html(total_amount + delivery_fee)

					$('#totals').attr('style', '')
					$('#checkout_btn').attr('style', '')

					if($('#totals_checkout')) {
						// appen total price and weight
						let delivery_fee = calc_delivery_fee(total_weight)
						$('#items_total_checkout').html(total_amount)
						$('#delivery_fee_checkout').html(delivery_fee)
						$('#grand_total_checkout').html(total_amount + delivery_fee)
						$('#pay_now').html(total_amount + delivery_fee)

						$('#totals_checkout').attr('style', '')
						$('#pay_btn').attr('style', '')

					}


					
				} else {

					if($('#totals_checkout')) {
						$('#empty_cart_checkout').append('<h4>Your cart is empty</h4>')
						$('#totals_checkout').attr('style', 'display: none')
						$('#pay_btn').attr('style', 'display: none')
					}

					$('#empty_cart').append('<h4>Your cart is empty</h4>')
					$('#totals').attr('style', 'display: none')
					$('#checkout_btn').attr('style', 'display: none')
				}
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
	}



	function add_to_cart(product_id) {

		$.ajax({
			type: 'POST',
			url: "{{ url('/add_to_cart') }}",
			data: {id: product_id},
			dataType: 'json',

			success: function (data) {
				get_all_cart_products()
				$('#add_to_cart_modal').modal('show')
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
	}

	function remove_from_cart(product_id) {
		$.ajax({
			type: 'POST',
			url: "{{ url('/remove_from_cart') }}",
			data: {id: product_id},
			dataType: 'json',

			success: function (data) {
				get_all_cart_products()
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
	}

	function view_cart() {
		get_all_cart_products()
		$('#add_to_cart_modal').modal('show')
	}

	function calc_delivery_fee(total_weight) {

		if(total_weight > 0) {
			const base_delivery_fee = 1000
			const price_per_kg = 20
			const total_kg_price = price_per_kg * total_weight
			const total_delivery_fee = total_kg_price + base_delivery_fee
			return total_delivery_fee
		} else {
			return 0
		}
		
	}

	function decrease_cart(product_id) {
		$.ajax({
			type: 'POST',
			url: "{{ url('/decrease_cart') }}",
			data: {id: product_id},
			dataType: 'json',

			success: function (data) {
				console.log(data)
				get_all_cart_products()
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
	}

	function increase_cart(product_id) {
		$.ajax({
			type: 'POST',
			url: "{{ url('/increase_cart') }}",
			data: {id: product_id},
			dataType: 'json',

			success: function (data) {
				get_all_cart_products()
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
	}

	function init_payment() {

		$.ajax({
			type: 'POST',
			url: "{{ url('/init_payment') }}",
			dataType: 'json',

			success: function (data) {

				if(Object.keys(data).length != 0) {

					const pk_key                = data['pk_key']
					const customer_email        = data['customer_email']
					const amount                = data['amount']
					const currency              = data['currency']
					const customer_full_name    = data['customer_full_name']
					const customer_phone_number = data['customer_phone_number']
					const total_amount          = data['total_amount']
					const delivery_fee          = data['delivery_fee']
					const total_weight          = data['total_weight']

					// get payment type value
					let payment_type        = $("input[name='payment_method']:checked").val();
					let delivery_address_id = $("input[name='address']:checked").val();

					if(payment_type == 'e-payment') { //if pay now payment method was selected
						payWithPaystack(pk_key, customer_email, amount, currency, customer_full_name, customer_phone_number, total_amount, delivery_fee, total_weight)
					} else if(payment_type = 'pay on delivery') { //if the pay on delivery option is selected
						store_order('', delivery_address_id, payment_type, total_amount, delivery_fee, total_weight)
					}

				}
				
			},

			error: function (data) {
				console.log('Error:', data);
			}
		});
		
	}

	function payWithPaystack(pk_key, customer_email, amount, currency, customer_full_name, customer_phone_number, total_product_amount, delivery_fee, total_products_weight){
		var handler = PaystackPop.setup({
			key: pk_key,
			email: customer_email,
			amount: amount,
			currency: currency,

			metadata: {
				custom_fields: [
					{
						display_name: customer_full_name,
						customer_phone_number: customer_phone_number
					}
				]
			},

			callback: function(response){

				// get payment type value
				let payment_type        = $("input[name='payment_method']:checked").val();
				let delivery_address_id = $("input[name='address']:checked").val();

				store_order(response.reference, delivery_address_id, payment_type, total_product_amount, delivery_fee, total_products_weight)
				// alert('success. transaction ref is ' + response.reference);

			},
			
			onClose: function(){
				alert('window closed');
			}
		});
		handler.openIframe();
	}



	function store_order(paystack_payment_ref, delivery_address_id, payment_type, total_product_amount, delivery_fee, total_products_weight) {

		let send_data = {
			paystack_payment_ref : paystack_payment_ref,
			delivery_address_id  : delivery_address_id,
			payment_type         : payment_type,
			total_product_amount : total_product_amount,
			delivery_fee         : delivery_fee,
			total_products_weight: total_products_weight
		}

		$.ajax({
			type: 'POST',
			url: "{{ url('/store_order') }}",
			data: send_data,
			dataType: 'json',

			success: function (data) {
				console.log(data)
				window.location.replace(base_url + "/orders");
			},

			error: function (data) {
				console.log('Error:', data);
			}
		})

		console.log('herere')

	}
</script>



@yield('js')



</body>
</body></html>
