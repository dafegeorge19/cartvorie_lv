@extends('layouts.dashboard')

@section('title', 'All Agents')

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
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Agents</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>CV</th>
                        <th>Actions</th>
                        <th>Status</th>
                        <th>View Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                        <tr class="text-capitalize">
                            <td>{{ $agent->getFullNameAttribute() }}</td>
                            <td>{{ $agent->phone_number }}</td>
                            <td>{{ $agent->email }}</td>
                            <td><a href="{{ url('/agent/download_cv', [$agent->agent_detail->cv_name, $agent->getFullNameAttribute()]) }}" target="blank">Open CV</a></td>
                            <td>
                                <a href="{{ url('/admin/edit_agent', [$agent->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('/admin/delete_agent', [$agent->id]) }}" class="btn btn-danger btn-sm">delete</a>
                            </td>
                            @if($agent->agent_detail->status == 'enabled')
                                <td>
                                    <a href="{{ url('/admin/agent_status', [$agent->id]) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to Disable this agent">Enabled</a>
                                </td>
                            @elseif($agent->agent_detail->status == 'disabled')
                                <td>
                                    <a href="{{ url('/admin/agent_status', [$agent->id]) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Click to 'Enable' this agent">Disabled</a>
                                </td>
                            @endif
                            <td>
                                <a href="{{ url('/admin/view_agent', [$agent->id]) }}" class="btn btn-primary btn-sm">View Profile</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Agent Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>CV</th>
                    <th>Actions</th>
                    <th>Status</th>
                    <th>View Profile</th>
                </tr>
                </tfoot>
              </table>
              <br>
              <div class="text-center">
                {{$agents}}
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