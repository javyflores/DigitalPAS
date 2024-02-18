<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ChartData;

class ChartController extends Controller
{
    public function getChartData()
    {
        // Lógica para obtener los datos del gráfico desde el modelo ChartData
       // Obtener los datos del modelo ChartData
       $chartData = DB::table('nomina.afiliados')->pluck('nombre_columna')->toArray();


        // Devolver los datos en formato JSON
        return response()->json($chartData);
    }
}
