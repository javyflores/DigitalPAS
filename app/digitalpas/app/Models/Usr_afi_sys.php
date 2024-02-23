<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usr_afi_sys extends Model
{
    use HasFactory;

    protected $table = 'usuario.usr_afi_sys';
    protected $primaryKey = 'cod_reg';
    
}
