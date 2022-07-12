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
            <button action="{{route('berita-dan-informasi')}}" method="GET" class="input-group-text"><i class="fas fa-search"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Search Berita..." name="cari">
        </div>
      </div>
      <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </form>

    <div class="header-body">
      <div class="row align-items-center py-2">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Company</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="dashboard.html#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="dashboard.html#">Dashboards</a></li>
              <li class="breadcrumb-item active" aria-current="page">Berita & Informasi</li>
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
              <h3 class="mb-0">Berita & Informasi</h3>
            </div>
            <div class="col-6 text-right">
              <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_berita" style="box-shadow: 3px 2px 5px grey; margin:5px;"><i class="fa fa-plus-square"> </i>Berita & Informasi</button>
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
                <th>created_at</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>

              @forelse ($berita as $item)
              <tr>
                <td class="table-user">
                  <img src="{{url('Gambar/Berita/'.$item->gambar)}}" class="avatar rounded-circle mr-3">
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->judul}}</span>
                </td>
                <td>
                  <span class="text-muted">{{$item->created_at}}</span>
                </td>
                <td class="table-actions">
                  <a href="#" type="submit" class="table-action" data-original-title="Edit Berita" data-toggle="modal" data-target=".update_modal_berita" id="updateberita" data-berita_id_update="{{ $item->id }}" data-judul_update="{{ $item->judul}}" data-isi_update="{{ $item->isi }}" data-gambar_update="{{ $item->gambar }}">
                    <i class="fas fa-user-edit"></i> </a>
                  <a href="#" class="table-action table-action-delete hapus-berita" data-berita_id="{{$item->id}}" data-toggle="tooltip" data-original-title="Delete Berita">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @empty
        </div>

        <tr>
          <td colspan="4">
            <div class="alert alert-secondary" role="alert">Belum ada Berita</div>
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

  <!-- Modal Tambah Berita -->
  <div class="modal fade create_modal_berita" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('addBerita')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="judul" class="col-form-label">Judul Berita:</label>
              <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
              <label for="isi" class="col-form-label">Isi Berita :</label>
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
      </form>
    </div>
  </div>
</div>
<!-- Tutup Modal Tambah Info Berita -->

<script>
  $(document).ready(function() {
    $(document).on('click', '#updateberita', function() {
      var berita_id_update = $(this).data('berita_id_update');
      var judul_update = $(this).data('judul_update');
      var isi_update = $(this).data('isi_update');
      var gambar_update = $(this).data('gambar_update');

      $('#berita_id_update ').val(berita_id_update);
      $('#judul_update').val(judul_update);
      $('#isi_update').val(isi_update);
      CKEDITOR.replace('isi_update');
      $('#gambar_update').attr("src", "{{url('Gambar/Berita')}}" + "/" + gambar_update);
    });

    $('.hapus-berita').click(function() {
      const berita_id = $(this).data('berita_id');
      swal({
          title: "Hapus Berita ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/company/bisnis/berita-dan-informasi/delete/" + berita_id;
          }
        });
    });
  });
</script>

<!-- Modal Edit Info Berita-->
<div class="modal fade update_modal_berita" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('updateBerita')}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Info Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="" id="berita_id_update">
          <div class="form-group">
            <label for="judul_update" class="col-form-label">Judul Berita :</label>
            <input type="text" name="judul" class="form-control" value="" id="judul_update">
          </div>
          <div class="form-group">
            <label for="isi_update" class="col-form-label">Isi Berita:</label>
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
<!-- Tutup Modal Edit Info Berita-->

@if(Session::has('success-add-berita'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menambah Berita Baru!",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-update-berita'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Merubah Info Berita",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-delete-berita'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menghapus Berita",
    icon: "success",
    button: "OK",
  });
</script>
@endif