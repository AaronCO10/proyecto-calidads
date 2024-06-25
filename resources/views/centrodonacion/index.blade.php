@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Centros de donacion</div>

                    <div class="card-body">
                        <a href="{{ route('centrosdonacion.create') }}" class="btn btn-success mb-3">Nuevo centro de donacion</a>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($centros as $centro)
                                <tr>
                                    <td>{{ $centro->nombre }}</td>
                                    <td>{{ $centro->latitud }}</td>
                                    <td>{{ $centro->longitud }}</td>
                                    <td>
                                        <form action="{{ route('centrosdonacion.destroy',$centro->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('centrosdonacion.edit',$centro->id) }}">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
