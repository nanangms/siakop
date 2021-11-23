<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-danger">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Selamat Datang, {{auth()->user()->name}}</a>
    </li> -->

    </ul>
    <span style="color: white;">{{TanggalID(now())}}</span>
    
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    @if(auth()->user()->role_id == 1 or  auth()->user()->role_id == 2)
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-bell"></i>
        <span class="badge badge-info navbar-badge">0</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">Pendaftaran Baru Akun Gudep</span>
        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <!-- <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
            <div class="media-body">
              <h3 class="dropdown-item-title">
                <strong>Nama</strong><br>
                Tes
                <span class="float-right text-sm text-success"><i class="fas fa-user"></i></span>
              </h3>
              
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Tanggal</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>

        <a href="/user/gudep" class="dropdown-item dropdown-footer">Lihat Semua Data</a>
      </div>
    </li>
    @endif
    <li class="nav-item dropdown">
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Logout">
        <i class="fa fa-sign-out-alt"></i> Logout
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </li>
    
  </ul>
</nav>
<!-- /.navbar -->