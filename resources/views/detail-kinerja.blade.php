@extends('layouts.front')
@section('content')

<section id="call-to-action" class="wow fadeIn">
    <div class="container text-center">
        <div class="container" style="margin-top:70px;margin-bottom:-30px;">
            <h3>Detail Publikasi Kinerja</h3>
        </div>
    </div>
</section>

<div class="site-breadcrumb" style="padding-top: 20px; padding-bottom: 10px;">
    <div class="container">
        <a href=""><i class="fa fa-home"></i>Informasi</a> <i class="fa fa-angle-right"></i>
        <span>Detail Kinerja</span>

        <br><br><br>
        <section class="blog-posts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="all-blog-posts">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <h4 style="color:#00CED1" class="card-title text-orange fw-bold text-decoration-underline">{{$kinerja->judul}}</h4>

                                        <span>Admin | {{$kinerja->tanggal_kinerja}}</span>
                                        <br><br>
                                        <div class="blog-thumb">
                                            <img src="{{url('Gambar/Kinerja/'.$kinerja->gambar)}}" style="height: 500px; width:850px; margin-bottom: 20px; margin: 0x 0x 20px" class="card-img-top" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h5 class="tm-text-primary mb-3 tm-catalog-item-title" style="text-align: justify">{!!$kinerja->isi!!}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
        </style>
        @stop