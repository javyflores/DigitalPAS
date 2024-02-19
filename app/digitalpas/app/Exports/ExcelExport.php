<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Afiliacion; // Reemplaza "YourModel" con el nombre de tu modelo

class ExcelExport implements FromCollection
{

    private $idEstado; //nacio

    public function __construct($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function collection()
    {
        //return Afiliados::all($idEstado); // Reemplaza "YourModel" con el nombre de tu modelo
        return Afiliacion::where('edo', $this->idEstado)->get();   
    }
}