@extends('layouts.master-dashboard')
@section('content')

  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.html#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboards</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-5 col-md-6">
              <div class="card card-stats">
                <div class="card-header"> menambah pertanyan</div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                  <div class="container">
                        
                        <div class="col-8 offset-2 mt-5">
                        <form action="/questionnaires" method="post">
                   @csrf
                   <div class="form-group">
                        <strong><label for="judul" class="form-label">Judul</label></strong>
                        <input  name="judul" type="text" class="form-control" id="judul" aria-describedby="judulHelp" placeholder="Masukan Judul Pertanyan">
                        <div id="judulHelp" class="form-text text-muted">berikan pertanyaanmu judul yang menarik perhatian</div>
                @error('judul')
                    <div class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                    </div>
                    
                    <div class="form-group">
                        <strong><label for="pertanyan" class="form-label">Pertanyaan</label></strong>
                        <input name="pertanyan" type="text" class="form-control" id="pertanyan" aria-describedby="pertanyaanHelp" placeholder="Masukan Pertanyan">
                        <div id="pertanyaanHelp" class="form-text text-muted">berikan pertanyaanmu  yang menarik perhatian</div>
                        @error('pertanyan')
                    <div class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
</div>
                    <button type="submit" class="btn btn-primary">Kirim Pertanyan</button>
                    </form>
                        </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
@endsection