<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cargos;
use App\Models\Role;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**


 * @property int $rol

 */

class Usuarios extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario.usuarios'; // Nombre de la tabla en la base de datos
   // protected $connection = 'digitalpas'; // Nombre de la conexión a la base de datos
   protected $primaryKey = 'cod_usr';
   public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
        'id_afi',
        'cedula',
        'nombre',
       // 'password',
        'rol',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'id');
    }

    public function rol()
    {
        return $this->belongsTo(Role::class, 'id');
    }
}