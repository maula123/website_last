@extends('layouts.front')
@section('content')

<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
  <div class="container" style="margin-top:70px;margin-bottom:-30px;">
    <h3>{{$judul_profil}}</h3>
  </div>
  </div>
</section>

<section id="portfolio"  class="section-bg" >
  <div class="container">
    <header class="section-header">
      <h3 class="section-title">{{$judul_profil_singkat}}</h3>
    </header>
    <div class="row portfolio-container">
      <div class="col-lg-12 col-md-12 portfolio-item fadeInUp" style="text-align:justify;">
      {{$kecamatan->riwayat_singkat}}
      </div>
    </div>
  </div>
</section>
@stop