<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */

class Role extends Model
{
    use HasFactory;
    protected $table = 'usuario.roles';
    protected $primaryKey = 'id';


    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'rol');
    }
}
