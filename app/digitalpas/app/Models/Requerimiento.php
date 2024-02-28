<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Requerimiento extends Model
{
    use HasFactory;

    protected $table = 'gestion.requerimiento';
    protected $primaryKey = 'req_reg';
    public $timestamps = false;

    public static function getNuevoReqReg()
    {
        // Obtener el código de usuario de la sesión
        $codigo = Session::get('codigo');
        // Obtener la fecha actual
        $fechaActual = now();
        // Obtener el último registro ordenado por req_reg de forma descendente
        $ultimoRegistro = static::orderBy('req_reg', 'desc')->first();
        if ($ultimoRegistro) {
            // Obtener el valor de req_reg del último registro
            $ultimoReqReg = $ultimoRegistro->req_reg;

            // Sumar 1 al valor de req_reg para el nuevo registro
            $nuevoReqReg = $ultimoReqReg + 1;

            $reqregnew = new Requerimiento();
            $reqregnew->req_reg = $nuevoReqReg;
            // Asignar el código de usuario al modelo
            $reqregnew->cod_usr = $codigo;
            // Asignar la fecha actual al campo fec_req
            $reqregnew->fec_req = $fechaActual;
            // Guardar la instancia del modelo en la base de datos
            $reqregnew->save();
            
            return $reqregnew;
        }
        else {
            $reqregnew = new Requerimiento();
            $reqregnew->req_reg = 1001;
            // Asignar el código de usuario al modelo
            $reqregnew->cod_usr = $codigo;
            // Asignar la fecha actual al campo fec_req
            $reqregnew->fec_req = $fechaActual;
            // Guardar la instancia del modelo en la base de datos
            $reqregnew->save();

            return $reqregnew;
        }
    }

}
