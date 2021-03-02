<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penilaian', function (Blueprint $table) {
            $table->bigInteger('penilaian_id')->unsigned();
            $table->bigInteger('subkriteria_id')->unsigned();
            $table->integer('nilai');
            $table->integer('bobot');
            $table->timestamps();

            $table->primary(['penilaian_id', 'subkriteria_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penilaian');
    }
}
