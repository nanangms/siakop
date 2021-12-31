<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('login_page')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login_page')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login_page')}}/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('login_page')}}/css/iofrm-theme2.css">
</head>
<body>
    {{$slot}}
<script src="{{asset('login_page')}}/js/jquery.min.js"></script>
<script src="{{asset('login_page')}}/js/popper.min.js"></script>
<script src="{{asset('login_page')}}/js/bootstrap.min.js"></script>
<script src="{{asset('login_page')}}/js/main.js"></script>

<!-- Sweet alert -->
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>

<script>
//flash message
  @if(session()->has('sukses'))
  swal({
    icon: "success",
    title: "BERHASIL!",
    text: "{{ session('sukses') }}",
    buttons: true,
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