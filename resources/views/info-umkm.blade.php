@extends('layouts.front')
@section('content')
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <div class="container" style="margin-top:70px;margin-bottom:-30px;">
      <h3>Umkm</h3>
    </div>
  </div>
</section>

<div class="site-breadcrumb" style="padding-top: 20px; padding-bottom: 10px;">
  <div class="container">
    <a href=""><i class="fa fa-home"></i> Potensi Daerah</a> <i class="fa fa-angle-right"></i>
    <span>Umkm</span>

    <div class='row justify-content-center'>
      <div class="col-md-4">
        <form action="{{route('info-umkm')}}" method="GET">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Umkm..." name="cari">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5">
            <div class="more-info-content">
              <div class="row">
                @forelse($umkm as $item)
                <div class="col-md-6 mt-5">
                  <div class="left-image">
                    <img src="{{url('Gambar/Umkm/'.$item->gambar)}}" style="height: 350px; width:370px; margin-bottom: 20px; margin: 0x 0x 20px" alt="">
                  </div>
                </div>
                <div class="col-md-5 align-self-center">
                  <div class="right-content">
                    <h2>{{$item->nama_umkm}}</h2>
                    <p>{{$item->nama_pemilik}}</p>
                    <p>{{$item->alamat}}</p>
                    <p>{{$item->deskripsi_produk}}</p>
                    <a href="{{route('detailUmkm', $item->id)}}" class="filled-button">Read More</a>
                  </div>
                </div>
                @empty
                <p> Tidak ada data Umkm </p>
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop