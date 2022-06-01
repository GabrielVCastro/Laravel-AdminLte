<div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rifa 1,99</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }} ">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
        <!-- summernote -->
        <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.0/datatables.min.css" />


    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Usuário: {{ Auth::user()->name }}</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/logout') }}" class="nav-link"><i class="fas fa-door-open"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                @isset(Auth::user()->endereco_ban)
                <img src="https://monkey.banano.cc/api/v1/monkey/{{ Auth::user()->endereco_ban }}" alt="Rifa fa Online" class="brand-image img-circle">
                @endisset
                <span class="brand-text font-weight-light">Rifa 1,99</span>
              </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/clientes/painel" class="nav-link">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                Painel
                                </p>
                            </a>
                            {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/painel') }}" class="nav-link ml-2">
                                        - Conta
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item">

                                    <a href="{{ url('/clientes') }}" class="nav-link ml-2">
                                        - Configurações
                                    </a>
                                </li> --}}

                        </li>

                        @if (Auth::user()->adm)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                    Clientes
                                    <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('/clientes') }}" class="nav-link ml-2">
                                            - Listar
                                        </a>
                                    </li>
                                    <li class="nav-item">

                                        <a href="{{ url('/clientes') }}" class="nav-link ml-2">
                                            - Cadastrar
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard"></i>
                                    <p>
                                    Produtos
                                    <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('/produtos') }}" class="nav-link ml-2">
                                            - Listar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/produtos/formulario')}}" class="nav-link ml-2">
                                            - Cadastrar
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-ticket-alt"></i>
                                <p>
                                Rifas
                                <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{-- <li class="nav-item">
                                    <a href="{{ url('/produtos') }}" class="nav-link ml-2">
                                        - Listar
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{url('/rifas')}}" class="nav-link ml-2">
                                        - Comprar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/rifas/listar')}}" class="nav-link ml-2">
                                        - Minhas Rifas
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <div class="container">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{!! \Session::get('error') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>

            <section class="content">
                <div class="container-fluid">
