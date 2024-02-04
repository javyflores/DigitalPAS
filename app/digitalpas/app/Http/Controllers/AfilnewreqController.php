<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Requerimiento;

class AfilnewreqController extends Controller
{
    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');

        // Obtener el último registro ordenado por req_reg de forma descendente
        $ultimoRegistro = Requerimiento::orderBy('req_reg', 'desc')->first();

        // Obtener el valor de req_reg del último registro
        $ultimoReqReg = $ultimoRegistro->req_reg;

        // Sumar 1 al valor de req_reg para el nuevo registro
        $nuevoReqReg = $ultimoReqReg + 1;

        // Crear un nuevo registro con el req_reg actualizado
        $nuevoRegistro = new Requerimiento();
        $nuevoRegistro->cod_usr = $codigo;
        $nuevoRegistro->fec_req = now(); // Insertar la fecha actual
        $nuevoRegistro->req_reg = $nuevoReqReg; // Asignar el nuevo valor de req_reg
        $nuevoRegistro->save();

        // Agregar el nuevo registro a la variable $reqnew
        $reqnew = $nuevoRegistro;

        return view ('afiliado.afilnewreq', ['codigo' => $codigo, 'usuario' => $usuario,
            'nuevoReqReg' => $nuevoReqReg
        ]);
    }



    public function reqnuevo(){
        if (isset($_POST['req']) && isset($_POST['desc_sol'])) {

        };
    }

}
