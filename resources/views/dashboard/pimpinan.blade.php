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
            <button action="{{route('pimpinan')}}" method="GET" class="input-group-text"><i class="fas fa-search"></i></span>
          </div>
          <input type="text" class="form-control" placeholder="Search Pimpinan..." name="cari">
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
              <li class="breadcrumb-item active" aria-current="page">Pimpinan</li>
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
              <h3 class="mb-0">Pimpinan</h3>
            </div>
            <div class="col-6 text-right">
              <button type="submit" class="btn btn-sm btn-neutral" data-toggle="modal" data-target=".create_modal_pimpinan" style="box-shadow: 3px 2px 5px grey; margin:5px;"><i class="fa fa-plus-square"> </i>Pimpinan</button>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Ttl</th>
                <th>Jabatan</th>
                <th>Status Kepegawain</th>
                <th>created_at</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>

              @forelse ($pimpinan as $item)
              <tr>
                <td class="table-user">
                  <img src="{{url('Gambar/Pimpinan/'.$item->gambar )}}" class="avatar rounded-circle mr-3">
                </td>
                <td>
                  <span class="font-weight-bold">{{$item->nama}}</span>
                </td>
                <td>
                  <span class="text-muted">{{ $item->nip }}</span>
                </td>
                <td>
                  <span class="text-muted">{{ $item->ttl }}</span>
                </td>
                <td>
                  <span class="text-muted">{{ $item->jabatan }}</span>
                </td>
                <td>
                  <span class="text-muted">{{ $item->status_kepegawaian }}</span>
                </td>
                <td>
                  <span class="text-muted">{{ $item->created_at }}</span>
                </td>
                <td class="table-actions">
                  <a href="#" type="submit" class="table-action" data-original-title="Edit Pimpinan" data-toggle="modal" data-target=".update_modal_pimpinan" id="updatepimpinan" data-pimpinan_id_update="{{ $item->id }}" data-nama_update="{{ $item->nama}}" data-nip_update="{{ $item->nip }}" data-ttl_update="{{ $item->ttl }}" data-jabatan_update="{{ $item->jabatan }}" data-deskripsi_update="{{ $item->deskripsi }}" data-status_kepegawaian_update="{{ $item->status_kepegawaian }}" data-gambar_update="{{ $item->gambar }}">
                    <i class="fas fa-user-edit"></i> </a>
                  <a href="#" class="table-action table-action-delete hapus-pimpinan" data-pimpinan_id="{{$item->id}}" data-toggle="tooltip" data-original-title="Delete Pimpinan">
                    <i class="fas fa-trash"></i>
                  </a>
        </div>
        </td>
        </tr>
        @empty
        <tr>
          <td colspan="4">
            <div class="alert alert-secondary" role="alert">Belum ada Pimpinan</div>
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
  <div class="modal fade create_modal_pimpinan" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('addPimpinan')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pimpinan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama" class="col-form-label">Nama :</label>
              <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="form-group">
              <label for="nip" class="col-form-label">Nip :</label>
              <input type="text" class="form-control" name="nip" id="nip"></input>
            </div>
            <div class="form-group">
              <label for="ttl" class="col-form-label">Tempat,Tanggal Lahir:</label>
              <input type="text" class="form-control" name="ttl" id="ttl">
            </div>
            <div class="form-group">
              <label for="jabatan" class="col-form-label">Jabatan :</label>
              <input type="text" class="form-control" name="jabatan" id="jabatan">
            </div>
            <div class="form-group">
              <label for="deskripsi" class="col-form-label">Deskripsi :</label>
              <textarea class="ckeditor" name="deskripsi" id="ckeditor"></textarea>
            </div>
            <div class="form-group">
              <label for="status_kepegawaian" class="col-form-label">Status Kepegawaian:</label>
              <input type="text" class="form-control" name="status_kepegawaian" id="status_kepegawaian">
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
    $(document).on('click', '#updatepimpinan', function() {
      var pimpinan_id_update = $(this).data('pimpinan_id_update');
      var nama_update = $(this).data('nama_update');
      var nip_update = $(this).data('nip_update');
      var ttl_update = $(this).data('ttl_update');
      var jabatan_update = $(this).data('jabatan_update');
      var deskripsi_update = $(this).data('deskripsi_update');
      var status_kepegawaian_update = $(this).data('status_kepegawaian_update');
      var gambar_update = $(this).data('gambar_update');

      $('#pimpinan_id_update ').val(pimpinan_id_update);
      $('#nama_update').val(nama_update);
      $('#nip_update').val(nip_update);
      $('#ttl_update').val(ttl_update);
      $('#jabatan_update').val(jabatan_update);
      $('#deskripsi_update').val(deskripsi_update);
      CKEDITOR.replace('deskripsi_update');
      $('#status_kepegawaian_update').val(status_kepegawaian_update);
      $('#gambar_update').attr("src", "{{url('Gambar/Pimpinan')}}" + "/" + gambar_update);
    });

    $('.hapus-pimpinan').click(function() {
      const pimpinan_id = $(this).data('pimpinan_id');
      swal({
          title: "Hapus Pimpinan ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/company/pimpinan-info/delete/" + pimpinan_id;
          }
        });
    });
  });
</script>

<!-- Modal Edit Info pimpinan-->
<div class="modal fade update_modal_pimpinan" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('updatePimpinan')}}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Info Pimpinan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" value="" id="pimpinan_id_update">
          <div class="form-group">
            <label for="nama_update" class="col-form-label">Nama :</label>
            <input type="text" class="form-control" name="nama" id="nama_update">
          </div>
          <div class="form-group">
            <label for="nip_update" class="col-form-label">Nip :</label>
            <input id="nip_update" class="form-control" name="nip"></input>
          </div>
          <div class="form-group">
            <label for="ttl_update" class="col-form-label">Tempat,Tanggal Lahir:</label>
            <input type="text" class="form-control" name="ttl" id="ttl_update">
          </div>
          <div class="form-group">
            <label for="jabatan_update" class="col-form-label">Jabatan :</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan_update">
          </div>
          <div class="form-group">
            <label for="deskripsi_update" class="col-form-label">Deskripsi:</label>
            <textarea class="texteditor" placeholder="ISI DESKRIPSI MAX 10 BARIS" name="deskripsi" id="deskripsi_update"></textarea>
          </div>
          <div class="form-group">
            <label for="status_kepegawaian_update" class="col-form-label">Status Kepegawaian:</label>
            <input type="text" class="form-control" name="status_kepegawaian" id="status_kepegawaian_update">
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

@if(Session::has('success-add-pimpinan'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menambah pimpinan baru!",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-update-pimpinan'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Merubah Info pimpinan",
    icon: "success",
    button: "OK",
  });
</script>
@endif

@if(Session::has('success-delete-pimpinan'))
<script>
  swal({
    title: "Berhasil",
    text: "Berhasil Menghapus pimpinan",
    icon: "success",
    button: "OK",
  });
</script>
@endif