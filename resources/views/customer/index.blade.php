@extends('layouts.customer')
@section('body-class', 'woocommerce-active page-template-template-homepage-v3 can-uppercase')



@section('content')
            <style>
                @media(max-width: 700px){
                    .set-h {
                        height: 300px !important;

                    }

                    .set-m {
                        margin-top: 0px !important;
                        padding-top: 0px !important;
                    }
                }
            </style>
            <div id="content" class="site-content">



                <div class="col-full set-m">
                    <div class="row set-m">
                        <div id="primary" class="content-area set-m">
                            <main id="main" class="site-main set-m">
                                <!-- <div class="home-v1-slider home-slider set-h set-m" style="height: 100%">


                                    <div class="slider-1" style="background-image: url({{ asset('asset/img/g2.jpg') }}); background-size: contain; margin: 0px;">
                                      <div class=" slider-caption">
                                        <h2 class="">Farm Fresh <br>Vegetables</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>
                                    </div>

                                    <div class="slider-1" style="background-image: url({{ asset('asset/img/11.jpg') }}); background-size: contain; margin: 0px;">
                                    </div>

                                    <div class="slider-1" style="background-image: url({{ asset('asset/img/22.jpg') }}); background-size: contain; margin: 0px;">
                                    </div>


                                </div> -->
<style media="screen">

</style>

                            <div class="home-v1-slider home-slider set-h set-m" style="height: 100%">

                                <!-- ================== COMPONENT SLIDER  BOOTSTRAP  ==================  -->
                                <div id="carousel1_indicator" class="slider-home-banner carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel1_indicator" data-slide-to="0" class=""></li>
                                    <li data-target="#carousel1_indicator" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel1_indicator" data-slide-to="2" class="active"></li>
                                  </ol>
                                  <div class="carousel-inner" >
                                    <div class="carousel-item active slider-img">
                                      <img src="asset/img/g2.jpg" alt="First slide">
                                      <div class=" slider-caption">
                                        <h2 class="text-white">Farm Fresh <br>Vegetables</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>

                                    </div>
                                    <div class="carousel-item slider-img">
                                      <img src="asset/img/11.jpg" alt="Second slide">
                                      <div class=" slider-caption">
                                        <h2 class="text-white">Vegetables</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>

                                    </div>
                                    <div class="carousel-item slider-img">
                                      <img src="asset/img/22.jpg" alt="Third slide">
                                      <div class=" slider-caption">
                                        <h2 class="text-white">Shop the Best</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>

                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                                </div>
                                <!-- ==================  COMPONENT SLIDER BOOTSTRAP end.// ==================  .// -->


                                <div class="features-list">
                                  <div class="features">
                                    <div class="feature">
                                      <div class="media">
                                        <img src="asset/img/1.png" width="100" alt="...">
                                        <div class="media-body feature-text">
                                          <span class="h6">Select the store from which you want to shop from</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="feature">
                                      <div class="media">
                                        <img src="asset/img/2.png" width="100" alt="...">
                                        <div class="media-body feature-text">

                                          <span class="h6">Request pick up and delivery and get it delivered to your door-step </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="feature">
                                      <div class="media">
                                        <img src="asset/img/3.png" width="100" alt="...">
                                        <div class="media-body feature-text">

                                          <span class="h6">Track your deliver and get it delivered to you as soon as possible</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </section>


                                <!-- .top categories -->

                                <section class="section-top-categories section-categories-carousel pt-4" id="categories-carousel-1">
                                    <header class="section-header">
                                        <h2 class="section-title">STORES NEAR
                                            <br>YOU</h2>
                                        <nav class="custom-slick-nav"></nav>
                                    </header>
                                    <!-- .section-header -->
                                    <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;autoplay&quot;:true,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="woocommerce columns-5">
                                            <div class="products">

                                                    <div class="product-category product first active">
                                                        <a href="{{ url('stores?category_name=') }}">
                                                            <img width="224" height="197" alt="All in One PC" src="{{ asset('asset/img/h.jpg') }}">
                                                            <h2 class="text-capitalize text-truncate woocommerce-loop-category__title">
                                                                Akhigbe African Stores
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="product-category product first">
                                                        <a href="{{ url('stores?category_name=') }}">
                                                            <img width="224" height="197" alt="All in One PC" src="{{ asset('asset/img/i.jpg') }}">
                                                            <h2 class="text-capitalize text-truncate woocommerce-loop-category__title">
                                                                Laurie meat Stores
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="product-category product first">
                                                        <a href="{{ url('stores?category_name=') }}">
                                                            <img width="224" height="197" alt="All in One PC" src="{{ asset('asset/img/p2.jpg') }}">
                                                            <h2 class="text-capitalize text-truncate woocommerce-loop-category__title">
                                                                Oba Market
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="product-category product first">
                                                        <a href="{{ url('stores?category_name=') }}">
                                                            <img width="224" height="197" alt="All in One PC" src="{{ asset('asset/img/i.jpg') }}">
                                                            <h2 class="text-capitalize text-truncate woocommerce-loop-category__title">
                                                                Oyato Food African Market
                                                            </h2>
                                                        </a>
                                                    </div>
                                                    <div class="product-category product first">
                                                        <a href="{{ url('stores?category_name=') }}">
                                                            <img width="224" height="197" alt="All in One PC" src="{{ asset('asset/img/h.jpg') }}">
                                                            <h2 class="text-capitalize text-truncate woocommerce-loop-category__title">
                                                              Mosaic African Food                                                            </h2>
                                                        </a>
                                                    </div>
                                            </div>
                                            <!-- .products -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .product-categories-carousel -->
                                </section>
                                <!-- .section-categories-carousel -->


                                <div class="banners">
                                  <section class="pt-5">
<div class="row mobile-card">
  <div class="col-lg-6 col-sm-12">
    <div class="mobile-img">
      <img src="asset/img/mobile2.png" alt="">
    </div>
  </div>
  <div class="col-lg-6 col-sm-12 p-3 mobile-text">
    <h3 class="h1 p-4">Download <br>
      our handy app <br>
      on Google Play or the App Store
    </h3>
    <div class="app-button p-4">
      <span>
        <button type="button" class="btn btn-light shadow-lg border-0" name="button">
          <i class="glyphicon glyphicon-apple"></i>
          App Store
        </button>
      </span>
      <span>
        <button type="button" class="btn btn-light shadow-lg border-0" name="button">
          <i class="iconsmind-Google-Play"></i>
          Google Play
        </button>
      </span>
    </div>
  </div>
</div>
</section>

                                </div>
                                <!-- /.banners -->








                  


                                @if($supermarkets->where('id', 1) != null)
                                <!-- Buy from shoprite -->
                                <section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <h2 class="section-title">Top Category <a href="javascrip:void(0)"></a></h2>
                                            <ul role="tablist" class="nav justify-content-end">
                                                <li class="nav-item d-none"><a class="nav-link active" href="#tab-59f89f08825d50" data-toggle="tab">Cat 1</a></li>
                                                <li class="nav-item d-none"><a class="nav-link " href="#tab-59f89f08825d51" data-toggle="tab">Cat 2</a></li>
                                                <li class="nav-item d-none"><a class="nav-link " href="#tab-59f89f08825d52" data-toggle="tab">Cat 3</a></li>
                                                <li class="nav-item d-none"><a class="nav-link " href="#tab-59f89f08825d53" data-toggle="tab">Cat 4</a></li>
                                            </ul>
                                        </header>
                                        <!-- .section-header -->
                                        <div class="tab-content">
                                            <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                          <div class="products">



                                                            {{--  @foreach($categories->forPage($_GET['page'], 16) as $category) --}}
                                                                  <div class="product">
                                                                      <!-- .yith-wcwl-add-to-wishlist -->
                                                                      <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/stores') . '?' . @http_build_query(['category_name' => @$category->name])}}">
                                                                          <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/b.jpg')}}">
                                                                          <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0">Provisions</h2>
                                                                      </a>
                                                                      <!-- .woocommerce-LoopProduct-link -->
                                                                      <div class="hover-area">
                                                                          <a class="button" href="{{url('/product') . '?' . @http_build_query(['category_name' => @$category->name])}}">View products</a>
                                                                      </div>
                                                                      <!-- .hover-area -->
                                                                  </div>
                                                                  <div class="product">
                                                                      <!-- .yith-wcwl-add-to-wishlist -->
                                                                      <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/stores') . '?' . @http_build_query(['category_name' => @$category->name])}}">
                                                                          <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/c.jpg')}}">
                                                                          <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0">Soda</h2>
                                                                      </a>
                                                                      <!-- .woocommerce-LoopProduct-link -->
                                                                      <div class="hover-area">
                                                                          <a class="button" href="{{url('/product') . '?' . @http_build_query(['category_name' => @$category->name])}}">View products</a>
                                                                      </div>
                                                                      <!-- .hover-area -->
                                                                  </div>
                                                                  <div class="product">
                                                                      <!-- .yith-wcwl-add-to-wishlist -->
                                                                      <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/stores') . '?' . @http_build_query(['category_name' => @$category->name])}}">
                                                                          <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/d.jpg')}}">
                                                                          <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0">Cosmetics</h2>
                                                                      </a>
                                                                      <!-- .woocommerce-LoopProduct-link -->
                                                                      <div class="hover-area">
                                                                          <a class="button" href="{{url('/product') . '?' . @http_build_query(['category_name' => @$category->name])}}">View products</a>
                                                                      </div>
                                                                      <!-- .hover-area -->
                                                                  </div>
                                                                  <div class="product">
                                                                      <!-- .yith-wcwl-add-to-wishlist -->
                                                                      <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/stores') . '?' . @http_build_query(['category_name' => @$category->name])}}">
                                                                          <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/g2.jpg')}}">
                                                                          <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0">Vegetables</h2>
                                                                      </a>
                                                                      <!-- .woocommerce-LoopProduct-link -->
                                                                      <div class="hover-area">
                                                                          <a class="button" href="{{url('/product') . '?' . @http_build_query(['category_name' => @$category->name])}}">View products</a>
                                                                      </div>
                                                                      <!-- .hover-area -->
                                                                  </div>
                                                                  <div class="product">
                                                                      <!-- .yith-wcwl-add-to-wishlist -->
                                                                      <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/stores') . '?' . @http_build_query(['category_name' => @$category->name])}}">
                                                                          <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/g.jpg')}}">
                                                                          <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0">Spices</h2>
                                                                      </a>
                                                                      <!-- .woocommerce-LoopProduct-link -->
                                                                      <div class="hover-area">
                                                                          <a class="button" href="{{url('/product') . '?' . @http_build_query(['category_name' => @$category->name])}}">View products</a>
                                                                      </div>
                                                                      <!-- .hover-area -->
                                                                  </div>
                                                              {{--@endforeach --}}




                                                          </div>
                                                        </div>
                                                        <!-- .woocommerce -->
                                                    </div>
                                                    <!-- .container-fluid -->
                                                </div>
                                                <!-- .products-carousel -->
                                            </div>

                                        </div>
                                        <!-- .tab-content -->

                                    </div>
                                    <!-- .section-products-carousel-tabs-wrap -->
                                </section>
                                @endif
                                <!-- .section-products-carousel-tabs -->


                                <div class="banner full-width-banner">
                                <iframe width="100%" height="496" src="https://www.youtube.com/embed/7HgGiCK33ow" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <!-- /.banner -->

                                <div class="mid-full banners">
                                      <div class="jumbotron text-white text-center" style="background-color: #000; opacity: 0.9;">
                                          <h3 class="display-5 text-center text-white">Need Pick Up & Delivery Services?</h3>
                                          <p class="lead">We can help</p>
                                          <hr class="my-4">
                                          <a class="btn bg-dark border text-white btn-lg" href="#" role="button" style="background-image: linear-gradient(to right, #c0f, #8200e5 );">Pick Up Request</a>
                                      </div>
                                      </div>
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>


@endsection
