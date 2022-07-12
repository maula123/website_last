@extends('layouts.master-dashboard')
@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Company</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="dashboard.html#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="dashboard.html#">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
            </ol>
          </nav>
        </div>
        @if(count($kecamatan) > 0 )
        @foreach($kecamatan as $item)
        <div class="col-lg-6 col-5 text-right">
          <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".update_modal_kecamatan" id="updatekecamatan" data-kecamatan_id_update="{{ $item->id }}" data-riwayat_singkat_update="{{ $item->riwayat_singkat}}" data-visi_update="{{ $item->visi }}" data-misi_update="{{ $item->misi }}" data-struktur_organisasi_update="{{ $item->struktur_organisasi }}" title="Edit Profil Kecamatan" style="box-shadow: 3px 2px 5px grey; margin:5px;">
            <i class="fa fa-edit"> </i> Edit Profil </button>
        </div>
      </div>

      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h2 class="card-title text-uppercase mb-0">Sejarah Singkat</h2>
                  <br />
                </div>
              </div>
              <p style="text-align: justify;">
                <?php $riwayat = explode(";", $item->riwayat_singkat);
                foreach ($riwayat as $riwayat_singkat) {
                  echo  $riwayat_singkat . "<br/><br/>";
                }; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-lg-12">
      <!-- Image-Text card -->
      <div class="card">
        <!-- Card body -->
        <div class="card-body">
          <h5 class="h2 card-title mb-0">Visi</h5>
          <p style="text-align: justify;"> <b> {!! $item->visi !!} </b></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-lg-12">
      <!-- Image-Text card -->
      <div class="card">
        <!-- Card body -->
        <div class="card-body">
          <h5 class="h2 card-title mb-0">Misi</h5>
          <p style="text-align: justify">
            {!! $item->misi!!}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-2">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <!-- Card body -->
        <div class="card-body">
          <h5 class="h2 card-title mb-0">Struktur Organisasi</h5>
          <img class="card-img-top" src="{{url('Gambar/Struktur/'.$item->struktur_organisasi)}}" alt="Struktur Organisasi Kecamatan Mendahara Ulu">
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<div class="col-lg-6 col-5 text-right">
  <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_kecamatan" style="box-shadow: 3px 2px 5px grey; margin:5px;"><i class="fa fa-plus-square"> </i> Lengkapi Info Kecamatan</button>
</div>

<div class="container-fluid mt-4">
  <div class="cols-12 alert alert-secondary" role="alert">
    <b> Penting ! </b> INFO Kecamatan Belum Ditambahkan
  </div>
</div>

<!-- Penutup Tambahan -->
</div>
</div>
</div>
</div>
<!-- Penutup Tambahan -->
@endif


@endsection
<!-- panggil cdn ckeditor -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="{{asset('assets_dashboard/vendor/jquery/dist/jquery.min.js')}}"></script>


<script>
  $(document).ready(function() {
    $(document).on('click', '#updatekecamatan', function() {
      var kecamatan_id_update = $(this).data('kecamatan_id_update');
      var riwayat_singkat_update = $(this).data('riwayat_singkat_update');
      var visi_update = $(this).data('visi_update');
      var misi_update = $(this).data('misi_update');
      var struktur_organisasi_update = $(this).data('struktur_organisasi_update');

      $('#kecamatan_id_update').val(kecamatan_id_update);
      $('#riwayat_singkat_update').val(riwayat_singkat_update);
      CKEDITOR.replace('riwayat_singkat_update');
      $('#visi_update').val(visi_update);
      CKEDITOR.replace('visi_update');
      $('#misi_update').val(misi_update);
      CKEDITOR.replace('misi_update');
      $('#struktur_organisasi_update').attr("src", "{{url('Gambar/Struktur')}}" + "/" + struktur_organisasi_update);

    });

  });
</script>

<!-- Modal Edit Info Kecamatan -->
<div class="modal fade update_modal_kecamatan" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('updateKecamatan')}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">UBAH INFO KECAMATAN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="" id="kecamatan_id_update">
          <div class="form-group">
            <label for="riwayat_singkat_update" class="col-form-label">Riwayat Singkat :</label>
            <textarea class="texteditor" name="riwayat_singkat" id="riwayat_singkat_update"></textarea>
          </div>
          <div class="form-group">
            <label for="visi_update" class="col-form-label">Visi :</label>
            <textarea class="texteditor" name="visi" id="visi_update"></textarea>
          </div>
          <div class="form-group">
            <label for="misi_update" class="col-form-label">Misi :</label>
            <textarea class="texteditor" name="misi" id="misi_update"></textarea>
          </div>
          <div class="form-group">
            <label for="struktur_organisasi_update" class="col-form-label">Struktur Organisasi :</label> <br />
            <img src="" class="mb-3" width="50%" id="struktur_organisasi_update">
            <input type="file" name="struktur_organisasi">
            <p><strong>*biarkan kosong jika tidak ingin menambah/mengubah struktur organisasi</strong></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="buttom" class="btn btn-secondary" data-toggle="sweet-alert" data-sweet-alert="success" data-dismiss="modal">Cancel</button>
          <button type="sumbit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
<div>
</div>
<div>
  <div>
  </div>
</div>
</div>
</div>
<!-- Tutup Modal Edit Info Kecamatan -->

<!-- Modal Tambah Info Kecamatan -->
<div class="modal fade create_modal_kecamatan" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('addKecamatan')}}" enctype="multipart/form-data" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="riwayat_singkat" class="col-form-label">Sejarah Singkat:</label>
            <textarea class="ckeditor" name="riwayat_singkat" id="ckeditor"></textarea>
          </div>
          <div class="form-group">
            <label for="visi" class="col-form-label">Visi :</label>
            <textarea class="ckeditor" name="visi" id="ckeditor"></textarea>
          </div>
          <div class="form-group">
            <label for="misi" class="col-form-label">Misi :</label>
            <textarea class="ckeditor" name="misi" id="ckeditor"></textarea>
          </div>
          <div class="form-group">
            <label for="struktur_organisasi" class="col-form-label">Struktur Organisasi :</label> <br />
            <input type="file" name="struktur_organisasi" id="struktur_organisasi">
            <p><strong>*biarkan kosong jika tidak ingin menambah struktur organisasi</strong></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="buttom" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="sumbit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
  </div>
</div>
</div>
<!-- Tutup Modal Tambah Info kecamatan -->

@if(Session::has('success-add-info-kecamatan'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menambah Info Kecamatan !",
    icon: "success",
    button: "OK",
  });
</script>
@endif
@if(Session::has('success-update-info-kecamatan'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Merubah Info Kecamatan !",
    icon: "success",
    button: "OK",
  });
</script>
@endif