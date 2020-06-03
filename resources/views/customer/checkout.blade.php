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
                                            
                                            
                                            
                                            
                                            
                                            <form action="#" class="checkout woocommerce-checkout" method="post" name="checkout">
                                                <div id="customer_details" class="col2-set">
                                                    <div class="col-1">
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>Billing Details</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p id="billing_first_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_first_name">First Name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="{{ auth::user()->first_name ?? '' }}" placeholder="First Name" id="billing_first_name" name="billing_first_name" class="input-text text-capitalize">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_fn_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_last_name">Other Names
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="{{ auth::user()->other_names ?? '' }}" placeholder="Other Names" id="billing_other_names" name="billing_last_name" class="input-text text-capitalize">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_on_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                    <p id="billing_country_field" class="form-row form-row-wide validate-required validate-email">
                                                                        <label class="" for="billing_country">State
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible text-capitalize state_set" id="billing_state" data-output_area="billing_area" name="shipping_country" tabindex="-1" aria-hidden="true">
                                                                            <option value="">Select State</option>
                                                                            @auth
                                                                                @foreach($states as $state)
                                                                                    @if($state->id == auth::user()->addresses->first()->state_id)
                                                                                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                                                                        @break
                                                                                    @endif
                                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                                @endforeach
                                                                            @else
                                                                                @foreach($states as $state)
                                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                                @endforeach
                                                                            @endauth
                                                                        </select>
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_state_error"></strong>
                                                                        </small>
                                                                    </p>

                                                                    <p id="billing_country_field" class="form-row form-row-wide validate-required validate-email">
                                                                        <label class="" for="billing_country">Area
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible text-capitalize" id="billing_area" name="billing_country" tabindex="-1" aria-hidden="true">
                                                                            <option value="" selected>Select Area</option>
                                                                            @auth
                                                                                @foreach ($areas->where('state_id', auth::user()->addresses->first()->state_id) as $area)
                                                                                    <option value="{{$area->id}}" selected>{{$area->name}}</option>
                                                                                @endforeach
                                                                            @endauth
                                                                        </select>
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_area_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_address_1">Street address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="{{ auth::user() ? auth::user()->addresses->first()->street_address : '' }}" placeholder="Street address" id="billing_street_address" name="billing_address_1" class="input-text text-capitalize">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_sa_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    
                                                                    
                                                                    
                                                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="billing_phone">Phone
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="tel" value="{{ auth::user()->phone_number ?? '' }}" placeholder="Phone Number" id="billing_phone_number" name="billing_phone" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_pn_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_email">Email Address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="email" value="{{ auth::user()->email ?? '' }}" placeholder="Email" id="billing_email" name="billing_email" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="billing_email_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                        </div>
                                                        <!-- .woocommerce-billing-fields -->
                                                        <div class="woocommerce-account-fields">
                                                            @guest
                                                                <p class="form-row form-row-wide woocommerce-validated">
                                                                    <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#createLogin" aria-controls="createLogin">
                                                                        <input type="checkbox" value="1" name="createaccount" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="create_account">
                                                                        <span>Create an account?</span>
                                                                    </label>
                                                                </p>
                                                            
                                                                <div class="create-account collapse" id="createLogin">
                                                                    <p data-priority="" id="account_password_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="account_password">Account password
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="password" value="" placeholder="Password" id="account_password" name="account_password" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="password_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    
                                                                    <div class="clear"></div>
                                                                </div>
                                                            @endguest
                                                        </div>
                                                        <!-- .woocommerce-account-fields -->
                                                    </div>
                                                    <!-- .col-1 -->
                                                    <div class="col-2">
                                                        <div class="woocommerce-shipping-fields">
                                                            <h3 id="ship-to-different-address">
                                                                <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#shipping-address" aria-controls="shipping-address">
                                                                    <input id="deliver_to_diferent_address" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" name="ship_to_different_address">
                                                                    <span>Deliver to a different address?</span>
                                                                </label>
                                                            </h3>
                                                            <div class="shipping_address collapse" id="shipping-address">
                                                                <div class="woocommerce-shipping-fields__field-wrapper">
                                                                    <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                                                        <label class="" for="delivery_first_name">First name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autofocus="autofocus" autocomplete="given-name" value="" placeholder="First Name" id="delivery_first_name" name="delivery_first_name" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_fn_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="shipping_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="shipping_last_name">Other Names
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="family-name" value="" placeholder="" id="delivery_other_names" name="shipping_last_name" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_on_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="billings_country_field" class="form-row form-row-wide validate-required validate-email">
                                                                        <label class="" for="billisng_country">State
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible text-capitalize state_set" id="delivery_state"  name="shipping_country" tabindex="-1" data-output_area="delivery_area" aria-hidden="true">
                                                                            <option value="" selected>Select State</option>
                                                                            @foreach($states as $state)
                                                                                <option value="{{$state->id}}">{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_state_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="shipping_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                                        <label class="" for="shipping_country">Area
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible" id="delivery_area" name="shipping_country" tabindex="-1" aria-hidden="true">
                                                                            <option value="" selected>Select area</option>
                                                                        </select>
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_area_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="shipping_address_1">Street address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="address-line1" value="" placeholder="House number and street name" id="delivery_street_address" name="shipping_address_1" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_sa_error"></strong>
                                                                        </small>
                                                                    </p>

                                                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="billing_phone">Phone
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="tel" value="" placeholder="" id="delivery_phone_number" name="billing_phone" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_pn_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_email">Email Address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="email" value="" placeholder="" id="delivery_email" name="billing_email" class="input-text ">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="delivery_email_error"></strong>
                                                                        </small>
                                                                    </p>
                                                                    
                                                                </div>
                                                                <!-- .woocommerce-shipping-fields__field-wrapper -->
                                                            </div>
                                                            <!-- .shipping_address -->
                                                        </div>
                                                        <!-- .woocommerce-shipping-fields -->
                                                        <div class="woocommerce-additional-fields">
                                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                                <p id="order_comments_field" class="form-row notes">
                                                                    <label class="" for="order_comments">Order notes</label>
                                                                    <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_note" class="input-text " name="order_comments" value=""></textarea>
                                                                </p>
                                                            </div>
                                                            <!-- .woocommerce-additional-fields__field-wrapper-->
                                                        </div>
                                                        <!-- .woocommerce-additional-fields -->
                                                    </div>
                                                    <!-- .col-2 -->
                                                </div>
                                                <!-- .col2-set -->
                                                <h3 id="order_review_heading">Your order</h3>
                                                <div class="woocommerce-checkout-review-order" id="order_review">
                                                    <div class="order-review-wrapper" id="cart_checkout_totals" style="display: none">
                                                        <h3 class="order_review_heading">Your Order</h3>
                                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Product</th>
                                                                    <th class="product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="checkout_cart"></tbody>
                                                            
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₦</span><span id="checkout_subtotal"></span></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-subtotal">
                                                                    <th>Delivery Fee</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">₦</span><span id="checkout_delivery"></span></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <th>Total</th>
                                                                    <td>
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">₦</span><span id="checkout_total_fee"></span></span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                        <!-- /.woocommerce-checkout-review-order-table -->
                                                        <div class="woocommerce-checkout-payment" id="payment">
                                                            <ul class="wc_payment_methods payment_methods methods">
                                                                <li class="wc_payment_method payment_method_cheque">
                                                                    <input type="radio" data-order_button_text="" value="CARD" name="payment_method" class="input-radio" id="payment_method_cheque" checked>
                                                                    <label for="payment_method_cheque">Pay now</label>
                                                                    
                                                                </li>
                                                                <li class="wc_payment_method payment_method_cod">
                                                                    <input type="radio" data-order_button_text="" value="PAY ON DELIVERY" name="payment_method" class="input-radio" id="payment_method_cod">
                                                                    <label for="payment_method_cod">Pay on delivery </label>
                                                                </li>
                                                            </ul>
                                                            <div class="form-row place-order">
                                                                <p class="form-row terms wc-terms-and-conditions woocommerce-validated" style="margin-bottom: 0px">
                                                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox mb-0">
                                                                        <input type="checkbox" id="terms" name="terms" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" value="1">
                                                                        <span>I’ve read and accept the <a class="woocommerce-terms-and-conditions-link" href="javascript:void(0)">terms &amp; conditions</a></span>
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="mt-0 mb-3">
                                                                        <small class="text-danger" role="alert">
                                                                            <strong id="t_c_error"></strong>
                                                                        </small>
                                                                    </div>
                                                                    
                                                                </p>
                                                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                                                <button type="button" onclick="validate_place_order()" class="button wc-forward text-center">Place order</button>
                                                                <small class="text-danger text-center" role="alert">
                                                                    <strong id="validation_error"></strong>
                                                                </small>

                                                                <form id="order_completed" action="{{ url('/order_completed') }}" method="post" style="display: none">
                                                                @csrf
                                                                    <input type="hidden" id="new_order_id" name="new_order_id" value="">
                                                                </form>
                                                            </div>
                                                            <div class="text-center">
                                                                <a href="{{url('/cart')}}">View Cart</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- /.woocommerce-checkout-payment -->
                                                    </div>
                                                    <div class="mt-0 mb-3">
                                                        <small id="validation_errors" class="text-danger" role="alert"></small>
                                                    </div>
                                                    <h3 id="no_checkout_item" class="text-center" style="display: none">Your cart is empty</h3>
                                                    <!-- /.order-review-wrapper -->
                                                </div>
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