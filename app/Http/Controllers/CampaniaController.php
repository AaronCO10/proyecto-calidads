<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Campania;
use Illuminate\Http\Request;

class CampaniaController extends Controller
{
    public function index()
    {
        $campanias = Campania::orderBy('activo','desc')->orderBy('created_at','desc')->get();
        return view('campanias.index', compact('campanias'));
    }

    public function create()
    {
        return view('campanias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        Campania::where('activo', true)->update([
            'fecha_fin' => now(),
            'activo' => false
        ]);

        Campania::create($request->all());

        return redirect()->route('campanias.index')
            ->with('success', 'Campaña creada exitosamente.');
    }

    public function show(Campania $campania)
    {
        return view('campanias.show', compact('campania'));
    }

    public function edit(Campania $campania)
    {
        return view('campanias.edit', compact('campania'));
    }

    public function update(Request $request, Campania $campania)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        $campania->update($request->all());

        return redirect()->route('campanias.index')
            ->with('success', 'Campaña actualizada exitosamente.');
    }

    public function destroy(Campania $campania)
    {
        $campania->delete();

        return redirect()->route('campanias.index')
            ->with('success', 'Campaña eliminada exitosamente.');
    }
}
