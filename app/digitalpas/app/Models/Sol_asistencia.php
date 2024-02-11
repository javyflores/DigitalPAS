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


    public function consultarSolicitudes()
	{
	    $solicitudes = Sol_asistencia::paginate(10); // Obtén 10 solicitudes por página
	    return view('solAsistencia', ['solicitudes' => $solicitudes]);
	}


	/*
	public function crearSolicitud($datos)
	{
	    return $this->create($datos);
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





