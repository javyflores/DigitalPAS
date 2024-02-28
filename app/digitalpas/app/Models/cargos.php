<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
/**
 * @property int $id
 */

class Cargos extends Model
{
    use HasFactory;
    protected $table = 'nomina.cargos';
    protected $primaryKey = 'id';
    //protected $incrementing = false;

    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'cod_cargo');
    }
}
