<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Sistem Informasi Kepramukaan">
    <meta name="keywords" content="pramuka, gudep, Kota Jambi,Jambi">
    <meta name="author" content="N.M.S Project" />
    <title>@yield('title') | SIAKOP Kota Jambi</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('jquery-ui/jquery-ui.min.css')}}">
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    
    @yield('header')
  </head>
<body class="hold-transition sidebar-mini text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts.topbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-navy">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-light">
      <img src="{{asset('images/favicon.png')}}" alt="Logo" class="brand-image"> 
      <span class="brand-text font-weight">
        SIAKOP Kota Jambi
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" >
      @include('layouts.sidebar')

      @include('layouts.menu')
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <img src="{{asset('images/favicon.png')}}" width="30px"> SIAKOP Kota Jambi
    </div>
    Copyright &copy; 2021 Support by <a href="https://diskominfo.jambikota.go.id/" target="_blank">Diskominfo Kota Jambi</a>
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>


@yield('footer')
<!-- Sweet alert -->
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<!-- Script -->
<script src="{{asset('jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script>
//flash message
  @if(session()->has('sukses'))
  swal({
    icon: "success",
    title: "BERHASIL!",
    text: "{{ session('sukses') }}",
    timer: 1500,
    buttons: false,
  });
  @elseif(session()->has('gagal'))
  swal({
    icon: "error",
    title: "GAGAL!",
    text: "{{ session('gagal') }}",
  });
  @endif
</script>

</body>
</html>