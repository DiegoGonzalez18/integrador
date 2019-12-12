<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_archivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('archivo_id')->unsigned();
            $table->bigInteger('actividad_id')->unsigned();
            $table->foreign('archivo_id')->references('id')->on('archivos');
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
        Schema::dropIfExists('actividad_archivo');
    }
}
