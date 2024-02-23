<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\Sol_asistencia;
use App\Models\Req_seguimiento;
use App\Models\Tipo_solicitud;

class SegsolconsController extends Controller
{
    public function index(Request $request){

	    $codigo = Session::get('codigo');
	    $id_afi = Session::get('id_afi');
	    $usuario = Session::get('usuario');
	    $tipouser = Session::get('tipouser');
	    $rol = Session::get('rol');
	    $cod_usr = $codigo;

    	$req_seg = session('req_seg');

    	$req = $req_seg;

    	$sol_asis = Sol_asistencia::find($req);
    	$cod_tipo = $sol_asis->cod_tipo;

		$tipo = Tipo_solicitud::where('cod_tipo', $cod_tipo)->value('tipo_sol');

    	$consult = Req_seguimiento::where('req_seg', $req_seg)->get();
		$requerimiento = json_encode($consult);
	    $requerimiento = json_decode($requerimiento, true);

            return view('afiliado.segsolcons', [
                'codigo' => $codigo,
                'usuario' => $usuario,
	            'tipouser' => $tipouser,
	            'rol' => $rol,
	            'req_seg' => $req_seg,
	            'sol_asis' => $sol_asis,
	            'tipo' => $tipo,
	            'requerimiento' => $requerimiento
            ]);
    }}
