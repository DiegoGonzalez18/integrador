<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/services',function(){
    return view('services');
});
Route::get('/actividades',function(){
    return view('actividades');
});
Route::get('/servicios',function(){
    return view('servicioInfo');
});
Route::get('/login',function(){
    return view('login');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin', function () {
        return view('contenido/contenido');
    })->name('admin');

    Route::post('/admin/categoria/registerCategoria','CategoriaController@store');

    Route::get('/admin/categoria','CategoriaController@index');
    Route::post('/admin/categoria/updateCategoria','CategoriaController@update');


    Route::get('/admin/slider','SliderController@index');
Route::post('/admin/slider/registerSlider','SliderController@store');
Route::post('/admin/categoria/deletedCategoria','CategoriaController@destroy');


Route::post('/admin/archivo/registerArchivo','ArchivoController@store');
Route::get('/admin/archivo','ArchivoController@index');
Route::post('/admin/archivo/updateArchivo','ArchivoController@update');
Route::post('/admin/archivo/deletedArchivo','ArchivoController@destroy');

Route::post('/admin/slider/updateSlider','SliderController@update');

Route::post('/admin/slider/deletedSlider','SliderController@destroy');
Route::get('/admin/usuario','UserController@index');
Route::post('/admin/usuario/registerUser','UserController@store');
Route::post('/admin/usuario/updateUser','UserController@update');
Route::post('/admin/usuario/deletedUser','UserController@destroy');

Route::post('/admin/evento/registerEvento','EventoController@store');
Route::get('/admin/evento','EventoController@index');
Route::post('/admin/evento/updateEvento','EventoController@update');
Route::post('/admin/evento/deletedEvento','EventoController@destroy');

Route::post('/admin/novedad/registerNovedad','NovedadController@store');
Route::get('/admin/novedad','NovedadController@index');
Route::post('/admin/novedad/updateNovedad','NovedadController@update');
Route::post('/admin/novedad/deletedNovedad','NovedadController@destroy');
Route::get('/admin/tramite','TramiteController@index');

Route::post('/admin/tramite/Categorias','TramiteController@categorias');
Route::post('/admin/tramite/registerTramite','TramiteController@registrar');
Route::post('/admin/tramite/updatedTramite','TramiteController@updated');
Route::post('/admin/tramite/deletedTramite','TramiteController@destroy');
Route::post('/admin/archivo_tramite/archivos','ArchivoController@archivos');
Route::post('/admin/archivo_tramite/tramites','TramiteController@tramites');
Route::post('/admin/archivo_tramite/registera_t','ArchivoTramiteControlleer@registrar');
Route::get('/admin/tramitesporarchivo', 'ArchivoTramiteControlleer@index');
Route::post('/admin/tramitesporarchivoEliminar', 'ArchivoTramiteControlleer@destroy');

Route::get('/admin/mensaje','MensajeController@index');
Route::get('/admin/mensaje2','MensajeController@index2');
Route::post('/admin/correo','MensajeController@responder');
Route::post('/admin/servicio/registrarServicio','ServicioController@store');
Route::post('/admin/servicio/actualizarServicio','ServicioController@actualizar');
Route::post('/admin/servicio/eliminarServicio','ServicioController@eliminar');

Route::post('/servicio','ServicioController@servicios');
Route::post('/servicioinfo','ServicioController@servicio');
Route::post('/sli','SliderController@slider');
Route::post('/ser','ServicioController@ser');
Route::post('/registera_t','ServicioController@registrar');
Route::get('/asignar','ServicioController@index');
Route::post('/eli','ServicioController@destroy');
Route::post('/a_s','ServicioController@registrarA');
Route::post('/eli2','ServicioController@destroy2');
Route::get('/a_s2','ServicioController@index2');


Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
});
Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');

});

