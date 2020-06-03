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
                                    <h1 class="entry-title">All Agents</h1>
                                    <a href="{{url('/agent/become_an_agent')}}" class="btn btn-primary">Become An Agent</a> 
                                </div><br>
                            </header>
                            <div class="entry-content">
                            
                                <div class="woocommerce">
                                    <div class="woocommerce-order">
                                        <section class="woocommerce-order-details">
                                            

                                            <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                <thead>
                                                    <tr>
                                                        <th class="woocommerce-table__product-name product-name">First Name</th>
                                                        <th class="woocommerce-table__product-name product-name">Other Names</th>
                                                        <th class="woocommerce-table__product-name product-name">State</th>
                                                        <th class="woocommerce-table__product-name product-name">Area</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach($agents as $agent)
                                                        @if($agent->agent_detail->status == 'enabled')
                                                            <tr>
                                                                <td class="woocommerce-table__product-total product-total text-capitalize">{{$agent->first_name}}</td>
                                                                <td class="woocommerce-table__product-total product-total text-capitalize">{{$agent->other_names}}</td>
                                                                <td class="woocommerce-table__product-total product-total text-capitalize">{{$agent->addresses->first()->area->name}}</td>
                                                                <td class="woocommerce-table__product-total product-total text-capitalize">{{$agent->addresses->first()->state->name}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                </tbody>

                                                <tfoot>
                                                    <tr>
                                                        <th class="woocommerce-table__product-name product-name">First Name</th>
                                                        <th class="woocommerce-table__product-name product-name">Other Names</th>
                                                        <th class="woocommerce-table__product-name product-name">State</th>
                                                        <th class="woocommerce-table__product-name product-name">Area</th>
                                                    </tr>
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