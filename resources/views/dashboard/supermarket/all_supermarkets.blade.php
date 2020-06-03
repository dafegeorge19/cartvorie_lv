@extends('layouts.dashboard')

@section('title', 'All Supermaket')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Supermarkets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="alert alert-warning">Be informed that deleting a supermarket also deletes all the products in the supermarket</div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Supermarket Name</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Street Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supermarkets as $supermarket)
                        <tr class="text-capitalize">
                            <td>{{ $supermarket->name }}</td>
                            <td>{{ $supermarket->state->name }}</td>
                            <td>{{ $supermarket->area->name }}</td>
                            <td>{{ $supermarket->street_address }}</td>
                            <td>
                                <a href="{{ url('/admin/edit_supermarket', [$supermarket->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/admin/delete_supermarket', [$supermarket->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Supermarket Name</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Street Address</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$supermarkets}}
              </div>
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>




@endsection