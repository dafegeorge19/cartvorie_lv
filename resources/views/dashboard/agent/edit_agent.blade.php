@extends('layouts.dashboard')

@section('title', 'Edit Agents')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Agent</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('/admin/update_agent', [$agent->id]) }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">Agent First Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control text-capitalize @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter agents's first name" value="{{ old('first_name') ? old('first_name') : $agent->first_name }}" required autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_names">Other Names<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('other_names') is-invalid @enderror" id="other_names" name="other_names" placeholder="Enter agent's other names" value="{{ old('other_names') ? old('other_names') : $agent->other_names }}" required>
                            @error('other_names')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="Enter agent's phone number" value="{{ old('phone_number') ? old('phone_number') : $agent->phone_number }}" required>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail<span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter agent's e-mail" value="{{ old('email') ? old('email') : $agent->email  }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span></label>
                            <select id="state" name="state" class="form-control text-capitalize @error('state') is-invalid @enderror" required>
                                <option value="{{ $agent->addresses->first()->state->id }}">{{ $agent->addresses->first()->state->name }}</option>
                                @foreach($states as $state)
                                    @if($state->id == $agent->addresses->first()->state->id)
                                        @continue
                                    @endif
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area<span class="text-danger">*</span></label>
                            <select id="area" name="area" class="form-control text-capitalize @error('state') is-invalid @enderror" required>
                                <option value="{{ $agent->addresses->first()->area->id }}" selected>{{ $agent->addresses->first()->area->name }}</option>
                                @foreach($areas as $area)
                                    @if($area->id == $agent->addresses->first()->area->id)
                                        @continue
                                    @endif
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                            @error('area')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street_address">Steet Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street_address" name="street_address" placeholder="e.g No 1, Kudang Street" value="{{ old('street_address') ? old('street_address') : $agent->addresses->first()->street_address }}" required>
                            @error('street_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label>Verify Email</label><br>
                            
                            <div class="form-control">
                                <input type="radio" class="" id="yes" name="verify_email" value="yes" {{ $agent->email_verified_at ? 'checked' : '' }}><label for="yes" >&nbsp;&nbsp; Yes</small></label> 
                                
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <input type="radio" class="" id="no" name="verify_email" value="no" {{ $agent->email_verified_at ? '' : 'checked' }}><label for="no">&nbsp;&nbsp; No</small></label>
                            </div>

                            @error('verify_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="image">Agent Passport Photograph <small>Leave empty to use current logo (300px by 300px recommended)</small></label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <br>
                            <label for="logo">Current Profile Picture</label> <br>
                            <img width="100" src="{{ $agent->images->count() ? asset('storage/uploads/agents/images/profile_photos/'. $agent->images->first()->name) : asset('storage/uploads/agents/images/profile_photos/'. 'avatar.png') }}"/>
                            <br>

                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="cv">Agent CV <small>Leave empty to use current CV (pdf, doc or docx format allowed | 500kb max)</small></label>
                            <input type="file" class="form-control" id="cv" name="cv" accept=".pdf, .doc, .docx">
                            @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <p>
                                <a href="{{ url('/agent/download_cv', [$agent->agent_detail->cv_name, $agent->getFullNameAttribute()]) }}" target="blank">Open Current CV</a>
                            </p>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="password">Agent Password <small>(Leave password field empty if you dont want to change password)</small></label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="password_confirmation">Confirm Password<small>(Leave password field empty if you dont want to change it)</small></label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                      </div>

                  </div>
                  <br>
                  

          
                  

                  

                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




@endsection

@section('js')

<script>
    $(document).ready(function(){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        // when user selects a new satte, get the cities for that state
        $('#state').on('change', function(e) {
            
            $('#area').attr('disabled', 'disabled')
            $('#area').empty()
            $('#area').append(`<option value="" class="text-capitalize">Select Area</option>`)

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

                    $('#area').append(`<option value="` + area_id + `" class="text-capitalize">` + area_name + `</option>`)
                    }
                }

                $('#area').removeAttr('disabled')


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