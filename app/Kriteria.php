<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    public $table = "kriteria";

    public function subkriteria(){
        return $this->hasMany('App\Subkriteria');
    }
}
