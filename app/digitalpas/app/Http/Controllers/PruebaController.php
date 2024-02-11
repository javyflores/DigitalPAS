<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Afiliados;
use App\Models\DatosLaborales;
use App\Models\DatosContacto;
use App\Models\DatosHijos;

use App\Models\Entidad;

class PruebaController extends Controller
{
    public function index(Request $request)
	{
        $codigo = Session::get('codigo');
        $id_afi = Session::get('id_afi');
        $usuario = Session::get('usuario');
        /*
	    $datos = DatosLaborales::join(
	    	'nomina.afiliados',
	    	'nomina.dat_lab_afi.id_afi', '=', 'nomina.afiliados.id_afi')
                    ->select('nomina.afiliados.*')
                    ->get();
        */
        $datos = Afiliados::all();
            
	    return view('prueba', [
	    	'datos' => $datos,
            'codigo' => $codigo,
            'id_afi' => $id_afi,
            'usuario' => $usuario
	]);
	}
}
