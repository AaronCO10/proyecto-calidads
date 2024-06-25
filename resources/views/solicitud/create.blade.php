<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@extends('layouts.app')
@section('content')

    <body>
        @if (session('formularioEnviado'))
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Si el formulario ya ha sido enviado, oculta el botón
                    $('#miBoton').hide();
                });
            </script>
        @endif
        <div class="text-center">
            <span class="title">Registrar una solicitud de busqueda</span>
            <div class="form-right">
                <form method="POST" action="{{ route('solicitud.store') }}">@csrf
                    <div class="container3">
                        <div class="row">
                            <div class="col">
                                <label for="solicitante" class="form-label">SOLICITANTE</label><br>
                                <input type="radio" name="solicitante" value="usuario" tabindex="6"
                                    {{ old('solicitante') === 'usuario' ? 'checked' : '' }}> PARA MI<br>
                                <input type="radio" name="solicitante" value="familiar" tabindex="7"
                                    {{ old('solicitante') === 'familiar' ? 'checked' : '' }}> PARA UN FAMILIAR<br>
                                @error('solicitante')
                                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="nombre_apellidos" class="form-label">Nombres y Apellidos</label>
                                <input id="nombre_apellidos" name="nombre_apellidos" type="text" class="form-control"
                                    tabindex="4" value="{{ old('nombre_apellidos') }}">
                                @error('nombre_apellidos')
                                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="DNI" class="form-label">DNI</label>
                                <input id="DNI" name="DNI" type="number" class="form-control" tabindex="4"
                                    value="{{ old('DNI') }}">
                                @error('DNI')
                                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="">¿Cuál es el Tipo de Sangre a Solicitar?</label>
                                <br>
                                <input type="radio" name="tipo_sangre" value="A-" tabindex="9"
                                    {{ old('tipo_sangre') === 'A-' ? 'checked' : '' }}> A-
                                <input type=radio name=tipo_sangre value="A+" tabindex=10
                                    {{ old('tipo_sangre') === 'A+' ? 'checked' : '' }}> A+
                                <input type=radio name=tipo_sangre value="B-" tabindex=11
                                    {{ old('tipo_sangre') === 'B-' ? 'checked' : '' }}> B-
                                <input type=radio name=tipo_sangre value="B+" tabindex=12
                                    {{ old('tipo_sangre') === 'B+' ? 'checked' : '' }}> B+
                                <input type=radio name=tipo_sangre value="AB-" tabindex=13
                                    {{ old('tipo_sangre') === 'AB-' ? 'checked' : '' }}> AB-
                                <input type=radio name=tipo_sangre value="AB+" tabindex=14
                                    {{ old('tipo_sangre') === 'AB+' ? 'checked' : '' }}> AB+
                                <input type=radio name=tipo_sangre value="O-" tabindex=15
                                    {{ old('tipo_sangre') === 'O-' ? 'checked' : '' }}> O-
                                <input type=radio name=tipo_sangre value="O+" tabindex=16
                                    {{ old('tipo_sangre') === 'O+' ? 'checked' : '' }}> O+
                                <input type=radio name=tipo_sangre value="RH-" tabindex=17
                                    {{ old('tipo_sangre') === 'RH-' ? 'checked' : '' }}> RH-
                                <input type=radio name=tipo_sangre value="RH+" tabindex=18
                                    {{ old('tipo_sangre') === 'RH+' ? 'checked' : '' }}> RH+
                                @error('tipo_sangre')
                                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="radio" name="terminos" value="Aceptada" tabindex="16"
                                    {{ old('terminos') === 'Aceptada' ? 'checked' : '' }}> <a
                                    href='http://localhost/donadoresperu/public/terminos' target="_blank" rel="noopener">
                                    Acepto Términos y Condiciones</a>
                                @error('terminos')
                                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>

                        </div>
                </form>
            </div>
        </div>
@endsection
