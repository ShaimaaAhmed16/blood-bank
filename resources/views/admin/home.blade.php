<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blood Bank</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700 ')}}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block " >
                <a href="{{url('/home')}}" class="nav-link"><i class="fa fa-home"></i>Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-3 " >
                <!-- user login dropdown start-->
                <li class="dropdown " >
                    <ul data-toggle="dropdown" class="dropdown-toggle " href="#"  >

                            <img src="{{asset('admin/img/avatar2.png')}}" class="img-circle elevation-2 " alt="User Image" style="width: 30px;height: 30px">

                        <span class="username">{{auth()->user()->name}}</span>
                        <b class="caret"></b>
                    </ul>
                    <ul class="dropdown-menu extended logout text-center">
                        <li><a href="{{url('/reset-password')}}"><i class="fa fa-key"></i>changPassword</a></li><hr>
                        <li><a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i> LogOut</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('admin/img/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Blood Bank</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('admin/img/avatar2.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-address-card"></i>
                            <p>
                                posts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('post')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('category')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('governorate')}}" class="nav-link">
                            <i class="fas fa-city"></i>
                            <p>governorate</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('city')}}" class="nav-link">
                            <i class="fas fa-city"></i>
                            <p>city</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('client')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>client</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('contact')}}" class="nav-link">
                            <i class="fas fa-file-signature"></i>
                            <p>contact</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('donation')}}" class="nav-link">
                            <i class="fas fa-plane-arrival"></i>
                            <p>Donation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('setting')}}" class="nav-link">
                            <i class="fas fa-cog"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('user')}}" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('role')}}" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>role</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1 class="float-left mr-1"></i>@yield('page')</h1>
                       <p class="mt-1">@yield('small_title')</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="fa fa-home"></i>Home</a></li>
                            <li class="breadcrumb-item active"> </i>@yield('page')</li>
                            <li class="breadcrumb-item active">@yield('page_title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->
            @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.0-rc.3
        </div>
        <strong>Blood Bank Admin</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>

@stack('scripts')
</body>
</html>
