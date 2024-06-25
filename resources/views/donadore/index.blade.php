@extends('layouts.app')
<style>

</style>

@section('content')
    @if(session('success'))
        <div id="success-popup" class="alert alert-info" role="alert" style="width:fit-content;" style="float:unset">
            {{ session('success') }}
        </div>
        <script>
            // Muestra la ventana emergente durante 3 segundos
            setTimeout(function() {
                document.getElementById('success-popup').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">@can('admin')
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Registro de Donadores
                            </span>

                             <div class="float-right">
                                <a href="{{ route('donadore.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <form action="{{ route('donadore.index') }}" method="get" class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busqueda">
                                <button class="btn btn-success" type="submit" value="Buscar">Search</button>
                            </form>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        @can('admin')
                                        <th>No</th>
                                        @endcan
                                        <th>USUARIO</th>
                                        @can('admin')
                                        <th>DNI</th>
                                        <th>TALLA</th>
                                        <th>FECHA DE NACIMIENTO</th>
                                        <th>PESO</th>
                                        <th>SEXO</th>
                                        <th>FECHA DE ULTIMA DONACION</th>
                                        @endcan
                                        <th>TIPO DE SANGRE</th>
                                        <th>TELEFONO</th>
                                        <th>EMAIL</th>
                                        <th>ESTADO DE VERIFICACION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donadore as $donadores)
                                        @php
                                            // Verificar la antigüedad de la última donación
                                            $fechaLimite = now()->subMonths(4);
                                            $fechaDonacion = $donadores->fecha ? \Carbon\Carbon::parse($donadores->fecha) : null;
                                            $esAntiguo = $fechaDonacion && $fechaDonacion->lte($fechaLimite);
                                            $esHoy = $fechaDonacion && $fechaDonacion->isToday();

                                            // Determinar el estilo CSS en base al rol y antigüedad
                                            $style = '';
                                            if (\Gate::allows('admin') && (!$esAntiguo && !$esHoy)) {
                                                $style="color: red;"; // Fondo rojo para el rol admin
                                            } elseif (!$esAntiguo && $fechaDonacion) {
                                                continue; // No mostrar si no cumple con la antigüedad y está vacía para el rol donador
                                            }
                                        @endphp

                                        <tr style="{{ $style }}">
                                            @can('admin')  <td>{{ $donadores->id}}</td> @endcan

                                            <td>{{ $donadores->usuario }}</td>
                                            @can('admin')<td>{{ $donadores->dni }}</td>
                                            <td>{{ $donadores->talla }}</td>
                                            <td>{{ $donadores->fnacimiento }}</td>
                                            <td>{{ $donadores->peso }}</td>
                                            <td>{{ $donadores->sexo }}</td>
                                            <td>{{ $donadores->fecha }}</td>@endcan
                                            <td>{{ $donadores->tipo }}</td>
                                            <td>{{ $donadores->telefono }}</td>
                                            <td>{{ $donadores->correo}}</td>
                                            <td>{{ $donadores->verificaccion }}</td>

                                            <td>@can('admin')
                                                <form action="{{ route('donadore.destroy',$donadores->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-success" href="{{ route('donadore.edit',$donadores->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>@endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $donadore->links() !!}
            </div>
        </div>
    </div>
@endsection
