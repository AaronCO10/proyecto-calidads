<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>

@extends('layouts.app')

@section('content')
    <style>
        .info-container {
            width: 60vw;
            margin: 5vh 0;
        }

        li {
            font-size: 16px;
        }
    </style>
    </head>

    <div>
        @if (session('success'))
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
        <header>
            <h1>¡Salva Vidas!</h1>
            <p>Únete a nuestra campaña de donación de sangre y ayuda a quienes más lo necesitan.</p>
        </header>
        <div class="container">
            <div class="content">
                <section id="main">
                    <h2>¿Por qué donar sangre?</h2>
                    <div>
                        <p>Porque cada gota cuenta en la historia de salvar vidas. Donar sangre no solo es un acto de
                            generosidad, es un acto de heroísmo cotidiano que puede marcar la diferencia entre la esperanza
                            y la desesperación. Tu donación puede ser la razón por la cual alguien más pueda abrazar a sus
                            seres queridos una vez más, reír con sus amigos, o incluso cumplir sus sueños más grandes. Donar
                            sangre es regalar vida, es ser la luz en la oscuridad, es dejar una huella imborrable en el
                            corazón de aquellos que más lo necesitan. <a href="#donar">¡Únete a nosotros y sé el héroe que
                                el mundo necesita hoy!</a></p>
                    </div>
                    <img src="https://www.apeseg.org.pe/wp-content/uploads/2018/06/Donacion-de-Sangre.jpg" alt="Donante">
                </section>
                <section id="donar">
                    <h2>QUIERO DONAR</h2>
                    <div>
                        <div>
                            <div>
                                <div class="info-container">
                                    <h3>Antes de donar tienes que saber ...</h3>
                                    <div>
                                        <ul>
                                            <li>Antes de dar sangre rellenarás un cuestionario sobre tu salud y tus hábitos
                                                de vida.</li>
                                            <li>Una respuesta afirmativa al cuestionario no impide automáticamente una
                                                donación de sangre. El médico responsable de la extracción es quien
                                                decidirá, en última instancia, si puedes donar sangre o no.</li>
                                            <li>Recuerda que para donar siempre hace falta llevar un documento de identidad
                                                oficial (DNI, NIE, pasaporte, carnet de conducir).</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-container">
                                    <h3>Consejos para después de donar sangre</h3>
                                    <div>
                                        <div>
                                            <ul>
                                                <li>No te retires la tirita hasta un mínimo de 2 horas después.
                                                </li>
                                                <li>No hagas esfuerzos físicos importantes, sobre todo con el brazo
                                                    pinchado,
                                                    durante
                                                    las 24 horas siguientes a la donación.</li>
                                                <li>No tomes bebidas alcohólicas ni fumes durante las 2 horas siguientes a
                                                    la
                                                    donación.
                                                </li>
                                                <li>Bebe abundantes líquidos durante las 24-48 horas siguientes a la
                                                    donación.
                                                </li>
                                                <li>Evita lugares muy calurosos. Mejor zonas ventiladas y frescas.</li>
                                                <li>En las próximas 6 horas no estés de pie mucho tiempo. Evita
                                                    largas
                                                    colas o estar de pie en transportes públicos llenos de gente.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('solicitudes.create') }}"
                            style="text-decoration: none; padding: 10px 20px; background-color: #c90f0f; color: white; font-weight: bold; font-size: 20px; border-radius: 15px">
                            QUIERO DONAR
                        </a>
                    </div>
                </section>

                <section>

                    <h2>CENTROS DE DONACION</h2>
                    <div id='map' style='width: 100%; height: 600px;'></div>

                    <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoicGVkcm9hcXMwNSIsImEiOiJja2ZpZ29iaWowZDVwMnBsM3M2MGxkaWQxIn0.DYp69EtGMZKWNDF6dzuzmQ';

                        var map = new mapboxgl.Map({
                            container: 'map',
                            style: 'mapbox://styles/mapbox/streets-v11',
                            center: [-78.49810304473388, -7.162048285889808], // Coordenadas de centro predeterminadas
                            zoom: 9 // Nivel de zoom predeterminado
                        });

                        // Añadir marcadores desde PHP
                        @foreach ($centros as $centro)
                            new mapboxgl.Marker()
                                .setLngLat([{{ $centro->longitud }}, {{ $centro->latitud }}])
                                .addTo(map);
                        @endforeach
                    </script>
                </section>

            </div>
        </div>
    </div>
@endsection
