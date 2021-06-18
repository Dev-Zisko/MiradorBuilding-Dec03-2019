<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="{{ url('images/favicon.png') }}" type="image/png">
    <title>Condominio Grano</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('css/aos.css') }}">
    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/nouislider.css') }}">
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('css/icomoon.css') }}">
    -->
    <link rel="stylesheet" href="{{ url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
  </head>
  <body> 
        
  <div class="main-section">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          @yield('loguito')
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{ route('login') }}" style="font-size: 1em; font-weight: bold;" class="nav-link icon d-flex align-items-center">>/ Entrar</a></li>
            </ul>
          </div>
          </div>
      </nav>
      
    <!-- END nav -->

    @yield('content')

      <footer class="ftco-section ftco-section-2" style="background-color: black; color: white;">
        <div class="col-md-12 text-center">
          <p class="mb-0" style="font-size: 1em;">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;2020 Todos los derechos reservados | Esta plantilla fue creada por <a style="font-weight: bold;" href="https://colorlib.com" target="_blank">Colorlib</a> y <a style="font-weight: bold;" href="http://methodologic.com.ve" target="_blank">Methodologic</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </footer>

  </div>

  <!--
  <script src="{{ url('js/popper.min.js') }}"></script>
  <script src="{{ url('js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('js/nouislider.min.js') }}"></script>
  <script src="{{ url('js/moment-with-locales.min.js') }}"></script>
  <script src="{{ url('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ url('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
  -->
  
  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ url('js/aos.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ url('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ url('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ url('js/main.js') }}"></script>
  
  </body>
</html>