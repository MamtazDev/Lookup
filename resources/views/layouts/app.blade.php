<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
     <link rel="shortcut icon" href="https://lakouphoto.ca//assets/images/fevicon-512.png" type="image/x-icon">
    @yield('third_party_stylesheets')

    @stack('page_css')
</head>
<style>
  #noneselection{
    user-select: none;
    -webkit-user-select: none;
    -webkit-touch-callout: none;
  }
</style>
<body id='noneselection' class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed dark-mode" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('/vendors/dist/img/fevicon-512.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
<div class="wrapper" >
       <!-- Navbar -->
@include('layouts.navigation')
    

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>
 -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('main')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- right menu -->
  @include('layouts.rightMenu')
  <!--/ right menu -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Designed and Developed By</b> <a href="https://maquinistas.in/" target="_blank">Maquinistas.in</a>
        </div>
        <strong>Copyright &copy; 2022 <a href="{{route('dashboard')}}">LakouPhotos</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="{{ asset('/js/app.js') }}" defer></script>

@yield('third_party_scripts')

@stack('page_scripts')
    
    
 
</body>
</html>
