<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dirseccional extends Model
{
    use HasFactory;
    protected $table = 'nomina.dir_seccional';
    protected $primaryKey = 'cod_reg';
    public $incrementing = true;
    public $timestamps = false;
}
