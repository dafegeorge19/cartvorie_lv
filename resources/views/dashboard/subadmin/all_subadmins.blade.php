@extends('layouts.dashboard')

@section('title', 'All Subadmin')

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
              <h3 class="card-title">All Subadmin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="alert alert-warning"><strong>Important Information!</strong> When a subadmin is deleted, all products belonging to him will be passed to the superadmin</div>
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Suadmin Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>No of products</th>
                        <th>Actions</th>
                        <th>View Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subadmins as $subadmin)
                        <tr class="text-capitalize">
                            <td>{{ $subadmin->getFullNameAttribute() }}</td>
                            <td>{{ $subadmin->phone_number }}</td>
                            <td>{{ $subadmin->email }}</td>
                            <td>{{ $subadmin->products->count() }}</td>
                            <td>
                                <a href="{{ url('/admin/edit_subadmin', [$subadmin->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/admin/delete_subadmin', [$subadmin->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                            <td>
                                <a href="{{ url('/admin/view_subadmin', [$subadmin->id]) }}" class="btn btn-primary btn-sm">View Profile</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Suadmin Name</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>No of products</th>
                  <th>Actions</th>
                  <th>View Profile</th>
                </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$subadmins}}
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