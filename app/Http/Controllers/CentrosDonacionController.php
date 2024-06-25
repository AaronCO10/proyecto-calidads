<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentrosDonacion;
use Illuminate\Support\Facades\Log;

class CentrosDonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $centros = CentrosDonacion::all();
        return view('centrodonacion.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('centrodonacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
        ]);

        CentrosDonacion::create($request->all());

        return redirect()->route('centrosdonacion.index')
            ->with('success','Centro de donacion registrado.');
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
        $centro = CentrosDonacion::find($id);
        return view('centrodonacion.edit',compact('centro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
        ]);

        $centro = CentrosDonacion::find($id);

        $centro->update($request->all());

        return redirect()->route('centrosdonacion.index')
            ->with('success','Centro de donacion actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $centro = CentrosDonacion::find($id);
        $centro->delete();

        return redirect()->route('centrosdonacion.index')
            ->with('success','Centro de donacion eliminado.');
    }
}
