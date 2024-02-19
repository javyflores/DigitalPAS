<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport; //consulta a base de datos
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function downloadExcel(Request $request)
    {
        $idEstado = $request->estado;
        return Excel::download(new ExcelExport($idEstado), 'archivo.xlsx');
    }
}
