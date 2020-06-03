@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/') }}">Logo</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">


      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group">

          <input placeholder="First Name" id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>

        </div>
        @error('first_name')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror
        


        <div class="input-group mt-3">

          <input placeholder="Other Names" id="other_names" type="text" class="form-control @error('other_names') is-invalid @enderror" name="other_names" value="{{ old('other_names') }}" required autocomplete="other_names">

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          
        </div>
        @error('other_names')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror


        <div class="input-group mt-3">

          <input placeholder="Phone Number" id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          
        </div>
        @error('phone_number')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror



        <div class="input-group mt-3">

          <input placeholder="Email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          
        </div>
        @error('email')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror


        <div class="input-group mt-3">
          <select name="state" id="state_select" class="form-control @error('state') is-invalid @enderror" name="state" required>
            <option value="">Select State</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>

        </div>
        @error('state')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror

        <div class="input-group mt-3">
          <select name="area" id="area_select" class="form-control" class="form-control @error('area') is-invalid @enderror" name="area" required disabled="disabled">
            <option value="">Select Area</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>

        </div>
        @error('area')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror


        <div class="input-group mt-3">

          <input placeholder="Street Address" id="street_address" type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ old('street_address') }}" required autocomplete="street_address" autofocus>

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>
          
        </div>
        @error('street_address')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror

        

        

        <div class="input-group mt-3">
          <input placeholder="Password"  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <p class="text-danger pt-0" role="alert" style="padding: 0px">
                <small>{{ $message }}</small>
            </p>
        @enderror




        <div class="input-group mt-3">
          <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>



        <div class="row mt-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="agreeTerms" value="agree" class="@error('street_address') is-invalid @enderror" required>
              <label for="agreeTerms">
               I agree to the <a href="{{ url('/terms_and_conditions') }}" target="_blank">terms & Conditions</a>
              </label>
            </div>

            @error('agreeTerms')
                <span class="text-center text-danger" role="alert">
                    <small>{{ $message }}</small>
                </span>
            @enderror

          </div>

          

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center d-none">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('login') }}" class="text-center mt-3">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
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