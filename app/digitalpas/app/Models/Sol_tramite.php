<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sol_tramite extends Model
{
    use HasFactory;

    protected $table = 'gestion.sol_tramite';
    protected $primaryKey = 'req';
    public $timestamps = false;
}