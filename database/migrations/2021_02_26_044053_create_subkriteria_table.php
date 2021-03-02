<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kriteria_id')->unsigned();
            $table->string('sub_kriteria');
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriteria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subkriteria');
    }
}
