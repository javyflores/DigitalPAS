<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Requerimiento;
use App\Models\Sol_asistencia;

class ConfSolAsistController extends Controller
{
    public function prueba(){

    	$reqr = session::get('reqr');
    	$estado = session::get('estado');


    	$sol_asistencia = session('sol_asistencia');

    	//$sol_asistencia->req
    	return view ('afiliado.confSolAsist', [
    	'sol_asistencia' => $sol_asistencia,
    	'reqr' => $reqr,
    	'estado' => $estado
    	]);
    }
}
