<!doctype html>
<html lang="en">
 
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <link rel="icon" href="{{ url('images/favicon.png') }}" type="image/png">
    <title>Condominio Grano</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!--
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    
    -->
    <link rel="stylesheet"  href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ url('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('js/chosen/chosen.min.css') }}">
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{ route('main') }}">Condominio Grano</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('assets/images/avatar-1.jpg') }}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h5>
                                </div>
                                @if(Auth::user()->rol == "Admin")
                                    <a class="dropdown-item" href="{{url('usuariosu',Crypt::encrypt(Auth::user()->id))}}"><i class="fas fa-user mr-2"></i>Editar Perfil</a>
                                @endif
                                @if(Auth::user()->rol == "User")
                                    <a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-user mr-2"></i>Editar Perfil</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-power-off mr-2"></i>Salir</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar" style="background-color: #0062CC; color: white;">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            @if(Auth::user()->rol == "User")
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('main') }}"><i class="fa fa-fw fa-eye"></i>Ver mis Recibos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('reportar') }}"><i class="fa fa-fw fa-dollar-sign"></i>Reportar mis Pagos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('pendientes') }}"><i class="fa fa-fw fa-window-close"></i>Propietarios por Pagar</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('aldia') }}"><i class="fa fa-fw fa-check-square"></i>Propietarios al Día</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('perfil') }}"><i class="fa fa-fw fa-user-circle"></i>Editar Perfil</a>
                            </li>
                            @endif
                            @if(Auth::user()->rol == "Admin")
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('gastos') }}"><i class="fa fa-fw fa-balance-scale"></i>Administrar Gastos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('facturas') }}"><i class="fa fa-fw fa-file-alt"></i>Administrar Recibos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('main') }}"><i class="fa fa-fw fa-credit-card"></i>Administrar Pagos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('usuarios') }}"><i class="fa fa-fw fa-user-circle"></i>Administrar Usuarios</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('facturasa') }}"><i class="fa fa-fw fa-eye"></i>Ver mis Recibos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('reportar') }}"><i class="fa fa-fw fa-dollar-sign"></i>Reportar mis Pagos</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('pendientes') }}"><i class="fa fa-fw fa-window-close"></i>Propietarios por Pagar</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('aldia') }}"><i class="fa fa-fw fa-check-square"></i>Propietarios al Día</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        @yield('content')
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    
    <!--
    <script src="{{ url('assets/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/morris-bundle/morris.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    
    <script src="{{ url('assets/libs/js/dashboard-ecommerce.js') }}"></script>
    <script src="{{ url('assets/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    -->
    
    <script src="{{ url('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ url('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('assets/libs/js/main-js.js') }}"></script>
    <script src="{{ url('js/chosen/chosen.jquery.min.js') }}"></script>
    <script>
      jQuery(document).ready(function() {
          jQuery(".standardSelect").chosen({
              disable_search_threshold: 1,
              no_results_text: "Ningun gasto registrado!",
              width: "100%"
          });
      });
    </script>
</body>
<footer style="width: auto; position: relative;">
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div style="background-color: black; color: white;" class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <p class="mb-0" style="font-size: 1em;">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;2020 Todos los derechos reservados | Esta plantilla fue creada por <a style="font-weight: bold;" href="https://colorlib.com" target="_blank">Colorlib</a> y <a style="font-weight: bold;" href="http://methodologic.com.ve" target="_blank">Methodologic</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</footer>
 
</html>