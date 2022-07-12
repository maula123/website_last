@extends('layouts.front')
@section('content')
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <div class="container" style="margin-top:70px;margin-bottom:-30px;">
      <h3>Publikasi Kinerja</h3>
    </div>
  </div>
</section>

<div class="site-breadcrumb" style="padding-top: 20px; padding-bottom: 10px;">
  <div class="container">
    <a href=""><i class="fa fa-home"></i> Informasi</a> <i class="fa fa-angle-right"></i>
    <span>Kinerja</span>
    &nbsp;&nbsp;

    <div class='row justify-content-center'>
      <div class="col-md-4">
        <form action="{{route('publikasi-kinerja')}}" method="GET">
          <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Search Kinerja..." name="cari">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>

    <div class="card-deck">
      @forelse($kinerja as $item)
      <div class="card">
        <img class="card-img-top" src="{{url('Gambar/Kinerja/'.$item->gambar)}}" style="height: 190px; width:170px; margin-bottom: 20px; margin: 0x 0x 20px" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$item->judul}}</h5>
          <p class="card-text">{!!$item->isi!!}</p>
          <a href="{{route('detailKinerja', $item->id)}}" class="btn btn-primary">Klik Untuk detail</a>
        </div>

        <div class="card-footer">
          <small class="text-muted">Tanggal kegiatan : {{$item->tanggal_kinerja}}</small>
        </div>
      </div>
      @empty
      <p> Tidak ada data Kinerja </p>
      @endforelse
    </div>
  </div>
</div>

@stop