<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dir_seccional extends Model
{
    use HasFactory;

    protected $table = 'nomina.dir_seccional';
    protected $primaryKey = 'cod_reg';

}
