<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartData extends Model
{
    
    // Nombre de la tabla en la base de datos
    protected $table = 'nomina.afiliados';

    // Definir las columnas que pueden ser asignadas en masa
    protected $fillable = [
        'columna_1',
        'columna_2',
        // Agrega aquí el nombre de todas las columnas que necesites
    ];
}