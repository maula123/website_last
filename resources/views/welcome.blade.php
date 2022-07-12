@extends('layouts.front')

@section('content')
  <!-- ======= hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(Gambar/Slider/slider1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di Website Kecamatan Mendahara Ulu</h2>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(Gambar/Slider/slider4.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Bersama Mewujudkan Pembangunan Merata</h2>
                <p class="animate__animated animate__fadeInUp">Menjadi Kecamatan inovatif dan merakyat dalam mendukung terwujudnya Masyarakat Sajeterah dan maju terdepan.</p> 
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(Gambar/Slider/slider5.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">PRIMA</h2>
                <p class="animate__animated animate__fadeInUp">Prefesional | Ramah | Informatif | Melayani | Akuntabel </p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>SEKILAS KECAMATAN MENDAHARA ULU</h3>
          <p style="text-align:justify;">
         Kecamatan mendahara ulu meruapakan bagian dari kabupaten tanjung jabung timur yang letaknya berada dengan perbatasan muara jambi dan  tanjung jabung barat.
          </p>
        </header>

        <div class="row about-cols">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
           
            <center>
            <iframe style="border-radius:20px;"  height="506"  class="w-100"  id="ytplayer" src="https://www.youtube.com/embed/-PTGd7uiVZI?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          
            </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- ======= Berita Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Berita dan Informasi Terbaru</h3>
        </header>
        <br/>
        <div class="row" data-aos="fade-up" data-aos-delay="100"> 
        @forelse($berita as $item)     
        <div class="col-lg-4 col-md-8 portfolio-item"  style="border-radius:30px;">
          <div class="portfolio-wrap" style="border-radius:30px;">
            <figure>
              <img src="{{url('Gambar/Berita/' .$item->gambar)}}" class="img-fluid" alt="">
             <a href="{{route('detailBerita',$item->id)}}" class="link-details" title="More Details"><i class="bi bi-link"></i></a>
            </figure>

            <div class="portfolio-info">
              <p><a href="{{route('detailBerita',$item->id)}}">{{$item->judul}}</a></p>
            </div>
          </div>
        </div>
        @empty
        <p> Tidak ada berita </p>
        @endforelse     
      </div>
    </section><!-- End Berita Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Hubungi Kami</h3>
          <p>Untuk info lebih lanjut silahkan hubungi kontak di bawah ini</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <address>PGRM+FM7, Pematang Rahim, Kec. Mendahara Ulu, Kabupaten Tanjung Jabung Timur, Jambi 36764</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Telepon</h3>
              <p><a href="tel:+155895548855"> 08523 1234 000</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com"> kecmendahara@tanjabtimkab.go.id</a></p>
            </div>
          </div>

        </div>

       
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@stop