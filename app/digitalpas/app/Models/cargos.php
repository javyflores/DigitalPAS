<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $table = 'nomina.cargos';
    protected $primaryKey = 'cod_cargo';
    //protected $incrementing = false;
}
