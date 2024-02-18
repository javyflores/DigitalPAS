<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function downloadExcel()
    {
        return Excel::download(new ExcelExport(), 'archivo.xlsx');
    }
}
