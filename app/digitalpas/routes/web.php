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
Route::post('admnomina', 'App\Http\Controllers\AdmnominaController@consulta');

Route::get('consulta', function () {
    return view('nomina.consnomina');
});
Route::get('perfil', function () {
    return view('layouts.plantillaTarjPerfil');
});


