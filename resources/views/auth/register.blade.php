@extends('layouts.customer')

@section('title', 'Register')

@section('content')
<section class="py-12 pt-5 pb-5">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-6">

                  <!-- Card -->
                  <div class="card card-lg mb-10 mb-md-0">
                    <div class="card-body">

                      <!-- Heading -->
                      <h6 class="mb-5">Returning Customer</h6>

                      <!-- Form -->
                      <form method="POST" action="{{ route('login') }}">
                        <div class="row">
                          <div class="col-12">
                            @csrf

                            <!-- Email -->
                            <div class="form-group">
                              <label class="sr-only" for="loginEmail">
                                Email Address *
                              </label>
                              <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="loginEmail" type="email" name="email" value="{{ old('email') }}"  placeholder="Email Address *" required="">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="col-12">

                            <!-- Password -->
                            <div class="form-group">
                              <label class="sr-only" for="loginPassword">
                                Password *
                              </label>
                              <input class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="loginPassword" type="password" placeholder="Password *" required="">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="col-12 col-md">

                            <!-- Remember -->
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="loginRemember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="loginRemember">
                                  Remember me
                                </label>
                              </div>
                            </div>

                          </div>
                          <div class="col-12 col-md-auto">

                            <!-- Link -->
                            <div class="form-group">
                              <a class="font-size-sm text-reset" data-toggle="modal" href="#modalPasswordReset">Forgot Password?</a>
                            </div>

                          </div>
                          <div class="col-12">

                            <!-- Button -->
                            <button class="btn btn-sm btn-primary" type="submit">
                              Sign In
                            </button>

                          </div>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6">

                  <!-- Card -->
                  <div class="card card-lg">
                    <div class="card-body">

                      <!-- Heading -->
                      <h6 class="mb-5">New Customer</h6>
                      <!-- Form -->
                      <form  method="POST" action="{{ route('register') }}">
                        <div class="row justify-content-center">
                          <div class="col-6">
                            @csrf
                            <!-- Email -->
                            <div class="form-group">
                              <label class="sr-only" for="registerFirstName">
                                Account type
                              </label>
                              <select class="form-control form-control-sm" id="registerAcctype" name='account_type' type="text" placeholder="First Name *" required="">
                                <option value="">Account Type</option>
                                <option value="buyer">Buyer</option>
                                <option value="driver">Driver</option>
                              </select>
                            </div>

                          </div>
                          <div class="col-12">

                            <!-- Email -->
                            <div class="form-group">
                              <label class="sr-only" for="registerFirstName">
                                Full Name *
                              </label>
                              <input class="form-control form-control-sm" id="registerFirstName" name="fullname" type="text" placeholder="First Name *" required="">
                            </div>

                          </div>

                          <div class="col-12">

                            <!-- Email -->
                            <div class="form-group">
                              <label class="sr-only" for="registerEmail">
                                Email Address *
                              </label>
                              <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="registerEmail" name="email" type="email" placeholder="Email Address *" required="">
                            </div>
                            @error('email')
                                <p class="text-danger pt-0" role="alert" style="padding: 0px">
                                    <small>{{ $message }}</small>
                                </p>
                            @enderror
                          </div>
                          <div class="col-12">

                            <!-- Username -->
                            <div class="form-group">
                              <label class="sr-only" for="registerUsername">
                                Username *
                              </label>
                              <input class="form-control form-control-sm" id="registerUsername" type="text" name="username" placeholder="Username *" required="">
                            </div>

                          </div>
                          <div class="col-12">

                            <!-- Username -->
                            <div class="form-group">
                              <label class="sr-only" for="registerPhone">
                                Phone Number *
                              </label>
                              <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="registerPhone" type="text" name="phone_number" placeholder="Phone Number *" required>
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
                          <div class="col-12 col-md-auto">

                            <!-- Link -->
                            <div class="form-group font-size-sm text-muted">
                              By registering your details, you agree with our Terms &amp; Conditions,
                              <br>
                              and Privacy and Cookie Policy.
                            </div>

                          </div>
                          <div class="col-12 col-md">

                            <!-- Newsletter -->
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="registerNewsletter" type="checkbox">
                                <label class="custom-control-label" for="registerNewsletter">
                                  Sign me up for the Newsletter!
                                </label>
                              </div>
                            </div>

                          </div>
                          <div class="col-12">

                            <!-- Button -->
                            <button class="btn btn-sm btn-primary" type="submit">
                              Register
                            </button>

                          </div>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
    @endsection

@section('js')

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){ //when the page as completed loading start getting restaurant

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });


        // Ajax for geting all states
        $.ajax({
            type: 'POST',
            url: "{{ url('/get_all_states')}}",
            dataType: 'json',

            success: function (states) {

              if(Object.keys(states).length >0 ) {

                for(key in states) {

                  if(states.hasOwnProperty(key)) {

                    let state_id = states[key]['id']
                    let state_name = states[key]['name']

                    $('#state_select').append(`<option value="` + state_id + `" class="text-capitalize">` + state_name + `</option>`)
                  }
                }

              }
            },

            error: function (data) {
               console.log('Error:', data);
            }
        });




        // when user selects a new satte, get the cities for that state
        $('#state_select').on('change', function(e) {

          $('#area_select').attr('disabled', 'disabled')
          $('#area_select').empty()
          $('#area_select').append(`<option value="" class="text-capitalize">Select Area</option>`)

          let state_id = $(this).val();

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

                    $('#area_select').append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                  }
                }

              $('#area_select').removeAttr('disabled')


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
