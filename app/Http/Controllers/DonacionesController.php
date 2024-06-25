<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donacion;
use App\Models\BancoSangre;
use Illuminate\Http\Request;
use App\Models\SolicitudDonacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //code...
            $solicitud = SolicitudDonacion::find($request->solicitud_id);
            $donante = User::find($solicitud->user_id);
            $donacion = new Donacion();
            $donacion->solicitud_id = $request->solicitud_id;
            $donacion->tipo_sangre_id = $donante->tipo_sangre_id;
            $donacion->unidades = $request->unidades;
            $donacion->save();

            // Actualizar la campaña asociada
            $campania = $solicitud->campania;
            $campania->unidades_donadas += $request->unidades;
            $campania->save();

            // Actualizar el banco de sangre
            $bancoSangre = BancoSangre::where('tipo_sangre_id',$donante->tipo_sangre_id)->first();
            $bancoSangre->unidades += $request->unidades;
            $bancoSangre->save();

            DB::commit();
            return response()->json(['success' => 'Donación registrada correctamente.']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'Donación no se pud registrar.'],500);
            Log::error($e);
        }
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
