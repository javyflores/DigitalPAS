<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::post('login', 'App\Http\Controllers\LoginController@login');

Route::get('admin', 'App\Http\Controllers\AdminController@index');

Route::get('admnomina', 'App\Http\Controllers\AdmnominaController@index');


/*Para probar conexion BD
use Illuminate\Support\Facades\DB;

Route::get('/test-connection', function () {
    $results = DB::select('select * from nomina.datos_personales');
    dd($results);
});
*/