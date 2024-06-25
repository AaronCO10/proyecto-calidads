<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudDonacion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudesDonacionExport;

class ReportesController extends Controller
{
    //
    public function solicitudesReport()
    {
        $solicitudes = SolicitudDonacion::with('user', 'campania')->orderBy('campania_id')->get();

        return Excel::download(new SolicitudesDonacionExport($solicitudes), 'solicitudes_report'.now()->timestamp.'.xlsx');
    }
}
