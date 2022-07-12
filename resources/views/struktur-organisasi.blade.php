@extends('layouts.front')
@section('content')
<!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
      <div class="container" style="margin-top:70px;margin-bottom:-30px;">

        <h3>{{$judul_struktur}}</h3>
       
      </div>
      </div>
    </section>

    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>STRUKTUR ORGANISASI KECAMATAN MENDAHARA ULU </h3>
          <p></p>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 wow fadeInUp" style="text-align: center;">
              <img src="{{url('Gambar/Struktur/' .$kecamatan->struktur_organisasi)}}" class="img-fluid" alt="">
            </div>
          </div>
      </div>
    </section>

@stop