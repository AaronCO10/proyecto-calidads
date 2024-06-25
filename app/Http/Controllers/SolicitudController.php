<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Ignition\Contracts\Solution;


class SolicitudController extends Controller
{
 

    public function __construct() {
        $this->middleware('can:donador')->only('create','store');
        $this->middleware('can:admin')->only('edit','destroy','show','update','index');
        
        
    }
    public function auth()
    {
        if (auth()->check()) {
            return view('solicitud.index');
        } else {
            return view('principal.index');
        }

    }
    public function index(Request $request)
    {
        $busqueda = $request ->busqueda;
        $solicituds=Solicitud::where('nombre_apellidos','LIKE','%'.$busqueda.'%')
        ->orWhere('solicitante','LIKE','%'.$busqueda.'%')
        ->orWhere('DNI','LIKE','%'.$busqueda.'%')
        ->orWhere('tipo_sangre','LIKE','%'.$busqueda.'%')
        ->latest('id')->PAGINATE();
        $data =[
            'solicitud'=>$solicituds
        ];
        return view('solicitud.index',$data);
        
    }

    public function create()
    {
        
        return view('solicitud.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'solicitante' => 'required',
            'nombre_apellidos' => 'required',
            'DNI' => ['required', 'size:8'],
            'tipo_sangre' => ['required'], 
            'terminos' => ['required'], 


        ]);
        $solicituds =new Solicitud();
        $solicituds->solicitante=$request->get('solicitante');
        $solicituds->nombre_apellidos=$request->get('nombre_apellidos');
        $solicituds->DNI=$request->get('DNI');
        $solicituds->tipo_sangre=$request->get('tipo_sangre');
        $solicituds->terminos=("Aceptado");
        $solicituds->save();
        session()->flash('success', 'SE MUESTRA LOS DATOS COINCIDENTES ');
        return redirect("/donadore?busqueda={$solicituds->tipo_sangre}");
    }

    public function edit($id)
    {
        $solicitud = Solicitud::find($id);
        return view('solicitud.edit')->with('solicitud',$solicitud);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'solicitante' => 'required',
            'nombre_apellidos' => 'required',
            'DNI' => ['required', 'size:8'],
            'tipo_sangre' => ['required'],

        ]);
        $solicituds =Solicitud::find($id);
        $solicituds->solicitante=$request->get('solicitante');
        $solicituds->nombre_apellidos=$request->get('nombre_apellidos');
        $solicituds->DNI=$request->get('DNI');
        $solicituds->tipo_sangre=$request->get('tipo_sangre');
        $solicituds->save();
        return redirect('/solicitud');
    }


    public function destroy($id)
    {
        $solicitud = Solicitud::find($id)->delete();
    
        return redirect()->route('solicitud.index');
    }
}
