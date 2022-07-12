@extends('layouts.master-dashboard')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">

    <!-- Search form -->
    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
      <div class="form-group mb-0">
        <div class="input-group input-group-alternative input-group-merge">
          <div class="input-group-prepend">
            <button action="{{route('kinerja')}}" method="GET" class="input-group-text"><i class="fas fa-search"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Search Kinerja..." name="cari">
        </div>
      </div>
      <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </form>

    <div class="header-body">
      <div class="row align-items-center py-2">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kecamatan</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="dashboard.html#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="dashboard.html#">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Publikasi Kinerja</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            <div class="col-6">
              <h3 class="mb-0">Publikasi Kinerja</h3>
            </div>
            <div class="col-6 text-right">
              <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_kinerja" style="box-shadow: 3px 2px 5px grey; margin:5px;"><i class="fa fa-plus-square"> </i> Publikasi Kinerja</button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal Kinerja</th>
                <th>created_at</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>

              @forelse ($kinerja as $item)
              <tr>
                <td class="table-user">
                  <img src="{{url('Gambar/Kinerja/'.$item->gambar)}}" class="avatar rounded-circle mr-3">
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->judul}}</span>
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->tanggal_kinerja}}</span>
                </td>
                <td>
                  <span class="text-muted">{{$item->created_at}}</span>
                </td>
                <td class="table-actions">
                  <a href="#" type="submit" class="table-action" data-original-title="Edit Kinerja" data-toggle="modal" data-target=".update_modal_kinerja" id="updatekinerja" data-kinerja_id_update="{{ $item->id }}" data-judul_update="{{ $item->judul}}" data-isi_update="{{ $item->isi }}" data-gambar_update="{{ $item->gambar }}">
                    <i class="fas fa-user-edit"></i> </a>
                  <a href="#" class="table-action table-action-delete hapus-kinerja" data-kinerja_id="{{$item->id}}" data-toggle="tooltip" data-original-title="Delete Kinerja">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @empty
        </div>

        <tr>
          <td colspan="4">
            <div class="alert alert-secondary" role="alert">Belum ada Publikasi Kinerja</div>
          </td>
        </tr>
        @endforelse


        </tbody>
        </table>
      </div>

    </div>
  </div>

  @endsection
  <!-- panggil cdn ckeditor -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script src="{{asset('assets_dashboard/vendor/jquery/dist/jquery.min.js')}}"></script>

  <!-- Modal Tambah Kinerja -->
  <div class="modal fade create_modal_kinerja" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('addKinerja')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Publikasi Kinerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="judul" class="col-form-label">Judul Publikasi Kinerja:</label>
              <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
              <label for="tanggal_kinerja" class="col-form-label">Tanggal Kinerja:</label>
              <input type="date" class="form-control" name="tanggal_kinerja" id="ckeditor">
            </div>
            <div class="form-group">
              <label for="isi" class="col-form-label">Isi Publikasi Kinerja:</label>
              <textarea class="ckeditor" name="isi" id="ckeditor"></textarea>
            </div>
            <div class="form-group">
              <label for="gambar" class="col-form-label">Gambar :</label> <br />
              <input type="file" name="gambar" id="gambar">
              <p><strong>*biarkan kosong jika tidak ingin menambah gambar </strong></p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="buttom" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="sumbit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Tutup Modal Tambah Info Kinerja -->

<script>
  $(document).ready(function() {
    $(document).on('click', '#updatekinerja', function() {
      var kinerja_id_update = $(this).data('kinerja_id_update');
      var judul_update = $(this).data('judul_update');
      var tanggal_kinerja_update = $(this).data('tanggal_kinerja_update');
      var isi_update = $(this).data('isi_update');
      var gambar_update = $(this).data('gambar_update');

      $('#kinerja_id_update').val(kinerja_id_update);
      $('#judul_update').val(judul_update);
      $('#tanggal_kinerja_update').val(tanggal_kinerja_update);
      $('#isi_update').val(isi_update);
      CKEDITOR.replace('isi_update');
      $('#gambar_update').attr("src", "{{url('Gambar/Kinerja')}}" + "/" + gambar_update);
    });

    $('.hapus-kinerja').click(function() {
      const kinerja_id = $(this).data('kinerja_id');
      swal({
          title: "Hapus Publikasi Kinerja ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/company/kinerja-info/delete/" + kinerja_id;
          }
        });
    });
  });
</script>

<!-- Modal Edit Info Kinerja-->
<div class="modal fade update_modal_kinerja" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('updateKinerja')}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Info Kinerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="" id="kinerja_id_update">
          <div class="form-group">
            <label for="judul_update" class="col-form-label">Judul Kinerja :</label>
            <input type="text" name="judul" class="form-control" value="" id="judul_update">
          </div>
          <div class="form-group">
            <label for="tanggal_kinerja_update" class="col-form-label">Tanggal Kinerja :</label>
            <input type="date" name="tanggal_kinerja" class="form-control" id="tanggal_kinerja_update">
          </div>
          <div class="form-group">
            <label for="isi_update" class="col-form-label">Isi Publikasi Kinerja:</label>
            <textarea class="texteditor" name="isi" id="isi_update"></textarea>
          </div>
          <div class="form-group">
            <label for="gambar_update" class="col-form-label">Gambar :</label> <br />
            <img src="" class="mb-3" width="50%" id="gambar_update">
            <input type="file" name="gambar">
            <p><strong>*biarkan kosong jika tidak ingin mengubah Gambar</strong></p>
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
<!-- Tutup Modal Edit Info Kinerja-->

@if(Session::has('success-add-kinerja'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menambah Kinerja Baru!",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-update-kinerja'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Merubah Info Kinerja",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-delete-kinerja'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menghapus Kinerja",
    icon: "success",
    button: "OK",
  });
</script>
@endif