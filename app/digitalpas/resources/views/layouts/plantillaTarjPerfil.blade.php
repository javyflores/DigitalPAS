<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Plataforma Digital de Asistencia Sindical">
    <meta name="author" content="@JAVYFLORES">
    <!-- Favicon -->
    <link href="{{ asset('img/Logo SIRTRAME.png') }}" rel="icon" type="image/png">
    <title>DigitalPASirtrame</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>

    <h5 align="center">Saludos! {{ session('usuario') }}</h5>
    <div class="imp">
    <section style="background-color: #eee;">
      <div class="container py-5">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li><h4><strong>Ficha Digital del Afiliado(a) </strong></h4></li>
                <li><h4>: / ID: {{ session('id_afi') }}</h4></li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{ session('usuario') }}</h5>
                <p class="text-muted mb-1">Afiliado(a)</p>
                <p class="text-muted mb-4">Distrito Capital.</p>
                <div class="d-flex justify-content-center mb-2">
                </div>
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                    <p class="mb-0">@Javyflores</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                    <p class="mb-0">@Javyflores</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                    <p class="mb-0">@Javyflores</p>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                    <p class="mb-0">@Javyflores</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8">

            <div class="card mb-4">
              <h5 align="center">Datos Personales</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nombre y Apellido</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ session('usuario') }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">example@example.com</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Teléfono</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(0212) 5068177</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Celeular</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">(0426) 112-3005</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Dirección</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">Esq. de Salas. Altagracia- DC</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-lg-8">
              <div class="card mb-4">
                <h5 align="center">Datos Laborales</h5>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Dependencia:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Ministerio de Educación</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Cargo:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Profesional III</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Fecha de Ingreso:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">16-01-2009</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    <div align="center">
    <input type="submit" value="Imprimir" onclick="printDocument()">
    <script>
      function printDocument() {
        var printContents = document.getElementsByClassName("imp")[0].innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>