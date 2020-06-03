@extends('layouts.customer')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<h3>My Orders</h3>
	</div>
</div>

<!-- /new_arrivals --> 
<div class=""> 
	<div class="container">	
		<div id="horizontalTab">
			<div class="resp-tabs-container">
				<!--/tab_one-->
				<div class="tab1">
                    @foreach($orders as $order)
                        <div class="col-md-6 text-left" style="padding: 10px">
                            <div class="men-pro-item" style="height: 200px">
                                <div class="item-info-product " style="text-align: left !important; padding: 20px 10px 10px 10px">
                                    <h5>Order ID: #{{ $order->id}}</h5>
                                    <p><strong>Date:</strong> {{ $order->created_at}} </p>
                                    <p><strong>Products Amount:</strong> ₦{{ $order->total_products_amount}} </p>
                                    <p><strong>Delivery Fee:</strong> ₦{{ $order->delivery_fee }} </p>
                                    <p><strong>Delivery Address:</strong> {{ $order->delivery_street_address }}, {{ $order->area->name }}, {{ $order->state->name }} </p>
                                    <p><strong>Items:</strong>
                                        @foreach($order->order_items as $order_items)
                                            {{$order_items->product->name}} X {{$order_items->quantity}},
                                        @endforeach
                                     </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

					<br>
					<div class="clearfix"></div>

					<div class="text-center" style="">
						<br/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- //new_arrivals --> 


@endsection