
@extends('layouts.app')
<style>

</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Registro En Campañas
                            </span>

                             <div class="float-right">
                                <a href="{{ route('banner.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                              <form action="{{ route('banner.index') }}" method="get" class="d-flex">
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
                            <table summary="Descripción de la tabla" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Apellido</th>
										<th>Fecha de nacimiento</th>
										<th>Tipo De Sangre</th>
										<th>Telefono</th>
										<th>Email</th>
										<th>Comentario</th>
                                        <th>Verificación</th>


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $banner->id}}</td>

											<td>{{ $banner->nombre }}</td>
											<td>{{ $banner->apellido }}</td>
											<td>{{ $banner->fecha }}</td>
											<td>{{ $banner->tipo }}</td>
											<td>{{ $banner->telefono }}</td>
											<td>{{ $banner->email }}</td>
											<td>{{ $banner->comentario }}</td>
											<td>{{ $banner->verificacion }}</td>

                                            <td>
                                                <form action="{{ route('banner.destroy',$banner->id) }}" method="POST">

                                                    <a class="btn btn-sm btn-success" href="{{ route('banner.edit',$banner->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $banners->links() !!}
            </div>
        </div>
    </div>
@endsection
