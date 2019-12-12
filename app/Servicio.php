<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    public function  sliders(){
        return $this->belongsToMany(Slider::class,'imagen_servicio','servicio_id','imagen_id');
    }
    public function  archivos(){
        return $this->belongsToMany(Archivo::class,'archivo_servicio','servicio_id','archivo_id');
    }


}
