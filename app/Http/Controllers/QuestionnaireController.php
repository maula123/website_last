<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\Questionnaire;


class QuestionnaireController extends Controller
{
    //
    public function create()
    {
        return view('questionnaire.create');
    }

    public function stores()
    {
        $data = request()->validate([
            'judul' => 'required',
            'pertanyan' => 'required',
        ]);

  
        $data['user_id'] =auth()->user()->id; 
        $questionnaire = Questionnaire::create($data);
        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {

        $questionnaire->load('questions.answers.responses');
    

        return view('questionnaire.show', compact('questionnaire'));
    }
}
