<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website Kecamatan Mendahara Ulu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('Gambar/Logo/logo_tjt.png')}}" rel="icon">
  <link href="{{asset('Gambar/Logo/img/tjt.png')}}" rel="tjt">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <a href="{{route('beranda')}}" class="logo"><img src="{{asset('Gambar/Logo/img/logo4.png')}}" alt="" class="img-fluid"></a>
          <nav id="navbar" class="navbar">
            <ul>
              <li class="dropdown
            {{(request()->is('tentang-kami/riwayat-singkat')) ? 'active' : ''}}
            {{(request()->is('tentang-kami/visi-misi')) ? 'active' : ''}}
            {{(request()->is('tentang-kami/struktur-organisasi')) ? 'active' : ''}}
            {{(request()->is('tentang-kami/kependudukan')) ? 'active' : ''}}
            {{(request()->is('/tentang-kami/pimpinan')) ? 'active' : ''}}
            "><a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li class="dropdown"><a href="#"><span>Profil Kecamatan</span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                      <li><a href="{{route('riwayat-singkat')}}">Riwayat Singkat</a></li>
                      <li><a href="{{route('visi-misi')}}">Visi & Misi</a></li>
                      <li><a href="{{route('struktur-organisasi')}}">Struktur Organisasi</a></li>
                      <li><a href="{{route('kependudukan')}}">Kependudukan</a></li>
                      <li><a href="{{route('pimpinan-info')}}">Pimpinan</a></li>
                    </ul>
                  </li>
                </ul>
              <li class="dropdown">
                <a href=""><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{route('info-opd')}}">Seputar Opd</a></li>
                  <li><a href="{{route('publikasi-kinerja')}}">Publikasi Kinerja </a></li>
                  <li><a href="{{route('info-pengumuman')}}">Pengumuman seputar informasi kecamatan</a></li>
                </ul>
              </li>
              <li class="dropdown">

                <a href="#"><span>Potensi Daerah</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{route('info-umkm')}}">Profil UMKM</a></li>
                  <li><a href="">Wisata</a></li>
                  <li><a href="{{route('piechart')}}">piechart</a></li>
                </ul>
              </li>
              <li class="{{(request()->is('berita-dan-informasi')) ? 'active' : ''}}"><a class="nav-link scrollto" href="{{route('berita')}}">Berita & Informasi</a></li>
              <li class="{{(request()->is('aduan')) ? 'active' : ''}}"><a class="nav-link scrollto" href="{{route('aduan')}}">Aduan</a></li>
              @if (Route::has('login'))
              @auth
              <li><a class="nav-link scrollto" href="{{route('home')}}">Dashboard</a></li>
              @else

              @endif
              @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  @yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <a href="" class="logo"><img src="{{asset('Gambar/Logo/logo2.png')}}" alt="" class="img-fluid"></a>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">

            <h4>Kontak</h4>
            <p>
              PGRM+FM7, Pematang Rahim, Kec. Mendahara Ulu, Kabupaten Tanjung Jabung Timur, Jambi 36764 <br />
              <strong>Email:</strong> kecmendahara@tanjabtimkab.go.id <br>
            </p>

            <div class="social-links">
              <a href="" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Bersinergi Dengan</h4>
            <img src="{{asset('Gambar/Anak Perusahaan/logo1.png')}}" width="60%" alt="">
            <img src="{{asset('Gambar/Anak Perusahaan/logo2.png')}}" width="60%" alt="">
          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <a href=""><img src="{{asset('Gambar/Anak Perusahaan/logo1.png')}}" alt=""></a>
            <a href=""><img src="{{asset('Gambar/Anak Perusahaan/logo2.png')}}" alt=""></a>


          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright &copy; <strong>Dinas Infromatika dan Komunikasi Tanjung Jabung Timur</strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="https://kit.fontawesome.com/d9a5f4737a.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>