<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliados extends Model
{
    use HasFactory;

    protected $table = 'nomina.afiliados';
    protected $primaryKey = 'req_reg';
}
