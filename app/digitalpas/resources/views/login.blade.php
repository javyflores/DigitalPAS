<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login - DIGITALPAS</title>
  <!-- Favicon -->
  <link href="{{ asset('img/Logo SIRTRAME.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- CSS Files -->
  <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
</head>

<body class="bg-default">

  <div class="main-content">

    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="{{ url()->current() }}">
          <!-- Cambiar a URL del sindicato -->
          <img src="{{ asset('img/Logo Sirtrame.png') }}" width="80" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{ url()->current() }}">
                  <!-- Cambiar a URL del sindicato -->
                  <img src="{{ asset('img/Logo Sirtrame.png') }}">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Sitio Web</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Afíliate</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Asesoria</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white" align="center">Bienvenido!</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <div class="text-center">
                  <img src="{{ asset('img/DigitalPASirtrame.jpg') }}" width="200" height="50">
                </div>
                <small>Plataforma Digital de Asistencia Sindical</small>
              </div>

              <form method="POST" role="form">

                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <input class="form-control" placeholder="Cédula:" type="cedula" name="cedula" pattern="[0-9]{7,8}" required>
                  </div>
                  <small>Solo se permiten números.</small>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <input class="form-control" placeholder="Contraseña:" type="password" name="password" pattern="[A-Za-z0-9]+" required>
                  </div>
                  <small>Solo se permiten números y letras.</small>
                </div>
                
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" name="remember" id="remember" type="checkbox">
                  <label class="custom-control-label" for="remember">
                    <span class="text-muted">Recuerdame</span>
                  </label>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">ENTRAR</button>
                </div>

              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              © 2023 UNEXCA 30142
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>


  <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/login.min.js?v=1.1.2') }}"></script>

</body>

</html>
