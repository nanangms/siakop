<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Sistem Informasi Akuntansi Koperasi Kota Jambi">
  <meta name="keywords" content="akuntansi, koperasi, sistem informasi, Kota Jambi, Jambi">
  <meta name="author" content="N.M.S Project" />
  <title>@yield('title') | SIAKOP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin')}}/dist/css/adminlte.min.css">
  <link rel="icon" href="{{asset('images/favicon.png')}}">
  @yield('header')
</head>
<body class="hold-transition layout-top-nav text-sm">
<div class="wrapper">

  @include('frontend.layout.navbar')

  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    &copy; 2020 Support By <a href="https://diskominfo.jambikota.go.id" target="_blank">Diskominfo Kota Jambi</a>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin')}}/dist/js/adminlte.min.js"></script>
@yield('footer')
<!-- Sweet alert -->
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>

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
