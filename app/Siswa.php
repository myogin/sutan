<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    public $table = "siswa";

    public function penilaian(){
        return $this->hasOne("App\Penilaian");
    }
}
