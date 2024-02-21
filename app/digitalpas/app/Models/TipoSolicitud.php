<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
//use App\Models\SolTramite;

class TipoSolicitud extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'gestion.tipo_solicitud';
    protected $primaryKey = 'cod_tipo';

    // Definir las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'cod_tipo',
        'tipo_sol',
        // Agrega aquí el nombre de todas las columnas que necesites
    ];

    // Constantes para los códigos de tipo de solicitud
   /* const CLASIFICACION = 2;
    const BECAS = 4;
    const RECLAMOS = 7;
*/
    // Método estático para obtener el tipo de solicitud a partir de su código
    /*
    public static function tipoPorCodigo($codigo)
    {
        switch ($codigo) {
            case self::CLASIFICACION:
                return 'Clasificación';
            case self::BECAS:
                return 'Becas';
            case self::RECLAMOS:
                return 'Reclamos';
            default:
                return null;
        }
    }*/
    public function soltramites()
    {
        return $this->hasMany(SolTramite::class);
    }
}

