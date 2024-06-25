@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Registro en Campaña
@endsection

@section('content')

    <head>
        <title>Registrarse en Campaña</title>
        <style>
            .my-btn {
                background-color: #c90f0f;
                color: #ffffff;
                padding: 10px 20px;
                border: none;
                border-radius: 20px;
            }

            input[type="radio"] {
                margin: 10px 20px;
            }

            input[type="radio"]:checked {
                color: #c90f0f !important;
            }

            label {
                margin-top: 14px;
            }

            .card-form {
                padding: 20px;
                box-shadow: 0px 0px 7px 3px rgba(176, 171, 171, 1);
                -webkit-box-shadow: 0px 0px 7px 3px rgba(176, 171, 171, 1);
                -moz-box-shadow: 0px 0px 7px 3px rgba(176, 171, 171, 1);
                border-radius: 25px;
            }
        </style>
    </head>
    <div style="height: 90vh; display: flex; justify-content: center; align-items: center">
        <div class="card-form">
            <form action="/donadoresperu/public/banner" method="post">
                <div style="margin: 50px 10vw">
                    @csrf
                    <h2 style="color: #c90f0f">REGISTRO EN CAMPAÑAS DE DONACIÓN</h2>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <label for="" class="form-label">NOMBRE</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1"
                                        value="{{ old('nombre') }}">
                                    @error('nombre')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                                <div>
                                    <label for="" class="form-label">APELLIDO</label>
                                    <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2"
                                        value="{{ old('apellido') }}">
                                    @error('apellido')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="fecha" class="form-label">FECHA DE NACIMIENTO</label>
                                    <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3"
                                        value="{{ old('fecha') }}">
                                    @error('fecha')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                                <div>
                                    <label for="" class="form-label">Telefono</label>
                                    <input id="telefono" name="telefono" type="number" class="form-control" tabindex="4"
                                        value="{{ old('telefono') }}">
                                    @error('telefono')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                                <div>
                                    <label for="" class="form-label">DIRECCION DE CORREO</label>
                                    <input id="email" name="email" type="email" class="form-control" tabindex="5"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <label for="tipo">¿Cual es Tu Tipo de Sangre?</label>
                                    <div>
                                        <input type="radio" name="tipo" value="A-" tabindex="6"
                                            {{ old('tipo') === 'A-' ? 'checked' : '' }}>A-
                                        <input type="radio" name="tipo" value="A+" tabindex="7"
                                            {{ old('tipo') === 'A+' ? 'checked' : '' }}>A+
                                        <input type="radio" name="tipo" value="B-" tabindex="8"
                                            {{ old('tipo') === 'B-' ? 'checked' : '' }}>B-
                                        <input type="radio" name="tipo" value="B+" tabindex="9"
                                            {{ old('tipo') === 'B+' ? 'checked' : '' }}>B+
                                        <input type="radio" name="tipo" value="AB-" tabindex="10"
                                            {{ old('tipo') === 'AB-' ? 'checked' : '' }}>AB-
                                        <input type="radio" name="tipo" value="AB+" tabindex="11"
                                            {{ old('tipo') === 'AB+' ? 'checked' : '' }}>AB+
                                        <input type="radio" name="tipo" value="O-" tabindex="12"
                                            {{ old('tipo') === 'O-' ? 'checked' : '' }}>O-
                                        <input type="radio" name="tipo" value="O+" tabindex="13"
                                            {{ old('tipo') === 'O+' ? 'checked' : '' }}>O+
                                        <input type="radio" name="tipo" value="RH-" tabindex="14"
                                            {{ old('tipo') === 'RH-' ? 'checked' : '' }}>RH-
                                        <input type="radio" name="tipo" value="RH+" tabindex="15"
                                            {{ old('tipo') === 'RH+' ? 'checked' : '' }}>RH+
                                    </div>

                                    @error('tipo')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input type="radio" name="terminos" value="Aceptada" tabindex="16"
                                        {{ old('terminos') === 'Aceptada' ? 'checked' : '' }}> <a
                                        href='http://localhost/donadoresperu/public/terminos' target="_blank"
                                        rel="noopener">
                                        Acepto Términos y Condiciones</a>
                                    @error('terminos')
                                        <span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
                                    @enderror
                                </div>

                            </div>
                            <div class="row1"style="text-align: center">
                                <div>
                                    <button type="submit" class="my-btn">Guardar </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
