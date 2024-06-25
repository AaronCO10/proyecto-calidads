@extends('layouts.app')

@section('content')
<div style="width: 80vw; display: flex; justify-content: center; flex-direction: column; margin: auto" >

    <h1>BANCO SANGRE</h1>

    <a href="{{ route('transfusiones.index') }}" class="btn btn-success mb-3" style="width: 300px">Transfusiones</a>

    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs" id="bancosangre-tabs" role="tablist">
                @foreach ($bancosSangre as $banco)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if ($banco->id === 1) active @endif" id="tab-{{ $banco->id }}-tab" data-bs-toggle="tab" href="#tab-{{ $banco->id }}" role="tab" aria-controls="tab-{{ $banco->id }}" aria-selected="true">{{ $banco->tiposangre->nombre. ' ('. $banco->unidades .'u)' }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="bancosangre-tabs-content">
                @foreach ($bancosSangre as $banco)
                    <div class="tab-pane fade @if ($banco->id === 1) show active @endif" id="tab-{{ $banco->id }}" role="tabpanel" aria-labelledby="tab-{{ $banco->id }}-tab">
                        <h2>{{ $banco->tiposangre->nombre }}</h2>
                        <p>Total unidades: <span>{{ $banco->unidades }}</span></p>
                        @if ($banco->tiposangre)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Campaña</th>
                                    <th>Donante</th>
                                    <th>Unidades Donadas</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($banco->tiposangre->donaciones as $donacion)
                                        <tr>
                                            <td>{{ $donacion->id }}</td>
                                            <td>{{ $donacion->solicitudDonacion->campania->nombre }}</td>
                                            <td>{{ $donacion->solicitudDonacion->user->nombres .' '.$donacion->solicitudDonacion->user->apellidos  }}</td>
                                            <td>{{ $donacion->unidades }}</td>
                                            <td>{{ $donacion->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>

                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


@endsection
