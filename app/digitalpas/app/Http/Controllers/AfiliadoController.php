<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Entidad; // Reemplaza "YourModel" con el nombre de tu modelo
use Illuminate\Support\Facades\DB;



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

        if($rol == 3){
            $id_afi = Session::get('id_afi');
            $edo = substr($id_afi, 0, 2);

            $estados =  DB::table('nomina.entidad')
            ->where('edo', '=', $edo)
            ->get();
            return view ('afiliado.afiliadoReport', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol, 'estados' => $estados]);

        }

        $estados = Entidad::all();

        return view ('afiliado.afiliadoReport', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol, 'estados' => $estados]);
    }

    public function solicitudPdfAfiliado(Request $request){
       /*
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');

        return view ('afiliado.solicitudPdfReport', ['codigo' => $codigo, 'usuario' => $usuario, 'rol' => $rol]);
        
        */

        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');


        $rol = Session::get('rol');
        if($rol == 4){
            $id_afi = Session::get('id_afi');
            $edo = substr($id_afi, 0, 2);

            $query =  $query = DB::table('nomina.afiliados')
            ->join('nomina.entidad', 'nomina.afiliados.edo', '=', 'nomina.entidad.edo')
            ->join('gestion.sol_tramite', 'nomina.afiliados.cedula', '=', 'gestion.sol_tramite.cedula')
            ->select('nomina.afiliados.cedula', 'nomina.afiliados.p_nombre', 'nomina.afiliados.s_nombre', 'nomina.afiliados.p_apellido', 'nomina.afiliados.s_apellido', 'nomina.entidad.entidad', 'gestion.sol_tramite.req_reg', 'gestion.sol_tramite.cod_usr', 'gestion.sol_tramite.fec_crea')
            ->where('gestion.sol_tramite.edo', '=', $edo)
            ->get();
            //return response()->json($query);
            $afiliados = json_encode($query);
            $afiliados = json_decode($afiliados, true);
            $totalAfiliados = count($afiliados);
            // Número de ítems por página
            $itemsPorPagina = 50;
            // Número de página actual
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            // Índice de inicio para la paginación
            $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
            // Obtener los ítems para la página actual
            $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
            // Calcular el número total de páginas
            $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

            return view('afiliado.solicitudPdfReport', [
                'codigo' => $codigo,
                'usuario' => $usuario,
                'rol' => $rol,
                'afiliados' => $afiliados,
                'totalAfiliados' => $totalAfiliados,
                'itemsPorPagina' => $itemsPorPagina,
                'paginaActual' => $paginaActual,
                'indiceInicio' => $indiceInicio,
                'itemsPaginados' => $itemsPaginados,
                'totalPaginas' => $totalPaginas
            ]);

        }



        $query =  DB::table('nomina.afiliados')
        ->join('nomina.entidad', 'nomina.afiliados.edo', '=', 'nomina.entidad.edo')
        ->join('gestion.sol_tramite', 'nomina.afiliados.cedula', '=', 'gestion.sol_tramite.cedula')
        ->select('nomina.afiliados.cedula', 'nomina.afiliados.p_nombre', 'nomina.afiliados.s_nombre', 
        'nomina.afiliados.p_apellido', 'nomina.afiliados.s_apellido', 'nomina.entidad.entidad', 
        'gestion.sol_tramite.req_reg', 'gestion.sol_tramite.cod_usr', 'gestion.sol_tramite.fec_crea')
        ->get();
        //return response()->json($query);
        $afiliados = json_encode($query);
        $afiliados = json_decode($afiliados, true);
        $totalAfiliados = count($afiliados);
        // Número de ítems por página
        $itemsPorPagina = 50;
        // Número de página actual
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        // Índice de inicio para la paginación
        $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
        // Obtener los ítems para la página actual
        $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
        // Calcular el número total de páginas
        $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

        return view('afiliado.solicitudPdfReport', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'rol' => $rol,
            'afiliados' => $afiliados,
            'totalAfiliados' => $totalAfiliados,
            'itemsPorPagina' => $itemsPorPagina,
            'paginaActual' => $paginaActual,
            'indiceInicio' => $indiceInicio,
            'itemsPaginados' => $itemsPaginados,
            'totalPaginas' => $totalPaginas
        ]);
    }



}
