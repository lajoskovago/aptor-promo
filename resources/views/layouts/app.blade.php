<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APTOR') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Bootstrap CSS
        ============================================ -->

    <!-- Bootstrap CSS
        ============================================ -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- adminpro icon CSS
        ============================================ -->
    <link href="{{ asset('css/adminpro-custon-icon.css') }}" rel="stylesheet">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link href="{{ asset('css/meanmenu.min.css') }}" rel="stylesheet">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <!-- animate CSS
        ============================================ -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- normalize CSS
        ============================================ -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <!-- form CSS
        ============================================ -->
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <!-- style CSS
        ============================================ -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- responsive CSS
        ============================================ -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <!-- modals CSS
        ============================================ -->
    <link href="{{ asset('css/modals.css') }}" rel="stylesheet">

    <link href="{{ asset('css/data-table/bootstrap-table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/data-table/bootstrap-editable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/c3.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'APTOR') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                        @else
                        @if(isset($user))
                        @if($user && $user['user_type'] == 1)
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('hotels.index') }}">Lista Hoteluri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hotels.create') }}">Adaugare hotel</a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.index', 0) }}">Lista Turisti</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('services.index', 0) }}">Lista Prestatori</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.code') }}">Verificare Cod</a>
                            </li>

                        @endif
                        @if($user && $user['user_type'] == 2)
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.index', 0) }}">Lista Turisti</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.create', $user->parent) }}">Adaugare turist</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.code') }}">Verificare Cod</a>
                            </li>

                        @endif
                        @if($user && $user['user_type'] == 3)
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.index', 0) }}">Lista Turisti</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('options.index', $user->parent) }}">Lista Servicii</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('options.create', $user->parent) }}">Adaugare Serviciu</a>
                            </li>
                          <li class="nav-item">
                                <a class="nav-link" href="{{ route('tourists.code') }}">Verificare Cod</a>
                            </li>
                        @endif
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        </main>
        <div class="container">
        <div class="card">
          <div class="card-body">@yield('content')</div>
        </div>

        </div>
    </div>

    <script src="{{ asset('js/data-table/bootstrap-table.js') }}" defer></script>
    <script src="{{ asset('js/data-table/tableExport.js') }}" defer></script>
    <script src="{{ asset('js/data-table/data-table-active.js') }}" defer></script>
    <script src="{{ asset('js/data-table/bootstrap-table-resizable.js') }}" defer></script>
    <script src="{{ asset('js/data-table/bootstrap-table-export.js') }}" defer></script>

    <script src="{{ asset('js/data-table/bootstrap-editable.js') }}" defer></script>
    <script src="{{ asset('js/data-table/colResizable-1.5.source.js') }}" defer></script>



</body>
</html>
