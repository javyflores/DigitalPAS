<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Entidad;

class SecnominaController extends Controller
{

    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $sec = substr($codigo, 1, 2);
        $edo = $sec;
        $estado = Entidad::where('edo', $edo)->value('entidad');

        $query = DB::table('nomina.afiliados')
            ->select('*')
            ->where('edo', $edo)
            ->get();

        $afiliados = json_encode($query);
        $afiliados = json_decode($afiliados, true);
        $totalAfiliados = count($afiliados);
        // Número de ítems por página
        $itemsPorPagina = 10;
        // Número de página actual
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        // Índice de inicio para la paginación
        $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
        // Obtener los ítems para la página actual
        $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
        // Calcular el número total de páginas
        $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

        return view('seccional.secnomina', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'estado' => $estado,
            'afiliados' => $afiliados,
            'totalAfiliados' => $totalAfiliados,
            'itemsPorPagina' => $itemsPorPagina,
            'paginaActual' => $paginaActual,
            'indiceInicio' => $indiceInicio,
            'itemsPaginados' => $itemsPaginados,
            'totalPaginas' => $totalPaginas
        ]);
    }

    public function consulta(){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $sec = substr($codigo, 1, 2);
        $edo = $sec;
        $estado = Entidad::where('edo', $edo)->value('entidad');

        if (isset($_POST['cedula'])){

            $cedula= $_POST['cedula'];

            $query = DB::select("SELECT * FROM nomina.afiliados WHERE cedula = '$cedula'");
            $afiliados = json_encode($query);
            $afiliados = json_decode($afiliados, true);
            $totalAfiliados = count($afiliados);
            // Número de ítems por página
            $itemsPorPagina = 10;
            // Número de página actual
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            // Índice de inicio para la paginación
            $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
            // Obtener los ítems para la página actual
            $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
            // Calcular el número total de páginas
            $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

            return view('seccional.secnomina', [
                'codigo' => $codigo,
                'usuario' => $usuario,
                'estado' => $estado,
                'afiliados' => $afiliados,
                'totalAfiliados' => $totalAfiliados,
                'itemsPorPagina' => $itemsPorPagina,
                'paginaActual' => $paginaActual,
                'indiceInicio' => $indiceInicio,
                'itemsPaginados' => $itemsPaginados,
                'totalPaginas' => $totalPaginas
            ]);
        };
    }

}
