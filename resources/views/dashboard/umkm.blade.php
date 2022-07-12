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
            <button action="{{route('umkm')}}" method="GET" class="input-group-text"><i class="fas fa-search"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Search Umkm..." name="cari">
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
              <li class="breadcrumb-item"><a href="dashboard.html#">Potensi Daerah</a></li>
              <li class="breadcrumb-item active" aria-current="page">Umkm
              <li>
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
              <h3 class="mb-0">Umkm</h3>
            </div>
            <div class="col-6 text-right">
              <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_umkm" style="box-shadow: 3px 2px 5px grey; margin:5px;"><i class="fa fa-plus-square"> </i> Umkm</button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Nama Umkm</th>
                <th>Nama Pemilik</th>
                <th>Alamat</th>
                <th>Gambar</th>
                <th>created_at</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>

              @forelse ($umkm as $item)
              <tr>
                <td>
                  <span class="font-weight-bold">{{$item->nama_umkm}}</span>
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->nama_pemilik}}</span>
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->alamat}}</span>
                </td>
                <td class="table-user">
                  <img src="{{url('Gambar/Umkm/'.$item->gambar )}}" style="height: 190px; width:170px;" class="avatar rounded mr-3">
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->created_at}}</span>
                </td>
                <td class="table-actions">
                  <a href="#" type="submit" class="table-action" data-original-title="Edit Umkm" data-toggle="modal" data-target=".update_modal_umkm" id="updateumkm" data-umkm_id_update="{{ $item->id }}" data-nama_umkm_update="{{ $item->nama_umkm}}" data-nama_pemilik_update="{{ $item->nama_pemilik }}" data-alamat_update="{{ $item->alamat }}" data-deskripsi_produk_update="{{ $item->deskripsi_produk }}" data-gambar_update="{{ $item->gambar }}">
                    <i class="fas fa-user-edit"></i> </a>
                  <a href="#" class="table-action table-action-delete hapus-umkm" data-umkm_id="{{$item->id}}" data-toggle="tooltip" data-original-title="Delete Umkm">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
              @empty
        </div>

        <tr>
          <td colspan="4">
            <div class="alert alert-secondary" role="alert">Belum ada Umkm</div>
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

  <!-- Modal Tambah Umkm -->
  <div class="modal fade create_modal_umkm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('addUmkm')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Umkm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_umkm" class="col-form-label">Nama Umkm:</label>
              <input type="text" class="form-control" name="nama_umkm" id="nama_umkm">
            </div>
            <div class="form-group">
              <label for="nama_pemilik" class="col-form-label">Nama Pemilik:</label>
              <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik">
            </div>
            <div class="form-group">
              <label for="alamat" class="col-form-label">Alamat Umkm:</label>
              <input type="text" class="form-control" name="alamat" id="alamat">
            </div>
            <div class="form-group">
              <label for="deskripsi_produk" class="col-form-label">Deskripsi Umkm:</label>
              <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk">
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
<!-- Tutup Modal Tambah Info Umkm -->

<script>
  $(document).ready(function() {
    $(document).on('click', '#updateumkm', function() {
      var umkm_id_update = $(this).data('umkm_id_update');
      var nama_umkm_update = $(this).data('nama_umkm_update');
      var nama_pemilik_update = $(this).data('nama_pemilik_update');
      var alamat_update = $(this).data('alamat_update');
      var deskripsi_produk_update= $(this).data('deskripsi_produk_update');
      var gambar_update = $(this).data('gambar_update');

      $('#umkm_id_update').val(umkm_id_update);
      $('#nama_umkm_update').val(nama_umkm_update);
      $('#nama_pemilik_update').val(nama_pemilik_update);
      $('#alamat_update').val(alamat_update);
      $('#deskripsi_produk_update').val(deskripsi_produk_update);
      $('#gambar_update').attr("src", "{{url('Gambar/Umkm')}}" + "/" + gambar_update);
    });

    $('.hapus-umkm').click(function() {
      const umkm_id = $(this).data('umkm_id');
      swal({
          title: "Hapus Umkm ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/Umkm/delete/" + umkm_id;
          }
        });
    });
  });
</script>

<!-- Modal Edit Info Umkm-->
<div class="modal fade update_modal_umkm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('updateUmkm')}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Info Umkm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="" id="umkm_id_update">
          <div class="form-group">
            <label for="nama_umkm_update" class="col-form-label">Nama Umkm:</label>
            <input type="text" class="form-control"  name="nama_umkm" id="nama_umkm_update">
          </div>
          <div class="form-group">
            <label for="nama_pemilik_update" class="col-form-label">Nama Pemilik :</label>
            <input id="nama_pemilik_update" class="form-control" name="nama_pemilik" >
          </div>
          <div class="form-group">
            <label for="alamat_update" class="col-form-label">Alamat:</label>
            <input type="text" class="form-control" name="alamat" id="alamat_update">
          </div>
          <div class="form-group">
            <label for="deskripsi_produk_update'" class="col-form-label">Deskripsi Produk :</label>
            <input type="text" class="form-control" name="deskripsi_produk" id="deskripsi_produk_update">
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
</div>>
<!-- Tutup Modal Edit Info Umkm-->

@if(Session::has('success-add-umkm'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menambah Umkm Baru!",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-update-umkm'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Merubah Info Umkm",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-delete-umkm'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menghapus Umkm",
    icon: "success",
    button: "OK",
  });
</script>
@endif