<?php

namespace App\Models;
use Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; 

class Questionnaire extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function path()
    {
        return url('/questionnaires/'. $this->id);
    }

    public function publicPath()
    {
        return url('/surveys/'.$this->id. "-". Str::slug($this->judul));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function survey()
    {
        return $this->hasMany(survey::class);
    }
}
