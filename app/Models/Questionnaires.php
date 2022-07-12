<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaires extends Model
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

    public function questionnaires()
    {
        return $this->belongsTo(questionnaires::class);
    }
}
