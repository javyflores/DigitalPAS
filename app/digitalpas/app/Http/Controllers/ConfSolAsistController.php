<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Requerimiento;
use App\Models\Sol_asistencia;

class ConfSolAsistController extends Controller
{
    public function index(){

    	$reqr = session::get('reqr');
    	$estado = session::get('estado');

    	$sol_asistencia = session('sol_asistencia');

    	return view ('afiliado.confSolAsist', [
    	'sol_asistencia' => $sol_asistencia,
    	'reqr' => $reqr,
    	'estado' => $estado
    	]);
    }

    public function edit(Request $request){

    	$req = $request->input('reqr');
    	$estado = $request->input('estado');
    	
    	return redirect('/editSolAsist')->with('req', $req);

    }

}
