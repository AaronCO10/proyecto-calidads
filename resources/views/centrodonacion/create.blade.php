@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add New Blood Donation Center</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Please check your inputs<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('centrosdonacion.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            </div>

                            <div class="form-group">
                                <label>Latitud:</label>
                                <input type="text" name="latitud" class="form-control" placeholder="Latitud">
                            </div>

                            <div class="form-group">
                                <label>Longitud:</label>
                                <input type="text" name="longitud" class="form-control" placeholder="Longitud">
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
