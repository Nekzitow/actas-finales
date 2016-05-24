<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Rutas para el modulo de control escolar*/
Route::get('modules/actas', 'actasControlador@inicio');
Route::get('modules/actas/pdf/{idAsignacion}', 'actasControlador@exportpdf');
Route::get('modules/agregar/acta', 'actasControlador@agregarActa');
Route::get('modules/imprime/acta', 'actasControlador@exportpdf');
Route::post('modules/agregar/guardarActa', 'actasControlador@guardarActa');
/*Route::auth();

Route::get('/', 'HomeController@index');*/
