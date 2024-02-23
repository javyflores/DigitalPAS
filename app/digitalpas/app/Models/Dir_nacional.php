<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dir_nacional extends Model
{
    use HasFactory;

    protected $table = 'nomina.dir_nacional';
    protected $primaryKey = 'cod_reg';

}
