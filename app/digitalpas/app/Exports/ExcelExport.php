<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Afiliacion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\View as ViewFacade;

class ExcelExport implements FromView
{
    private $idEstado;

    public function __construct($idEstado)
    {
        $this->idEstado = $idEstado;
    }

    public function view(): View
    {
        $afiliaciones = Afiliacion::where('edo', $this->idEstado)->get();

        // Puedes ajustar la lógica de consulta según tus necesidades
        $resultados = Afiliacion::join('nomina.entidad', 'afiliacion.edo', '=', 'nomina.entidad.edo')
            ->select('afiliacion.req_reg', 'afiliacion.req', 'nomina.entidad.entidad', 'afiliacion.cod_usr', 'afiliacion.cedula', 'afiliacion.p_nombre', 'afiliacion.p_apellido', 'afiliacion.fec_crea')
            ->get();

        return ViewFacade::make('export.exportexcel', [
            'afiliaciones' => $afiliaciones,
            'resultados' => $resultados,
        ]);
    }
}











/*
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
      //  return Afiliacion::where('edo', $this->idEstado)->get();
       return $resultados = Afiliacion::join('nomina.entidad', 'afiliacion.edo', '=', 'nomina.entidad.edo')
       ->select('afiliacion.req_reg','afiliacion.req','nomina.entidad.entidad', 'afiliacion.cod_usr',
        'afiliacion.cedula', 'afiliacion.p_nombre', 'afiliacion.p_apellido', 'afiliacion.fec_crea')
       ->get();

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

    // Adding "Hola Mundo" to line 1
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setCellValue('A1', 'Hola Mundo');
            },
        ];
    }
}
*/