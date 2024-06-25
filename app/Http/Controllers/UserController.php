<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SolicitudDonacion;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function updateRole(Request $request){}

    public function updateSolicitante(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->dni = $request->dni;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->sexo = $request->sexo;
        $user->tipo_sangre_id = $request->tipo_sangre_id;
        $user->telefono = $request->telefono;
        $user->save();

        // If there's related solicitud that needs to be fetched and shown
        $solicitud = SolicitudDonacion::findOrFail($request->id_solicitud);
        // If you need to pass both user and solicitud to the view
        return redirect()->route('solicitudes.edit', $request->id_solicitud)->with('success', 'Datos actualizados correctamente.');

    }



}
