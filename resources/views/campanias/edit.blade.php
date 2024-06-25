<!-- resources/views/campanias/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Campaña</h1>
    <form action="{{ route('campanias.update', $campania->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $campania->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
@endsection
