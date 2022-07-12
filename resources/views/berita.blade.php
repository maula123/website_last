@extends('layouts.front')
<link rel="stylesheet" href="{{asset('berita/style.css')}}">
@section('content')
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <div class="container" style="margin-top:70px;margin-bottom:-30px;">
      <h3>Berita</h3>
    </div>
  </div>
</section>

<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body">
          @forelse($berita as $item)
          <h3>{{$item->judul}}</h3>
          <div class="info-meta">
            <span> Oleh : {{$penulis}} . Pada : {{$item->created_at}}
          </div>
          <hr>

          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object " src="{{url('Gambar/Berita/' .$item->gambar)}}" width="100%" height="500px">
            </a>
            <div class="media-body">
              <?php $isi = explode('.', $item->isi);  ?>
              <p><?php echo  $isi[0] . "."; ?></p>
            </div>
            <p style="text-align:right;">
              <a href="{{route('detailBerita',$item->id)}}">
                <button class="btn btn-primary">Selengkapnya</button>
              </a>
            </p>
          </div>
          @empty
          @endforelse
          <hr>

          <div class="row">
            <div class="col-lg-12">

              {{$berita->links()}}

            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="col-md-3">

      <div class='row'>
        <div class="col-md-14">
          <form action="{{route('berita')}}" method="GET">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Search Berita..." name="cari">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      &nbsp;

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-center">Profil Company</h4>
        </div>
        <hr>
        <div class="panel-body">
          <div class="recent">
            <iframe width="100%" style="border-radius:20px;" src="https://www.youtube.com/embed/-PTGd7uiVZI?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <br />
      <hr>

      <div class="panel-heading">
        <h4 class="text-center">Berita Terbaru</h4>
      </div>
      <hr>
      <div class="panel-body">
        @forelse($recent_news as $br)
        <div class="recent">
          <span> <a href="{{route('detailBerita',$br->id)}}" style="color:blue;">{{$br->judul}}</a></span>
        </div>
        @empty
        @endforelse
        <hr>
        <br>

      </div>
    </div>
  </div>
</div>
</div>
@stop