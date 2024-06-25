 
@extends('layouts.app')
<style>
    body{
        background-image: url('https://marketplace.canva.com/EAEK4dC2olw/1/0/1600w/canva-arco%C3%ADris-gradiente-rosa-y-naranja-fondo-virtual-c3PYha1JI9M.jpg');
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Registro de Solicitudes
                            </span>

                             <div class="float-right">
                                <a href="{{ route('solicitud.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <form action="{{ route('solicitud.index') }}" method="get" class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busqueda">
                                <button class="btn btn-success" type="submit" value="Buscar">Search</button>
                            </form>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Solicitante</th>
										<th>Nombre y Apellidos</th>
										<th>DNI</th>
										<th>Tipo De Sangre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitud as $solicituds)
                                        <tr>
                                            <td>{{ $solicituds->id}}</td>
                                            
											<td>{{ $solicituds->solicitante }}</td>
											<td>{{ $solicituds->nombre_apellidos }}</td>
											<td>{{ $solicituds->DNI }}</td>
											<td>{{ $solicituds->tipo_sangre }}</td>
                                            
                                            <td>
                                                <form action="{{ route('solicitud.destroy',$solicituds->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-success" href="{{ route('solicitud.edit',$solicituds->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $solicitud->links() !!}
            </div>
        </div>
    </div>
@endsection