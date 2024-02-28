<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Requerimiento;
use App\Models\Entidad;
use App\Models\Sol_asistencia;

class AfilnewreqController extends Controller
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

        $validatedData = $request->validate(['desc_sol' => 'max:100']);

        return view ('afiliado.afilnewreq', [
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

    public function reqnuevo(Request $request){

        $sec = $request->input('sec');
        $cod_tipo = $request->input('cod_tipo');
        
        $reqregnew = Requerimiento::getNuevoReqReg();
        $req_reg = $reqregnew->req_reg;

        $req = "S$sec-$cod_tipo-$req_reg";

        $estado = $request->input('estado');
        $reqr = $req;

        Session::put('reqr', $reqr);
        Session::put('estado', $estado);

        
        $sol_asistencia = new Sol_asistencia();

        $sol_asistencia->req_reg = $req_reg;
        $sol_asistencia->req = $req;
        $sol_asistencia->edo = $request->input('edo');
        $sol_asistencia->cod_usr = $request->input('cod_usr');
        $sol_asistencia->ced_afi = $request->input('ced_afi');
        $sol_asistencia->cod_tipo = $cod_tipo;
        $sol_asistencia->cod_prio = $request->input('cod_prio');
        $sol_asistencia->fec_crea = $request->input('fec_crea');
        $sol_asistencia->desc_sol = $request->input('desc_sol');
        $sol_asistencia->reca_dig = $request->input('reca_dig');
        $sol_asistencia->ced_dig = $request->input('ced_dig');

        $sol_asistencia->save();

        return redirect('/confSolAsist')->with('sol_asistencia', $sol_asistencia);

    }

}



