@extends('layouts.buyer')

@section('content')
<div class="content">
  <div class="container-fluid">
    <h4 style="margin-left: 30px;"><b>EDIT PROFILE</b></h4>

                <!-- .woocommerce-breadcrumb -->
                <div class="content-area" id="primary">
                    <main class="site-main" id="main">
                      <div class="row justify-content-center">


                      <div class="col-6">


                        @if(session()->has('message')) {{-- if there is a message in session --}}
                            <div class="alert alert-success" role="alert">
                                {{session()->get('message')}}
                            </div>
                        @endif

                        <form action="{{ url('/update_profile') }}" class="" method="post" name="checkout">
                            <div class="row justify-content-center">
                              <div class="col-6">
                                @csrf
                                <!-- Email -->
                              <img src="{{asset('/asset/assets/img/select.png')}}" alt="">

                              </div>
                              <div class="col-12">

                                <!-- Email -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerFirstName">
                                    Full Name *
                                  </label>
                                  <input class="form-control form-control-sm" id="registerFirstName" value="{{request()->user()->fullname ?? ''}}" name="fullname" type="text" placeholder="First Name *" required="">
                                </div>

                              </div>

                              <div class="col-12">

                                <!-- Email -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerEmail">
                                    Email Address *
                                  </label>
                                  <span class="form-control form-control-sm @error('password') is-invalid @enderror" id="registerEmail" name="email" value="{{request()->user()->email ?? ''}}" type="email" placeholder="Email Address *" required="">
                                    {{request()->user()->email ?? ''}}
                                  </span>
                                </div>

                              </div>
                              <div class="col-12">

                                <!-- Username -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerUsername">
                                    Username *
                                  </label>
                                  <input class="form-control form-control-sm" id="registerUsername" type="text" value="{{request()->user()->username ?? ''}}" name="username" placeholder="Username *" required="">
                                </div>

                              </div>
                              <div class="col-12">

                                <!-- Username -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerPhone">
                                    Phone Number *
                                  </label>
                                  <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="registerPhone" type="text" value="{{request()->user()->phone_number ?? ''}}" name="phone_number" placeholder="Phone Number *" required>
                                </div>
                                @error('phone_number')
                                    <p class="text-danger pt-0" role="alert" style="padding: 0px">
                                        <small>{{ $message }}</small>
                                    </p>
                                @enderror

                              </div>
                              <div class="col-12 col-md-6">

                                <!-- Password -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerPassword">
                                    Password *
                                  </label>
                                  <input class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="registerPassword" type="password" placeholder="Password *" required="">
                                </div>
                                @error('password')
                                    <p class="text-danger pt-0" role="alert" style="padding: 0px">
                                        <small>{{ $message }}</small>
                                    </p>
                                @enderror
                              </div>
                              <div class="col-12 col-md-6">

                                <!-- Password -->
                                <div class="form-group">
                                  <label class="sr-only" for="registerPasswordConfirm">
                                    Confirm Password *
                                  </label>
                                  <input class="form-control form-control-sm" id="registerPasswordConfirm" name="password_confirmation" type="password" placeholder="Confrm Password *" required="">
                                </div>

                              </div>
                              
                              <div class="col-12">

                                <!-- Button -->
                                <button class="btn btn-sm btn-primary" type="submit">
                                Update Profile
                                </button>

                              </div>
                            </div>
                        </form>
                      </div>
                      </div>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->

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
