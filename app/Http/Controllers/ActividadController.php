<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\actividad_archivo;
use App\actividad_imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActividadController extends Controller
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

  if(($ancho > 659 && $alto>370) ||($alto < 340 && $ancho < 630)){

    return -5;
  }


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

            $slider = new Actividad();
            $slider->titulos=$request->titulo;
            $slider->destacada='sliders/'.$fileName;
            $slider->descripcion=$request->descripcion;
            $slider->contenido=$request->contenido;
            $slider->fecha=$request->fecha;
            $slider->lugar=$request->lugar;
          if($slider->save()){
              return 1;
          }else {
              return 0;
          }


        }
        public function actividades(){
            $hola= Actividad::get();
            return $hola->toArray();
          }
          public function actualizar(Request $request){
              $hola= Actividad::where('id','=',$request->id)->first();
              return $hola;
          }
          public function actualizarActividad(Request $request)
          {
              if($request->algo!=''){
              $imagen = getimagesize($request->algo);
              $ancho = $imagen[0];              //Ancho
              $alto = $imagen[1];
      echo "aca entro";
      if(($ancho > 659 && $alto>370) ||($alto < 340 && $ancho < 630)){

    return -5;
  }


          }
              $slider=Actividad::where('id', '=', $request->id)->first();

              $slider->titulos=$request->titulo;
              $slider->descripcion=$request->descripcion;
              $slider->contenido=$request->contenido;
              $slider->fecha=$request->fecha;
              $slider->lugar=$request->lugar;

             // $slider->visibilidad=$request->visible;




            if($request->algo!=''){
                if(($ancho > 659 && $alto>370) ||($alto < 340 && $ancho < 630)){

                    return -5;
                  }

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
               //echo $request->id ."-- ";
              $slider=Actividad::where('id', '=', $request->id)->first();
       if($slider!=null){
          $mi_imagen = public_path().'/'.$slider->destacada;
          unlink($mi_imagen);
          $slider->delete();
          return 1;
       }else{
           return 0;
       }

      }//id2 activ id1 ima
      public function registrar(Request $request){
        $ta= new actividad_imagen();
       $verificar = DB::select('select *
       from actividad_imagen where  actividad_id = :actividad and imagen_id = :imagen',
       ["actividad" => $request->id2, "imagen"=>$request->id1]);




        $ta->actividad_id=$request->id2;
        $ta->imagen_id=$request->id1;
    $a=count($verificar);


        if($a<1){
    $ta->save();
           return 1;
        }else{

           return 0;
        }
    }
    public function acti(){
        $acti=Actividad::get()->toArray();
        return $acti;
    }
    public function index(Request $request)
    {
        $buscar=$request->buscar;

    if($buscar!=''){
        $data=DB::table('actividad_imagen')
        ->join('actividades','actividad_id','=','actividades.id')
        ->join('sliders','imagen_id','=','sliders.id')
        ->select('actividad_imagen.id','imagen_id','actividades.titulos','actividad_id','sliders.titulo')->where('actividades.titulos','like','%'.$buscar.'%')
        ->orWhere( 'id','sliders.titulo','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('actividad_imagen')
        ->join('actividades','actividad_id','=','actividades.id')
        ->join('sliders','imagen_id','=','sliders.id')
        ->select('actividad_imagen.id','imagen_id','actividades.titulos','actividad_id','sliders.titulo')->paginate(5);
        }


return $data;

    }
    public function destroy(Request $request){
        $request->id;
        $slider=actividad_imagen::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }
    public function registrarA(Request $request){
        $ta= new actividad_archivo();
       $verificar = DB::select('select *
       from actividad_archivo where  actividad_id = :actividad and archivo_id = :archivo',
       ["archivo" => $request->id1, "actividad"=>$request->id2]);




        $ta->actividad_id=$request->id2;
        $ta->archivo_id=$request->id1;
    $a=count($verificar);


        if($a<1){
    $ta->save();
           return 1;
        }else{

           return 0;
        }
    }
    public function index2(Request $request)
    {
        $buscar=$request->buscar;

    if($buscar!=''){
        $data=DB::table('actividad_archivo')
        ->join('actividades','actividad_id','=','actividades.id')
        ->join('archivos','archivo_id','=','archivos.id')
        ->select('actividad_archivo.id','archivo_id','actividades.titulos','archivos.nombre')
        ->where('actividades.titulos','like','%'.$buscar.'%')
        ->orWhere( 'archivos.nombre','like','%'.$buscar.'%')->paginate(5);





        }else{
            $data=DB::table('actividad_archivo')
            ->join('actividades','actividad_id','=','actividades.id')
            ->join('archivos','archivo_id','=','archivos.id')
            ->select('actividad_archivo.id','archivo_id','actividades.titulos','archivos.nombre')->where('actividades.titulos','like','%'.$buscar.'%')
            ->orWhere( 'archivos.nombre','like','%'.$buscar.'%')->paginate(5);
        }


return $data;

    }
    public function destroy2(Request $request){
        $request->id;
        $slider=actividad_archivo::where('id', '=', $request->id)->first();



        $slider->delete();
        return 1;
    }

    public function actividades2(){
        $actividades= Actividad::get()->toArray();
        $nu=count($actividades);
        return view('actividades',compact("actividades","nu"));

    }
    public function actividadesp(Request $request){
        $s=Actividad::where("id",'=',$request->id)->first();
        $i=$this->s($request->id);
        $c=count($i);
        $ar=$this->a($request->id);
        $x=count($ar);
        return view('actividadesInfo',compact("s",'i','c','ar','x'));
        }
        public function s($id){
            $r=Actividad::findOrFail($id);
            return $r->sliders->toArray();
        }
        public function a($id){
            $r=Actividad::findOrFail($id);
            return $r->archivos->toArray();
        }


}
