<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Afiliacion;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Sheet;

class ExcelExport implements FromCollection, WithHeadings, WithColumnWidths
{
    private $idEstado;
    use Exportable;
    public function __construct($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function collection()
    {
        return Afiliacion::where('edo', $this->idEstado)->get();
    }

    public function headings(): array
    {
        return ['Registro de Requerimiento', 'Requerimiento', 'estado', 'Código del usuario', 'cédula', 'Primer nombre', 'primer apellido', 'fecha de creación', 'afiliación (planilla) digitalizada', 'cédula digitalizada'];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25, // Ancho de la columna A
            'B' => 25, // Ancho de la columna B
            'C' => 25, // Ancho de la columna C
            'D' => 25, // Ancho de la columna A
            'E' => 25, // Ancho de la columna B
            'F' => 25, // Ancho de la columna C
            'G' => 25, // Ancho de la columna A
            'H' => 25, // Ancho de la columna B
            'I' => 25, // Ancho de la columna C
            'J' => 25, // Ancho de la columna C

        ];
    }

   
}