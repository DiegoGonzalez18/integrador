<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable=['titulo','url','visibilidad'];

    public function  Archivos(){
        return $this->belongsToMany(Archivo::class,'imagen_servicio','imagen_id','servicio_id');
    }
    public function  Actividades(){
        return $this->belongsToMany(Slider::class,'imagen_servicio','imagen_id','actividad_id');
    }
}
