<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Evento;
use App\Novedad;
use App\Categoria;
use App\Tramite;

class GenericController extends Controller
{
    //
    public function index(){
       $cad= $this->slider();
       $eventos=$this->evento();
       $novedad=$this->novedad();
       $n=count($novedad);
       $a=count($cad);
       $e=count($eventos);
       $s=$this->sliderI();
       $t=0;
        return view('pagina/principal',compact("cad",'a','s','eventos','e','n','novedad','t'));
    }
public function formulario(){
    return view('pagina.contenido.formulario');
}
    public function tramitecategoria( Request $request){
        $tramites=$this->tramite($request->id);
        $cat=$this->getNombreCategoria($request->id)['nombre'];
        $t=count($tramites);
        return view('pagina.contenido.tramitesxcategoria',compact('tramites','t','cat'));
    }
    public function tramite($id){
        $tramites=Tramite::where('categoria_id', '=', $id)->get();
        return $tramites;
    }
    public function getNombreCategoria($id){

        $cate= Categoria::where('id','=',$id)->first();
        return $cate;
    }
public function novedades(){
    $novedades=Novedad::get();
    $novedades=$novedades->toArray();
    $c=count($novedades);
    return view('pagina.contenido.novedadestodas' , compact('novedades','c'));
}
    public function slider(){
        $a= Slider::get();

      return  $a->toArray();
     }
     public function evento(){
        $a= Evento::get();

      return  $a->toArray();
     }
     public function novedad(){
        $a=Novedad::get();

      return  $a->toArray();
     }

     public function sliderI(){
        $a= Slider::get();
        $a=$a->toArray();
        $b=array();
        for($i=0;$i<count($a);$i++){


array_push ( $b ,$a[$i]['url'] );
        }
      return  $b;
     }
     public function infoevento(Request $request){
         $id=$request->id;
         $evento= Evento::where('id', '=', $request->id)->first();

         return view('pagina/eventoinfo',compact('evento'));
     }
     public function infonovedad(Request $request){
      $id=$request->id;
      $novedad= Novedad::where('id', '=', $request->id)->first();

      return view('pagina/contenido/novedad',compact('novedad'));
  }
  public function categorias(){
    $cat=Categoria::get();
    return $cat->toArray();
}
public function trami(){
    $cat= $this->categorias();
    $a=count($cat);
    return view('pagina/contenido/tramites',compact('cat','a'));
}
public function tramitexcategoria(Request $request){
    $id=$request->id;
    $novedad= Tramite::where('categoria_id', '=', $request->id)->get();
    $t=count($novedad);
    return view('pagina/contenido/tramitesxcategoria',compact('novedad','t'));
}
public function tespecifico(Request $request){

$tramite=$this->tr($request->id);
$archivos=$this->archivosTramite($request->id);
$h=count($archivos);
    return view('pagina.contenido.tramiteinfo',compact('tramite','archivos','h'));
}
public function tr($d){
    $tramite= Tramite::where('id','=',$d)->first();
    return $tramite;
}
public function archivosTramite($id){
   $a= Tramite::findOrFail($id);

    return $a->archivos->toArray();
}
}
