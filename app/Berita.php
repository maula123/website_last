<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $guarded = [];

    public function next(){
        return $this->where('id','>',$this->id)->orderBy('id')->first();
    }

    public function previous(){
        return $this->where('id','<',$this->id)->orderBy('id')->first();
    }
}
