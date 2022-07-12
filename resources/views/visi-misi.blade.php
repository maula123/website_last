@extends('layouts.front')
@section('content')

<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
  <div class="container" style="margin-top:70px;margin-bottom:-30px;">
    <h3>{{$judul_visi_misi}}</h3>
  </div>
  </div>
</section>

<!-- ======= VISI ======= -->
<section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>VISI</h3>
        </header>

        <div class="container">
         <center> <p> {!!$kecamatan->visi!!}</p> </center>
        </div>
      </div>
</section>

<!-- ======= MISI ======= -->
<section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>MISI</h3>
        </header>

        <div class="container">
         <p> {!!$kecamatan->misi!!}</p> 
        </div>
      </div>
</section>

@stop