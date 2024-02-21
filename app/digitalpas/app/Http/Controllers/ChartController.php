<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ChartData;
use App\Models\SolTramite;
use App\Models\TipoSolicitud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class ChartController extends Controller
{
    public function getChartData()
    {
        // Lógica para obtener los datos del gráfico desde el modelo ChartData
       // Obtener los datos del modelo ChartData
       //$chartData = ChartData::select('fec_crea', 'cedula')->get();
      /* $chartData = ChartData::select('cedula', DB::raw('COUNT(cedula) as cantidad_repeticiones'))
            ->groupBy('cedula')
          //  ->havingRaw('COUNT(cedula) > 1') //si son mas de 2, me muestra solo ese
            ->get();


        // Devolver los datos en formato JSON
        return response()->json($chartData);*/
        $meses = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $rol = Session::get('rol');

        if ($rol == 4 ){

            $id_afi = Session::get('id_afi');
            $edo = substr($id_afi, 0, 2);
            
            $resultados = DB::table('gestion.afiliacion')
                ->select(DB::raw("COALESCE(COUNT(afiliacion.req_reg), 0) AS cantidad_repeticiones, meses.mes"))
                ->rightJoin(DB::raw("(VALUES ('01'), ('02'), ('03'), ('04'), ('05'), ('06'), ('07'), ('08'), ('09'), ('10'), ('11'), ('12')) AS meses(mes)"), function ($join) use ($edo) {
                    $join->on('meses.mes', '=', DB::raw("TO_CHAR(fec_crea, 'MM')"))
                        ->where(DB::raw("TO_CHAR(fec_crea, 'YYYY')"), '=', '2024')
                        ->where('edo', '=', $edo);
                })
                ->groupBy('meses.mes')
                ->orderBy('meses.mes')
                ->get();
            return response()->json($resultados);

        }

        $resultados = DB::table('gestion.afiliacion')
            ->select(DB::raw("COALESCE(COUNT(afiliacion.req_reg), 0) AS cantidad_repeticiones, meses.mes"))
            ->rightJoin(DB::raw("(VALUES ('01'), ('02'), ('03'), ('04'), ('05'), ('06'), ('07'), ('08'), ('09'), ('10'), ('11'), ('12')) AS meses(mes)"), function ($join) {
                $join->on('meses.mes', '=', DB::raw("TO_CHAR(fec_crea, 'MM')"))
                    ->where(DB::raw("TO_CHAR(fec_crea, 'YYYY')"), '=', '2024');
            })
            ->groupBy('meses.mes')
            ->orderBy('meses.mes')
            ->get();
        
        return response()->json($resultados);
    }

    public function getChartDataSeccional()
    {
        // Lógica para obtener los datos del gráfico desde el modelo ChartData
       // Obtener los datos del modelo ChartData
       //$chartData = ChartData::select('fec_crea', 'cedula')->get();
      /* $chartData = ChartData::select('cedula', DB::raw('COUNT(cedula) as cantidad_repeticiones'))
            ->groupBy('cedula')
          //  ->havingRaw('COUNT(cedula) > 1') //si son mas de 2, me muestra solo ese
            ->get();


        // Devolver los datos en formato JSON
        return response()->json($chartData);*/
        $meses = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        
    }

    // Método para obtener los datos de clasificación
    public function getClasificacionData()
    {
        // Contar la cantidad de usuarios con cada tipo de clasificación
        $clasificacionCount = SolTramite::where('desc_sol', SolTramite::TIPO_CLASIFICACION)->count();
        $becasCount = SolTramite::where('desc_sol', SolTramite::TIPO_BECA)->count();
        $reclamosCount = SolTramite::where('desc_sol', SolTramite::TIPO_RECLAMO)->count();
        // Otros contadores si los necesitas...

        // Devolver los datos en formato JSON
        return response()->json([
            'Clasificacion' => $clasificacionCount,
            'Becas' => $becasCount,
            'Reclamos' => $reclamosCount,
            // Otros contadores...
        ]);
    }

        // Constantes para los tipos de solicitud
        const TIPO_CLASIFICACION = 2;
        const TIPO_BECA = 4;
        const TIPO_RECLAMO = 7;
    
    // Método para obtener los datos nacionales
    public function getDatosNacionales() {
        /*
        $resultado = DB::table('gestion.sol_tramite')
        ->join('gestion.tipo_solicitud', 'sol_tramite.cod_tipo', '=', 'tipo_solicitud.cod_tipo')
        ->select('sol_tramite.*', 'tipo_solicitud.tipo_sol')
        ->whereIn('sol_tramite.cod_tipo', [3, 5, 7])
        ->get();
       */
      $rol = Session::get('rol');
      if($rol == 4){
        $id_afi = Session::get('id_afi');
        $edo = substr($id_afi, 0, 2);
        $resultado = DB::table('gestion.sol_tramite')
            ->leftJoin('gestion.tipo_solicitud', 'sol_tramite.cod_tipo', '=', 'tipo_solicitud.cod_tipo')
            ->select('sol_tramite.cod_tipo', 'tipo_solicitud.tipo_sol', DB::raw('COUNT(sol_tramite.cod_tipo) AS cantidad_registros'))
            ->whereIn('sol_tramite.cod_tipo', [2, 4, 7])
            ->where('sol_tramite.edo', '=', $edo) // Agregamos la condición para la columna 'edo'
            ->groupBy('sol_tramite.cod_tipo', 'tipo_solicitud.tipo_sol')
            ->get();
            // Verificar si hay registros para cada cod_tipo
            $cod_tipos = [2, 4, 7];
            $resultados_finales = [];
            foreach ($cod_tipos as $cod_tipo) {
                $registro = $resultado->firstWhere('cod_tipo', $cod_tipo);
                if ($registro) {
                    $resultados_finales[] = $registro;
                } else {
                    $resultados_finales[] = [
                        'cod_tipo' => $cod_tipo,
                        'tipo_sol' => null,
                        'cantidad_registros' => 0
                    ];
                }
            }

        // return var_dump($resultado);
        return response()->json($resultados_finales);


      }
      
       $resultado = DB::table('gestion.sol_tramite')
       ->leftJoin('gestion.tipo_solicitud', 'sol_tramite.cod_tipo', '=', 'tipo_solicitud.cod_tipo')
       ->select('sol_tramite.cod_tipo', 'tipo_solicitud.tipo_sol', DB::raw('COUNT(sol_tramite.cod_tipo) AS cantidad_registros'))
       ->whereIn('sol_tramite.cod_tipo', [2, 4, 7])
       ->groupBy('sol_tramite.cod_tipo', 'tipo_solicitud.tipo_sol')
       ->get();
   
   // Verificar si hay registros para cada cod_tipo
   $cod_tipos = [2, 4, 7];
   $resultados_finales = [];
   foreach ($cod_tipos as $cod_tipo) {
       $registro = $resultado->firstWhere('cod_tipo', $cod_tipo);
       if ($registro) {
           $resultados_finales[] = $registro;
       } else {
           $resultados_finales[] = [
               'cod_tipo' => $cod_tipo,
               'tipo_sol' => null,
               'cantidad_registros' => 0
           ];
       }
   }

       // return var_dump($resultado);
       return response()->json($resultados_finales);
    }
}


