<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SeccionalController extends Controller
{

    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        return view ('dirsec', ['codigo' => $codigo, 'usuario' => $usuario]);
    }
}
