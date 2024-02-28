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
     <!-- Agrega la referencia a Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>

    /* Estilos generales */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    /tamaño del documento/
    @page {
      size: letter;
      margin: 2cm;
    }

    /* Estilos CSS para el cintillo */
    .cintillo {
      padding: 100;
      text-align: center;
    }
    
    /* Estilos CSS para la fecha */
    .fecha {
      margin-top: 50px;
      text-align: right;
    }

    /* Estilos CSS para el número */
    .numero {
      margin: 40px;
      text-align: left;
    }

    /* Estilos CSS para el número */
    .destinatario {
      margin: 20px;
      margin-top: 50px;
      text-align: left;
    }

    /* Estilos CSS para el cuerpo del oficio */
    .contenido {
      margin: 20px;
      margin-top: 50px;
      text-align: justify;
      line-height: 1.5;
    }
    
    /* Estilos CSS para la firma y posfirma */
    .firma {
      margin-top: 50px;
      text-align: center;
    }
    
    /* Estilos CSS para las iniciales de revisión y elaboración */
    .iniciales {
      margin-top: 20px;
      text-align: left;
    }

    /* Estilos CSS para pie */
    .pie {
      padding: 100;
      text-align: center;
    }

    /* Estilos CSS para boton vista previa */
    .vista {
      margin-top: 20px;
      text-align: center;
    }

  </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Reporte Afiliaciones</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
            @if(Session::get('rol') == 2)
                <a href="/admin" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel Principal</span></a>
            </li>
            @endif
            @if(Session::get('rol') == 3)
                <a href="/nacionales" class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel Principal</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestión
            </div>


        <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Barra superior -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!--boton Alternar barra lateral (barra superior)-->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Para Logos -->
                    <div align="center">
                        <img src="{{ asset('img/DigitalPASirtrame.jpg') }}" alt="Logo" style="height:50px;">
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- User Information -->

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $usuario }}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                <h5>{{ $codigo }}</h5>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="carnet">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Carnet
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>


                <!-- End of Topbar -->
                <div class="row">


                    <!-- Informacion Central -->
                    
                    <div class="container-fluid">

                        <div class="documento">

                            <div class="cintillo">
                              <!-- Logo del MPPE y otros órganos adscritos -->
                              <img src="{{ asset('img/cintilloOFC.png') }}">
                            </div>

                            <div class="fecha">
                              <!-- Fecha -->
                              <p>Fecha: {{ \Carbon\Carbon::now()->locale('')->format('d \d\e F \d\e Y') }}</p>
                            </div>

                            <div class="container mt-3">

                                <h2>Relación de afiliaciones</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Estado</th>
                                            <th>Cédula</th>
                                            <th>Nombre</th> 
                                            <th>Apellido</th>
                                            <th>Requerimiento</th>
                                            <th>Código de usuario</th>
                                            <th>Fecha de la solicitud</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($afiliados))
                                                @foreach ($itemsPaginados as $index => $afiliado)
                                                    <tr>
                                                        <td>{{ $afiliado['entidad'] }}</td>
                                                        <td>{{ $afiliado['cedula'] }}</td>
                                                        <td>{{ $afiliado['p_nombre'] }}</td>
                                                        <td>{{ $afiliado['p_apellido'] }}</td>
                                                        <td>{{ $afiliado['req_reg'] }}</td>
                                                        <td>{{ $afiliado['cod_usr'] }}</td>
                                                        <td>{{ $afiliado['fec_crea'] }}</td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                    <h5>No se encontró ningún Afiliado con ese número de Cédula</h5>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <p>Total de Solicitud de Afiliados: {{ $totalAfiliados }}</p>
                                <p>Pag actual: {{ $paginaActual }}</p>
                                <p>Pag:
                                    <!-- Para mostrar la paginación -->
                                    @php
                                    for ($i = 1; $i <= $totalPaginas; $i++) {
                                        echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
                                    }
                                    @endphp
                                </p>

                            </div>
                
                        </div>

                            <div class="vista">
                                <button onclick="printDocument()">Vista previa e imprimir</button>
                            </div>

                    </div>

                </div>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; @UNEXCA 30142 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <img src="{{ asset('img/to-top.svg') }}">
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Deseas Salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "SALIR" si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">SALIR</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="{{ asset('js/ani.js') }}"></script>-->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
<script>
    function printDocument() {
      var printContents = document.getElementsByClassName("documento")[0].innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>


</html>