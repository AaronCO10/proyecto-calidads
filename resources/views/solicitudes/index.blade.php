<!-- resources/views/solicitudes/index.blade.php -->
@extends('layouts.app')

@section('content')
    @guest
        <!-- Si el usuario no ha iniciado sesión, redirigir a la página principal -->
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @else
        <!-- Mostrar botón de crear solicitud si el usuario puede crear una nueva solicitud -->
        <h1>Listado de Solicitudes de Donación</h1>
        @if ($puedesolicitar)
            <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Crear Solicitud</a>
        @endif

        <a href="{{ route('solicitudes_report') }}" class="btn btn-primary">Generar Reporte</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Campaña</th>
                    <th>Talla</th>
                    <th>Peso</th>
                    <th>Acepta Términos</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->user->name }}</td>
                        <td>{{ $solicitud->campania->nombre }}</td>
                        <td>{{ $solicitud->talla }}</td>
                        <td>{{ $solicitud->peso }}</td>
                        <td>{{ $solicitud->acepta_terminos ? 'Sí' : 'No' }}</td>
                        <td>{{ $solicitud->estado }}</td>
                        <td>
                            <a href="{{ route('solicitudes.show', $solicitud->id) }}" class="btn btn-info">Detalles</a>
                            @can('admin', $solicitud)
                                @if ($solicitud->estado == 'Pendiente')
                                    <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-primary">Editar
                                        Estado</a>
                                @endif
                                @if ($solicitud->estado == 'Puede Donar')
                                    {{-- <button class="btn" style="background: #c90f0f">Registrar Donacion</button> --}}
                                    <button class="btn register-donation-btn" style="background: #c90f0f"
                                        data-solicitud-id="{{ $solicitud->id }}">Registrar Donacion</button>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Modal para registrar donación -->
        <div class="modal fade" id="donationModal" tabindex="-1" role="dialog" aria-labelledby="donationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="donationModalLabel">Registrar Donación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="donationForm">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="solicitudId" name="solicitud_id">
                            <div class="form-group">
                                <label for="unidades">Unidades de Sangre:</label>
                                <input type="number" class="form-control" id="unidades" name="unidades" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Donación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = $('#donationModal');
                var donationForm = $('#donationForm');

                $('.register-donation-btn').on('click', function() {
                    var solicitudId = $(this).data('solicitud-id');
                    $('#solicitudId').val(solicitudId);
                    modal.modal('show');
                });

                donationForm.on('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();

                    $.ajax({
                        url: "{{ route('donaciones.store') }}",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            modal.modal('hide');
                            alert('Donación registrada con éxito');
                            location.reload(); // Recargar la página para ver los cambios
                        },
                        error: function() {
                            alert('Error al registrar la donación.');
                        }
                    });
                });
            });
        </script>

    @endguest
@endsection
