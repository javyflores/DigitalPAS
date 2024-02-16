<?php

use Illuminate\Support\Facades\Route;

/* Login */
Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::post('login', 'App\Http\Controllers\LoginController@login');



/* Administrador */
Route::get('admin', 'App\Http\Controllers\AdminController@index');
Route::get('admnomina', 'App\Http\Controllers\AdmnominaController@index');
Route::post('admnomina', 'App\Http\Controllers\AdmnominaController@consulta');


/* Directiva Nacional */
Route::get('dirnac', 'App\Http\Controllers\AdminController@index');


/* Directiva Secional*/
Route::get('dirsec', 'App\Http\Controllers\AdminController@index');


/* Afiliado */
Route::get('afiliado', 'App\Http\Controllers\AfiliadoController@index');

Route::get('afilnewreq', 'App\Http\Controllers\AfilnewreqController@index');
Route::post('afilnewreq', 'App\Http\Controllers\AfilnewreqController@reqnuevo');

Route::get('confSolAsist', function () {
    return view('afiliado\confSolAsist');
});


/* Perfil */
Route::get('perfil', function () {
    return view('layouts.plantillaTarjPerfil');
});


/* Carnet */
Route::get('carnet', function () {
    return view('layouts.plantillaCarnet');
});


/* Nomina */
Route::get('consulta', function () {
    return view('nomina.consnomina');
});


/* Oficio */
Route::get('oficio', function () {
    return view('layouts.plantillaOficio');
});


/* Pruebas */
Route::get('prueba', 'App\Http\Controllers\PruebaController@index');

