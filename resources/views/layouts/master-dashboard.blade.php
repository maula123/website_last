<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Website Kecamatan Mendahara Ulu </title>

  <!-- Favicons -->
  <link href="{{asset('Gambar/Logo/logo_tjt.png')}}" rel="icon">
  <link href="{{asset('Gambar/Logo/img/tjt.png')}}" rel="apple-touch-icon">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets_dashboard/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets_dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="{{asset('assets_dashboard/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets_dashboard/css/argon.min-v=1.0.0.css')}}" type="text/css">

</head>

<body>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="dashboard.html">
          <img src="{{asset('assets_dashboard/img/brand/sabak.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">Kecamatan</h6>
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{(request()->is('home')) ? 'active' : ''}}" href="{{route('home')}}" aria-controls="navbar-dashboards">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Dashboards</span>
            </a>
          </li>
          <div class="dropdown {{ (request()->is('tentang')) ? 'active' : ' ' }}">
            <span type="button" class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-building text-orange"> </i>
              <span class="nav-link-text  {{(request()->is('tentang')) ? 'active' : ''}}">Info Tentang Kami</span>
            </span>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item {{ Request::is('tentang') ? 'active' : '' }}" href="{{route('tentang')}}">Tentang Kami</a>
              <a class="dropdown-item {{(request()->is('pimpinan')) ? 'active' : ''}}" href="{{route('pimpinan')}}">Pimpinan</a>
            </div>
          </div>
          <div class="dropdown {{ (request()->is('tentang')) ? 'active' : ' ' }}">
            <span type="button" class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-collection text-green"> </i>
              <span class="nav-link-text  {{(request()->is('tentang')) ? 'active' : ''}}">Informasi</span>
            </span>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
          
              <a class="dropdown-item {{(request()->is('pimpinan')) ? 'active' : ''}}" href="{{route('kinerja')}}">Publikasi Kinerja</a>
              <a class="dropdown-item {{(request()->is('pimpinan')) ? 'active' : ''}}" href="{{route('pengumuman')}}">Informasi seputar Kecamatan</a>
            </div>

            <div class="dropdown {{ (request()->is('tentang')) ? 'active' : ' ' }}">
              <span type="button" class="nav-link dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-trophy text-yellow"> </i>
                <span class="nav-link-text  {{(request()->is('tentang')) ? 'active' : ''}}">Potensi Daerah</span>
              </span>
              <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item {{ Request::is('') ? 'active' : '' }}" href="{{route('umkm')}}">Profil UMKM</a>
                <a class="dropdown-item {{(request()->is('')) ? 'active' : ''}}" href="{{route('wisata')}}">Wisata</a>
              </div>
            </div>

            <li class="nav-item">
              <a class="nav-link {{(request()->is('company/berita-dan-informasi')) ? 'active' : ''}}" href="{{route('berita-dan-informasi')}}" aria-controls="navbar-examples">
                <i class="ni ni-world-2 text-info"></i>
                <span class="nav-link-text">Berita & Informasi</span>
              </a>
            </li>
        
        <li class="nav-item">
              <a class="nav-link" href="{{route('kuesioner')}}" aria-controls="navbar-examples">
                <i class="ni ni-world-2 text-info"></i>
                <span class="nav-link-text">Kuesioner</span>
              </a>
            </li>
            </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading p-0 text-muted">Masyarakat</h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('beranda')}}" aria-controls="navbar-examples">
              <i class="ni ni-tv-2 text-primary"></i>
              <span class="nav-link-text active">Halaman Depan</span>
            </a>
          </li>
        </ul>


        <!-- Heading -->
        <!-- <h6 class="navbar-heading p-0 text-muted">Setting</h6>
          <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link {{(request()->is('setting/gambar-carousel')) ? 'active' : ''}}" href="" aria-controls="navbar-examples">
                <i class="ni ni-image text-primary"></i>
                <span class="nav-link-text">Gambar Carousel</span>
              </a>
            </li>
          </ul> -->
      </div>
    </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">

    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Navbar links -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="dashboard.html#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets_dashboard/img/theme/team-4.jpg')}}">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    @yield('content')

    <!-- Page content -->
    <div class="container-fluid mt-2">
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            &nbsp;
          </div>
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-right text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->

  <!-- Core -->
  <script src="{{asset('assets_dashboard/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/lavalamp/js/jquery.lavalamp.min.js')}}"></script>
  <!-- Optional JS -->

  <script src="asset('assets_dashboard/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('assets_dashboard/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset('assets_dashboard/js/argon.min-v=1.0.0.js')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('assets_dashboard/js/demo.min.js')}}"></script>
</body>

</html>

<script>

</script>