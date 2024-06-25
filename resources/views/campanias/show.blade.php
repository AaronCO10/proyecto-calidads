<!-- resources/views/campanias/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detalles de la Campaña</h1>
    <p><strong>Nombre:</strong> {{ $campania->nombre }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $campania->fecha_inicio }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $campania->fecha_fin }}</p>
    <p><strong>Unidades donadas:</strong> {{ $campania->unidades_donadas }}</p>
    <p><strong>Activo:</strong> {{ $campania->activo ? 'Sí' : 'No' }}</p>
    <a href="{{ route('campanias.index') }}" class="btn btn-primary">Volver</a>
@endsection
