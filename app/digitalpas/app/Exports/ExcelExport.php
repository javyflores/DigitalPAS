<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Afiliados; // Reemplaza "YourModel" con el nombre de tu modelo

class ExcelExport implements FromCollection
{
    public function collection()
    {
        return Afiliados::all(); // Reemplaza "YourModel" con el nombre de tu modelo
    }
}