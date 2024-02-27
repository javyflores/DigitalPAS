<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliacion extends Model
{
    use HasFactory;

    protected $table = 'gestion.afiliacion';
    protected $primaryKey = 'req';
    public $timestamps = false;
}
