@extends('layouts.front')
@section('content')
<section id="call-to-action" class="wow fadeIn">
  <div class="container text-center">
    <div class="container" style="margin-top:70px;margin-bottom:-30px;">
      <h3>Detail Berita </h3>
      <p>Diposting Oleh : {{$penulis}} Tanggal : {{$berita->created_at}}</p>
    </div>
  </div>
</section>

<div class="container" style="margin-top:40px">
    <div class="row">
        <div class="col-md-9">
              <div class="panel panel-default">
               <div class="panel-body">
                <div class="post-detail">
                  <h3>{{$berita->judul}}</h3>
                  <hr>
                  <p>
                  <img src="{{url('Gambar/Berita/' .$berita->gambar)}}" width="300px" alt="..." style="float:left;padding:5px 10px 5px 10px;">
                  {!!$berita->isi!!}
                  
                  </p>
                  <div class="d-grid gap-2 d-md-block">
                    @if (isset($previous))
                      <a href="{{route('detailBerita',$berita->previous()->id)}}" class="btn btn-primary">Previous Post</a>
                    @else
                    @endif

                    @if (isset($next))
                      <a href="{{route('detailBerita',$berita->next()->id)}}" class="btn btn-primary">Next Post</a>
                    @else
                    @endif
                  
                  </div>                  
                </div>
                  <br/>
               </div>
               
            </div>
         </div>
         <div class="col-md-3">
            <div class="panel panel-default">
            <div class="panel-heading"><h4 class="text-center">Profil Company</h4></div>
                    <hr>
                    <div class="panel-body">
                        <div class="recent">
                            <iframe width="100%" style="border-radius:20px;" src="https://www.youtube.com/embed/-PTGd7uiVZI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>      
                <br/>
                <hr>

                <div class="panel-heading"><h4 class="text-center">Berita Terbaru</h4></div>
                    <hr>
                    <div class="panel-body">
                    @forelse($recent_news as $br)
                        <div class="recent">
                        <span> <a href="{{route('detailBerita',$br->id)}}" style="color:blue;">{{$br->judul}}</a></span>
                        </div>
                        <br/>
                        @empty
                        @endforelse
                        <hr>
                        <br>
                        {{$recent_news->links()}}
                    </div>
                </div>     
            </div>          
        </div>        
    </div>          
</div>

       
@stop