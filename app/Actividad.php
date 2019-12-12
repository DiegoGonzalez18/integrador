<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table = 'actividades';
    public function  sliders(){
        return $this->belongsToMany( Slider::class,'actividad_imagen','actividad_id','imagen_id');
    }
    public function  archivos(){
        return $this->belongsToMany(Archivo::class,'actividad_archivo','actividad_id','archivo_id');
    }

}
