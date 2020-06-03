@extends('layouts.dashboard')

@section('title', 'View Subadmin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
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
                <h3 class="card-title">View Subadmin Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->first_name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="other_names">Other Names<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->other_names}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->phone_number}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->email}}
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->addresses->first()->state->name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->addresses->first()->area->name}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="street_address">Steet Address<span class="text-danger">*</span></label>
                            <div class="form-control text-capitalize">
                                {{$subadmin->addresses->first()->street_address}}
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div>
                            <label for="logo">Current Profile Picture</label> <br>
                            <img width="100" src="{{ $subadmin->images->count() ? asset('storage/uploads/subadmins/images/profile_photos/'. $subadmin->images->first()->name) : asset('storage/uploads/subadmins/images/profile_photos/'. 'avatar.png') }}"/>
                        </div>
                      </div>

                  </div>
                  <br>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ url('/admin/edit_subadmin', [$subadmin->id]) }}" class="btn btn-primary">Edit this subadmin</a>
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