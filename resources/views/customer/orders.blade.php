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
                                    <header class="entry-header text-center">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">My Orders</h1>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                                <section class="woocommerce-order-details">

                                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                        <thead>
                                                            <tr>
                                                                <th class="woocommerce-table__product-name product-name">Order ID</th>
                                                                <th class="woocommerce-table__product-name product-name">Date</th>
                                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                                                <th class="woocommerce-table__product-table product-total">View Details</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach($orders as $order)
                                                                <tr class="woocommerce-table__line-item order_item">

                                                                    <td class="woocommerce-table__product-name product-name">
                                                                        <a href="javascript:void(0)">#{{$order->id}}</a>
                                                                    </td>

                                                                    <td class="woocommerce-table__product-total product-total">
                                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>{{$order->created_at}}</span>  
                                                                    </td>

                                                                    <td class="woocommerce-table__product-name product-name">
                                                                        <a href="single-product-fullwidth.html"></span>{{number_format($order->grand_total(), 2)}}</span> </a>
                                                                    </td>

                                                                    <td class="woocommerce-table__product-total product-total">
                                                                        <a class="checkout-button button alt wc-forward bg-danger" href="{{ url('/order_details', [$order->id]) }}"> View Details </a>
                                                                    </td>

                                                                </tr>
                                                            @endforeach



                                                        </tbody>

                                                        <tfoot>
                                                        </tfoot>
                                                    </table>
                                                    <!-- .woocommerce-table -->
                                                </section>
                                                <!-- .woocommerce-order-details -->

                                        
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