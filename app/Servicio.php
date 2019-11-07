<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{

    public function  sliders(){
        return $this->belongsToMany(Tramite::class,'imagen_servicio','servicio_id','imagen_id');
    }

}
