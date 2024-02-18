<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NacionalesController extends Controller
{
    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        return view ('nacionales', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol]);
    }
}
