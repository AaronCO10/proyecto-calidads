<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Campania;
use App\Models\TipoSangre;
use Illuminate\Http\Request;
use App\Models\SolicitudDonacion;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SolicitudDonacionController extends Controller
{
    public function index()
    {
        // Verificar si el usuario ha iniciado sesión
        if (!Auth::check()) {
            return redirect()->route('home'); // Redirigir al usuario a la página principal
        }

        $user = Auth::user();
        $campania = Campania::where('activo', true)->latest()->first();

        // Verificar si el usuario es administrador
        if ($user->isAdmin()) {
            // Si el usuario es un administrador, mostrar todas las solicitudes en orden descendente de creación
            $solicitudes = SolicitudDonacion::where('campania_id', $campania->id)->orderBy('created_at', 'desc')->get();
        } else {
            // Si el usuario no es un administrador, mostrar solo sus propias solicitudes
            $solicitudes = $user->solicitudes()->orderBy('created_at', 'desc')->get();

            // Verificar si el usuario puede crear una nueva solicitud
        }
        $puedesolicitar = !$user->hasActiveSolicitudInCampania($campania) && !$user->hasRecentSolicitud();

        return view('solicitudes.index', compact('solicitudes', 'campania', 'puedesolicitar'));
    }

    public function create()
    {
        $tiposSangre = TipoSangre::all();
        return view('solicitudes.create',['tiposSangre' => $tiposSangre]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'talla' => 'required',
            'peso' => 'required',
            'acepta_terminos' => 'required',
            // Puedes agregar más validaciones según sea necesario
        ]);

        if (Auth::check()) {
            // Si el usuario ha iniciado sesión, creamos la solicitud asociada al usuario actual
            $user = Auth::user();
        } else {
            // Si el usuario no ha iniciado sesión, creamos un nuevo usuario
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'nombres' => 'required',
                'apellidos' => 'required',
                'dni' => 'required',
                'fecha_nacimiento' => 'required|date',
                'sexo' => 'required',
                'tipo_sangre_id' => 'required',
                'telefono' => 'required',
                // Puedes agregar más validaciones según sea necesario
            ]);

            $user = User::create([
                'name' => $request->nombres . ' ' . $request->apellidos,
                'email' => $request->email,
                'password' => bcrypt($request->dni),
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'dni' => $request->dni,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'sexo' => $request->sexo,
                'tipo_sangre_id' => $request->tipo_sangre_id,
                'telefono' => $request->telefono,
            ])->assignRole('donador');
        }

        // Creamos la solicitud asociada al usuario actual o al usuario recién creado
        $campania = Campania::where('activo', true)->latest()->first();

        $solicitud = new SolicitudDonacion([
            'campania_id' => $campania->id,
            'talla' => $request->talla,
            'peso' => $request->peso,
            'acepta_terminos' => $request->acepta_terminos,
            'estado' => 'Pendiente', // Estado inicial
        ]);

        $user->solicitudes()->save($solicitud);

        if (Auth::check()) {
            return redirect()->route('solicitudes.index')
                ->with('success', 'Solicitud creada exitosamente.');
        } else {
            Auth::login($user); // Iniciar sesión con el nuevo usuario
            return redirect()->route('solicitudes.index')
                ->with('success', 'Usuario y solicitud creados exitosamente.');
        }
    }

    public function show($id)
    {
        $solicitud = SolicitudDonacion::findOrFail($id);

        return view('solicitudes.show', compact('solicitud'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $solicitud = SolicitudDonacion::findOrFail($id);
        $tiposSangre = TipoSangre::all();
        // Verificar si el usuario es administrador para permitir la edición del estado
        if ($user->roles()->where('name', 'admin')->exists()) {
            return view('solicitudes.edit', compact('solicitud', 'user','tiposSangre'));
        } else {
            // Si el usuario no es administrador, redirigir al index o mostrar un mensaje de error
            return redirect()->route('solicitudes.index')->with('error', 'No tienes permiso para editar esta solicitud.');
        }
    }

    public function update(Request $request, $id)
    {
        $solicitud = SolicitudDonacion::findOrFail($id);

        // Validar los datos recibidos del formulario
        $request->validate([
            'estado' => 'required|in:Pendiente,Puede Donar,No Puede Donar',
        ]);

        // Actualizar el estado de la solicitud
        $solicitud->estado = $request->estado;
        $solicitud->save();

        return redirect()->route('solicitudes.index')->with('success', 'Estado de la solicitud actualizado exitosamente.');
    }

    public function destroy(SolicitudDonacion $solicitud)
    {
        // Lógica para eliminar la solicitud de donación
        // (solo si el usuario tiene el rol de administrador)
    }
}
