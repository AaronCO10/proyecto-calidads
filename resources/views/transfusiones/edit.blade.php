<!-- resources/views/transfusiones/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="padding: 20px 10vw">
        <h1>Editar Transfusión</h1>
        <form action="{{ route('transfusiones.update', $transfusion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $transfusion->nombres }}">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control"
                    value="{{ $transfusion->apellidos }}">
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" class="form-control" value="{{ $transfusion->dni }}">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                    value="{{ $transfusion->fecha_nacimiento }}">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="Masculino" {{ $transfusion->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ $transfusion->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="Otro" {{ $transfusion->sexo == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_sangre_id">Tipo de Sangre:</label>
                <select name="tipo_sangre_id" id="tipo_sangre_id" class="form-control">
                    @foreach ($tiposSangre as $tipoSangre)
                        <option value="{{ $tipoSangre->id }}"
                            {{ $tipoSangre->id == $transfusion->tipo_sangre_id ? 'selected' : '' }}>
                            {{ $tipoSangre->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="unidades">Unidades:</label>
                <input type="number" name="unidades" id="unidades" class="form-control"
                    value="{{ $transfusion->unidades }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
