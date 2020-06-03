@extends('layouts.dashboard')

@section('title', 'View Agent')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Agent Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">Agent First Name</label>
                            <div class="form-control text-capitalize">
                                {{$agent->first_name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_names">Other Names<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->other_names}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->phone_number}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->email}}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->addresses->first()->state->name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->addresses->first()->area->name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street_address">Steet Address<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$agent->addresses->first()->street_address}}
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Verify Email</label><br>
                            <div class="form-control text-capitalize">
                                @if($agent->email_verified_at)
                                    {{'Yes'}}
                                @else
                                    {{'No'}}
                                @endif
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="logo">Current Profile Picture</label> <br>
                            <img width="100" src="{{ $agent->images->count() ? asset('storage/uploads/agents/images/profile_photos/'. $agent->images->first()->name) : asset('storage/uploads/agents/images/profile_photos/'. 'avatar.png') }}"/>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Agent CV</label><br>
                            <div class="form-control text-capitalize">
                                <a href="{{ url('/agent/download_cv', [$agent->agent_detail->cv_name, $agent->getFullNameAttribute()]) }}" target="blank">Open Agent CV</a>
                            </div>
                        </div>
                      </div>

                  </div>
                  <br>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ url('/admin/edit_agent', [$agent->id]) }}" class="btn btn-primary">Edit this agent</a>
                </div>
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
  <!-- /.content-wrapper -->
@endsection