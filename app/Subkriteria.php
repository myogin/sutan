<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    //
    public $table = "subkriteria";
    public function kriteria(){
        return $this->belongsTo('App\Kriteria');
    }
}
