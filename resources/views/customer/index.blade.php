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
.home-slider .slider-home-banner img {
  height: 367px;
}
.slider-caption {
  color: #fff;
  position: absolute;
  padding: 30px;
  padding-top: 57px;
  left: 10%;
  bottom: 30%;
  z-index: 10;
}
.home-slider .carousel-item img {
    width: 100%;
    object-fit: cover;
    overflow: hidden;
}
.dv img {
  padding: 0px;
}
.mobile-card {/* height: 350px; */text-align: center;background-color: #fceeff;}
.mobile-img {margin-top: -40px;display: inline-block;}
.mobile-img img {border-radius: 20px;}
.mobile-text {text-align: left;margin: auto;}
.product-box {display: inline-flex;display: -moz-box;display: -o-box;display: box;flex-wrap: wrap;justify-content: center;}
.product-1 {
  -webkit-flex-box: 1;
  -moz-flex-box: 1;
  -o-flex-box: 1;
  flex-box: 1;
  width: 203px;
  color: #fff;
  height: 90px;
  border-radius: 20px;
  background-image: linear-gradient(to right, #7d07e4, #cb00fe 100px);
}
.p-image img {border-radius: 10px;}
.desc-1 {
    display: inline-grid;
    font-size: small;
    bottom: 0px;
    position: absolute;
    height: 70px;
    left: 15px;
    top: 0;
    margin-top: 10px;
}
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
                                        <h2 class="">Farm Fresh <br>Vegetables</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>

                                    </div>
                                    <div class="carousel-item slider-img">
                                      <img src="asset/img/11.jpg" alt="Second slide">
                                      <div class=" slider-caption">
                                        <h2 class="">Vegetables</h2>
                                        <br>
                                        <a class="btn btn-primary border text-white btn-lg" href="#" role="button">Shop Now</a>
                                      </div>

                                    </div>
                                    <div class="carousel-item slider-img">
                                      <img src="asset/img/22.jpg" alt="Third slide">
                                      <div class=" slider-caption">
                                        <h2 class="">Shop the Best</h2>
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
                                    <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                                        <div class="woocommerce columns-5">
                                            <div class="products">

                                                    <div class="product-category product first">
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








                                <section>
                                          <div class="row w-100 d-flex pl-4 p-4 justify-content-center">
                                            <span class="text-left h4 section-header">TOP CATEGORIES</span>
                                          </div>
                                          <div class="container-fluid product-box justify-content-center">
                                            <div class="card m-3 product-1">
                                              <div class="row no-gutters">
                                                <div class="col-6">
                                                  <div class="desc-1">
                                                    <span class="h6 mb-4">Provisions</span>
                                                    <span>90 Sold</span>

                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="p-3 p-image">
                                                    <img src="asset/img/b.jpg" class="card-img" alt="...">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card m-3 product-1">
                                              <div class="row no-gutters">
                                                <div class="col-6">
                                                  <div class="desc-1">
                                                    <span class="h6 mb-4">Soda</span>
                                                    <span>100 Sold</span>

                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="p-3 p-image">
                                                    <img src="asset/img/c.jpg" class="card-img" alt="...">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card m-3 product-1">
                                              <div class="row no-gutters">
                                                <div class="col-6">
                                                  <div class="desc-1">
                                                    <span class="h6 mb-4">Cosmetics</span>
                                                    <span>120 Sold</span>

                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="p-3 p-image">
                                                    <img src="asset/img/d.jpg" class="card-img" alt="...">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card m-3 product-1">
                                              <div class="row no-gutters">
                                                <div class="col-6">
                                                  <div class="desc-1">
                                                    <span class="h6 mb-4">Vegetables</span>
                                                    <span>120 Sold</span>

                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="p-3 p-image">
                                                    <img src="asset/img/g2.jpg" class="card-img" alt="...">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="card m-3 product-1">
                                              <div class="row no-gutters">
                                                <div class="col-6">
                                                  <div class="desc-1">
                                                    <span class="h6 mb-4">Spices</span>
                                                    <span>300 Sold</span>

                                                  </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="p-3 p-image">
                                                    <img src="asset/img/g.jpg" class="card-img" alt="...">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="more text-center p-4">
                                            <a href="#" class="icontext">
                                              <div class="text">

                                                <button class="btn btn-primary border-0 h2">View All</button>
                                              </div>
                                            </a>
                                          </div>
                                       </section>



                                @if($supermarkets->where('id', 1) != null)
                                <!-- Buy from shoprite -->
                                <section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
                                    <div class="section-products-carousel-tabs-wrap">
                                        <header class="section-header">
                                            <h2 class="section-title">All Product <a href="javascrip:void(0)"></a></h2>
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
                                                                @foreach($supermarkets->where('id', 1)->first()->products->take(10) as $product)
                                                                    <div class="product">
                                                                        <a href="{{url('/product', [$product->slug])}}" class="woocommerce-LoopProduct-link">
                                                                            <img src="{{ asset('asset/img/33.jpg') }}" width="224" height="197" class="wp-post-image" alt="">
                                                                            $13
                                                                            <!-- /.price -->
                                                                            <h2 class="woocommerce-loop-product__title text-tr text-truncate text-capitalize" data-toggle="tooltip" data-placement="bottom" title="Bbd 23-Inch screen LED-Lit Monitorss Buds">{{$product->name}}</h2>
                                                                        </a>
                                                                        <div class="hover-area">
                                                                            <a class="button add_to_cart_button" href="javascript:void(0)" rel="nofollow" onclick="add_to_cart({{$product->id}})">Add to cart</a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
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
