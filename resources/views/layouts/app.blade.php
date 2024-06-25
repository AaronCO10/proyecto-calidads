<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @if (session('formularioEnviado'))
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Si el formulario ya ha sido enviado, oculta el botón
                $('#miBoton').hide();
            });
        </script>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Donadores Perú</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }


        header {
            background-color: #c90f0f;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        body {
            background-color: white;
        }

        header h1 {
            font-weight: bold;
            font-size: 40px;
        }

        header p {
            font-size: 20px
        }

        section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        section h2 {
            color: #c90f0f;
            text-align: center;
            font-size: 55px;
        }

        section p {
            margin-top: 20px;
            width: 60vw;
            font-size: 20px;
            text-align: justify;
        }

        p a {
            text-decoration: none;
            color: #c90f0f;
            display: block;
            text-align: center;
            border: 1px solid #c90f0f;
            font-weight: bold;
            margin-top: 20px;
            border-radius: 10px
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md "style="background-color: #000000; box-shadow: 0 0 500px #ffffff;"
            style="position:fixed" style="top:0">
            <div style="padding: 6px 10px">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="40px" class="d-inline-block align-text-top"></a>
            </div>
            <a class="navbar-brand" style="color: #ffffff" href="{{ url('/') }}">Donadores Peru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            @can('donador')
                <a class="navbar-brand" style="color: #ffffff" href="{{ route('solicitudes.index') }}">Ver Mis
                    Solicitudes</a>
            @endcan
            @can('admin')
                <a class="navbar-brand" style="color: #ffffff" href="{{ route('campanias.index') }}">Ver Campañas</a>
                <a class="navbar-brand" style="color: #ffffff" href="{{ route('solicitudes.index') }}">Ver Solicitudes</a>
                <a class="navbar-brand" style="color: #ffffff" href="{{ route('bancosangre.index') }}">Banco Sangre</a>
                <a class="navbar-brand" style="color: #ffffff" href="{{ route('centrosdonacion.index') }}">Centros de donacion</a>
            @endcan
            <div class="collapse navbar-collapse " id="navbarSupportedContent" style="margin-right: 5%">
                <ul class="navbar-nav ms-auto" style="float: right">
                    {{-- <li class="nav-item" style="float: right">
                        <a class="nav-link" style="color: #ffffff" href="{{ route('banner.nuevo') }}">Acerca de</a>
                    </li> --}}
                    @guest

                        @if (Route::has('login'))
                            <li class="nav-item" style="float: right">
                                <a class="nav-link" style="color: #ffffff" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                        @endif

                        {{-- @if (Route::has('register'))
                            <li class="nav-item"style="float: right">
                                <a class="nav-link" style="color: #ffffff"href="{{ route('register') }}">Registrate</a>
                            </li>
                        @endif --}}
                    @else
                        <li class="nav-item dropdown"style="float: right">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: #ffffff"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
