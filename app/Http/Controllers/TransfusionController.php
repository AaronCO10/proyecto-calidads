<?php

namespace App\Http\Controllers;

use App\Models\TipoSangre;
use App\Models\BancoSangre;
use App\Models\Transfusion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransfusionController extends Controller
{

    public function index()
    {
        $transfusiones = Transfusion::all();
        return view('transfusiones.index', compact('transfusiones'));
    }

    public function create()
    {
        $tiposSangre = TipoSangre::all();
        return view('transfusiones.create', compact('tiposSangre'));
    }

    public function store(Request $request)
    {
        Transfusion::create($request->all());

        $bancoSangre = BancoSangre::where('tipo_sangre_id',$request->tipo_sangre_id)->first();
        $bancoSangre->unidades -= $request->unidades;
        $bancoSangre->save();
        return redirect()->route('transfusiones.index');
    }

    public function edit($id)
    {
        $tiposSangre = TipoSangre::all();
        $transfusion = Transfusion::find($id);
        return view('transfusiones.edit', compact('transfusion', 'tiposSangre'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|in:Masculino,Femenino,Otro',
            'tipo_sangre_id' => 'required|exists:tipo_sangres,id',
            'unidades' => 'required|integer'
        ]);

        $transfusion = Transfusion::find($id);

        if($request->tipo_sangre_id != $transfusion->tipo_sangre_id) {
            $bancoSangre = BancoSangre::where('tipo_sangre_id',$transfusion->tipo_sangre_id)->first();
            $bancoSangre->unidades += $transfusion->unidades;
            $bancoSangre->save();

            $bancoSangre = BancoSangre::where('tipo_sangre_id',$request->tipo_sangre_id)->first();
            $bancoSangre->unidades -= $request->unidades;
            $bancoSangre->save();

        } else if($request->unidades !=  $transfusion->unidades) {
            if($request->unidades >  $transfusion->unidades) {
                $unidades = $request->unidades - $transfusion->unidades;
                $bancoSangre = BancoSangre::where('tipo_sangre_id',$transfusion->tipo_sangre_id)->first();
                $bancoSangre->unidades -= $unidades;
                $bancoSangre->save();
            } else {
                $unidades = $transfusion->unidades - $request->unidades;
                $bancoSangre = BancoSangre::where('tipo_sangre_id',$transfusion->tipo_sangre_id)->first();
                $bancoSangre->unidades += $unidades;
                $bancoSangre->save();
            }

        }

        $transfusion->update($request->all());

        return redirect()->route('transfusiones.index');
    }

    public function destroy(Transfusion $transfusion)
    {
        $transfusion->delete();
        return redirect()->route('transfusiones.index');
    }
}
