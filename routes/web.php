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
