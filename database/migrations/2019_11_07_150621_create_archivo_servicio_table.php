<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('archivo_id')->unsigned();
            $table->bigInteger('servicio_id')->unsigned();
            $table->foreign('archivo_id')->references('id')->on('archivos');
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
        Schema::dropIfExists('archivo_servicio');
    }
}
