
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
      <a href=""></i> Pimpinan</a> <i class="fa fa-angle-right"></i>
      <span>Pimpinan  Detail </span>
      
    </div>
  </div>

<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div><img src="{{url('Gambar/Pimpinan/'.$pimpinan->gambar)}}" class="img-fluid rounded-start" alt="..."></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-5">
                    <h4 class="box-title mt-5 fw-bold text-decoration-underline">{{$pimpinan->nama}}</h4>
                    <h4 class="box-title mt-5 fw-bold text-decoration-underlin">NIP: {{$pimpinan->nip}}</h4>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">Tetang Saya</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Nama</td>
                                    <td>{{$pimpinan->nama}}</td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>{{$pimpinan->nip}}</td>
                                </tr>
                                <tr>
                                    <td>Status Kepegawaian</td>
                                    <td>{{$pimpinan->status_kepegawaian}}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>{{$pimpinan->jabatan}}</td>
                                </tr>
                                <tr>
                                    <td>Tempat,Tanggal Lahir</td>
                                    <td>{{$pimpinan->ttl}}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td style="text-align: justify">{!!$pimpinan->deskripsi!!}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
     
<style>
    .card {
    margin-bottom: 30px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: 0;
}
.card .card-subtitle {
    font-weight: 300;
    margin-bottom: 10px;
    color: #8898aa;
}
.table-product.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f3f8fa!important
}
.table-product td{
    border-top: 0px solid #dee2e6 !important;
    color: #728299!important;
}
    </style>
        @stop 