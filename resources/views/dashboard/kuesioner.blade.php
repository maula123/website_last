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
            <div class="col-xl-12 col-md-12">
              <div class="card card-stats">
                <!-- Card body -->
                    <div class="card">
                       <div class="card-body">
                    
                          <a href="/questionnaires/create" class="btn btn-dark">Buat Pertanyaan Baru</a>
                       </div>
                    </div>
                    <div class="card">
                      <div class="card-header">List Pertanyaan</div>
                      <div class="card-body">
                        <ul class="list-group">
                        

                       

                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item">
                        <a href="{{$questionnaire->path()}}">{{$questionnaire->judul}}</a>

                        <div class="mt-2">
                          <small class="font-weight-bold">URL Pertanyaan</small>
                          <p>
                            <a href="{{$questionnaire->publicPath()}}">
                              {{$questionnaire->publicPath()}}
                            </a>
                          </p>
                        </div>
                        </li>
                        @endforeach
                       
                        </ul>
                      </div>
                    </div>    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
@endsection