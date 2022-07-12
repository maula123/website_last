@extends('layouts.master-dashboard')
@section('content')

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-3 col-4">
                    <h6 class="h2 text-white d-inline-block mb-0">{{$questionnaire->judul}}</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
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
                                    <form action="/survey/{{$questionnaire->id}}-{{Str::slug($questionnaire->judul)}}" method="post">
                                        @csrf

                                        <div class="col-8-md-8">
                                            @foreach($questionnaire->questions as $key => $question)
                                            <div class="card">
                                                <strong>
                                                    <div class="card-header"><strong>{{$key + 1}}</strong>.&nbsp;&nbsp;{{$question->question }}</div>
                                                </strong>
                                                <div class="card-body">
                                                    @error('responses.' . $key . '.answer_id')
                                                    <small class="text-danger">{{$message}} </small>

                                                    @enderror
                                                    <ul class="list-group">
                                                        @foreach($question->answers as $answer)
                                                        <label for="answer{{$answer->id}}">
                                                            <li class="list-group-item">
                                                                <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}"
                                                                {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''}}
                                                                class="mr-2" value="{{$answer->id}}">
                                                                {{$answer->answer}}
                                                                <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                                            </li>
                                                        </label>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endforeach

                                           
                                        </div>
                                    
                                    
                                            <div class="card">
                                            <strong><div class="card-header">Masukan Data Diri Anda</div></strong>
                                            <div class="col-8 offset-2 mt-5">
                                                    @csrf
                                                    <div class="form-group">
                                                        <strong><label for="question" class="form-label">Nama </label></strong>
                                                        <input name="survey[name]" type="text" class="form-control" 
                                                        id="namaHelp" aria-describedby="namaHelp" placeholder="Masukan Nama Anda">
                    
                                                        @error('name') 
                                                        <div class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                                <strong><label class="form-label">Email</label></strong>
                                                                <input name="survey[email]" type="email" class="form-control" 
                                                                id="emailHelp" aria-describedby="emailHelp" placeholder="Masukan Email Anda"> 
                                                                <br>
                                                                @error('email')
                                                                <div class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                <br>
                                                                @enderror
                                                            </div>
                                                            <button class="btn btn-dark" type="submit">selesai survei</button>
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
</div>

@endsection