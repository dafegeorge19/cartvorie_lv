@extends('layouts.dashboard')

@section('title', '')

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
                <h3 class="card-title">Edit Supermaket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ url('/admin/update_supermarket', [$supermarket->id]) }}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Supermarket Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Supermarket's full name" value="{{ old('name') ? old('name') : $supermarket->name }}" required autofocus>
                    @error('name')
                        <small class="text-red" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                  </div>

                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State<span class="text-danger">*</span></label>
                            <select id="state" name="state" class="form-control text-capitalize @error('state') is-invalid @enderror" required>
                                <option value="{{ $supermarket->state->id }}">{{ $supermarket->state->name }}</option>
                                @foreach($states as $state)
                                    @if($state->id == $supermarket->state->id)
                                        @continue
                                    @endif
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('state')
                                <small class="text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area<span class="text-danger">*</span></label>
                            <select id="area" name="area" class="form-control text-capitalize @error('state') is-invalid @enderror" required>
                                <option value="{{ $supermarket->area->id }}" selected>{{ $supermarket->area->name }}</option>
                                @foreach($areas as $area)
                                    @if($area->id == $supermarket->area->id)
                                        @continue
                                    @endif
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                            @error('area')
                                <small class="text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    </div>

                  </div>
                  

                  <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') ? old('description') : $supermarket->description }}</textarea>
                            @error('description')
                                <small class="text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="street_address">Steet Address<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="street_address" name="street_address" placeholder="e.g No 1, Kudang Street" value="{{ old('street_address') ? old('street_address') : $supermarket->street_address }}" required>
                            @error('street_address')
                                <small class="text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                      </div>

                      

                      <div class="col-md-6">
                        <div>
                            <label for="logo">Supermarket Logo - <small>Leave empty to use current logo (255px by 125px recommended)</small></label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo')
                                <small class="text-red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                            <br>

                            <label for="logo">Current Logo</label> <br>
                            <img width="255" src="{{ $supermarket->images->count() ? asset('storage/uploads/supermarkets/images/logos/'. $supermarket->images->first()->name) : asset('storage/uploads/supermarkets/images/logos/'. 'avatar.png') }}"/>

                            <br/>
                            <br/>
                        </div>
                      </div>
                  </div>
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
  <!-- /.content-wrapper -->
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