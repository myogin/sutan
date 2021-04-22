<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    public $table = "guru";

    public function penilaian(){
        return $this->hasOne("App\Penilaian");
    }
}
