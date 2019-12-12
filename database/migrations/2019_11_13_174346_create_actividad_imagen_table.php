<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_imagen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imagen_id')->unsigned();
            $table->bigInteger('actividad_id')->unsigned();
            $table->foreign('imagen_id')->references('id')->on('sliders');
            $table->foreign('actividad_id')->references('id')->on('actividades');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_imagen');
    }
}
