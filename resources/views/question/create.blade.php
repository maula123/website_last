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
                            <li class="breadcrumb-item active" aria-current="page">membuat pertanyaan baru</li>
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
                        <div class="card-body1">
                            <div class="row">
                                <div class="container">

                                    <div class="col-8 offset-2 mt-5">
                                        <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <strong><label for="question" class="form-label">Pertanyaan</label></strong>
                                                <input name="question[question]" type="text" class="form-control" 
                                                value="{{old('question.question')}}"
                                                id="question" aria-describedby="judulHelp" placeholder="Enter Pertanyan">
                                                <div id="judulHelp" class="form-text text-muted">Ajukan Pertanyaan sederhanan dan langsung ke point</div>
                                                
                                                @error('question.question') 
                                                <div class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                                @enderror
                                            </div>
                                             <div class="form-group">
                                                <fieldset>
                                                    <legend>Pilihan</legend>
                                                    <small id="pilihanhelp" class="form-text">berikan pilihan yang membuat anda menambah wawasan </small>
                                                    <div>
                                                    <br>
                                                        <strong><label for="answer1" class="form-label">Jawaban 1</label></strong>
                                                        <br>
                                                        <input name="answers[][answer]" type="text" class="form-control" 
                                                        value="{{ old('answers.a.answer') }}"
                                                        id="answer1" aria-describedby="answer1Help" placeholder="Enter Jawaban  1"> 
                                                        <br>
                                                         @error('answers.a.answer')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        <br>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <strong><label for="answer2" class="form-label">Jawaban 2</label></strong>
                                                        <br>
                                                        <input name="answers[][answer]" type="text" class="form-control" 
                                                        value="{{old ('answers.b.answer') }}"
                                                        id="answer2" aria-describedby="answer2Help" placeholder="Enter Jawaban  2">
                                                        <br>
                                                        @error('answers.b.answer')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        <br>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <strong><label for="answer3" class="form-label">Jawaban 3</label></strong>
                                                        <br>
                                                        <input name="answers[][answer]" type="text" class="form-control" 
                                                        value="{{old('answers.c.answer')}}"
                                                        id="answer3" aria-describedby="answer3Help" placeholder="Enter Jawaban 3">
                                                        <br>
                                                        @error('answers.c.answer')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        <br>
                                                        @enderror
                                                    </div>

                                                    <div>
                                                        <strong><label for="answer4" class="form-label">Jawaban 4</label></strong>
                                                        <br>
                                                        <input name="answers[][answer]" type="text" class="form-control" 
                                                        value="{{old('answers.  d.answer')}}"
                                                        id="answer4" aria-describedby="answer4Help" placeholder="Enter Jawaban 4">
                                                        <br>
                                                        @error('answers.d.answer')
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        <br>
                                                        @enderror
                                                    </div>
                                                </fieldset>
                                                <button type="submit" class="btn btn-primary">Kirim Pertanyan</button>
                                            </div>
                                            
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