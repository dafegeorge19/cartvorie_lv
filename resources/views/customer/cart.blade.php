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
                                                    <!-- <div class="cart_totals">
                                                        <h2>Cart totals</h2>
                                                        <div id="cart_totals" style="display: none"> -->
                                                            <!-- <table class="shop_table shop_table_responsive"> -->
                                                                <tbody class="text-dark">
                                                                    <tr class="cart-subtotal">
                                                                        <th>Subtotal</th>
                                                                        <td data-title="Subtotal">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span><span id="subtotal"></span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Shipping</th>
                                                                        <td data-title="Subtotal">
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">$</span><span id="delivery"></span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="order-total">
                                                                        <th>Total</th>
                                                                        <td data-title="Total">
                                                                            <strong>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">$</span> <span id="total_fee"></span></span>
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!-- .shop_table shop_table_responsive -->

                                                            <!-- <div class="wc-proceed-to-checkout"> -->

                                                                <!-- .wc-proceed-to-checkout -->
                                                                <!-- <a class="checkout-button button alt wc-forward" href="{{url('/checkout')}}"> -->
                                                                    <!-- Proceed to checkout</a>
                                                            </div> -->
                                                            <!-- .wc-proceed-to-checkout -->
                                                        <!-- </div> -->
                                                    <!-- </div> -->
                                                    <!-- .cart_totals -->


                                                    <div class="woocommerce-billing-fields border text-center pt-3">
                                                        <h4>Payment Method</h4>
                                                        <div class="row p-3 text-black" style="color:#333">
                                                          <div class="col-lg-6">
                                                            <div class="input-group mb-3 border rounded" style="border-color: #662e91 !important">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" style="background: #f8f9fa; color: #662e91" id="basic-addon1"><i class="fa fa-credit-card"></i> </span>
                                                              </div>
                                                              <a href="{{url('/payment_information')}}"><button type="text" class="form-control btn-light" placeholder="Card" aria-label="Card" aria-describedby="basic-addon1">
                                                                Card
                                                              </button></a>
                                                            </div>

                                                          </div>
                                                          <div class="col-lg-6">
                                                            <div class="input-group mb-3 border rounded" style="border-color: #662e91 !important">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" style="background: #f8f9fa;color: #662e91" id="basic-addon1">$</span>
                                                              </div>
                                                              <button class="form-control btn-light" placeholder="Cash" aria-label="Cash" aria-describedby="basic-addon1">
                                                                Cash
                                                              </button>
                                                            </div>
                                                            <small>Pay with cash and save on your order</small>

                                                          </div>
                                                          </div>

                                                          <div class="row text-left justify-content-center" style="color:#333">
                                                            <h5>Payment Details</h5>
                                                            <div class="col-12">

                                                              <div class="col-12 d-flex justify-content-between">
                                                                <span><b>Items</b></span>
                                                                <span class="ml-0 mr-0">1</span>
                                                              </div>
                                                              <div class="col-12 d-flex justify-content-between">
                                                                <span><b>Total</b></span>
                                                                <span class="ml-0 mr-0">$127.99</span>
                                                              </div>
                                                              <div class="col-12 d-flex justify-content-between">
                                                                <span><b>Tax</b> <br>(13% of the order) </span>
                                                                <span class="ml-0 mr-0">$4</span>
                                                              </div>
                                                              <div class="col-12 d-flex justify-content-between">
                                                                <span><b>Delivery fee</b> </span>
                                                                <span class="ml-0 mr-0">$10</span>
                                                              </div>
                                                              <div class="col-12 d-flex justify-content-between">
                                                                <span><b>Service fee</b> <br>
                                                                  (Service fee help support the maintainace for the app, web, support staff) </span>
                                                                  <span class="m-auto ml-0 mr-0">$2.32</span>
                                                                </div>
                                                                <div class="col-12 d-flex pt-4 justify-content-between">
                                                                  <span><b><h5>Grand Total</h5></b></span>
                                                                  <span class=""><h3><b>$144.31</b></h3></span>
                                                                </div>
                                                              </div>

                                                            </div>
                                                            <div class="col-12 mt-4 mb-4 col-md-12 text-center">
                                                              <button id="paybutton" type="button" class="btn btn-sm btn-primary" name="button">
                                                                Pay
                                                              </button>

                                                          </div>
                                                        </div>

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
