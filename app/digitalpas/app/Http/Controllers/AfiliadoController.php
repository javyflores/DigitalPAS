<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AfiliadoController extends Controller
{

    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');

        return view ('afiliado', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol]);
    }


}
