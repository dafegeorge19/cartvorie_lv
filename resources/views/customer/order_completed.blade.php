@extends('layouts.customer')
@section('body-class', 'page-template-default woocommerce-checkout woocommerce-page woocommerce-order-received can-uppercase woocommerce-active')



@section('content')

<br>
<br>

            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">

                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                        
                                                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>

                                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                                    <li class="woocommerce-order-overview__order order">
                                                        Order ID:<strong>{{$order_details->id}}</strong>
                                                    </li>

                                                    <li class="woocommerce-order-overview__date date">
                                                        Date:<strong>{{$order_details->created_at}}</strong>
                                                    </li>

                                                    
                                                    <li class="woocommerce-order-overview__total total">
                                                        Grand Total:<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_details->grand_total(), 2)}}</span></strong>
                                                    </li>

                                                    <li class="woocommerce-order-overview__payment-method method">
                                                            Payment method: <strong>{{$order_details->payment_method()}}</strong>
                                                    </li>
                                                    
                                                </ul>
                                                <!-- .woocommerce-order-overview -->

                                            
                                                <section class="woocommerce-order-details">
                                                    <h2 class="woocommerce-order-details__title">Order details</h2>

                                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                        <thead>
                                                            <tr>
                                                                <th class="woocommerce-table__product-name product-name">Product</th>
                                                                <th class="woocommerce-table__product-table product-total">Unit Price</th>
                                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($order_details->order_items as $order_item)
                                                                <tr class="woocommerce-table__line-item order_item">

                                                                    <td class="woocommerce-table__product-name product-name text-capitalize">
                                                                        <a href="single-product-fullwidth.html">{{$order_item->product_name}}</a> 
                                                                        <strong class="product-quantity">× {{$order_item->quantity}}</strong>
                                                                    </td>

                                                                    <td class="woocommerce-table__product-total product-total">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_item->unit_price, 2)}}</span>  
                                                                    </td>

                                                                    <td class="woocommerce-table__product-total product-total">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_item->item_total(), 2)}}</span>  
                                                                    </td>

                                                                </tr>
                                                            @endforeach

                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <th scope="row">Subtotal:</th>
                                                                <th scope="row"></th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_details->subtotal(), 2) }}</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Delivery Fee:</th>
                                                                <th scope="row"></th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_details->delivery_fee, 2)}}</span>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Grand Total:</th>
                                                                <th scope="row"></th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₦</span>{{number_format($order_details->grand_total(), 2)}}</span></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!-- .woocommerce-table -->
                                                </section>
                                                <!-- .woocommerce-order-details -->

                                                @auth
                                                <div class="text-center">
                                                    <a href="{{url('/orders')}}" class="button">My Orders</a>
                                                </div>
                                                @endauth
                                                

                                        
                                            </div>
                                            <!-- .woocommerce-order -->
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