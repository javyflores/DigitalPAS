<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Estatus;
use App\Models\Req_seguimiento;
use App\Models\Sol_asistencia;


class SegsolicitudesController extends Controller
{
    public function index(Request $request)
    {
	    $codigo = Session::get('codigo');
	    $id_afi = Session::get('id_afi');
	    $usuario = Session::get('usuario');
	    $tipouser = Session::get('tipouser');
	    $rol = Session::get('rol');
	    $cod_usr = $codigo;

        $consult= Req_seguimiento::where('cod_usr', $cod_usr)->get();

        if ($consult) {
	        $requerimientos = json_encode($consult);
	        $requerimientos = json_decode($requerimientos, true);
	        $totalrequerimientos = count($requerimientos);
	        // Número de ítems por página
	        $itemsPorPagina = 10;
	        // Número de página actual
	        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
	        // Índice de inicio para la paginación
	        $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
	        // Obtener los ítems para la página actual
	        $itemsPaginados = array_slice($requerimientos, $indiceInicio, $itemsPorPagina);
	        // Calcular el número total de páginas
	        $totalPaginas = ceil(count($requerimientos) / $itemsPorPagina);

	        return view('afiliado.segsolicitudes', [
	            'codigo' => $codigo,
	            'usuario' => $usuario,
	            'tipouser' => $tipouser,
	            'rol' => $rol,
	            'requerimientos' => $requerimientos,
	            'totalrequerimientos' => $totalrequerimientos,
	            'itemsPorPagina' => $itemsPorPagina,
	            'paginaActual' => $paginaActual,
	            'indiceInicio' => $indiceInicio,
	            'itemsPaginados' => $itemsPaginados,
	            'totalPaginas' => $totalPaginas
	        ]);
	    }
	    else{
	    	return redirect('/afiliado')->with('error', 'No posees solicitudes activas');
	    }
    }

    public function consulta(Request $request){
	    $codigo = Session::get('codigo');
	    $id_afi = Session::get('id_afi');
	    $usuario = Session::get('usuario');
	    $tipouser = Session::get('tipouser');
	    $rol = Session::get('rol');
	    $cod_usr = $codigo;

        if (isset($_POST['req_seg'])){

        	$req_seg = $request->input('req_seg');

	    	$req = $req_seg;

	    	$sol_asis = Sol_asistencia::find($req);

	    	$requerimiento = Req_seguimiento::where('req_seg', $req_seg)->get();


            return view('afiliado.segsolcons', [
                'codigo' => $codigo,
                'usuario' => $usuario,
	            'tipouser' => $tipouser,
	            'rol' => $rol,
	            'req_seg' => $req_seg,
	            'sol_asis' => $sol_asis,
	            'requerimiento' => $requerimiento
            ]);
        };
    }



}
