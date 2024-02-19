<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Entidad; // Reemplaza "YourModel" con el nombre de tu modelo



class AfiliadoController extends Controller
{

    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');

        return view ('afiliado', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol]);
    }

    public function reportAfiliado(Request $request){
       
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        $estados = Entidad::all();

        return view ('afiliado.afiliadoReport', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol, 'estados' => $estados]);
    }

    public function solicitudPdfAfiliado(Request $request){
       
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');

        return view ('afiliado.solicitudPdfReport', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol]);
    }



}
