<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Skip Outlet - @yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">




  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3 d-none">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto d-none">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user5-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user5-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user5-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->





  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" 
           style="opacity: .8">-->
      <span class="brand-text font-weight-light">Skip Outlet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="javascrpt:void(0)" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_supermarkets')) || (request()->is('admin/add_supermarket')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Supermarkets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_supermarkets') }}" class="nav-link {{ (request()->is('admin/all_supermarkets')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All supermarkets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_supermarket') }}" class="nav-link {{ (request()->is('admin/add_supermarket')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add supermarkets</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_agents')) || (request()->is('admin/add_agent')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Agents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_agents') }}" class="nav-link {{ (request()->is('admin/all_agents')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All agents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_agent') }}" class="nav-link {{ (request()->is('admin/add_agent')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add agent</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin') || auth::user()->hasRole('subadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_products')) || (request()->is('admin/add_product')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_products') }}" class="nav-link {{ (request()->is('admin/all_products')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_product') }}" class="nav-link {{ (request()->is('admin/add_product')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add porducts</p>
                </a>
              </li>
              <li class="nav-item d-none">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa"></i>
                  <p>Review/Rating</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_categories')) || (request()->is('admin/add_category')) || (request()->is('admin/add_type'))  ? 'menu-open' : '' }} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_categories') }}" class="nav-link {{ (request()->is('admin/all_categories')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_category') }}" class="nav-link {{ (request()->is('admin/add_category')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_type') }}" class="nav-link {{ (request()->is('admin/add_type')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add Type</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_customers')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_customers') }}" class="nav-link {{ (request()->is('admin/all_customers')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All Customers</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_subadmins')) || (request()->is('admin/add_subadmin')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Sub-admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/all_subadmins') }}" class="nav-link {{ (request()->is('admin/all_subadmins')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All Sub-admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add_subadmin') }}" class="nav-link {{ (request()->is('admin/add_subadmin')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add Sub-admin</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_orders')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Orders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/admin/all_orders') }}" class="nav-link {{ (request()->is('admin/all_orders')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All orders</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(auth::user()->hasRole('superadmin'))
          <li class="nav-item has-treeview {{ (request()->is('admin/all_states')) || (request()->is('admin/add_state')) || (request()->is('admin/add_area')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Locations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/all_states') }}" class="nav-link {{ (request()->is('admin/all_states')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>All States</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/add_state') }}" class="nav-link {{ (request()->is('admin/add_state')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add State</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/add_area') }}" class="nav-link {{ (request()->is('admin/add_area')) ? 'active' : '' }}">
                  <i class="nav-icon fa"></i>
                  <p>Add Area</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

@yield('content')

  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} <a href="javascrpt:void(0)">Skip Outlet</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dashboard/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dashboard/dist/js/demo.js') }}"></script>

@yield('js')
</body>
</html>