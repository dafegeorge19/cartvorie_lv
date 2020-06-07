@extends('layouts.customer')
@section('body-class', 'woocommerce-active page-template-default woocommerce-checkout woocommerce-page can-uppercase')



@section('content')
<br>
<br>

            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <!-- .woocommerce-breadcrumb -->
                        <div class="content-area" id="primary">
                            <main class="site-main" id="main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">

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

                                            @auth
                                                <div class="woocommerce-info">You are login as <span class="text-capitalize">{{auth::user()->getFullNameAttribute() }}</span>, not you?<a href="{{ url('/checkout_logout') }}"> Logout</a>
                                                </div>
                                            @endauth

                                            @guest
                                                <div class="woocommerce-info">Returning customer? <a data-toggle="collapse" href="#login-form" aria-expanded="false" aria-controls="login-form" class="showlogin">Click here to login</a>
                                                </div>
                                                <div class="collapse" id="login-form">
                                                    <form method="post" class="woocomerce-form woocommerce-form-login login" action="{{ url('/checkout_login') }}">
                                                    @csrf
                                                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                                        <p class="form-row form-row-first">
                                                            <label for="email">Email
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input type="email" id="email" name="email" class="input-text" required>
                                                        </p>
                                                        <p class="form-row form-row-last">
                                                            <label for="password">Password
                                                                <span class="required">*</span>
                                                            </label>
                                                            <input type="password" id="password" name="password" class="input-text" required>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p class="form-row">
                                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                                <input type="checkbox" value="rememberme" id="rememberme" name="rememberme" class="woocommerce-form__input woocommerce-form__input-checkbox">
                                                                <span>Remember me</span>
                                                            </label>&nbsp;&nbsp;
                                                            <input type="submit" value="Login" name="login" class="button">

                                                        </p>
                                                        <p class="lost_password">
                                                            <a href="{{ route('password.request') }}">Lost your password?</a>
                                                        </p>
                                                        <div class="clear"></div>
                                                    </form>
                                                </div>
                                                <!-- .collapse -->
                                            @endguest





                                            <form action="#" class="checkout woocommerce-checkout justify-content-center" method="post" name="checkout">
                                                <div id="customer_details" class="col2-set">
                                                    <div class="col-1">
                                                        <div class="woocommerce-billing-fields border text-center pt-3">
                                                          <h4>Payment Method</h4>
                                                          <div class="row p-3 text-black" style="color:#333">
                                                            <div class="col-lg-6 m-auto">
                                                              <div class="input-group mb-3 border rounded" style="border-color: #662e91 !important">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text" style="background: #f8f9fa; color: #662e91" id="basic-addon1"><i class="fa fa-credit-card"></i> </span>
                                                                </div>
                                                                <button type="text" class="form-control btn-light" placeholder="Card" aria-label="Card" aria-describedby="basic-addon1">
                                                                  Card
                                                                </button>
                                                              </div>

                                                            </div>
                                                            <div class="col-lg-6 m-auto">
                                                              <div class="input-group mb-3 border rounded" style="border-color: #662e91 !important">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text" style="background: #f8f9fa;color: #662e91" id="basic-addon1">$</span>
                                                                </div>
                                                                <button class="form-control btn-light" placeholder="Cash" aria-label="Cash" aria-describedby="basic-addon1">
                                                                  Cash
                                                                </button>
                                                              </div>
                                                              <span>Pay with cash and save on your order</span>

                                                            </div>
                                                            </div>

                                                              <div class="row text-left p-3 m-2 justify-content-center" style="color:#333">
                                                                <h5>Payment Details</h5>
                                                                <div class="col-10">

                                                                  <div class="col-12 d-flex m-2 justify-content-between">
                                                                    <span><b>Items</b></span>
                                                                    <span class="p-2">5</span>
                                                                  </div>
                                                                  <div class="col-12 d-flex m-2 justify-content-between">
                                                                    <span><b>Total</b></span>
                                                                    <span class="p-2">$29</span>
                                                                  </div>
                                                                  <div class="col-12 d-flex m-2 justify-content-between">
                                                                    <span><b>Tax</b> <br>(13% of the order) </span>
                                                                    <span class="p-2">$4</span>
                                                                  </div>
                                                                  <div class="col-12 d-flex m-2 justify-content-between">
                                                                    <span><b>Delivery fee</b> </span>
                                                                    <span class="p-2">$10</span>
                                                                  </div>
                                                                  <div class="col-12 d-flex m-2 justify-content-between">
                                                                    <span><b>Service fee</b> <br>
                                                                      (Service fee help support the maintainace for the app, web, support staff) </span>
                                                                      <span class="p-2">$2.32</span>
                                                                    </div>
                                                                    <div class="col-12 d-flex m-2 justify-content-between">
                                                                      <span>Grand Total</span>
                                                                      <span class="p-2"><h3><b>$41.32</b></h3></span>
                                                                    </div>
                                                                  </div>

                                                                </div>
                                                                <div class="col-12 mt-4 mb-4 col-md-12 text-center">
                                                                  <a href="checkout"><button type="button" class="btn btn-sm btn-primary" name="button">
                                                                    Pay
                                                                  </button></a>

                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                        <!-- .woocommerce-account-fields -->
                                                    </div>
                                                    <!-- .col-1 -->

                                                <!-- .col2-set -->
                                                  <!-- .woocommerce-checkout-review-order -->
                                            </form>
                                            <!-- .woocommerce-checkout -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                                <!-- #post-## -->
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

@section('js')

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){ //when the page as completed loading start getting restaurant

    console.log('here')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        // when user selects a new satte, get the cities for that state
        $('.state_set').on('change', function(e) {

            let state_id = $(this).val();
            let output = $(this).data('output_area');
            console.log(output)

          $('#' + output).attr('disabled', 'disabled')
          $('#' + output).empty()
          $('#' + output).append(`<option value="" class="text-capitalize">Select Area</option>`)



          $.ajax({
            type: 'POST',
            url: "{{ url('/get_state_areas')}}",
            data: {id: state_id},
            dataType: 'json',

            success: function (areas) {

              console.log(areas)


              if(Object.keys(areas).length > 0 ) {

                for(key in areas) {

                  if(areas.hasOwnProperty(key)) {

                    let area_id = areas[key]['id']
                    let area_name = areas[key]['name']

                    $('#' + output).append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                  }
                }

              $('#' + output).removeAttr('disabled')


              }
            },

            error: function (data) {
               console.log('Error:', data);
            }
          });

        })

  })
</script>
@endsection
