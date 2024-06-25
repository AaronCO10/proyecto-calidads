<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class SolicitudesDonacionExport  implements FromCollection, WithHeadings
{
    protected $solicitudes;

    public function __construct($solicitudes)
    {
        $this->solicitudes = $solicitudes;
    }

    public function collection()
    {
        return $this->solicitudes->map(function ($solicitud) {
            return [
                'Fecha de Generación' => $solicitud->created_at->format('Y-m-d H:i:s'),
                'Campaña' => $solicitud->campania->nombre,
                'Persona' => $solicitud->user->name,
                'Estado' => $solicitud->estado,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Fecha de Generación',
            'Campaña',
            'Persona',
            'Estado',
        ];
    }
}
