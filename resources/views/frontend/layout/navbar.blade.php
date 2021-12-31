<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-navy">
  <div class="container">
    <a href="/" class="navbar-brand">
      <img src="{{asset('images/favicon.png')}}" alt="Logo Kota Jambi" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">SIAKOP</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    </div>
    
    <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/register-akun-anggota" role="button">
            <i class="fas fa-user"></i> Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login" role="button">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        </li>
      </ul>

  </div>
</nav>
<!-- /.navbar -->