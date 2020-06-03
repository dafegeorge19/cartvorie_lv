@extends('layouts.dashboard')

@section('title', 'All Categories')

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
              <h3 class="card-title">All Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>No. of products</th>
                        <th>Action</th>
                        <th>Types</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr class="text-capitalize">
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->products->count() }}</td>
                            <td>
                                <a href="{{ url('/admin/edit_category', [$category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/admin/delete_category', [$category->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                            <td>
                              <a href="{{ url('/admin/all_category_types', [$category->id]) }}" class="btn btn-primary btn-sm">View Types</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>No. of products</th>
                        <th>Action</th>
                        <th>Featured</th>
                    </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$categories}}
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