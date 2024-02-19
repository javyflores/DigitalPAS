<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ChartData;
use Illuminate\Support\Facades\DB;

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
}
