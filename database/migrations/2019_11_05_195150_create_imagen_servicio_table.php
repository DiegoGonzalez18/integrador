<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('imagen_id')->unsigned();
            $table->bigInteger('servicio_id')->unsigned();
            $table->foreign('imagen_id')->references('id')->on('sliders');
            $table->foreign('servicio_id')->references('id')->on('servicios');

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
        Schema::dropIfExists('imagen_servicio');
    }
}
