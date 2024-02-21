<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\TipoSolicitud;
use Illuminate\Support\Facades\Session;

class SolTramite extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'gestion.sol_tramite';
    protected $primaryKey = 'req';

    protected $fillable = [
        'req_reg',
        'edo',
        'cod_usr',
        'cedula',
        'cod_tipo',
        'cod_prio',
        'fec_crea',
        'desc_sol',
        'reca_dig',
        'ced_dig'
    ];

/*
    // Constantes para los tipos de solicitud
    const TIPO_CLASIFICACION = 2;
    const TIPO_BECA = 4;
    const TIPO_RECLAMO = 7;
*/
    // Relación con la tabla tipo_solicitud
    public function tipoSolicitud()
    {
        return $this->belongsTo(TipoSolicitud::class);
    }
}
