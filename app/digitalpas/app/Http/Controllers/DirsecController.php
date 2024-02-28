<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Requerimiento;
use App\Models\Entidad;
use App\Models\Visitas;
use App\Models\Afiliacion;
use App\Models\Sol_tramite;
use App\Models\Estatus;

class DirsecController extends Controller
{

    public function index(Request $request){

        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        $tipouser = Session::get('tipouser');

        $nuevavisit = Visitas::getNuevasVisitas();

        return view ('dirsec', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol, 'tipouser' => $tipouser, 'nuevavisit' => $nuevavisit]);
    }

    public function afiliacion(Request $request){

        $codigo = Session::get('codigo');
        $id_afi = Session::get('id_afi');
        $usuario = Session::get('usuario');
        $tipouser = Session::get('tipouser');
        $rol = Session::get('rol');

        $edo = substr($id_afi, 0, 2);
        $estado = Entidad::where('edo', $edo)->value('entidad');

        $sec = substr($codigo, 1, 2);

        $nuevavisit = Visitas::getNuevasVisitas();

        return view ('seccional.afiliacion', [
        	'codigo' => $codigo,
        	'usuario' => $usuario,
        	'rol' => $rol,
        	'tipouser' => $tipouser,
        	'edo' => $edo,
        	'estado' => $estado,
        	'sec' => $sec,
        	'nuevavisit' => $nuevavisit]);

    }

    public function regafiliacion(Request $request){

        $sec = $request->input('sec');
        
        $reqregnew = Requerimiento::getNuevoReqReg();
        $req_reg = $reqregnew->req_reg;

        $req = "A$sec-$req_reg";

        $estado = $request->input('estado');
        $reqr = $req;

        Session::put('reqr', $reqr);
        Session::put('estado', $estado);

        
        $afiliacion = new Afiliacion();

        $afiliacion->req_reg = $req_reg;
        $afiliacion->req = $req;
        $afiliacion->edo = $request->input('edo');
        $afiliacion->cod_usr = $request->input('cod_usr');
        $afiliacion->cedula = $request->input('cedula');
        $afiliacion->p_nombre = $request->input('p_nombre');
        $afiliacion->p_apellido = $request->input('p_apellido');
        $afiliacion->fec_crea = $request->input('fec_crea');
        $afiliacion->afi_dig = $request->input('afi_dig');
        $afiliacion->ced_dig = $request->input('ced_dig');

        $afiliacion->save();

        return redirect('/confAfiliacion')->with('afiliacion', $afiliacion);

    }

    public function confafi(){

    	$reqr = session::get('reqr');
    	$estado = session::get('estado');

    	$afiliacion = session('afiliacion');

    	return view ('seccional.confafi', [
    	'afiliacion' => $afiliacion,
    	'reqr' => $reqr,
    	'estado' => $estado
    	]);
    }


    public function sol_tramite(Request $request){

        $codigo = Session::get('codigo');
        $id_afi = Session::get('id_afi');
        $usuario = Session::get('usuario');
        $tipouser = Session::get('tipouser');
        $rol = Session::get('rol');

        $edo = substr($id_afi, 0, 2);
        $estado = Entidad::where('edo', $edo)->value('entidad');

        $sec = substr($codigo, 1, 2);

        $nuevavisit = Visitas::getNuevasVisitas();

        return view ('seccional.sol_tramite', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'rol' => $rol,
            'tipouser' => $tipouser,
            'edo' => $edo,
            'estado' => $estado,
            'sec' => $sec,
            'nuevavisit' => $nuevavisit]);

    }

    public function regsoltramite(Request $request){

        $sec = $request->input('sec');
        
        $reqregnew = Requerimiento::getNuevoReqReg();
        $req_reg = $reqregnew->req_reg;

        $req = "T$sec-$req_reg";

        $estado = $request->input('estado');
        $reqr = $req;

        Session::put('reqr', $reqr);
        Session::put('estado', $estado);

        
        $sol_tramite = new Sol_tramite();

        $sol_tramite->req_reg = $req_reg;
        $sol_tramite->req = $req;
        $sol_tramite->edo = $request->input('edo');
        $sol_tramite->cod_usr = $request->input('cod_usr');
        $sol_tramite->cedula = $request->input('cedula');
        $sol_tramite->cod_tipo = $request->input('cod_tipo');
        $sol_tramite->cod_prio = $request->input('cod_prio');
        $sol_tramite->fec_crea = $request->input('fec_crea');
        $sol_tramite->desc_sol = $request->input('desc_sol');
        $sol_tramite->reca_dig = $request->input('reca_dig');
        $sol_tramite->ced_dig = $request->input('ced_dig');

        $sol_tramite->save();

        return redirect('/confsolt')->with('sol_tramite', $sol_tramite);

    }

    public function confsolt(){

        $reqr = session::get('reqr');
        $estado = session::get('estado');

        $sol_tramite = session('sol_tramite');

        return view ('seccional.confsolt', [
        'sol_tramite' => $sol_tramite,
        'reqr' => $reqr,
        'estado' => $estado
        ]);
    }



    public function visitas(Request $request){

        $codigo = Session::get('codigo');
        $id_afi = Session::get('id_afi');
        $cedula = Session::get('cedula');
        $usuario = Session::get('usuario');
        $tipouser = Session::get('tipouser');
        $rol = Session::get('rol');

        $edo = substr($id_afi, 0, 2);
        $estado = Entidad::where('edo', $edo)->value('entidad');

        $sec = substr($codigo, 1, 2);

        return view ('seccional.visitas', [
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

    public function reg_visita(Request $request){
        
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

        return redirect('/confVisit')->with('sol_visita', $sol_visita);

    }

    public function confVisit(){

        $reqr = session::get('reqr');
        $estado = session::get('estado');

        $sol_visita = session('sol_visita');

        $cod_sta = $sol_visita->cod_sta;

        $estatus = Estatus::where('cod_sta', $cod_sta)->value('status');

        return view ('seccional.confVisita', [
        'sol_visita' => $sol_visita,
        'reqr' => $reqr,
        'estado' => $estado,
        'estatus' => $estatus
        ]);
    }





}
