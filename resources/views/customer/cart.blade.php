@extends('layouts.customer')
@section('body-class', 'page home page-template-default')



@section('content')
<br>
<br>
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="cart-wrapper">
                                                <form method="post" action="#" class="woocommerce-cart-form">
                                                    <table class="shop_table shop_table_responsive cart">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-price">Price</th>
                                                                <th class="product-quantity">Quantity</th>
                                                                <th class="product-subtotal">Product Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="view_cart"></tbody>
                                                        
                                                    </table>

                                                    <h4 class="text-center" id="no_item" style="display: none">You have no item in cart</h4>
                                                </form>
                                                <!-- .woocommerce-cart-form -->
                                                <div class="cart-collaterals">
                                                    <div class="cart_totals">
                                                        <h2>Cart totals</h2>
                                                        <div id="cart_totals" style="display: none">
                                                            <table class="shop_table shop_table_responsive">
                                                                <tbody>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Subtotal</th>
                                                                        <td data-title="Subtotal">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">₦</span><span id="subtotal"></span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Shipping</th>
                                                                        <td data-title="Subtotal">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">₦</span><span id="delivery"></span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="order-total">
                                                                        <th>Total</th>
                                                                        <td data-title="Total">
                                                                            <strong>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">₦</span> <span id="total_fee"></span></span>
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>  
                                                            <!-- .shop_table shop_table_responsive -->
                                                            <div class="wc-proceed-to-checkout">

                                                                <!-- .wc-proceed-to-checkout -->
                                                                <a class="checkout-button button alt wc-forward" href="{{url('/checkout')}}">
                                                                    Proceed to checkout</a>
                                                            </div>
                                                            <!-- .wc-proceed-to-checkout -->
                                                        </div>
                                                    </div>
                                                    <!-- .cart_totals -->
                                                </div>
                                                <!-- .cart-collaterals -->
                                            </div>
                                            <!-- .cart-wrapper -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- .hentry -->
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