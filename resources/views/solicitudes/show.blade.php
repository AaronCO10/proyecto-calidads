<!-- resources/views/solicitudes/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="margin: 10px 20px">
        <h1 style="color: #c90f0f;"">Detalles de Solicitud</h1>
        <hr>
        <div
            style="
                display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 5px;
            ">

            <div style="grid-row: 1 / span 2;">


                    <div
                        style="background-color: white; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.19); border-radius: 10px; padding: 20px; margin: 20px;">
                        <h2 style="color: #c90f0f; font-weight: bold">Información del Solicitante</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div id="infosolicitante">
                            <p><strong>Nombre:</strong> {{ $solicitud->user->name }}</p>
                            <p><strong>Correo Electrónico:</strong> {{ $solicitud->user->email }}</p>
                            <p><strong>Nombres:</strong> {{ $solicitud->user->nombres }}</p>
                            <p><strong>Apellidos:</strong> {{ $solicitud->user->apellidos }}</p>
                            <p><strong>DNI:</strong> {{ $solicitud->user->dni }}</p>
                            <p><strong>Fecha de Nacimiento:</strong> {{ $solicitud->user->fecha_nacimiento }}</p>
                            <p><strong>Sexo:</strong> {{ $solicitud->user->sexo }}</p>
                            <p><strong>Tipo de Sangre:</strong> {{ $solicitud->user->tiposangre->nombre }}</p>
                            <p><strong>Teléfono:</strong> {{ $solicitud->user->telefono }}</p>
                        </div>


            </div>

            <div style="grid-column: 2;
            grid-row: 1;">
                <div
                    style="background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.19);
        border-radius: 10px;
        padding: 20px;
        margin: 20px;">
                    <h2 style="color: #c90f0f; font-weight: bold">Información de la Campaña</h2>
                    <p><strong>Nombre:</strong> {{ $solicitud->campania->nombre }}</p>
                    <p><strong>Fecha de Inicio:</strong> {{ $solicitud->campania->fecha_inicio }}</p>
                    <p><strong>Fecha de Fin:</strong> {{ $solicitud->campania->fecha_fin ?? 'N/A' }}</p>
                    <p><strong>Activo:</strong> {{ $solicitud->campania->activo ? 'Sí' : 'No' }}</p>
                </div>
            </div>

            <div style="grid-column: 2;
            grid-row: 2;">
                <div
                    style="background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.19);
        border-radius: 10px;
        padding: 20px;
        margin: 20px;">
                    <h2 style="color: #c90f0f; font-weight: bold">Información de la Solicitud</h2>
                    {{-- <p><strong>ID de Solicitud:</strong> {{ $solicitud->id }}</p> --}}
                    <p><strong>Talla(cm) del solicitante:</strong> {{ $solicitud->talla }}</p>
                    <p><strong>Peso(Kg) del solicitante:</strong> {{ $solicitud->peso }}</p>
                    <p><strong>Estado:</strong> {{ $solicitud->estado }}</p>

                </div>
            </div>

        </div>

    </div>

@endsection
