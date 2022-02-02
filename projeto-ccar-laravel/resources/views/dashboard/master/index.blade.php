<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--Font AdminLTE-->
    <link href="{{ asset('app-assets/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap css-->
    <link href="{{ asset('app-assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--AdminLTE css-->
    <link href="{{ asset('app-assets/admin/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!--My style custom -->
    <link href="{{ asset('app-assets/admin/css/style.css') }}" rel="stylesheet">
    <!--Toastr css-->
    <link href="{{ asset('app-assets/css/toastr.css') }}" rel="stylesheet">
    <!--Skin AdminLTE css-->
    <link href="{{ asset('app-assets/admin/css/skins/skin-black.min.css') }}" rel="stylesheet">
    <!--Font google url-->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}" rel="stylesheet">
    <!--Datatable css-->
    <link href="{{ asset('app-assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <!--Calendar css-->
    <link rel="stylesheet" href="{{ asset('app-assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/admin/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">

    <style>
        .dataTables_filter {
            display: none;
        }
        .error {
            font-family: Century Gothic, sans-serif;
            font-weight: bold;
            float: none;
            vertical-align: top;
            color: red;
            margin: 2px;
        }
        .centered {
            margin: 0 auto;
            float: none;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <a href="{{route('dashboard.index')}}" class="logo">
                <span class="logo-mini">
                    <img src="{{ asset('app-assets/img/logo2.png') }}" width="40" height="40">
                </span>
                <span class="logo-lg text-left" style="margin-left: 20px">
                    <img src="{{ asset('app-assets/img/logo2.png') }}" width="40" height="40">
                    CCAR
                </span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="@yield('image')" class="img-circle" alt="User Image">
                                                </div>

                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>

                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>

                                    </ul>

                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>

                        <li class="dropdown notifications-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>

                        <li class="dropdown tasks-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="#">

                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>

                                                <div class="progress xs">

                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                    role="progressbar"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src=@yield('image') class="user-image" alt="User Image">

                            <span class="hidden-xs">@yield('first_name')&nbsp;@yield('last_name')</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src=@yield('image') class="img-circle" alt="Image">
                                <p>
                                    @yield('first_name')&nbsp;@yield('last_name')
                                    <small>Membro desde&nbsp;@yield('created_at')</small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('dashboard.profile') }}" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('dashboard.logout')}}" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">

            <br>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src=@yield('image') class="img-circle" alt="Image">
                </div>
                <div class="pull-left info">
                    <p>@yield('first_name')&nbsp;@yield('last_name')</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <br>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header text-center">Menu</li>
                <li class=@yield('index')><a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-home"></i> <span>Inicio</span></a>
                </li>


                <li class="treeview @yield('item-1')">
                    <a href="#">
                        <i class="fa fa fa-motorcycle"></i> <span>Motos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=@yield('motos')><a href="{{ route('dashboard.motos') }}"><i class="fa fa-circle-o"></i><span>Automovéis</span></a></li>
                        <li class=@yield('itens_motos')><a href="{{ route('item.motos') }}"><i class="fa fa-circle-o"></i>Itens</a></li>
                        <li class=@yield('fabricantes_motos')><a href="{{ route('fabricantes.motos') }}"><i class="fa fa-circle-o"></i>Fabricantes</a></li>
                    </ul>
                </li>

                <li class="treeview @yield('item-2')">
                    <a href="#">
                        <i class="fa fa fa-car"></i> <span>Carros</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=@yield('carros')><a href="{{ route('dashboard.carros') }}"><i class="fa fa-circle-o"></i><span>Automovéis</span></a></li>
                        <li class=@yield('itens_carros')><a href="{{ route('item.carros') }}"><i class="fa fa-circle-o"></i>Itens</a></li>
                        <li class=@yield('fabricantes_carros')><a href="{{ route('fabricantes.carros') }}"><i class="fa fa-circle-o"></i>Fabricantes</a></li>
                    </ul>
                </li>

                <li class=@yield('agendamentos')><a href="{{ route('dashboard.agendamentos') }}">
                    <i class="fa fa-calendar"></i> <span>Agendamentos</span></a>
                </li>
            </ul>

        </section>
    </aside>

    <div class="content-wrapper">
        @yield('conteudo-view')
    </div>


    <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">CCAR</a></strong>
    </footer>

</div>


<!--Jquery js-->
<script src="{{ asset('app-assets/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('app-assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!--AdminLTE js -->
<script src="{{ asset('app-assets/admin/js/adminlte.min.js') }}"></script>
<!--Toastr js-->
<script src="{{ asset('app-assets/js/toastr.js') }}"></script>
<!--Datatable js -->
<script src="{{ asset('app-assets/js/configdatatable.js') }}"></script>
<script src="{{ asset('app-assets/js/configdatatable2.js') }}"></script>
<!--Calendar js-->
<script src="{{ asset('app-assets/admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('app-assets/admin/bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('app-assets/admin/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<!--Translate Calendar js -->
<script src="{{ asset('app-assets/js/locale/pt-br.js') }}"></script>

@yield('conteudo-script')

</body>
</html>
