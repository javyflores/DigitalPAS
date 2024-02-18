<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

/* Login */
Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login', 'App\Http\Controllers\LoginController@login');
/* salida */
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');




/* Administrador */
Route::get('admin', 'App\Http\Controllers\AdminController@index');
Route::get('admnomina', 'App\Http\Controllers\AdmnominaController@index');
Route::post('admnomina', 'App\Http\Controllers\AdmnominaController@consulta');


/* Directiva Nacional */
Route::get('nacionales', 'App\Http\Controllers\NacionalesController@index');


/* Directiva Secional*/
Route::get('dirsec', 'App\Http\Controllers\DirsecController@index');

/*grafico para que los secionales tenga la estadistica de los afiliados*/
Route::get('/grafico-datos', [ChartController::class, 'getChartData'])->name('grafico.datos');


/* Afiliado */
Route::get('afiliado', 'App\Http\Controllers\AfiliadoController@index');

Route::get('afilnewreq', 'App\Http\Controllers\AfilnewreqController@index');
Route::post('afilnewreq', 'App\Http\Controllers\AfilnewreqController@reqnuevo');

Route::get('confSolAsist', 'App\Http\Controllers\ConfSolAsistController@prueba');

Route::get('editSolAsist', 'App\Http\Controllers\EditSolAsistController@editar');
Route::put('editSolAsist', 'App\Http\Controllers\EditSolAsistController@update');

Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Route::put('/users/{id}', 'UserController@update')->name('users.update');

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

/*excel prueba*/ 
Route::get('excel', 'App\Http\Controllers\ExcelController@downloadExcel');
