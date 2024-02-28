<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\RegistuserController;

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

/*grafico para que me indique todos los afiliados de cada mes del año 2024*/
Route::get('/grafico-datos', [ChartController::class, 'getChartData'])->name('grafico.datos');
/*grafico para indicarme en cantidades la gestion de solicitudes, de becas, reclamos y clasificacion*/ 
Route::get('/datos-nacionales', [ChartController::class, 'getDatosNacionales'])->name('datos.nacionales');

/*vista de registro de usuarios*/
Route::get('/registro', [RegistuserController::class, 'mostrarFormulario'])->name('registro.formulario');
//Route::post('/registro', [RegistuserController::class, 'guardar'])->name('registro.guardar');
Route::post('/generar-codigo', [RegistuserController::class, 'generarCodigo']);
Route::post('/registro/guardar', [RegistuserController::class, 'guardarUsuario'])->name('registro.guardar');




/* Afiliado */
Route::get('afiliado', 'App\Http\Controllers\AfiliadoController@index');

Route::get('afilnewreq', 'App\Http\Controllers\AfilnewreqController@index');
Route::post('afilnewreq', 'App\Http\Controllers\AfilnewreqController@reqnuevo');

Route::get('confSolAsist', 'App\Http\Controllers\ConfSolAsistController@prueba');

Route::get('editSolAsist', 'App\Http\Controllers\EditSolAsistController@editar');
Route::put('editSolAsist', 'App\Http\Controllers\EditSolAsistController@update');

//Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
//Route::put('/users/{id}', 'UserController@update')->name('users.update');

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
Route::get('report-afiliados', 'App\Http\Controllers\AfiliadoController@reportAfiliado')->name('afiliado.report');
Route::get('pdf-solicitud', 'App\Http\Controllers\AfiliadoController@solicitudPdfAfiliado')->name('afiliado.solicitudpdf');
Route::get('excel/{estado}', 'App\Http\Controllers\ExcelController@downloadExcel')->name('afiliado.reportdownload');
