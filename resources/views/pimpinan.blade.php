@extends('layouts.front')
@section('content')

<section id="call-to-action" class="wow fadeIn">
    <div class="container text-center">
        <div class="container" style="margin-top:70px;margin-bottom:-30px;">

            <h3>{{$judul_pimpinan1}}</h3>

        </div>
    </div>
</section>
<div class="site-breadcrumb" style="padding-top: 20px; padding-bottom: 10px;">
    <div class="container">
        <a href=""><i class="fa fa-home"></i> Tentang Kami</a> <i class="fa fa-angle-right"></i>
        <span>Pimpinan</span>

    </div>
</div>

<br>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            @forelse($pimpinan as $item)
            <div class="col-md-4">
                <div class="card" style="text-align:center; ">
                    <br>
                    <div class="text-center">
                        <img src="{{url('Gambar/Pimpinan/'.$item->gambar)}}" style="height: 220px; width:330px; margin-bottom: 20px; margin: 0x 0x 20px" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-decoration-underline">{{$item->nama}}</h5>
                        <h5 class="card-title fw-bold text-decoration-underlin">NIP: {{$item->nip}}</h5>
                        <p class="card-text" style="text-align: justify">{!!$item->deskripsi!!}</p>
                        <a href="{{route('detailPimpinan', $item->id)}}" class="btn btn-primary">Klik Untuk detail</a>
                    </div>
                </div>
                <br>
            </div>
            @empty
            <p> Tidak ada data pemimpin </p>
            @endforelse
        </div>
    </div>
</div>

@stop