@extends('layouts.customer')
@section('body-class', 'woocommerce-active two-sidebar')



@section('content')
<br>
<br>
<style media="screen">
.feature-image {
/* background: url(asset/img/food1.jpg) no-repeat fixed top center; */
background-repeat: no-repeat;
background-attachment: fixed;
background-position: top;
background-size: cover;
height: 270px;
background-blend-mode: overlay;
}
</style>

    <div id="content" class="site-content" tabindex="-1">
        <div class="col-full">
          <div class="banners">
          <div class="category-feature" style="background-color:#652f91">

            <div class="jumbotron text-white text-center feature-image" style="background-image: url(asset/img/african1.jpg);background-color:#652f91">
              <div class="row w-100 d-flex justify-content-center" style="padding: 60px;">
                <h3 class="col-12 display-5 text-center text-light">Start shopping</h3>

                <div class="col-6">

                  <div class="input-group">
                    <input type="text" id="search" class="form-control search-field product-search-field" dir="ltr" value="" name="product_name" required placeholder="Search Stores" />

                    <!-- .input-group-addon -->
                    <div class="input-group-btn input-group-append">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                        <!-- <span class="search-btn">Search</span> -->
                      </button>
                    </div>
                    <!-- .input-group-btn -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
            <div class="row">
                <!-- .woocommerce-breadcrumb -->
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="shop-control-bar">
                            <div class="handheld-sidebar-toggle">
                                <button type="button" class="btn sidebar-toggler">
                                    <i class="fa fa-sliders"></i>
                                    <span>Filters</span>
                                </button>
                            </div>
                            <!-- .handheld-sidebar-toggle -->
                            <h1 class="woocommerce-products-header__title page-title">Stores</h1>
                            <!-- .woocommerce-ordering -->
                            <nav class="techmarket-advanced-pagination">
                                <form class="form-adv-pagination" method="post">
                                    <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2" id="goto-page">
                                </form> of 5<a href="#" class="next page-numbers">→</a>
                            </nav>
                            <!-- .techmarket-advanced-pagination -->
                        </div>


                        <!-- .shop-control-bar -->
                        <div class="tab-content">
                            <div id="grid" class="tab-pane active" role="tabpanel">
                                <div class="woocommerce columns-4">
                                    <div class="products">



                                      {{--  @foreach($stores->forPage($_GET['page'], 16) as $store) --}}
                                            <div class="product">
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/store', [@$store->slug])}}">
                                                    <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/p2.jpg') }}">
                                                    <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0 text-capitalize text-text-truncate">Oba Market</h2>
                                                    <small class="text-capitalize text-truncate pt-0 d-block">{{@$store->products}}100 Products</small>

                                                        <!-- <a class="button" href="{{url('/store', [@$store->slug]).'?category_name='.$_GET['category_name']}}">10km Away</a> -->
                                                        <a class="button" href="{{url('/store/shoprite')}}">10km Away</a>

                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{url('/store/shoprite')}}">Visit Store</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <div class="product">
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/store', [@$store->slug])}}">
                                                    <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/i.jpg') }}">
                                                    <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0 text-capitalize text-text-truncate">Mosaic African Food</h2>
                                                    <small class="text-capitalize text-truncate pt-0 d-block">{{@$store->products}}100 Products</small>

                                                        <a class="button" href="{{url('/store/shoprite')}}">10km Away</a>

                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{url('/store/shoprite')}}">Visit Store</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <div class="product">
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/store', [@$store->slug])}}">
                                                    <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/p2.jpg') }}">
                                                    <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0 text-capitalize text-text-truncate">Oba Market</h2>
                                                    <small class="text-capitalize text-truncate pt-0 d-block">{{@$store->products}}100 Products</small>

                                                        <a class="button" href="{{url('/store/shoprite')}}">10km Away</a>

                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{url('/store/shoprite')}}">Visit Store</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <div class="product">
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="{{url('/store', [@$store->slug])}}">
                                                    <img width="224" height="197" alt="" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="{{ asset('asset/img/i.jpg') }}">
                                                    <h2 class="woocommerce-loop-product__title text-capitalize text-truncate pb-0 text-capitalize text-text-truncate">Mosaic African Food</h2>
                                                    <small class="text-capitalize text-truncate pt-0 d-block">{{@$store->products}}100 Products</small>

                                                        <a class="button" href="{{url('/store/shoprite')}}">10km Away</a>

                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{url('/store/shoprite')}}">Visit Store</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                      {{--  @endforeach --}}




                                    </div>
                                    <!-- .products -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .tab-pane -->
                        </div>
                        <!-- .tab-content -->

                        <!-- .shop-control-bar-bottom -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
                <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                    <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories" id="techmarket_product_categories_widget-2">
                        <ul class="product-categories ">
                            <li class="product_cat">
                                <span>Browse By Categories</span>
                                <ul class="dropright">
                                    <li>
                                        <span class="text-capitalize"  aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                            <a href="{{url('/stores') . '?' . http_build_query(['category_name' => ''])}}" class="">
                                                All Stores
                                            </a>
                                        </span>
                                    </li>

                                    @foreach($categories as $category)
                                        <li>
                                            <span class="text-capitalize" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                                <a href="{{url('/stores') . '?' . http_build_query(['category_name' => $category->name])}}" class="">
                                                    {{$category->name}}
                                                </a>
                                            </span>
                                        </li>
                                    @endforeach


                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="widget widget_techmarket_products_carousel_widget">
                        <section id="single-sidebar-carousel" class="section-products-carousel">
                            <header class="section-header">
                                <h2 class="section-title">Latest Products</h2>
                                <nav class="custom-slick-nav"></nav>
                            </header>
                            <!-- .section-header -->
                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                                <div class="container-fluid">
                                    <div class="woocommerce columns-1">
                                        <div class="products">
                                            @foreach($products->take(8) as $product)
                                                <div class="landscape-product-widget product">
                                                    <a class="woocommerce-LoopProduct-link" href="{{url('/product', [$product->slug])}}">
                                                        <div class="media">
                                                            <img class="wp-post-image" src="{{ asset('asset/img/33.jpg') }}" alt="">
                                                            <div class="media-body">
                                                                {!!$product->price_html()!!}
                                                                <!-- .price -->
                                                                <h2 class="woocommerce-loop-product__title text-capitalize">{{$product->name}}</h2>
                                                                <!-- .techmarket-product-rating -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .container-fluid -->
                            </div>
                            <!-- .products-carousel -->
                        </section>
                        <!-- .section-products-carousel -->
                    </div>
                    <!-- .widget_techmarket_products_carousel_widget -->
                </div>







                <div id="tertiary" class="widget-area shop-sidebar" role="complementary">
                    <div class="widget widget_techmarket_products_carousel_widget">
                        <section class="section-products-carousel">
                            <header class="section-header">
                                <h2 class="section-title">Featured Products</h2>
                            </header>
                            <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:6,&quot;slidesPerRow&quot;:1,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false}">
                                <div class="container-fluid">
                                    <div class="woocommerce columns-1">
                                        <div class="products">
                                            @foreach($products->take(8) as $product)
                                                <div class="product">
                                                    <a href="{{url('/product', [$product->slug])}}" class="woocommerce-LoopProduct-link">
                                                        <img src="{{ asset('asset/img/33.jpg') }}" width="224" height="197" class="wp-post-image" alt="">
                                                        <span class="price">
                                                            {!!$product->price_html()!!}
                                                        </span>
                                                        <!-- /.price -->
                                                        <h2 class="woocommerce-loop-product__title text-truncate text-capitalize">{{$product->name}}</h2>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>












            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->
    </div>
@endsection
