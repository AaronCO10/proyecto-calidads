<!-- resources/views/campanias/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Campaña</h1>
    <form action="{{ route('campanias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Campaña</button>
    </form>
@endsection
