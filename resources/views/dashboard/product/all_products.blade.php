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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Weight (kg)</th>
                        <th>Price (₦)</th>
                        <th>Sales Price (₦)</th>
                        <th>Actions</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="text-capitalize">
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->sales_price }}</td>
                            <td>
                                <a href="{{ url('/admin/edit_product', [$product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/admin/delete_product', [$product->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                            <td>
                                <a href="{{ url('/admin/view_product', [$product->id]) }}" class="btn btn-primary btn-sm">View Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Weight (kg)</th>
                        <th>Price (₦)</th>
                        <th>Sales Price (₦)</th>
                        <th>Actions</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$products}}
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