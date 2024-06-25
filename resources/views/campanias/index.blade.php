<!-- resources/views/campanias/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Listado de Campañas</h1>
    <a href="{{ route('campanias.create') }}" class="btn btn-primary">Crear Nueva Campaña</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Unicdades Donadas</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campanias as $campania)
                <tr>
                    <td>{{ $campania->nombre }}</td>
                    <td>{{ $campania->fecha_inicio }}</td>
                    <td>{{ $campania->fecha_fin }}</td>
                    <td>{{ $campania->unidades_donadas }}</td>
                    <td>{{ $campania->activo ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('campanias.show', $campania->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('campanias.edit', $campania->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('campanias.destroy', $campania->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta campaña?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
