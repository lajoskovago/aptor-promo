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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

  <!-- CSS
        ============================================ -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/meanmenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/educate-custon-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu/metisMenu-vertical.css') }}" rel="stylesheet">
<link href="{{ asset('css/calendar/fullcalendar.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/calendar/fullcalendar.print.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/editor/select2.css') }}" rel="stylesheet">
<link href="{{ asset('css/editor/datetimepicker.css') }}" rel="stylesheet">
<link href="{{ asset('css/editor/bootstrap-editable.css') }}" rel="stylesheet">
<link href="{{ asset('css/editor/x-editor-style.css') }}" rel="stylesheet">
<link href="{{ asset('css/data-table/bootstrap-table.css') }}" rel="stylesheet">
<link href="{{ asset('css/data-table/bootstrap-editable.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/summernote/summernote.css') }}" rel="stylesheet">

<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}" defer></script>

</head>
<body>
<div class="all-content-wrapper">
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">

                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                              @guest

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
                                                <li class="nav-item">
                                                      <a class="nav-link" href="{{ route('tourists.email') }}">Configurare email</a>
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
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">

                                                      <span class="admin-name">{{ Auth::user()->name }}</span>
                                                      <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li class="nav-item dropdown">
                                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                               <a class="dropdown-item" href="{{ route('logout') }}"
                                                                  onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            </a>

                                                        </li>
                                                    </ul>
                                                </li>
                                              @endguest
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">

                                         @guest
                                         <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>

                                              @else
                                              @if(isset($user))
                                              @if($user && $user['user_type'] == 1)
                                              <li><a href="{{ route('hotels.index') }}">Lista Hoteluri</a></li>
                                              <li><a href="{{ route('hotels.create') }}">Adaugare hotel</a></li>
                                              <li><a href="{{ route('tourists.index', 0) }}">Lista Turisti</a></li>
                                              <li><a href="{{ route('tourists.code') }}">Verificare Cod</a></li>
                                              <a  href="{{ route('logout') }}"
                                                                  onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>

                                              @endif
                                              @if($user && $user['user_type'] == 2)
                                               <li><a href="{{ route('tourists.index', 0) }}">Lista Turisti</a></li>
                                              <li><a href="{{ route('tourists.create', $user->parent) }}">Adaugare turist</a></li>
                                              <li><a href="{{ route('tourists.code') }}">Verificare Cod</a></li>
                                              <a  href="{{ route('logout') }}"
                                                                  onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>

                                              @endif
                                              @if($user && $user['user_type'] == 3)
                                               <li><a href="{{ route('tourists.index', 0) }}">Lista Turisti</a></li>
                                              <li><a href="{{ route('options.index', $user->parent) }}">Lista Servicii</a></li>
                                              <li><a href="{{ route('options.create', $user->parent) }}">Adaugare Serviciu</a></li>
                                              <li><a href="{{ route('tourists.code') }}">Verificare Cod</a></li>
                                              <a  href="{{ route('logout') }}"
                                                                  onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>

                                              @endif
                                              @endif
                                          @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @guest
            @else
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </div>



<!------------------------------------------------------------------------------------------------------- -->



        @yield('content')

        </div>
    </div>
    <script src="{{ asset('js/data-table/bootstrap-table.js') }}" defer></script>
    <script src="{{ asset('js/data-table/tableExport.js') }}" defer></script>
    <script src="{{ asset('js/data-table/data-table-active.js') }}" defer></script>
    <script src="{{ asset('js/data-table/bootstrap-table-resizable.js') }}" defer></script>
    <script src="{{ asset('js/data-table/bootstrap-table-export.js') }}" defer></script>

    <script src="{{ asset('js/data-table/bootstrap-editable.js') }}" defer></script>
    <script src="{{ asset('js/data-table/colResizable-1.5.source.js') }}" defer></script>

    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/summernote/summernote.min.js') }}" defer></script>
    <script src="{{ asset('js/summernote/summernote-active.js') }}" defer></script>
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <script src="{{ asset('') }}" defer></script>
    <script src="{{ asset('') }}" defer></script>
    <script src="{{ asset('') }}" defer></script>

<script>
    // var table = $('#table').removeAttr('width').DataTable( {
    //     scrollY:        "300px",
    //     scrollX:        true,
    //     scrollCollapse: true,
    //     paging:         false,
    //     columnDefs: [
    //         { width: 200, targets: 0 }
    //     ],
    //     fixedColumns: true
    // } );
</script>

</body>
</html>
