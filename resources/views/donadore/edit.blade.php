@extends('layouts.app')

@section('template_title')
    ACtualizar de Donador
@endsection

@section('content')
<div class="form-container">

    <form action="/donadoresperu/public/donadore/{{$donadore->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-4">
            <label for="" class="form-label" >NOMBRE</label>
            <input id="usuario" name="usuario" type="text" class="form-control" tabindex="1" value="{{$donadore->usuario}}">
            @error('usuario')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">DNI</label>
            <input id="dni" name="dni" type="number" class="form-control" tabindex="2" value="{{$donadore->dni}}">
            @error('dni')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
       <div class="container mt-4">
        <label for="edad" class="form-label">ESTATURA</label>
        <input id="talla" name="talla" type="number" class="form-control" tabindex="3" value="{{$donadore->talla}}">
        @error('talla')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror    
    </div>
        <div class="container mt-4">
            <label for="" class="form-label">FECHA DE NACIMIENTO</label>
            <input id="fnacimiento" name="fnacimiento" type="text" class="form-control" tabindex="4" value="{{$donadore->fnacimiento}}">
            @error('fnacimiento')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">PESO</label>
            <input id="peso" name="peso" type="text" class="form-control" tabindex="5" value="{{$donadore->peso}}">
            @error('peso')
                    <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
                @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">SEXO</label><br>
            <input type="radio" name="sexo" value="M" tabindex="6" {{ $donadore->sexo === 'M' ? 'checked' : '' }}>MASCULINO<br>
            <input type="radio" name="sexo" value="F" tabindex="7" {{ $donadore->sexo === 'F' ? 'checked' : '' }}>FEMENINO<br>
            <input type="radio" name="sexo" value="N/S" tabindex="8" {{ $donadore->sexo === 'N/S' ? 'checked' : '' }}>PREFIERO NO DECIRLO<br>
            @error('sexo')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
            @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">FECHA DE ULTIMA DONCACION</label>
            <input id="fecha" name="fecha" type="date" class="form-control" tabindex="9" value="{{$donadore->fecha}}">
            @error('fecha')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">TELEFONO</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="10" value="{{$donadore->telefono}}">
            @error('telefono')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">CORREO</label>
            <input id="correo" name="correo" type="email" class="form-control" tabindex="11" value="{{$donadore->correo}}">
            @error('correo')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
        @enderror
        </div>
        <div class="container mt-4">
            <label for="">¿Cuál es Tu Tipo de Sangre?</label>
            <br>
            <input type="radio" name="tipo" value="A-" tabindex="12" {{ $donadore->tipo === 'A-' ? 'checked' : '' }}>A-<br>
            <input type="radio" name="tipo" value="A+" tabindex="13" {{ $donadore->tipo === 'A+' ? 'checked' : '' }}>A+<br>
            <input type="radio" name="tipo" value="B-" tabindex="14" {{ $donadore->tipo === 'B-' ? 'checked' : '' }}>B-<br>
            <input type="radio" name="tipo" value="B+" tabindex="15" {{ $donadore->tipo === 'B+' ? 'checked' : '' }}>B+<br>
            <input type="radio" name="tipo" value="AB-" tabindex="16" {{ $donadore->tipo === 'AB-' ? 'checked' : '' }}>AB-<br>
            <input type="radio" name="tipo" value="AB+" tabindex="17" {{ $donadore->tipo === 'AB+' ? 'checked' : '' }}>AB+<br>
            <input type="radio" name="tipo" value="O-" tabindex="18" {{ $donadore->tipo === 'O-' ? 'checked' : '' }}>O-<br>
            <input type="radio" name="tipo" value="O+" tabindex="19" {{ $donadore->tipo === 'O+' ? 'checked' : '' }}>O+<br>
            <input type="radio" name="tipo" value="RH-" tabindex="20" {{ $donadore->tipo === 'RH-' ? 'checked' : '' }}>RH-<br>
            <input type="radio" name="tipo" value="RH+" tabindex="21" {{ $donadore->tipo === 'RH+' ? 'checked' : '' }}>RH+<br>
            @error('tipo')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{ $message }}</span><br>
            @enderror
        </div>
        <div class="container mt-4">
            <label for="">¿Verificación?</label>
            <br>
            <input type="radio" name="verificaccion"tabindex="22" value="Aprobado" {{ $donadore->verificaccion === 'Aprobado' ? 'checked' : '' }}>Aprobado<br>
            <input type="radio" name="verificaccion"tabindex="23" value="Desaprovado" {{ $donadore->verificaccion === 'Desaprovado' ? 'checked' : '' }}>Desaprovado<br>
            <input type="radio" name="verificaccion"tabindex="24" value="Proceso" {{ $donadore->verificaccion === 'Proceso' ? 'checked' : '' }}>Proceso<br>
        </div>        
        <div class="container mt-4">
        <a href="/donadoresperu/public/donadore/"class="btn btn-success" tabindex="25">Cancelar</a>
        <button type="submit" class="btn btn-primary"tabindex="26">Guardar </button>
        </div>
    </form>
</div>
@endsection
