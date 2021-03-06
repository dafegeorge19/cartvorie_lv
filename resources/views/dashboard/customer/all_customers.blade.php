@extends('layouts.dashboard')

@section('title', 'All Customers')

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
              <h3 class="card-title">All Customers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Customer First Name</th>
                        <th>Customer Other Names</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th class="d-none">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr class="text-capitalize">
                            <td>{{ $customer->fullname }}</td>
                            <td>{{ $customer->username }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td class="d-none">
                                <a href="{{ url('/customer/edit_customer', [$customer->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/customer/delete_customer', [$customer->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Customer First Name</th>
                    <th>Customer Other Names</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th class="d-none">Actions</th>
                </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$customers}}
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