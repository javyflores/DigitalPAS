<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartData extends Model
{
    
    // Nombre de la tabla en la base de datos
    protected $table = 'gestion.afiliacion';

    // Definir las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'fec_crea',
        'cedula',
        // Agrega aquí el nombre de todas las columnas que necesites
    ];
}