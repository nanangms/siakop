<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | SIAKOP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <link rel="icon" href="{{asset('images/favicon.png')}}">
</head>
<body class="hold-transition login-page" style="background-image: url({{asset('images/background-login.jpg')}});
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <!-- <img src="{{asset('images/logo_pramuka.png')}}" width="100%"> -->
      <h3>SIAKOP</h3> 
      <h4>Sistem Informasi Akuntansi Koperasi</h4>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Masuk</p>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                  @foreach ($errors->all() as $error)
                      <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="text-danger" role="alert">
                {{ $message }}
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('password.request') }}">Lupa password?</a>
      </p> 
      <hr>
      <small>©2021 SIAKOP | Support by : <a href="https://diskominfo.jambikota.go.id/" target="_blank">Diskominfo Kota Jambi</a></small>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
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
