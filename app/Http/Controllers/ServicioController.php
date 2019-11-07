<?php

namespace App\Http\Controllers;

use App\archivo_servicio;
use App\imagen_servicio;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        public function servicios(){
            $hola= Servicio::get();
            return $hola->toArray();
          }
          public function servicio(Request $request){
            $contenido=Servicio::where('id','=',$request->id)->first();
            return $contenido;
        }
        public function actualizar(Request $request)
        {
            if($request->algo!=''){
            $imagen = getimagesize($request->algo);
            $ancho = $imagen[0];              //Ancho
            $alto = $imagen[1];
    echo "aca entro";


        }
            $slider=Servicio::where('id', '=', $request->id)->first();

            $slider->titulos=$request->titulo;
            $slider->descripcion=$request->descripcion;
            $slider->contenido=$request->contenido;

           // $slider->visibilidad=$request->visible;




          if($request->algo!=''){

              //elimino imagen antigua
              $mi_imagen = public_path().'/'.$slider->destacada;

    if (@getimagesize($mi_imagen)) {
        unlink($mi_imagen);
    }
    else
    {
    return 100;
    }
            $exploded= explode(',',$request->algo);
            $decoded=base64_decode($exploded[1]);
            $extension="";
                 if(Str::contains($exploded[0],'jpeg')){
            $extension="jpg";
                 }else{
                     $extension="png";
                 }
                $fileName= Str::random().'.'.$extension;

                $path=public_path()."/sliders/".$fileName;
                file_put_contents($path,$decoded);
                $slider->destacada='sliders/'.$fileName;

          }
          if($slider->save()){
            return 1;
        }else {
            return 100;
        }

        }
        public function eliminar(Request $request)
    {
         echo $request->id ."-- ";
        $slider=Servicio::where('id', '=', $request->id)->first();
 if($slider!=null){
    $mi_imagen = public_path().'/'.$slider->destacada;
    unlink($mi_imagen);
    $slider->delete();
    return 1;
 }else{
     return 0;
 }

}
public function ser(){
    $ser=Servicio::get()->toArray();
    return $ser;
}
public function registrar(Request $request){
    $ta= new imagen_servicio();
   $verificar = DB::select('select *
   from imagen_servicio where  servicio_id = :archivo and imagen_id = :tramite',
   ["archivo" => $request->id1, "tramite"=>$request->id2]);




    $ta->servicio_id=$request->id1;
    $ta->imagen_id=$request->id2;
$a=count($verificar);


    if($a<1){
$ta->save();
       return 1;
    }else{

       return 0;
    }
}
public function registrarA(Request $request){
    $ta= new archivo_servicio();
   $verificar = DB::select('select *
   from archivo_servicio where  servicio_id = :servicio and archivo_id = :archivo',
   ["archivo" => $request->id1, "servicio"=>$request->id2]);




    $ta->servicio_id=$request->id2;
    $ta->archivo_id=$request->id1;
$a=count($verificar);


    if($a<1){
$ta->save();
       return 1;
    }else{

       return 0;
    }
}
public function index(Request $request)
    {
        $buscar=$request->buscar;

    if($buscar!=''){
        $data=DB::table('imagen_servicio')
        ->join('servicios','servicio_id','=','servicios.id')
        ->join('sliders','imagen_id','=','sliders.id')
        ->select('imagen_id','servicios.titulos','servicio_id','sliders.titulo')->where('servicios.titulos','like','%'.$buscar.'%')
        ->orWhere( 'id','sliders.titulo','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('imagen_servicio')
            ->join('servicios','servicio_id','=','servicios.id')
            ->join('sliders','imagen_id','=','sliders.id')
            ->select('imagen_servicio.id','imagen_id','servicios.titulos','servicio_id','sliders.titulo')->paginate(5);

        }


return $data;

    }
    public function index2(Request $request)
    {
        $buscar=$request->buscar;

    if($buscar!=''){
        $data=DB::table('archivo_servicio')
        ->join('servicios','servicio_id','=','servicios.id')
        ->join('archivos','archivo_id','=','archivo.id')
        ->select('archivo_servicio.id','archivo_id','servicios.titulos','servicio_id','archivos.nombre')->where('servicios.titulos','like','%'.$buscar.'%')
        ->orWhere( 'archivos.nombre','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('archivo_servicio')
            ->join('servicios','servicio_id','=','servicios.id')
            ->join('archivos','archivo_id','=','archivos.id')
            ->select('archivo_servicio.id','archivo_id','servicios.titulos','servicio_id','archivos.nombre')->paginate(5);
        }


return $data;

    }

    public function destroy(Request $request){
        $request->id;
        $slider=imagen_servicio::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }
    public function destroy2(Request $request){
        $request->id;
        $slider=archivo_servicio::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }


}
