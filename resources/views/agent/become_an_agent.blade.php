@extends('layouts.customer')
@section('body-class', 'woocommerce-active right-sidebar')



@section('content')

<br>
<br>



            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
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
                    <div class="row">
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">
                                    <header class="entry-header text-center">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Become an agent</h1>
                                        </div>
                                    </header>
                                    <form method="POST" action="{{ url('/agent/store_agent') }}" enctype="multipart/form-data" class="checkout woocommerce-checkout">
                                    @csrf
                                        
                                        <div class="woocommerce-billing-fields">
                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                <div class="woocommerce-billing-fields__field-wrapper">


                                                    <p id="billing_first_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_first_name">First Name
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('first_name')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="text" class="input-text @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter agents's first name" value="{{ old('first_name') }}" required autofocus>
                                                    </p>
                                                    


                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_last_name">Other Names
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('other_names')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="text" class="input-text @error('other_names') is-invalid @enderror" id="other_names" name="other_names" placeholder="Enter agent's other names" value="{{ old('other_names') }}" required>
                                                    </p>
                                                    
                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_first_name">Phone Number
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('phone_number')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="text" class="input-text @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Enter agent's phone number" value="{{ old('phone_number') }}" required>
                                                    </p>

                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_last_name">Email
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('email')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="email" class="input-text @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter agent's e-mail" value="{{ old('email') }}" required>
                                                    </p>

                                                    <p id="billing_first_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_country">State
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('state')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <select id="state" name="state" 
                                                        class="@error('state') is-invalid @enderror" required>
                                                        <option>Select State</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                        </select>
                                                    </p>

                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_country">Area
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('area')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <select id="area" name="area"  class="@error('state') is-invalid @enderror" required disabled>
                                                            <option>Select Area</option>
                                                        </select>
                                                    </p>


                                                    <p id="billing_first_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_first_name">Street Address
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('street_address')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="text" id="street_address" name="street_address" placeholder="e.g No 1, Kudang Street" value="{{ old('street_address') }}" required class="input-text ">
                                                    </p>

                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_last_name">Password
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('password')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="password" name="password" required class="input-text">
                                                    </p>

                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_last_name">Confirm Password
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <input type="password" name="password_confirmation" required class="input-text">
                                                    </p>

                                                    <p id="billing_first_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_first_name">Your CV
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('cv')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="file" value="" name="cv" class="input-text " accept=".pdf, .doc, .docx" required>
                                                    </p>

                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                        <label class="" for="billing_last_name">Your Picture
                                                            <abbr title="required" class="required">*</abbr>

                                                            @error('image')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </label>
                                                        <input type="file" accept=".png, .jpg, .jpeg" name="image" class="input-text" required>
                                                    </p>

                                                </div>
                                            </div>
                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                        </div>

                                        <button type="submit" class="checkout-button button alt wc-forward bg-danger" href="checkout.html"> Submit </button>
                                        
                                    </form>
                                </div>
                            </main>
                        </div>
                        <!-- #primary -->
                        <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                            <div class="widget widget_techmarket_products_carousel_widget">
                                <section id="single-sidebar-carousel" class="section-products-carousel">
                                    <header class="section-header">
                                        <h2 class="section-title">Latest Products</h2>
                                        <nav class="custom-slick-nav"></nav>
                                    </header>


                                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;rows&quot;:6,&quot;slidesPerRow&quot;:1,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false}">
                                        <div class="container-fluid">
                                            <div class="woocommerce columns-1">
                                                <div class="products">

                                                    @foreach($products->take(3) as $product)
                                                        <div class="product">
                                                            <a href="{{url('/product', [$product->slug])}}" class="woocommerce-LoopProduct-link">
                                                                <img src="{{ asset('storage/uploads/products/images/'.$product->get_product_image(1)) }}" width="224" height="197" class="wp-post-image" alt="">
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
                                <!-- .section-products-carousel -->
                            </div>
                            <!-- .widget_techmarket_products_carousel_widget -->
                        </div>
                        <!-- .shop-sidebar -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
@endsection
