<!-- resources/views/solicitudes/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center">
        <div
            style="width: 60vw;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.19);
            border-radius: 10px;
            padding: 20px;
            margin: 20px;">

            <h1 style="color: #c90f0f; font-weight: bold" class="mt-4">Registrar Solicitud de Donación</h1>

            <form action="{{ route('solicitudes.store') }}" method="POST">
                @csrf

                <!-- Campos del formulario para crear usuario (si no ha iniciado sesión) -->
                @if (!Auth::check())
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required>
                        @error('nombres')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                        @error('apellidos')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" name="dni" id="dni" class="form-control" required>
                        @error('dni')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                        @error('fecha_nacimiento')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select name="sexo" id="sexo" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        @error('sexo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="tipo_sangre_id">Tipo de Sangre:</label>
                        {{-- <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" required> --}}
                        <select name="tipo_sangre_id" id="tipo_sangre_id" class="form-control" required>
                            <option disabled selected>Seleccione un tipo de sangre</option>
                            @foreach($tiposSangre as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipo_sangre_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                        @error('telefono')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Agrega el resto de campos con sus respectivas validaciones y mensajes de error -->
                @endif

                <!-- Campos del formulario para la solicitud -->
                <div class="form-group">
                    <label for="talla">Talla(cm):</label>
                    <input type="text" name="talla" id="talla" class="form-control" required>
                    @error('talla')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="peso">Peso(Kg):</label>
                    <input type="text" name="peso" id="peso" class="form-control" required>
                    @error('peso')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="acepta_terminos" id="acepta_terminos" class="form-check-input"
                        value="1" required>
                    <label class="form-check-label" for="acepta_terminos">Acepta Términos</label>
                    @error('acepta_terminos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div style="width: 100%; text-align: center;">
                    <button type="submit"
                        style="background-color: #c90f0f; padding: 7px 14px; border: none; border-radius: 25px; color: #ffffff;">Crear
                        Solicitud</button>
                </div>

            </form>
        </div>
    </div>
@endsection
