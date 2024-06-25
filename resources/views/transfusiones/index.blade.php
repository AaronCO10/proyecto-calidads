<!-- resources/views/transfusiones/index.blade.php -->
@extends('layouts.app')

@section('content')
<div style="padding: 20px 10vw">
    <h1>Lista de Transfusiones</h1>
    <a href="{{ route('transfusiones.create') }}" class="btn btn-primary">Crear Nueva Transfusión</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <!-- Agregar más columnas según tus necesidades -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transfusiones as $transfusion)
                <tr>
                    <td>{{ $transfusion->id }}</td>
                    <td>{{ $transfusion->nombres }}</td>
                    <!-- Agregar más columnas según tus necesidades -->
                    <td>
                        <a href="{{ route('transfusiones.edit', $transfusion->id) }}" class="btn btn-primary">Editar</a>
                        <!-- Agregar botón de eliminar si es necesario -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
