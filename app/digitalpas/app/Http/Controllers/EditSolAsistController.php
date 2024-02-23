<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Sol_asistencia;

class EditSolAsistController extends Controller
{
    public function editar(Request $request)
    {
    	$req = session::get('req');

    	$sol_asis = Sol_asistencia::find($req);
    	
    	$solicitud = $sol_asis;

		return view ('afiliado.editSolAsist', [
			'req' => $req,
			'solicitud' => $solicitud]);
    }

public function update(Request $request)
{
    $req = $request->input('req');

    $solicitud = Sol_asistencia::find($req);

    if (!$solicitud) {
        // Manejar el caso en el que no se encuentre la solicitud
        return redirect()->back()->with('error', 'No se encontró la solicitud');
    }

    $solicitud->req_reg = $request->input('req_reg');
    $solicitud->req = $request->input('req');
    $solicitud->edo = $request->input('edo');
    $solicitud->cod_usr = $request->input('cod_usr');
    $solicitud->ced_afi = $request->input('ced_afi');
    $solicitud->cod_tipo = $request->input('cod_tipo');
    $solicitud->cod_prio = $request->input('cod_prio');
    $solicitud->fec_crea = $request->input('fec_crea');
    $solicitud->desc_sol = $request->input('desc_sol');
    $solicitud->reca_dig = $request->input('reca_dig');
    $solicitud->ced_dig = $request->input('ced_dig');

    $solicitud->save();

    return redirect()->route('afiliado', $solicitud->req)->with('success', 'Solicitud actualizada exitosamente');
}








}
