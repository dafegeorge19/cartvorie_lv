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

                        @if(session()->has('message')) {{-- if there is a message in session --}}
                            <div class="alert alert-success" role="alert">
                                {{session()->get('message')}}
                            </div>
                        @endif

                        <form action="{{ url('/update_profile') }}" class="" method="post" name="checkout">
                            @csrf
                            <div id="customer_details" class="">
                                <div class="">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Edit Profile</h3>
                                        <div class="woocommerce-billing-fields__field-wrapper-outer">
                                            <div class="woocommerce-billing-fields__field-wrapper">
                                                <p id="first_name" class="form-row form-row-last validate-required">
                                                    <label class="" for="first_name">First Name
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="{{ auth::user()->first_name ?? '' }}" placeholder="First Name" id="first_name" name="first_name" class="input-text text-capitalize">
                                                    @error('first_name')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>
                                                <p id="other_names" class="form-row form-row-last validate-required">
                                                    <label class="" for="other_names">Other Names
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="{{ auth::user()->other_names ?? '' }}" placeholder="Other Names" id="other_names" name="other_names" class="input-text text-capitalize">
                                                    @error('other_names')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>
                                                <p id="state" class="form-row form-row-last validate-required">
                                                    <label class="" for="state">State
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible text-capitalize state_set" id="state" data-output_area="billing_area" name="state" tabindex="-1" aria-hidden="true">
                                                        <option value="">Select State</option>
                                                        @foreach($states as $state)
                                                            @if($state->id == auth::user()->addresses->first()->state_id)
                                                                <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                                                @break
                                                            @endif
                                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('state')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>

                                                <p id="billing_country_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="billing_country">Area
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <select autocomplete="country" class="country_to_state country_select select2-hidden-accessible text-capitalize" id="billing_area" name="area" tabindex="-1" aria-hidden="true">
                                                        <option value="" selected>Select Area</option>
                                                        @foreach ($areas->where('state_id', auth::user()->addresses->first()->state_id) as $area)
                                                            @if($area->id == auth::user()->addresses->first()->area_id)
                                                                <option value="{{$area->id}}" selected>{{$area->name}}</option>
                                                                @break
                                                            @endif
                                                            <option value="{{$area->id}}" selected>{{$area->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('area')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>
                                                <p id="billing_address_1_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="billing_address_1">Street address
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="text" value="{{ auth::user() ? auth::user()->addresses->first()->street_address : '' }}" placeholder="Street address" id="billing_street_address" name="street_address" class="input-text text-capitalize">
                                                    @error('street_address')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>
                                                
                                                <p id="billing_phone_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="billing_phone">Phone Number
                                                        <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="tel" value="{{ auth::user()->phone_number ?? '' }}" placeholder="Phone Number" id="billing_phone_number" name="phone_number" class="input-text ">
                                                    @error('phone_number')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>

                                                <p id="billing_phone_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="password">New Password
                                                    </label>
                                                    <input type="password" value="" id="password" name="password" class="input-text ">
                                                    @error('password')
                                                        <small class="text-danger" role="alert">
                                                            <strong id="billing_fn_error">{{ $message }}</strong>
                                                        </small>
                                                    @enderror 
                                                </p>
                                                <p id="billing_email_field" class="form-row form-row-last validate-required">
                                                    <label class="" for="billing_email">Confirm New Password
                                                    </label>
                                                    <input type="password" value="" id="password-confirmation" name="password_confirmation" class="input-text ">
                                                </p>
                                            </div>
                                            <button type="submit">Submit</button>
                                        </div>
                                        <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                    </div>
                                    <!-- .woocommerce-billing-fields -->
                                </div>
                            </div>
                        </form>

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