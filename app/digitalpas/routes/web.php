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

/* Administrador Registrar Usuario*/
Route::get('regafiliado', 'App\Http\Controllers\RegafiliadoController@index');
Route::post('regafiliado', 'App\Http\Controllers\RegafiliadoController@crear');

Route::get('regseccional', 'App\Http\Controllers\RegseccionalController@index');
Route::post('regseccional', 'App\Http\Controllers\RegseccionalController@crear');

Route::get('regnacional', 'App\Http\Controllers\RegnacionalController@index');
Route::post('regnacional', 'App\Http\Controllers\RegnacionalController@crear');


/* Directiva Nacional */
Route::get('nacionales', 'App\Http\Controllers\NacionalesController@index');

Route::get('nacafiliaciones', 'App\Http\Controllers\NacafiliacionesController@index');
Route::post('nacafiliaciones', 'App\Http\Controllers\NacafiliacionesController@consulta');
Route::get('nacafilcons', 'App\Http\Controllers\NacafilconsController@index');

Route::get('nacsoltramite', 'App\Http\Controllers\NacsoltramiteController@index');
Route::post('nacsoltramite', 'App\Http\Controllers\NacsoltramiteController@consulta');
Route::get('nacsoltracons', 'App\Http\Controllers\NacsoltraconsController@index');

Route::get('nacvisitas', 'App\Http\Controllers\NacvisitasController@index');
Route::post('nacvisitas', 'App\Http\Controllers\NacvisitasController@consulta');
Route::get('nacvisitcons', 'App\Http\Controllers\NacvisitconsController@index');


/* Directiva Seccional*/
Route::get('dirsec', 'App\Http\Controllers\DirsecController@index');

Route::get('afiliacion', 'App\Http\Controllers\DirsecController@afiliacion');
Route::post('afiliacion', 'App\Http\Controllers\DirsecController@regafiliacion');
Route::get('confAfiliacion', 'App\Http\Controllers\DirsecController@confafi');

Route::get('sol_tramite', 'App\Http\Controllers\DirsecController@sol_tramite');
Route::post('sol_tramite', 'App\Http\Controllers\DirsecController@regsoltramite');
Route::get('confsolt', 'App\Http\Controllers\DirsecController@confsolt');

Route::get('visitas', 'App\Http\Controllers\DirsecController@visitas');
Route::post('visitas', 'App\Http\Controllers\DirsecController@reg_visita');
Route::get('confVisit', 'App\Http\Controllers\DirsecController@confVisit');

Route::get('secnomina', 'App\Http\Controllers\SecnominaController@index');
Route::post('secnomina', 'App\Http\Controllers\SecnominaController@consulta');

Route::get('secafiliaciones', 'App\Http\Controllers\SecafiliacionesController@index');
Route::post('secafiliaciones', 'App\Http\Controllers\SecafiliacionesController@consulta');
Route::get('secafilcons', 'App\Http\Controllers\SecafilconsController@index');

Route::get('secsoltramite', 'App\Http\Controllers\SecsoltramiteController@index');
Route::post('secsoltramite', 'App\Http\Controllers\SecsoltramiteController@consulta');
Route::get('secsoltracons', 'App\Http\Controllers\SecsoltraconsController@index');

Route::get('secvisitas', 'App\Http\Controllers\SecvisitasController@index');
Route::post('secvisitas', 'App\Http\Controllers\SecvisitasController@consulta');
Route::get('secvisitcons', 'App\Http\Controllers\SecvisitconsController@index');


/*grafico para que me indique todos los afiliados de cada mes del año 2024*/
Route::get('/grafico-datos', [ChartController::class, 'getChartData'])->name('grafico.datos');
/*grafico para indicarme en cantidades la gestion de solicitudes, de becas, reclamos y clasificacion*/ 
Route::get('/datos-nacionales', [ChartController::class, 'getDatosNacionales'])->name('datos.nacionales');

/*vista de registro de usuarios*/
Route::get('/registro', [RegistuserController::class, 'mostrarFormulario'])->name('registro.formulario');

/*vista index de usuarios*/
Route::get('/users', [RegistuserController::class, 'mostrarUsuarios'])->name('registro.users');
Route::post('/users', [RegistuserController::class, 'consulta'])->name('registro.consultausers');


//Route::post('/registro', [RegistuserController::class, 'guardar'])->name('registro.guardar');
Route::post('/generar-codigo', [RegistuserController::class, 'generarCodigo']);
Route::post('/registro/guardar', [RegistuserController::class, 'guardarUsuario'])->name('registro.guardar');




/* Afiliado */
Route::get('afiliado', 'App\Http\Controllers\AfiliadoController@index');

Route::get('afilnewreq', 'App\Http\Controllers\AfilnewreqController@index');
Route::post('afilnewreq', 'App\Http\Controllers\AfilnewreqController@reqnuevo');

Route::get('confSolAsist', 'App\Http\Controllers\ConfSolAsistController@index');
Route::post('confSolAsist', 'App\Http\Controllers\ConfSolAsistController@edit');

Route::get('editSolAsist', 'App\Http\Controllers\EditSolAsistController@editar');
Route::put('editSolAsist', 'App\Http\Controllers\EditSolAsistController@update');

//Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
//Route::put('/users/{id}', 'UserController@update')->name('users.update');
Route::get('afilnewvisit', 'App\Http\Controllers\VisitasController@index');
Route::post('afilnewvisit', 'App\Http\Controllers\VisitasController@visitnew');

Route::get('confSolVisit', 'App\Http\Controllers\VisitasController@conf');

Route::get('segsolicitudes', 'App\Http\Controllers\SegsolicitudesController@index');
Route::post('segsolicitudes', 'App\Http\Controllers\SegsolicitudesController@consulta');

Route::get('segsolcons', 'App\Http\Controllers\segsolconsController@index');


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
