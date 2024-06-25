@extends('layouts.app')

@section('template_title')
    ACtualizar Solicitud en Campaña
@endsection

@section('content')
<div class="form-container">

    <form action="/donadoresperu/public/banner/{{$banner->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="container mt-4">
            <label for="" class="form-label" >NOMBRE</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$banner->nombre}}">
            @error('nombre')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">APELLIDO</label>
            <input id="apellido" name="apellido" type="text" class="form-control" tabindex="2" value="{{$banner->apellido}}">
            @error('apellido')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
       <div class="container mt-4">
        <label for="fecha" class="form-label">FECHA DE NACIMIENTO</label>
        <input id="fecha" name="fecha" type="date" class="form-control" tabindex="3" value="{{$banner->fecha}}">
        @error('fecha')
        <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
    @enderror
        </div>
        <div class="container mt-4">
            <label for="">¿Cuál es Tu Tipo de Sangre?</label>
            <br>
            <input type="radio" name="tipo" value="A-" tabindex="4" {{ $banner->tipo === 'A-' ? 'checked' : '' }}> A-<br>
            <input type="radio" name="tipo" value="A+" tabindex="5" {{ $banner->tipo === 'A+' ? 'checked' : '' }}> A+<br>
            <input type="radio" name="tipo" value="B-" tabindex="6" {{ $banner->tipo === 'B-' ? 'checked' : '' }}> B-<br>
            <input type="radio" name="tipo" value="B+" tabindex="7" {{ $banner->tipo === 'B+' ? 'checked' : '' }}> B+<br>
            <input type="radio" name="tipo" value="AB-" tabindex="8" {{ $banner->tipo === 'AB-' ? 'checked' : '' }}> AB-<br>
            <input type="radio" name="tipo" value="AB+" tabindex="9" {{ $banner->tipo === 'AB+' ? 'checked' : '' }}> AB+<br>
            <input type="radio" name="tipo" value="O-" tabindex="10" {{ $banner->tipo === 'O-' ? 'checked' : '' }}> O-<br>
            <input type="radio" name="tipo" value="O+" tabindex="11" {{ $banner->tipo === 'O+' ? 'checked' : '' }}> O+<br>
            <input type="radio" name="tipo" value="RH-" tabindex="12" {{ $banner->tipo === 'RH-' ? 'checked' : '' }}> RH-<br>
            <input type="radio" name="tipo" value="RH+" tabindex="13" {{ $banner->tipo === 'RH+' ? 'checked' : '' }}> RH+<br>
            @error('tipo')
            <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
        
        <div class="container mt-4">
            <label for="" class="form-label">Telefono</label>
            <input id="telefono" name="telefono" type="number" class="form-control" tabindex="14" value="{{$banner->telefono}}">
            @error('telefono')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
        <div class="container mt-4">
            <label for="" class="form-label">DIRECCION DE CORREO</label>
            <input id="email" name="email" type="email" class="form-control" tabindex="15" value="{{$banner->email}}">
            @error('email')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>
        
        <div class="container mt-4">
            <label for="">¿Verificación?</label>
            <br>
            <input type="radio" name="verificacion" value="Aprobado" {{ $banner->verificacion === 'Aprobado' ? 'checked' : '' }}> Aprobado<br>
            <input type="radio" name="verificacion" value="Desaprobado" {{ $banner->verificacion === 'Desaprobado' ? 'checked' : '' }} tabindex="5"> Desaprobado<br>
            <input type="radio" name="verificacion" value="Proceso" {{ $banner->verificacion === 'Proceso' ? 'checked' : '' }} tabindex="5"> Proceso<br>
        </div>
        
        
        <div class="container mt-4">
            <label for="" class="form-label">Comentario de la Verificacion</label>
            <input id="comentario" name="comentario" type="text" class="form-control" tabindex="16" value="{{old('comentario')}}">
            @error('comentario')
                <br><span style="color: rgba(255, 5, 5, 0.333)">{{$message}}</span><br>
            @enderror
        </div>

        <div class="container mt-4">
        <a href="/donadoresperu/public/banner/"class="btn btn-success" tabindex="17">Cancelar</a>
        <button type="submit" class="btn btn-primary"tabindex="18">Guardar </button>
        </div>
    </form>
</div>
@endsection
