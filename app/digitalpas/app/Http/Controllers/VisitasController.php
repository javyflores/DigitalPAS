<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Requerimiento;
use App\Models\Entidad;
use App\Models\Visitas;
use App\Models\Estatus;

class VisitasController extends Controller
{

    public function index(Request $request){

	    $codigo = Session::get('codigo');
	    $id_afi = Session::get('id_afi');
	    $cedula = Session::get('cedula');
	    $usuario = Session::get('usuario');
	    $tipouser = Session::get('tipouser');
	    $rol = Session::get('rol');

        $edo = substr($id_afi, 0, 2);
        $estado = Entidad::where('edo', $edo)->value('entidad');

        $sec = substr($codigo, 1, 2);

        return view ('afiliado.afilnewvisit', [
            'codigo' => $codigo,
            'id_afi' => $id_afi,
            'cedula' => $cedula,
            'tipouser' => $tipouser,
            'rol' => $rol,
            'usuario' => $usuario,
            'edo' => $edo,
            'estado' => $estado,
            'sec' => $sec
        ]);

    }

    public function visitnew(Request $request){
        
        $sec = $request->input('sec');
        
        $reqregnew = Requerimiento::getNuevoReqReg();
        $req_reg = $reqregnew->req_reg;

        $req = "V$sec-$req_reg";

        $estado = $request->input('estado');
        $reqr = $req;

        $reqr = $request->input('req');
        $estado = $request->input('estado');

        Session::put('reqr', $reqr);
        Session::put('estado', $estado);

        
        $sol_visita = new Visitas();

        $sol_visita->req_reg = $req_reg;
        $sol_visita->req = $req;
        $sol_visita->edo = $request->input('edo');
        $sol_visita->cod_usr_sol = $request->input('cod_usr_sol');
        $sol_visita->ced_sol = $request->input('ced_sol');
        $sol_visita->p_nombre_sol = $request->input('p_nombre_sol');
        $sol_visita->p_apellido_sol = $request->input('p_apellido_sol');
        $sol_visita->dependencia = $request->input('dependencia');
        $sol_visita->fec_crea = $request->input('fec_crea');
        $sol_visita->desc_sol = $request->input('desc_sol');

		$sol_visita->cod_sec_asig = $request->input('edo');

		$sol_visita->cod_sta = 1;

		$sol_visita->cod_dir_asig = null;

		$sol_visita->result_sol_tra = null;

		$sol_visita->result_afi = null;

		$sol_visita->acta_cie_dig = null;

		$sol_visita->fec_cierre = null;
        
        $sol_visita->save();

        return redirect('/confSolVisit')->with('sol_visita', $sol_visita);

    }

    public function conf(){

    	$reqr = session::get('reqr');
    	$estado = session::get('estado');

    	$sol_visita = session('sol_visita');

    	$cod_sta = $sol_visita->cod_sta;

    	$estatus = Estatus::where('cod_sta', $cod_sta)->value('status');

    	return view ('afiliado.confSolVisita', [
    	'sol_visita' => $sol_visita,
    	'reqr' => $reqr,
    	'estado' => $estado,
    	'estatus' => $estatus
    	]);
    }

}
