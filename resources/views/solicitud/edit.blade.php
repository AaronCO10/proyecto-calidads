@extends('layouts.app')

@section('template_title')
    ACtualizar Solicitudes de sangre
@endsection

@section('content')
<div class="form-container">

    <form action="/donadoresperu/public/solicitud/{{$solicitud->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-4">
            <label for="" class="form-label">SOLICITANTE</label><br>
            <input type="radio" name="solicitante" value="usuario" tabindex="4" {{ $solicitud->solicitante === 'usuario' ? 'checked' : '' }}>PARA MI<br>
            <input type="radio" name="solicitante" value="familiar" tabindex="5" {{ $solicitud->solicitante === 'familiar' ? 'checked' : '' }}>FAMILIAR<br>
            @error('solicitante')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
            @enderror
        </div>
        
        <div class="container mt-4">
            <label for="" class="form-label">NOMBRE Y APELLIDO</label>
            <input id="nombre_apellidos" name="nombre_apellidos" type="text" class="form-control" tabindex="2" value="{{$solicitud->nombre_apellidos}}">
            @error('nombre_apellidos')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
       <div class="container mt-4">
        <label for="edad" class="form-label">DNI</label>
        <input id="DNI" name="DNI" type="number" class="form-control" tabindex="3" value="{{$solicitud->DNI}}">
        @error('DNI')
                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
                @enderror    
        </div>
        <div class="container mt-4">
            <label for="">¿Cuál es Tu Tipo de Sangre?</label>
            <br>
            <input type="radio" name="tipo_sangre" value="A-" tabindex="4" {{ $solicitud->tipo_sangre === 'A-' ? 'checked' : '' }}> A-<br>
            <input type="radio" name="tipo_sangre" value="A+" tabindex="5" {{ $solicitud->tipo_sangre === 'A+' ? 'checked' : '' }}> A+<br>
            <input type="radio" name="tipo_sangre" value="B-" tabindex="6" {{ $solicitud->tipo_sangre === 'B-' ? 'checked' : '' }}> B-<br>
            <input type="radio" name="tipo_sangre" value="B+" tabindex="7" {{ $solicitud->tipo_sangre === 'B+' ? 'checked' : '' }}> B+<br>
            <input type="radio" name="tipo_sangre" value="AB-" tabindex="8" {{ $solicitud->tipo_sangre === 'AB-' ? 'checked' : '' }}> AB-<br>
            <input type="radio" name="tipo_sangre" value="AB+" tabindex="9" {{ $solicitud->tipo_sangre === 'AB+' ? 'checked' : '' }}> AB+<br>
            <input type="radio" name="tipo_sangre" value="O-" tabindex="10" {{ $solicitud->tipo_sangre === 'O-' ? 'checked' : '' }}> O-<br>
            <input type="radio" name="tipo_sangre" value="O+" tabindex="11" {{ $solicitud->tipo_sangre === 'O+' ? 'checked' : '' }}> O+<br>
            <input type="radio" name="tipo_sangre" value="RH-" tabindex="12" {{ $solicitud->tipo_sangre === 'RH-' ? 'checked' : '' }}> RH-<br>
            <input type="radio" name="tipo_sangre" value="RH+" tabindex="13" {{ $solicitud->tipo_sangre === 'RH+' ? 'checked' : '' }}> RH+<br>
            @error('tipo_sangre')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
        <div class="container mt-4">
        <a href="/donadoresperu/public/solicitud/"class="btn btn-success" tabindex="17">Cancelar</a>
        <button type="submit" class="btn btn-primary"tabindex="18">Guardar </button>
        </div>
    </form>
</div>
@endsection
