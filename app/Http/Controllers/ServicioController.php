<?php

namespace App\Http\Controllers;

use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicioController extends Controller
{
    //
    public function store(Request $request)
    {
       $exploded= explode(',',$request->algo);
       $decoded=base64_decode($exploded[1]);
       $imagen = getimagesize($request->algo);
       $ancho = $imagen[0];              //Ancho
       $alto = $imagen[1];


 //Sacamos la información
 $imagen = getimagesize($request->algo);
  $ancho = $imagen[0];              //Ancho
  $alto = $imagen[1];

       $extension="";
            if(Str::contains($exploded[0],'jpeg')){
$extension="jpg";
            }else{
                $extension="png";
            }
            $nombre=Str::random().Str::random().Str::random();
           $fileName= $nombre.'.'.$extension;

           $path=public_path()."/sliders/".$fileName;
           file_put_contents($path,$decoded);

            $slider = new Servicio();
            $slider->titulos=$request->titulo;
            $slider->destacada='sliders/'.$fileName;
            $slider->descripcion=$request->descripcion;
            $slider->contenido=$request->contenido;
          if($slider->save()){
              return 1;
          }else {
              return 0;
          }


        }
}
