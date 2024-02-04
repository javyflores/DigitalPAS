<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sol_asistencia extends Model
{
    use HasFactory;
    protected $table = 'gestion.sol_asistencia';
    protected $primaryKey = 'req';
}
