<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    //
    public $table = "penilaian";

    public function siswa(){
        return $this->belongsTo("App\Siswa");
       }

}
