<?php

namespace App\Http\Controllers;

use App\Models\BancoSangre;
use Illuminate\Http\Request;

class BancoSangreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bancosSangre = BancoSangre::with('tiposangre','tiposangre.donaciones','tiposangre.donaciones.solicitudDonacion','tiposangre.donaciones.solicitudDonacion.user','tiposangre.donaciones.solicitudDonacion.campania')->get();
        return view('bancosangre.index', compact('bancosSangre'));
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
