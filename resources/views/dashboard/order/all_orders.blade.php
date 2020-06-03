@extends('layouts.dashboard')

@section('title', 'All Orders')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                
              <table id="example1" class="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Billing Name</th>
                        <th>Billing Address</th>
                        <th>Billing Phone</th>
                        <th>Billing Email</th>
                        <th>Delivery Name</th>
                        <th>Delivery Address</th>
                        <th>Delivery Phone</th>
                        <th>Delivery Email</th>
                        <th>Total Products Weight (kg)</th>
                        <th>Delivery Fee (₦)</th>
                        <th>Product Amount (₦)</th>
                        <th>Payment Type</th>
                        <th>Payment Ref</th>
                        <th>Delivery Status</th>
                        <th>View Products</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="text-capitalize">
                            <td>{{ $order->billing_first_name . ' ' . $order->billing_other_names }}</td>
                            <td>{{ $order->get_billing_address() }}</td>
                            <td>{{ $order->billing_phone_number }}</td>
                            <td>{{ $order->billing_email }}</td>
                            <td>{{ $order->delivery_first_name . ' ' . $order->delivery_other_names }}</td>
                            <td>{{ $order->get_delivery_address() }}</td>
                            <td>{{ $order->delivery_phone_number }}</td>
                            <td>{{ $order->delivery_email }}</td>
                            <td>{{ $order->total_products_weight }}</td>
                            <td>{{ $order->delivery_fee }}</td>
                            <td>{{ $order->total_products_amount }}</td>
                            <td>{{ $order->payment_type }}</td>
                            <td>{{ $order->paystack_payment_ref }}</td>
                            <td>
                                @if($order->delivered_at)
                                    <button class="btn btn-secondary btn-sm" >Delivered</button>
                                @else
                                    <a href="{{ url('/admin/order_delivered', [$order->id]) }}" class="btn btn-primary btn-sm">Mark as Delivered</a>
                                @endif
                            </td>
                            <td>

                                @php 
                                    $items_holder = '';
                                    foreach($order->order_items as $item){
                                        $items_holder .= '**';
                                        $items_holder .= $item->product_name . '||';
                                        $items_holder .= $item->product_weight . '||';
                                        $items_holder .= $item->unit_price . '||';
                                        $items_holder .= $item->quantity . '||';
                                        $items_holder .= $item->product->slug . '||';
                                    }
                                @endphp

                                <button class="btn btn-primary btn-sm view_products" data-order_items="{{$items_holder}}">View Products</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                    <th>Billing Name</th>
                        <th>Billing Address</th>
                        <th>Billing Phone</th>
                        <th>Billing Email</th>
                        <th>Delivery Name</th>
                        <th>Delivery Address</th>
                        <th>Delivery Phone</th>
                        <th>Delivery Email</th>
                        <th>Total Products Weight (kg)</th>
                        <th>Delivery Fee (₦)</th>
                        <th>Product Amount (₦)</th>
                        <th>Payment Type</th>
                        <th>Payment Ref</th>
                        <th>Delivery Status</th>
                        <th>View Products</th>
                    </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$orders}}
              </div>
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


<!-- view products modal -->
  <div class="modal fade" id="view_products_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Weight</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Amount</th>
                </tr>
            </thead>
            <tbody id="order_items">
                
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end view products modal -->

@endsection

@section('js')
<script>



  const base_url = '{{ url('/') }}'
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.view_products').on('click', function() {
        $('#order_items').empty()
        let order_items = $(this).data('order_items')
        let items_array = order_items.split("**");

        items_array.forEach(function (item_dateil, item_dateil_index) {
            if(item_dateil != '') {

                let item_dateil_array = item_dateil.split('||')

                let order_item_html =   `<tr >
                                            <td><a href="`+ base_url +`/product/`+ item_dateil_array[4] +`" target="_blank">`+ item_dateil_array[0] +`</td>
                                            <td>`+ item_dateil_array[1] +`</td>
                                            <td>`+ item_dateil_array[2] +`</td>
                                            <td>`+ item_dateil_array[3] +`</td>
                                            <td>`+ parseFloat(item_dateil_array[2]) * parseFloat(item_dateil_array[3]) +`</td>
                                        </tr>`
                $('#order_items').append(order_item_html)
            }
            
        })

        $('#view_products_modal').modal('show')
    })
})
</script>
@endsection