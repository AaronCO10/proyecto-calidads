<!-- resources/views/transfusiones/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="padding: 20px 10vw">
        <h1>Crear Nueva Transfusión</h1>
        <form action="{{ route('transfusiones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" id="nombres" class="form-control">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control">
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_sangre_id">Tipo de Sangre:</label>
                <select name="tipo_sangre_id" id="tipo_sangre_id" class="form-control">
                    @foreach ($tiposSangre as $tipoSangre)
                        <option value="{{ $tipoSangre->id }}">{{ $tipoSangre->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="unidades">Unidades:</label>
                <input type="number" name="unidades" id="unidades" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
