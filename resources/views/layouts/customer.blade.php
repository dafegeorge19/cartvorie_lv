<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Cartvorie</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/bootstrap.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/font-awesome.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/bootstrap-grid.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/bootstrap-reboot.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/font-techmarket.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/slick.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/techmarket-font-awesome.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/slick-style.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/animate.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/style.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/colors/purple.css') }}" media="all" />

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>
    <body class="@yield('body-class')" >
        <div id="page" class="hfeed site">

            <div class="top-bar top-bar-v1">
                <div class="col-full">
                    <ul id="menu-top-bar-left" class="nav justify-content-center">
                        <li class="menu-item animate-dropdown">
                            <a title="TechMarket eCommerce - Always free delivery" href="javascript:viod(0)"><i class="fa fa-phone" aria-hidden="true"></i>07043434010</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="Quality Guarantee of products" href="javascript:viod(0)"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@cartvorie.com</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="Fast returnings program" href="javascript:viod(0)"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="No additional fees" href="javascript:viod(0)"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="No additional fees" href="javascript:viod(0)"><i class="fa fa-youtube" aria-hidden="true"></i> YouTube</a>
                        </li>
                    </ul>
                    <!-- .nav -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- .top-bar-v1 -->


            <header id="masthead" class="site-header header-v1" style="background-image: none; padding: 0px !important">

                <div class="col-full desktop-only" style="background-color: #fff; width: 100%">

                    <!-- .techmarket-sticky-wrap -->
                    <div class="row align-items-center" style="padding: 10px">

                        <div class="">
                            <a href="{{ url('/') }}" class="custom-logo-link" rel="home">
                              <img src="{{url('asset/img/logo.jpeg')}}" width="100" alt="">
                              <span class="text-white"> <i>Shopping made easy & fun....</i></span>
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================================================= -->

                        <!-- top stores -->
                        <div id="departments-menu" class="dropdown departments-menu">

                            <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="tm tm-departments-thin" style="color: white"></i>
                                <span style="color: white">Top Stores</span>
                            </button>
                            <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
                                <li class="highlight menu-item animate-dropdown text-capitalize">
                                    <a title="New Arrivals" href="home-v4.html">All Stores</a>
                                </li>
                                @foreach($supermarkets->take(10) as $supermarket)
                                    <li class="menu-item animate-dropdown text-capitalize">
                                        <a title="New Arrivals" href="{{ url('/store', [$supermarket->slug]) }}">{{$supermarket->name}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- .departments-menu -->

                        <!-- search form -->
                        <form class="navbar-search" method="get" action="{{ url('/products') }}">
                            <label class="sr-only screen-reader-text" for="search">Search for:</label>
                            <div class="input-group">
                                <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="product_name" required placeholder="Search for products" />
                                <div class="input-group-addon search-categories popover-header">
                                    <select name='store_id' id='product_cat' class='postform resizeselect' style="color: white">
                                        <option value='' selected='selected' style="color: black">All Stores</option>
                                        @foreach($supermarkets as $supermarket)
                                            <option class="level-0 text-capitalize" value="{{$supermarket->id}}" style="color: black">{{$supermarket->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- .input-group-addon -->
                                <div class="input-group-btn input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                        <span class="search-btn">Search</span>
                                    </button>
                                </div>
                                <!-- .input-group-btn -->
                            </div>
                            <!-- .input-group -->
                        </form>


                        <!-- .header-cart -->
                        <ul id="site-header-cart" class="site-header-cart menu">
                            <li class="animate-dropdown dropdown " style="display: inline-block">
                                <a class="cart-contents" href="{{ url('/cart') }}" data-toggle="dropdown" title="View your shopping cart">
                                    <i class="tm tm-shopping-bag" style="color: #662e91"></i>
                                    <span id="cart_count" class="count"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-mini-cart">
                                    <li>
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul id="head_cart_list" class="woocommerce-mini-cart cart_list product_list_widget ">
                                                    <!-- head cart list will be appended here using JQUARY -->
                                                </ul>
                                                <div class="text-center" id="empty_cart">

                                                </div>
                                                <!-- .cart_list -->
                                                <p id="tots" style="display: none" class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <span class="woocommerce-Price-currencySymbol">₦</span>
                                                        <span id="products_subtotal"></span>
                                                    </span>
                                                </p>
                                                <p id="checkout_btn" style="display: none" class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="{{ url('/cart') }}" class="button wc-forward">View cart</a>
                                                    <a href="{{url('/checkout')}}" class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                            <!-- .widget_shopping_cart_content -->
                                        </div>
                                        <!-- .widget_shopping_cart -->
                                    </li>
                                </ul>
                                <!-- .dropdown-menu-mini-cart -->
                            </li>
                            @auth
                                <li class="animate-dropdown dropdown " style="display: inline-block">
                                    <a class="cart-contents" href="{{ url('/cart') }}" data-toggle="dropdown" title="View your shopping cart">
                                        <i class="tm tm-login-register" style="color: white"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-mini-cart">
                                        <li>
                                            <div class="widget woocommerce widget_shopping_cart">
                                                <div class="widget_shopping_cart_content">
                                                    <ul class="woocommerce-mini-cart cart_list product_list_widget " style="min-width: 100px !important;">

                                                            @if(auth::user()->hasRole('customer'))
                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;">
                                                                    <a href="{{ url('/orders')}}"  style="min-width: 100px !important;">My Orders</a>
                                                                </li>
                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;">
                                                                    <a href="{{ url('/edit_profile')}}"  style="min-width: 100px !important;">Edit Profile</a>
                                                                </li>
                                                            @elseif(auth::user()->hasRole('subadmin'))
                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_products') }}"  style="min-width: 100px !important;">All products</a></li>
                                                            @elseif(auth::user()->hasRole('agent'))
                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href=""  style="min-width: 100px !important;">ALL Agents</a></li>
                                                            @elseif(auth::user()->hasRole('superadmin'))
                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('/admin/dashboard') }}"  style="min-width: 100px !important;">Dashboard</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_supermarkets') }}"  style="min-width: 100px !important;">All stores</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_agents') }}"  style="min-width: 100px !important;">All agents</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_products') }}"  style="min-width: 100px !important;">All products</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_categories') }}"  style="min-width: 100px !important;">All Categories</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_customers') }}"  style="min-width: 100px !important;">All Customers</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_subadmins') }}"  style="min-width: 100px !important;">All Sub-admins</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('/admin/all_orders') }}"  style="min-width: 100px !important;">All orders</a></li>

                                                                <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;"><a href="{{ url('admin/all_states') }}"  style="min-width: 100px !important;">All States</a></li>



                                                            @endif








                                                        <li class="woocommerce-mini-cart-item mini_cart_item" style="min-width: 100px !important;">
                                                            <a style="min-width: 100px !important;" style="color: black" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>

                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .widget_shopping_cart_content -->
                                            </div>
                                            <!-- .widget_shopping_cart -->
                                        </li>
                                    </ul>
                                    <!-- .dropdown-menu-mini-cart -->
                                @endauth
                            </li>
                        </ul>
                        <!-- .site-header-cart -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- .col-full -->





                <div class="col-full desktop-only" style="background-color: #662e91; width: 100%">

                        <div class="row" style="background-color: #662e91;">






                            <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation" data-nav="flex-menu">
                                <ul id="menu-primary-menu" class="nav yamm">
                                    <li class="menu-item animate-dropdown">
                                        <a  href="#" >Groceries Delivery</a>

                                    </li>
                                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#" aria-expanded="false" >Stores<span class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <li class="menu-item animate-dropdown">
                                                <a title="ALl Stores" href="{{ url('/stores') }}">Stores</a>
                                            </li>
                                                <li class="menu-item animate-dropdown">
                                                  <a class="dropdown-item" href="stores.html">African</a>
                                                </li>
                                                <li class="menu-item animate-dropdown">
                                                  <a class="dropdown-item" href="stores.html">International</a>
                                                </li>
                                                <li class="menu-item animate-dropdown">
                                                  <a class="dropdown-item" href="stores.html">Main Market</a>
                                                </li>
                                                <li class="menu-item animate-dropdown">
                                                  <a class="dropdown-item" href="stores.html">Others</a>
                                                </li>

                                        </ul>
                                        <!-- .dropdown-menu -->
                                    </li>
                                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#" aria-expanded="false" >Categories<span class="caret"></span></a>
                                        <ul role="menu" class=" dropdown-menu">
                                            <li class="menu-item animate-dropdown">
                                                <a title="All Categories" href="{{ url('/categories') }}">All Categories</a>
                                            </li>
                                            @foreach($categories as $category)
                                                <li class="menu-item animate-dropdown">
                                                    <a title="{{ $category->name }}" href="{{url('/stores') . '?' . http_build_query(['category_name' => $category->name])}}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- .dropdown-menu -->
                                    </li>
                                    <li class="menu-item animate-dropdown">
                                        <a href="{{ url('/products') }}" >All Products</a>
                                    </li>
                                    <li class="menu-item animate-dropdown">
                                      <a class="nav-link" href="{{ url('/contact_us') }}">Inquiry</a>

                                    </li>
                                    <li class="menu-item animate-dropdown">
                                        <a href="{{ url('/deliver.html') }}" >Track Your Delivery</a>
                                    </li>
                                    @guest
                                        <li class="menu-item animate-dropdown" style="    text-align: center;">

                                            <a class="" href="{{ url('/register') }}" > <i class="tm tm-login-register"></i> Register</a>
                                            <span>OR</span>
                                            <a class="" href="{{ url('/login') }}" ><i class="tm tm-login-register"></i> Login</a>
                                        </li>
                                    @endguest
                                    <li class="techmarket-flex-more-menu-item dropdown animate-dropdown">
                                        <a title="..." href="#" data-toggle="dropdown" class="dropdown-toggle"  style="background-color: #662e91">...</a>
                                        <ul class="overflow-items dropdown-menu" style="background-color: #fff"></ul>
                                        <!-- . -->
                                    </li>
                                </ul>
                                <!-- .nav -->
                            </nav>
                            <!-- .primary-navigation -->
                            <nav id="secondary-navigation" class="secondary-navigation" aria-label="Secondary Navigation" data-nav="flex-menu">
                                <ul id="menu-secondary-menu" class="nav">
                                    @guest
                                        <li class="menu-item">
                                            <i class="tm tm-login-register"></i>
                                            <a class="" href="{{ url('/register') }}" >Register</a>
                                            <span>OR</span>
                                            <a class="" href="{{ url('/login') }}" >Login</a>
                                        </li>
                                    @endguest
                                    <li class="techmarket-flex-more-menu-item dropdown">
                                        <a title="..." href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: white; background-color: #ed017f">...</a>
                                        <ul class="overflow-items dropdown-menu" style="color: white; background-color: #ed017f"></ul>
                                    </li>
                                </ul>
                                <!-- .nav -->
                            </nav>
                            <!-- .secondary-navigation -->
                        </div>

                </div>
                <!-- .col-full -->










                <!-- mobile menu -->

                <div class="col-full handheld-only">
                    <div class="handheld-header">
                        <div class="row">
                            <div class="site-branding">
                                <a href="{{ url('/') }}" class="custom-logo-link" rel="home">
                                  <img src="{{url('asset/img/logo.jpeg')}}" width="100" alt="">
                                </a>
                                <!-- /.custom-logo-link -->
                            </div>
                            <!-- /.site-branding -->
                            <!-- ============================================================= End Header Logo ============================================================= -->
                            @auth
                            <div class="handheld-header-links dropdown">
                                <ul class="columns-3">
                                    <li class="my-account" id="account_mobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <a href="javasript:viod(0)" class="has-icon">
                                            <i class="tm tm-login-register"></i>
                                        </a>
                                    </li>

                                    <div class="dropdown-menu" aria-labelledby="account_mobile">
                                        <a class="dropdown-item" href="{{ url('/orders')}}">My Orders</a>
                                        <a class="dropdown-item" style="color: black" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>

                                </ul>
                                <!-- .columns-3 -->
                            </div>
                            <!-- .handheld-header-links -->
                            @endauth
                        </div>
                        <!-- /.row -->
                        <div class="techmarket-sticky-wrap">
                            <div class="row">
                                <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                                    <button class="btn navbar-toggler" type="button">
                                        <i class="tm tm-departments-thin"></i>
                                        <span>Menu</span>
                                    </button>
                                    <div class="handheld-navigation-menu">
                                        <span class="tmhm-close">Top Stores</span>
                                        <ul id="menu-departments-menu-1" class="nav">
                                            <li class="highlight menu-item animate-dropdown">
                                                <a title="Value of the Day" href="{{ url('/stores') }}">All Stores</a>
                                            </li>
                                            @foreach($supermarkets as $supermarket)
                                            <li class="highlight menu-item animate-dropdown text-capitalize">
                                                <a title="Top 100 Offers" href="{{ url('/store', [$supermarket->slug]) }}">{{$supermarket->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- .handheld-navigation-menu -->
                                </nav>
                                <!-- .handheld-navigation -->
                                <div class="site-search">
                                    <div class="widget woocommerce widget_product_search">
                                        <form role="search" method="get" class="woocommerce-product-search" action="home-v1.html">
                                            <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                            <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products&hellip;" value="" name="s" />
                                            <input type="submit" value="Search" />
                                            <input type="hidden" name="post_type" value="product" />
                                        </form>
                                    </div>
                                    <!-- .widget -->
                                </div>
                                <!-- .site-search -->
                                <a class="handheld-header-cart-link has-icon" href="{{ url('/cart') }}" title="View your shopping cart">
                                    <i class="tm tm-shopping-bag"></i>
                                    <span id="cart_count2" class="count"></span>
                                </a>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- .techmarket-sticky-wrap -->
                    </div>
                    <!-- .handheld-header -->
                </div>
                <!-- .handheld-only -->


            </header>
            <!-- .header-v1 -->
            <!-- ============================================================= Header End ============================================================= -->




            @yield('content')







            <!-- #content -->
            <footer class="site-footer footer-v1" style="background-color: black">
                <div class="col-full">
                    <div class="before-footer-wrap">
                        <div class="col-full">
                            <div class="footer-newsletter">
                                <div class="media">
                                    <i class="footer-newsletter-icon tm tm-newsletter"></i>
                                    <div class="media-body">
                                    @if(session()->has('message')) {{-- if there is a message in session --}}
                                        @if(session()->get('type') == 'success') {{-- if the message is a success message --}}
                                        <div class="alert alert-success" role="alert">
                                            {{session()->get('message')}}
                                        </div>
                                        @elseif(session()->get('type') == 'fail') {{-- if the message is a failed message --}}
                                        <div class="alert alert-danger" role="alert">
                                            {{session()->get('message')}}
                                        </div>
                                        @endif
                                    @endif
                                        <div class="clearfix">
                                            <div class="newsletter-header">
                                                <h5 class="newsletter-title text-white">Sign up to Newsletter</h5>
                                                <span class="newsletter-marketing-text text-white">...and receive
                                                    <strong class="text-white">special discounts</strong>
                                                </span>
                                            </div>
                                            <!-- .newsletter-header -->
                                            <div class="newsletter-body">

                                                <form method="POST" action="{{ url('/store_mail') }}" class="newsletter-form">
                                                @csrf
                                                    <input type="email" name="email" placeholder="Enter your email address" required>
                                                    <button class="button text-white" type="submit">Sign up</button>
                                                    @error('email')
                                                        <p class="text-danger pt-0" role="alert" style="padding: 0px">
                                                            <small>{{ $message }}</small>
                                                        </p>
                                                    @enderror
                                                </form>
                                            </div>
                                            <!-- .newsletter body -->
                                        </div>
                                        <!-- .clearfix -->
                                    </div>
                                    <!-- .media-body -->
                                </div>
                                <!-- .media -->
                            </div>
                            <!-- .footer-newsletter -->
                            <div class="footer-social-icons">
                                <ul class="social-icons nav">
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="javascript:viod(0)">
                                            <i class="fa fa-facebook text-white"></i> Facebook</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="javascript:viod(0)">
                                            <i class="fa fa-instagram text-white"></i> Instagram</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sm-icon-label-link nav-link" href="javascript:viod(0)">
                                            <i class="fa fa-google-youtube text-white"></i> YouTube</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- .footer-social-icons -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .before-footer-wrap -->
                    <div class="footer-widgets-block">
                        <div class="row">
                            <div class="footer-contact">
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}" class="custom-logo-link" rel="home">
                                        <img width="100px" src="{{url('asset/img/logo.jpeg')}}" alt="">
                                    </a>
                                </div>
                                <!-- .footer-logo -->
                                <div class="contact-payment-wrap">
                                    <div class="footer-contact-info">
                                        <div class="media">
                                            <span class="media-left icon media-middle">
                                                <i class="tm tm-call-us-footer"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <span class="call-us-titley text-white">Got Questions ? Call us 24/7</span><br>
                                                <span class="y text-white">07043434010, info@cartvorie.com </span><br>
                                                <address class="footer-contact-addressy text-white">Plot 809, Dahiru Musdafa Boulevard Wuye, Abuja.</address>
                                            </div>
                                            <!-- .media-body -->
                                        </div>
                                        <!-- .media -->
                                    </div>
                                </div>
                                <!-- .contact-payment-wrap -->
                            </div>
                            <!-- .footer-contact -->
                            <div class="footer-widgets">
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title text-white">About Us</h4>
                                            <div class="menu-footer-menu-1-container">
                                                <ul id="menu-footer-menu-1" class="menu">
                                                    <li class="menu-item text-white">
                                                        <a href="{{ url('/about_us') }}" class=" text-secondary">About Us</a>
                                                    </li>
                                                    <li class="menu-item text-white">
                                                        <a href="{{ url('/terms_and_conditions') }}" class=" text-secondary">Terms & Conditions</a>
                                                    </li>
                                                    <li class="menu-item text-white">
                                                        <a href="{{ url('/delivery_terms') }}" class=" text-secondary">Delivery Terms</a>
                                                    </li>
                                                    <li class="menu-item text-white">
                                                        <a href="{{ url('/agent/all_agents') }}" class=" text-secondary">Agents</a>
                                                    </li>
                                                    <li class="menu-item text-white">
                                                        <a href="{{ url('/contact_us') }}" class=" text-secondary">Contact</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-1-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                                <div class="columns">
                                    <aside class="widget clearfix">
                                        <div class="body">
                                            <h4 class="widget-title text-white">Customer</h4>
                                            <div class="menu-footer-menu-3-container">
                                                <ul id="menu-footer-menu-3" class="menu">
                                                    @guest
                                                        <li class="menu-item text-white">
                                                            <a href="{{ url('/register') }}" class="text-secondary">Register</a>
                                                        </li>
                                                        <li class="menu-item text-white">
                                                            <a href="{{ url('/login') }}" class="text-secondary">Login</a>
                                                        </li>
                                                    @else
                                                        <li class="menu-item text-white">
                                                            <a href="{{ url('/orders') }}" class="text-secondary">My Orders</a>
                                                        </li>
                                                    @endguest
                                                    <li class="menu-item text-white">
                                                        <a href="#" class="text-secondary">Refund Policy</a>
                                                    </li>
                                                    <li class="menu-item text-white">
                                                        <a href="#" class="text-secondary">Cookies Policy</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <!-- .menu-footer-menu-3-container -->
                                        </div>
                                        <!-- .body -->
                                    </aside>
                                    <!-- .widget -->
                                </div>
                                <!-- .columns -->
                            </div>
                            <!-- .footer-widgets -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .footer-widgets-block -->
                    <div class="site-info">
                        <div class="col-full">
                            <div class="copyright">Copyright © Cartvorie Limited {{date('Y')}} <a href="javascript:void(0)"></div>
                            <!-- .copyright -->
                            <div class="credit">Made with
                                <i class="fa fa-heart"></i></div>
                            <!-- .credit -->
                        </div>
                        <!-- .col-full -->
                    </div>
                    <!-- .site-info -->
                </div>
                <!-- .col-full -->
            </footer>
            <!-- .site-footer -->
        </div>

        <script type="text/javascript" src="{{ asset('customer/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/tether.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/jquery-migrate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/hidemaxlistitem.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/hidemaxlistitem.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/jquery.easing.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/scrollup.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/waypoints-sticky.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('customer/js/scripts.js') }}"></script>

        <script
        src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>

        <script type="text/javascript">

            const base_url = "{{ url('/') }}"
            const file_path = "{{ asset('/storage') }}"

            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });


                // when user selects a new state, get the cities in that state
                $('#state').on('change', function(e) {

                    $('#area').attr('disabled', 'disabled')
                    $('#area').empty()
                    $('#area').append(`<option value="" class="text-capitalize">Select Area</option>`)

                    let state_id = $(this).val();

                    $.ajax({
                    type: 'POST',
                    url: "{{ url('/get_state_areas')}}",
                    data: {id: state_id},
                    dataType: 'json',

                    success: function (areas) {

                        console.log(areas)

                        if(Object.keys(areas).length > 0 ) {

                        for(key in areas) {

                            if(areas.hasOwnProperty(key)) {

                            let area_id = areas[key]['id']
                            let area_name = areas[key]['name']

                            $('#area').append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                            }
                        }

                        $('#area').removeAttr('disabled')


                        }
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }
                    });

                })

                // // all append to the checkout page
                // if($('#cart_details_checkout')) {
                    get_all_cart_products()
                // }

            })

            function add_to_cart(product_id) {

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/add_to_cart') }}",
                    data: {id: product_id},
                    dataType: 'json',

                    success: function (data) {

                        get_all_cart_products()
                        // $('#add_to_cart_modal').modal('show')
                        alert('added to cart')
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

            function get_all_cart_products() {// return all product details and quantity in the cart

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/get_all_cart_products') }}",
                    dataType: 'json',

                    success: function (data) {
                        console.log(data)

                        let total_amount = 0;
                        let total_weight = 0;
                        $('#cart_count').html(Object.keys(data).length)
                        $('#cart_count2').html(Object.keys(data).length)

                        $('#head_cart_list').empty()
                        if($('#view_cart').length > 0) {
                            $('#view_cart').empty()
                        }

                        if($('#checkout_cart').length > 0) {
                            $('#checkout_cart').empty()
                        }

                        if(Object.keys(data).length > 0) {

                            for(key in data) {
                                if(data.hasOwnProperty(key)) {
                                    // get import data
                                    const product_id = data[key]['product_details']['id'];
                                    const product_image = data[key]['product_image'];
                                    const product_name = data[key]['product_details']['name'];
                                    const product_slug = data[key]['product_details']['slug'];
                                    const product_weight = data[key]['product_details']['weight'];
                                    const product_sales_price = data[key]['product_details']['sales_price'];
                                    let product_price = 0;

                                    if (product_sales_price <= 0) {
                                        product_price = data[key]['product_details']['price'];
                                    } else {
                                        product_price = data[key]['product_details']['sales_price'];
                                    }

                                    product_price = product_price.replace(/,/g, "");

                                    const product_quantity = data[key]['product_quantity'];
                                    const supermarket_name = data[key]['supermarket_details']['name'];
                                    const supermarket_state = data[key]['supermarket_state']['name']
                                    const supermarket_area = data[key]['supermarket_area']['name']

                                    let total_product_amount = product_price * product_quantity
                                    let total_product_weight = product_weight * product_quantity

                                    total_amount += total_product_amount
                                    total_weight += total_product_weight


                                    let head_cart_list = `<li class="woocommerce-mini-cart-item mini_cart_item">
                                                                <a href="javascript:void(0)" class="remove" onclick="remove_from_cart(`+ product_id +`)">×</a>
                                                                <a href="`+ base_url + `/product/` + product_slug+`">
                                                                    <img src="`+ file_path +`/uploads/products/images/`+ product_image +`" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">`+ product_name +`
                                                                </a>
                                                                <span class="quantity">`+ product_quantity +` ×
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₦ </span>`+ curency_format (product_price) +` = ₦`+ curency_format (total_product_amount )+`</span>
                                                                </span>
                                                            </li>`

                                    $('#head_cart_list').append(head_cart_list)

                                    // html for cart page
                                    if($('#view_cart').length > 0) {
                                        let view_cart_html = `<tr>
                                                                <td class="product-remove">
                                                                    <a class="remove" onclick="remove_from_cart(`+ product_id +`)" href="javascript:void(0)">×</a>
                                                                </td>

                                                                <td class="product-thumbnail">
                                                                    <a href="`+ base_url + `/product/` + product_slug+`">
                                                                        <img width="180" height="180" alt="" class="wp-post-image" src="`+ file_path +`/uploads/products/images/`+ product_image +`">
                                                                    </a>
                                                                </td>

                                                                <td data-title="Product" class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href="`+ base_url + `/product/` + product_slug+`">
                                                                            <img width="180" height="180" alt="" class="wp-post-image" src="`+ file_path +`/uploads/products/images/`+ product_image +`">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="`+ base_url + `/product/` + product_slug+`">`+ product_name +`</a>
                                                                            <p>`+ supermarket_name +`, `+ supermarket_area +`, `+ supermarket_state +` </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Price" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₦</span>`+ curency_format (product_price) +`
                                                                    </span>
                                                                </td>
                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <button onclick="increase_cart(`+ product_id +`)" type="button" class="button">+</button>
                                                                        <button type="button" class="button btn-secondary" style="background-color: gray">`+ product_quantity +`</button>
                                                                        <button onclick="decrease_cart(`+ product_id +`)" type="button" class="button">-</button>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Total" class="product-subtotal">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">₦</span>`+ curency_format (total_product_amount )+`
                                                                    </span>
                                                                    <a onclick="remove_from_cart(`+ product_id +`)" title="Remove this item" class="remove" href="javasccript:void(0)">×</a>
                                                                </td>
                                                            </tr>`
                                        $('#view_cart').append(view_cart_html)

                                    }

                                    // html for checkut cart
                                    if($('#checkout_cart').length > 0) {
                                        let view_checkout_cart_html = `<tr class="cart_item">
                                                                    <td class="product-name text-capitalize">
                                                                        <strong class="product-quantity">`+ product_quantity +` ×</strong> `+ product_name +`
                                                                    </td>
                                                                    <td class="product-total">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₦</span>`+ curency_format (total_product_amount )+`</span>
                                                                    </td>
                                                                </tr>`
                                        $('#checkout_cart').append(view_checkout_cart_html)
                                    }

                                }

                            }

                            // appen total price and weight
                            let delivery_fee = calc_delivery_fee(total_weight)
                            $('#products_subtotal').html(curency_format (total_amount ))

                            $('#tots').attr('style', '')
                            $('#checkout_btn').attr('style', '')
                            $('#empty_cart').empty()

                            if($('#view_cart').length > 0) {
                                $('#subtotal').html(curency_format (total_amount ))
                                $('#delivery').html(delivery_fee)
                                $('#total_fee').html(curency_format (parseFloat(delivery_fee) + parseFloat(total_amount)))
                                $('#no_item').attr('style', 'display: none')
                                $('#cart_totals').attr('style', '')
                            }

                            if($('#checkout_cart').length > 0) {
                                $('#checkout_subtotal').html(curency_format (total_amount ))
                                $('#checkout_delivery').html(delivery_fee)
                                $('#checkout_total_fee').html(curency_format (parseFloat(delivery_fee) + parseFloat(total_amount)))
                                $('#no_checkout_item').attr('style', 'display: none')
                                $('#cart_checkout_totals').attr('style', '')
                            }

                        } else {

                            $('#empty_cart').append('<h4>Your cart is empty</h4>')
                            $('#tots').attr('style', 'display: none')
                            $('#checkout_btn').attr('style', 'display: none')

                            if($('#view_cart').length > 0) {
                                $('#no_item').attr('style', '')
                                $('#cart_totals').attr('style', 'display: none')
                            }

                            if($('#checkout_cart').length > 0) {
                                $('#no_checkout_item').attr('style', '')
                                $('#cart_checkout_totals').attr('style', 'display: none')
                            }

                        }
                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
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

            function curency_format (number) {
                let to_fixed = parseFloat(number).toFixed(2)
                let number_format = new Intl.NumberFormat('ja-JP').format(to_fixed)
                return number_format
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

            function validate_place_order() {

                let email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                let phone_number_re = /^\d+$/;

                let validation_errors = 0;
                $('#billing_fn_error').html('')
                $('#billing_on_error').html('')
                $('#billing_state_error').html('')
                $('#billing_area_error').html('')
                $('#billing_sa_error').html('')
                $('#billing_pn_error').html('')
                $('#billing_email_error').html('')
                $('#delivery_fn_error').html('')
                $('#delivery_on_error').html('')
                $('#delivery_state_error').html('')
                $('#delivery_area_error').html('')
                $('#delivery_sa_error').html('')
                $('#delivery_pn_error').html('')
                $('#delivery_email_error').html('')
                $('#t_c_error').html('')
                $('#validation_error').html('')

                let billing_first_name = $('#billing_first_name').val()
                if(billing_first_name == '' || billing_first_name == null) {
                    $('#billing_fn_error').html('You must enter your Billing First Name')
                    validation_errors = 1
                }

                let billing_other_names = $('#billing_other_names').val()
                if(billing_other_names == '' || billing_other_names == null) {
                    $('#billing_on_error').html('You must enter your Billing Other Names')
                    validation_errors = 1
                }

                let billing_state = $('#billing_state').val()
                if(billing_state == '' || billing_state == null) {
                    $('#billing_state_error').html('You must select a billing State')
                    validation_errors = 1
                }

                let billing_area = $('#billing_area').val()
                if(billing_area == '' || billing_area == null) {
                    $('#billing_area_error').html('You must select a Billing area')
                    validation_errors = 1
                }

                let billing_street_address = $('#billing_street_address').val()
                if(billing_street_address == '' || billing_street_address == null) {
                    $('#billing_sa_error').html('You must a enter billing street address')
                    validation_errors = 1
                }

                let billing_phone_number = $('#billing_phone_number').val()
                if(billing_phone_number == '' || billing_phone_number == null) {
                    $('#billing_pn_error').html('You must a enter billing phone number')
                    validation_errors = 1
                } else if (!phone_number_re.test(billing_phone_number)) {
                    $('#billing_pn_error').html('Billing phone number must contain only numbers')
                    validation_errors = 1
                }

                let billing_email = $('#billing_email').val()
                if(billing_email == '' || billing_email == null) {
                    $('#billing_email_error').html('You entered an invalid email address')
                    validation_errors = 1
                } else if (!email_re.test(billing_email.toLowerCase())) {
                    $('#billing_email_error').html('You entered an invalid email address')
                    validation_errors = 1
                }

                // if the user select ship to different address then we validate the delivery address fields
                if($('#deliver_to_diferent_address').is(":checked")) {

                    let delivery_first_name = $('#delivery_first_name').val()
                    if(delivery_first_name == '' || delivery_first_name == null) {
                        $('#delivery_fn_error').html('You must enter your delivery first name')
                        validation_errors = 1
                    }

                    let delivery_other_names = $('#delivery_other_names').val()
                    if(delivery_other_names == '' || delivery_other_names == null) {
                        $('#delivery_on_error').html('You must enter your delivery other names')
                        validation_errors = 1
                    }

                    let delivery_state = $('#delivery_state').val()
                    if(delivery_state == '' || delivery_state == null) {
                        $('#delivery_state_error').html('You must select a delivery state')
                        validation_errors = 1
                    }

                    let delivery_area = $('#delivery_area').val()
                    if(delivery_area == '' || delivery_area == null) {
                        $('#delivery_area_error').html('You must select a delivery area')
                        validation_errors = 1
                    }

                    let delivery_street_address = $('#delivery_street_address').val()
                    if(delivery_street_address == '' || delivery_street_address == null || delivery_street_address == undefined) {
                        $('#delivery_sa_error').html('You must a enter delivery street address')
                        validation_errors = 1
                    }

                    let delivery_phone_number = $('#delivery_phone_number').val()
                    if(delivery_phone_number == '' || delivery_phone_number == null) {
                        $('#delivery_pn_error').html('You must a enter delivery phone number')
                        validation_errors = 1
                    } else if (!phone_number_re.test(delivery_phone_number)) {
                        $('#delivery_pn_error').html('delivery phone number must contain only numbers')
                        validation_errors = 1
                    }

                    let delivery_email = $('#delivery_email').val()
                    if(delivery_email == '' || delivery_email == null) {
                        $('#delivery_email_error').html('You must a enter delivery email')
                        validation_errors = 1
                    } else if (!email_re.test(delivery_email)) {
                        $('#delivery_email_error').html('you entered an invalid email address')
                        validation_errors = 1
                    }

                }

                if($('#create_account').is(":checked")) {
                    let account_password = $('#account_password').val()

                    if(account_password == '' || account_password == null || account_password == undefined) {
                        $('#password_error').html('You must enter account password')
                        validation_errors = 1
                    } else if (account_password.length < 8) {
                        $('#password_error').html('Password must be atleast 8 characters')
                        validation_errors = 1
                    }
                }

                if($('#terms').is(":not(:checked)")) {
                    $('#t_c_error').html('You must accept terms and conditions')
                    validation_errors = 1
                }

                // check if there is a validation error
                if(validation_errors != 0) {
                    $('#validation_error').html('Validation Error - Some form fields has not been field correctly')
                } else {
                    init_payment()
                }



            }

            function init_payment() {

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/init_payment') }}",
                    dataType: 'json',

                    success: function (data) {

                        if(Object.keys(data).length != 0) {

                            const pk_key       = data['pk_key']
                            const amount       = data['amount']
                            const currency     = data['currency']
                            const total_amount = data['total_amount']
                            const delivery_fee = data['delivery_fee']
                            const total_weight = data['total_weight']

                            let ship_to_diferent_address = 0
                            let create_account           = 0

                            if($('#deliver_to_diferent_address').is(":checked")) {
                                ship_to_diferent_address =1
                            }

                            if($('#create_account').is(":checked")) {
                                create_account = 1
                            }

                            let billing_first_name      = $('#billing_first_name').val()
                            let billing_other_names     = $('#billing_other_names').val()
                            let billing_state           = $('#billing_state').val()
                            let billing_area            = $('#billing_area').val()
                            let billing_street_address  = $('#billing_street_address').val()
                            let billing_phone_number    = $('#billing_phone_number').val()
                            let billing_email           = $('#billing_email').val()
                            let account_password        = $('#account_password').val()
                            let delivery_first_name     = $('#delivery_first_name').val()
                            let delivery_other_names    = $('#delivery_other_names').val()
                            let delivery_state          = $('#delivery_state').val()
                            let delivery_area           = $('#delivery_area').val()
                            let delivery_street_address = $('#delivery_street_address').val()
                            let delivery_phone_number   = $('#delivery_phone_number').val()
                            let delivery_email          = $('#delivery_email').val()
                            let order_note              = $('#order_note').val()

                            let delivery_shipping_info = {
                                'create_account'             : create_account,
                                'deliver_to_diferent_address': ship_to_diferent_address,
                                'billing_first_name'         : billing_first_name,
                                'billing_other_names'        : billing_other_names,
                                'billing_state'              : billing_state,
                                'billing_area'               : billing_area,
                                'billing_street_address'     : billing_street_address,
                                'billing_phone_number'       : billing_phone_number,
                                'billing_email'              : billing_email,
                                'account_password'           : account_password,
                                'delivery_first_name'        : delivery_first_name,
                                'delivery_other_names'       : delivery_other_names,
                                'delivery_state'             : delivery_state,
                                'delivery_area'              : delivery_area,
                                'delivery_street_address'    : delivery_street_address,
                                'delivery_phone_number'      : delivery_phone_number,
                                'delivery_email'             : delivery_email,
                                'order_note'                 : order_note,
                            }

                            // get payment type value
                            let payment_type = $("input[name='payment_method']:checked").val();

                            if(payment_type == 'CARD') { //if pay now payment method was selected
                                payWithPaystack(pk_key, parseFloat(amount), currency, total_amount, delivery_fee, total_weight, delivery_shipping_info)
                            } else if(payment_type == 'PAY ON DELIVERY') { //if the pay on delivery option is selected
                                store_order('', payment_type, total_amount, delivery_fee, total_weight, delivery_shipping_info)
                            } else {
                                alert('Invalid payment method')
                            }

                        }

                    },

                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            }

            function payWithPaystack(pk_key, amount, currency, total_product_amount, delivery_fee, total_products_weight, delivery_shipping_info){

                let customer_full_name = delivery_shipping_info['billing_first_name'] + delivery_shipping_info['billing_other_names']

                var handler = PaystackPop.setup({
                    key: pk_key,
                    email: delivery_shipping_info['billing_email'],
                    amount: amount,
                    currency: currency,

                    metadata: {
                        custom_fields: [
                            {
                                display_name: customer_full_name,
                                customer_phone_number: delivery_shipping_info['billing_phone_number']
                            }
                        ]
                    },

                    callback: function(response){

                        // get payment type value
                        let payment_type        = $("input[name='payment_method']:checked").val();
                        let delivery_address_id = $("input[name='address']:checked").val();

                        store_order(response.reference, payment_type, total_product_amount, delivery_fee, total_products_weight, delivery_shipping_info)
                        // alert('success. transaction ref is ' + response.reference);

                    },

                    onClose: function(){
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }

            function store_order(paystack_payment_ref, payment_type, total_products_amount, delivery_fee, total_products_weight, delivery_shipping_info) {

                let send_data = {
                    paystack_payment_ref  : paystack_payment_ref,
                    payment_type          : payment_type,
                    total_products_amount : total_products_amount,
                    delivery_fee          : delivery_fee,
                    total_products_weight : total_products_weight,
                    delivery_shipping_info: delivery_shipping_info
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/store_order') }}",
                    data: send_data,
                    dataType: 'json',

                    success: function (data) {

                        if(data['status'] == 'success') {
                            console.log(data)
                            // $('#new_order_id').val(data['order_id']);
                            // $('#order_completed').submit()
                            window.location.replace(base_url + "/order_completed/" + data['order_id']);
                        } else {
                            alert('there was an error processing your order, please contact our custmer care')
                        }

                    },

                    error: function (data) {
                        alert('there was an error processing your order, please contact our custmer care')
                        console.log('Error:', data);
                    }
                })

            }

        </script>

@yield('js')



    </body>
</html>
