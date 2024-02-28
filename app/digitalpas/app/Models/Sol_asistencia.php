<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sol_asistencia extends Model
{
    use HasFactory;
    protected $table = 'gestion.sol_asistencia';
    protected $primaryKey = 'req';
    public $timestamps = false;

/*
    public function consultarSolicitudes()
	{
	    $solicitudes = Sol_asistencia::paginate(10); // Obtén 10 solicitudes por página
	    return view('solAsistencia', ['solicitudes' => $solicitudes]);
	}


	public function crearSolicitud($datos)
	{
        $sol_asistencia = new Sol_asistencia();
        
        $sol_asistencia->req = $request->input('req');
        $sol_asistencia->req_reg = $request->input('req_reg');
        $sol_asistencia->edo = $request->input('edo');
        $sol_asistencia->cod_usr = $request->input('cod_usr');
        $sol_asistencia->ced_afi = $request->input('ced_afi');
        $sol_asistencia->cod_tipo = $request->input('cod_tipo');
        $sol_asistencia->cod_prio = $request->input('cod_prio');
        $sol_asistencia->fec_crea = $request->input('fec_crea');
        $sol_asistencia->desc_sol = $request->input('desc_sol');
        $sol_asistencia->reca_dig = $request->input('reca_dig');
        $sol_asistencia->ced_dig = $request->input('ced_dig');

        $sol_asistencia->save();

        return redirect('/confSolAsist')->with($sol_asistencia['sol_asistencia']);
	}

	public function editarSolicitud($id, $datos)
	{
	    $solicitud = $this->find($id);
	    if ($solicitud) {
	        $solicitud->update($datos);
	        return $solicitud;
	    }
	    return null;
	}

	public function eliminarSolicitud($id)
	{
	    $solicitud = $this->find($id);
	    if ($solicitud) {
	        $solicitud->delete();
	        return true;
	    }
	    return false;
	}

*/



}





