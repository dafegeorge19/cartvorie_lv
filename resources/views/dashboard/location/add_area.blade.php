@extends('layouts.dashboard')

@section('title', 'Add Area')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
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
                <h3 class="card-title">Add Area</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('/admin/store_area') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span></label>
                            <Select id="state" name="state" class="form-control @error('state') is-invalid @enderror" autofocus required>
                                <option >Select State</option>
                                @foreach($states as $state) 
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach

                            </Select>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="w-100"></div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="names">Names<span class="text-danger">*</span> <small>(You can enter multiple areas separeted by comma e.g Wuse 2, Maitama, Life Camp)</small></label>
                            <input type="text" id="names" placeholder="e.g  Wuse 2, Maitama, Life Camp" name="names" value="{{ old('names') }}" class="form-control @error('names') is-invalid @enderror" required>
                            @error('names')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    

                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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
  <!-- /.content-wrapper -->
@endsection

