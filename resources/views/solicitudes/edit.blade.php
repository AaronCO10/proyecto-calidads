<!-- resources/views/solicitudes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div style="margin: 10px 20px">
        <h1 style="color: #c90f0f; font-weight: bold">Editar Solicitud de Donación</h1>
        <hr>
        <div
            style="
                display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    gap: 5px;
            ">

            <div style="grid-row: 1 / span 2;">

                @if ($user->isAdmin())
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
                        <div id="editableForm" style="display: none;">

                            <form action="{{ route('solicitante.update', $solicitud->user->id) }}" method="POST">
                                @csrf
                                <input type="text" name="name" value="{{ $solicitud->user->name }}"
                                    class="form-control" />
                                <input type="email" name="email" value="{{ $solicitud->user->email }}"
                                    class="form-control" />
                                <input type="text" name="nombres" value="{{ $solicitud->user->nombres }}"
                                    class="form-control" />
                                <input type="text" name="apellidos" value="{{ $solicitud->user->apellidos }}"
                                    class="form-control" />
                                <input type="text" name="dni" value="{{ $solicitud->user->dni }}"
                                    class="form-control" />
                                <input type="date" name="fecha_nacimiento"
                                    value="{{ $solicitud->user->fecha_nacimiento }}" class="form-control" />
                                <input type="text" name="sexo" value="{{ $solicitud->user->sexo }}"
                                    class="form-control" />
                                    <select name="tipo_sangre_id" id="tipo_sangre_id" class="form-control" required>
                                        <option disabled>Seleccione un tipo de sangre</option>
                                        @foreach($tiposSangre as $tipo)
                                            <option value="{{ $tipo->id }}" {{ $solicitud->user->tiposangre->id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                <input type="text" name="telefono" value="{{ $solicitud->user->telefono }}"
                                    class="form-control" />
                                <input type="text" name="id_solicitud" value="{{ $solicitud->id }}" class="form-control"
                                    hidden />
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </form>
                        </div>
                        <button onclick="toggleEdit()"
                            style="background-color: #c90f0f; color: white; border-radius: 5px; padding: 10px; cursor: pointer;">Editar</button>
                    </div>
                @endif

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
                    <p><strong>Peso(Kg) del solicitante:</strong>  <input name="pesopersona" value="{{ $solicitud->peso }}" readonly /> </p>
                    <p><strong>Estado:</strong> {{ $solicitud->estado }}</p>
                    @if ($user->isAdmin())
                        <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select name="estado" id="estado" class="form-control" required hidden>
                                    <option value="Pendiente" {{ $solicitud->estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>
                                    <option value="Puede Donar"
                                        {{ $solicitud->estado == 'Puede Donar' ? 'selected' : '' }}>Puede
                                        Donar</option>
                                    <option value="No Puede Donar"
                                        {{ $solicitud->estado == 'No Puede Donar' ? 'selected' : '' }}>
                                        No Puede Donar</option>
                                </select>
                            </div>
                            @if ($solicitud->estado == 'Pendiente')
                                <div style="margin-top: 15px; display: flex; justify-content: end;">
                                    <button id="rechazarBtn"
                                        style="background-color: #ffffff; padding: 7px 14px; border: none; border-radius: 15px; color: #c90f0f; border: 1.5px solid #c90f0f;font-weight: 700; width: 120px;">
                                        Rechazar
                                    </button>
                                    <button id="aprobarBtn"
                                        style="background-color: #c90f0f; padding: 7px 14px; border: none; border-radius: 15px; color: #ffffff;font-weight: 700;margin-left: 15px; width: 120px;">
                                        Aprobar
                                    </button>
                                </div>
                            @endif
                        </form>
                    @endif
                </div>
            </div>

        </div>

    </div>
    <script>
        var rechazarBtn = document.getElementById('rechazarBtn');

        if (rechazarBtn) {

            rechazarBtn.addEventListener('click', function() {
                document.getElementById('estado').value = 'No Puede Donar';
                document.getElementById('estadoForm').submit();
            });
        }

        var aprobarBtn = document.getElementById('aprobarBtn');

        if (aprobarBtn) {
            aprobarBtn.addEventListener('click', function() {
                document.getElementById('estado').value = 'Puede Donar';
                document.getElementById('estadoForm').submit();
            });
        }


        function toggleEdit() {
            document.getElementById('infosolicitante').style.display = document.getElementById('infosolicitante').style
                .display === 'none' ? 'block' : 'none';
            var form = document.getElementById('editableForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';

        }
    </script>
@endsection
