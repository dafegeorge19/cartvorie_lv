@extends('layouts.customer')
@section('body-class', 'woocommerce-active single-product full-width normal')



@section('content')
<br>
<br>

            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="product product-type-simple">
                                    <div class="single-product-wrapper">
                                        <div class="product-images-wrapper thumb-count-4">
                                            <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
                                                <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                                        <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                                        <figure class="woocommerce-product-gallery__wrapper ">
                                                            @if($product->get_product_image(1) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(1)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(1)) }}" tabindex="0">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(1)) }}" class="attachment-shop_single size-shop_single wp-post-image" alt="">
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            @if($product->get_product_image(2) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(2)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(2)) }}" tabindex="-1">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(2)) }}" class="attachment-shop_single size-shop_single" alt="">
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            @if($product->get_product_image(3) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(3)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(3)) }}" tabindex="-1">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(3)) }}" class="attachment-shop_single size-shop_single" alt="">
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            @if($product->get_product_image(5) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(4)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(4)) }}" tabindex="-1">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(4)) }}" class="attachment-shop_single size-shop_single" alt=""> </a>
                                                                </div>
                                                            @endif

                                                            @if($product->get_product_image(5) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(5)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(5)) }}" tabindex="-1">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(5)) }}" class="attachment-shop_single size-shop_single" alt="">
                                                                    </a>
                                                                </div>
                                                            @endif

                                                            @if($product->get_product_image(6) != 'avatar.png')
                                                                <div data-thumb="{{ asset('storage/uploads/products/images/'.$product->get_product_image(6)) }}" class="woocommerce-product-gallery__image">
                                                                    <a href="{{ asset('storage/uploads/products/images/'.$product->get_product_image(6)) }}" tabindex="-1">
                                                                        <img width="600" height="600" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(6)) }}" class="attachment-shop_single size-shop_single" alt="">
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </figure>
                                                    </div>
                                                    <!-- .woocommerce-product-gallery -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-images -->
                                                <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                                    <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                                                        @if($product->get_product_image(1) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/sm-card-1.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(1)) }}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="">
                                                            </figure>
                                                        @endif

                                                        @if($product->get_product_image(2) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/sm-card-3.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(2)) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                            </figure>
                                                        @endif

                                                        @if($product->get_product_image(3) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/sm-card-2.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(3)) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                            </figure>
                                                        @endif

                                                        @if($product->get_product_image(4) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/big-4.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(4)) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                            </figure>
                                                        @endif

                                                        @if($product->get_product_image(5) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/sm-card-2.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(5)) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                            </figure>
                                                        @endif

                                                        @if($product->get_product_image(6) != 'avatar.png')
                                                            <figure data-thumb="{{ asset('customer/images/products/sm-card-2.jpg') }}" class="techmarket-wc-product-gallery__image">
                                                                <img width="180" height="180" src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(6)) }}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                            </figure>
                                                        @endif
                                                    </figure>
                                                    <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                                </div>
                                                <!-- .techmarket-single-product-gallery-thumbnails -->
                                            </div>
                                            <!-- .techmarket-single-product-gallery -->
                                        </div>
                                        <!-- .product-images-wrapper -->
                                        <div class="summary entry-summary">
                                            <div class="single-product-header">
                                                <h1 class="product_title entry-title text-capitalize text-truncate">{{$product->name}}</h1>
                                                
                                            </div>
                                            <!-- .single-product-header -->
                                            <div class="single-product-meta">
                                                <div class="brand">
                                                    <a href="{{ url('products?category_name='.$product->category->name) }}">
                                                        <img width="40px" alt="galaxy" src="{{ asset('storage/uploads/categories/images/' . $product->category->get_image()) }}">
                                                    </a>
                                                </div>
                                                <div class="cat-and-sku">
                                                    <span class="posted_in categories">
                                                        <a rel="tag" href="product-category.html">{{$product->category->name}} / {{$product->type->name}}</a>
                                                    </span>
                                                    <span class="sku_wrapper">#{{$product->id}}
                                                    </span>
                                                </div>
                                                <div class="product-label">
                                                </div>
                                            </div>
                                            <!-- .single-product-meta -->
                                            <div class="rating-and-sharing-wrapper">
                                                <div class="woocommerce-product-rating">
                                                    <div class="star-rating">
                                                        <span style="width:100%">Rated
                                                            <strong class="rating">5.00</strong> out of 5 based on
                                                            <span class="rating">1</span> customer rating</span>
                                                    </div>
                                                    <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span class="count">1</span> customer review)</a>
                                                </div>
                                            </div>
                                            <!-- .rating-and-sharing-wrapper -->
                                            <div class="woocommerce-product-details__short-description">
                                                <p>{{$product->description}}</p>
                                            </div>
                                            <!-- .woocommerce-product-details__short-description -->
                                            <div class="product-actions-wrapper">
                                                <div class="product-actions">
                                                    <p class="price">
                                                        @if($product->sales_price)
                                                        <del>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">₦</span>{{$product->price}}</span>
                                                        </del>
                                                        @endif
                                                        <ins>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">₦</span>{{$product->product_price()}}</span>
                                                        </ins>
                                                    </p>
                                                    <!-- .single-product-header -->
                                                    <form class="cart">
                                                        <!-- .quantity -->
                                                        <button class="single_add_to_cart_button button alt" name="add-to-cart" type="button" onclick="add_to_cart({{$product->id}})">Add to cart</button>
                                                    </form>
                                                    <!-- .cart -->
                                                    <a class="" href="{{ url('/store', [$product->supermarket->slug]) }}">Go to store</a>
                                                </div>
                                                <!-- .product-actions -->
                                            </div>
                                            <!-- .product-actions-wrapper -->
                                        </div>
                                        <!-- .entry-summary -->
                                    </div>





                                    <!-- .single-product-wrapper -->
                                    <div class="tm-related-products-carousel section-products-carousel" id="tm-related-products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#tm-related-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                        <section class="related">
                                            <header class="section-header">
                                                <h2 class="section-title">Related products</h2>
                                                <nav class="custom-slick-nav"></nav>
                                            </header>
                                            <!-- .section-header -->
                                            <div class="products">


                                                @foreach($product->category->products->take(10) as $related_product)
                                                    @if($product->id == $related_product->id)
                                                        @continue
                                                    @endif
                                                    <div class="product">
                                                        <a href="{{ url('/product/'.$related_product->slug) }}" class="woocommerce-LoopProduct-link">
                                                            <img src="{{ asset('storage/uploads/products/images/'.$related_product->get_product_image(1)) }}" width="224" height="197" class="wp-post-image" alt="">
                                                            <h2 class="woocommerce-loop-product__title">{{$related_product->name}}</h2>
                                                            {!!$related_product->price_html()!!}
                                                            <!-- /.price -->
                                                            
                                                        </a>
                                                        <div class="hover-area">
                                                            <a class="button add_to_cart_button" href="javascript:viod(0)" rel="nofollow" onclick="add_to_cart({{$related_product->id}})">Add to cart</a>
                                                            <small class="d-block">{{ $related_product->get_address()['area'] . ', ' .$related_product->get_address()['state']}}</small>
                                                            <a class="" href="{{url('/store', [$related_product->supermarket->slug])}}">Visit Store</a>
                                                        </div>
                                                    </div>
                                                    <!-- /.product-outer -->
                                                @endforeach
                                            </div>
                                        </section>
                                        <!-- .single-product-wrapper -->
                                    </div>
                                    <!-- .tm-related-products-carousel -->

                                    <div class="woocommerce-tabs wc-tabs-wrapper d-none">
                                        <!-- /.ec-tabs -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-reviews" role="tabpanel">
                                                <div class="techmarket-advanced-reviews" id="reviews">
                                                    <div class="advanced-review row">
                                                        <div class="advanced-review-rating">
                                                            <h2 class="based-title">Review (1)</h2>
                                                            <div class="avg-rating">
                                                                <span class="avg-rating-number">5.0</span>
                                                                <div title="Rated 5.0 out of 5" class="star-rating">
                                                                    <span style="width:100%"></span>
                                                                </div>
                                                            </div>
                                                            <!-- /.avg-rating -->
                                                            <div class="rating-histogram">
                                                                <div class="rating-bar">
                                                                    <div title="Rated 5 out of 5" class="star-rating">
                                                                        <span style="width:100%"></span>
                                                                    </div>
                                                                    <div class="rating-count">1</div>
                                                                    <div class="rating-percentage-bar">
                                                                        <span class="rating-percentage" style="width:100%"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-bar">
                                                                    <div title="Rated 4 out of 5" class="star-rating">
                                                                        <span style="width:80%"></span>
                                                                    </div>
                                                                    <div class="rating-count zero">0</div>
                                                                    <div class="rating-percentage-bar">
                                                                        <span class="rating-percentage" style="width:0%"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-bar">
                                                                    <div title="Rated 3 out of 5" class="star-rating">
                                                                        <span style="width:60%"></span>
                                                                    </div>
                                                                    <div class="rating-count zero">0</div>
                                                                    <div class="rating-percentage-bar">
                                                                        <span class="rating-percentage" style="width:0%"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-bar">
                                                                    <div title="Rated 2 out of 5" class="star-rating">
                                                                        <span style="width:40%"></span>
                                                                    </div>
                                                                    <div class="rating-count zero">0</div>
                                                                    <div class="rating-percentage-bar">
                                                                        <span class="rating-percentage" style="width:0%"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="rating-bar">
                                                                    <div title="Rated 1 out of 5" class="star-rating">
                                                                        <span style="width:20%"></span>
                                                                    </div>
                                                                    <div class="rating-count zero">0</div>
                                                                    <div class="rating-percentage-bar">
                                                                        <span class="rating-percentage" style="width:0%"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.rating-histogram -->
                                                        </div>
                                                        <!-- /.advanced-review-rating -->
                                                        <div class="advanced-review-comment">
                                                            <div id="review_form_wrapper">
                                                                <div id="review_form">
                                                                    <div class="comment-respond" id="respond">
                                                                        <h3 class="comment-reply-title" id="reply-title">Add a review</h3>
                                                                        <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                                                                            <div class="comment-form-rating">
                                                                                <label>Your Rating</label>
                                                                                <p class="stars">
                                                                                    <span><a href="#" class="star-1">1</a><a href="#" class="star-2">2</a><a href="#" class="star-3">3</a><a href="#" class="star-4">4</a><a href="#" class="star-5">5</a></span>
                                                                                </p>
                                                                            </div>
                                                                            <p class="comment-form-comment">
                                                                                <label for="comment">Your Review</label>
                                                                                <textarea aria-required="true" rows="8" cols="45" name="comment" id="comment"></textarea>
                                                                            </p>
                                                                            <p class="comment-form-author">
                                                                                <label for="author">Name
                                                                                    <span class="required">*</span>
                                                                                </label>
                                                                                <input type="text" aria-required="true" size="30" value="" name="author" id="author">
                                                                            </p>
                                                                            <p class="comment-form-email">
                                                                                <label for="email">Email
                                                                                    <span class="required">*</span>
                                                                                </label>
                                                                                <input type="text" aria-required="true" size="30" value="" name="email" id="email">
                                                                            </p>
                                                                            <p class="form-submit">
                                                                                <input type="submit" value="Add Review" class="submit" id="submit" name="submit">
                                                                                <input type="hidden" id="comment_post_ID" value="185" name="comment_post_ID">
                                                                                <input type="hidden" value="0" id="comment_parent" name="comment_parent">
                                                                            </p>
                                                                        </form>
                                                                        <!-- /.comment-form -->
                                                                    </div>
                                                                    <!-- /.comment-respond -->
                                                                </div>
                                                                <!-- /#review_form -->
                                                            </div>
                                                            <!-- /#review_form_wrapper -->
                                                        </div>
                                                        <!-- /.advanced-review-comment -->
                                                    </div>
                                                    <!-- /.advanced-review -->
                                                    <div id="comments">
                                                        <ol class="commentlist">
                                                            <li id="li-comment-83" class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                                <div class="comment_container" id="comment-83">
                                                                    <div class="comment-text">
                                                                        <div class="star-rating">
                                                                            <span style="width:100%">Rated
                                                                                <strong class="rating">5</strong> out of 5</span>
                                                                        </div>
                                                                        <p class="meta">
                                                                            <strong itemprop="author" class="woocommerce-review__author">first last</strong>
                                                                            <span class="woocommerce-review__dash">&ndash;</span>
                                                                            <time datetime="2017-06-21T08:05:40+00:00" itemprop="datePublished" class="woocommerce-review__published-date">June 21, 2017</time>
                                                                        </p>
                                                                        <div class="description">
                                                                            <p>Wow great product</p>
                                                                        </div>
                                                                        <!-- /.description -->
                                                                    </div>
                                                                    <!-- /.comment-text -->
                                                                </div>
                                                                <!-- /.comment_container -->
                                                            </li>
                                                            <!-- /.comment -->
                                                        </ol>
                                                        <!-- /.commentlist -->
                                                    </div>
                                                    <!-- /#comments -->
                                                </div>
                                                <!-- /.techmarket-advanced-reviews -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- .product -->
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