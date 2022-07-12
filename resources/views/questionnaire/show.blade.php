@extends('layouts.master-dashboard')
@section('content')

  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-3 col-4">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="dashboard.html#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>
            </div>
          </div>
          
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-5 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->  
                <div class="card-body1">
                  <div class="row">
                  <div class="container">

                        <div class="col-8-md-8">
                          <div class="card">
                            <strong><div class="card-header">{{ $questionnaire->judul }}</div></strong>
                              <div class="card-body">
                                <a class="btn btn-dark" href="/questionnaires/{{$questionnaire->id}}/questions/create">Menambah Pertanyaan</a>
                              </div>
                              <div class="card-body">
                                <a class="btn btn-dark" href="/survey/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->judul )}}">Melihat Survey Jawaban</a>
                              </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            @foreach($questionnaire->questions as $key => $question)
                            <div class="card">
                              <strong><div class="card-header"><strong>{{$key + 1}}</strong>.&nbsp;&nbsp;{{$question->question }}</div></strong>
                              <div class="card-body">
                                <ul class="list-group">
                                @foreach($question->answers as $answer) 
                                 <label for="answer{{$answer->id}}">
                                 <li class="list-group-item d-flex justify-content-between">
                                    <div>{{$answer->answer}}</div>
                                    @if($answer->responses->count())
                                    <div>{{intval($answer->responses->count() *100 / $question->responses->count())}} %</div>
                                    @endif
                                  </li>
                                 </label>
                                  @endforeach 
                                </ul>
                              </div>
                              

                              <div class="card-footer">
                                <form action="/questionnaires/{{ $questionnaire->id }}/questions/{{$question->id}}" method="post">
                                  @method('DELETE')
                                  @csrf

                                  <button type="submit" class="btn btn-sm btn-outline-danger">Hapus Pertanyaan</button>
                                </form>
                              </div>
                            </div>
                            @endforeach
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
    </div>


@endsection