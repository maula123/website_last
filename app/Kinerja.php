<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{

    protected $table = 'kinerja';
    protected $guarded = [];

    public function next()
    {
        return $this->where('id', '>', $this->id)->orderBy('id')->first();
    }

    public function previous()
    {
        return $this->where('id', '<', $this->id)->orderBy('id')->first();
    }
}
