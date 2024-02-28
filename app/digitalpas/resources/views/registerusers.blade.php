<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Plataforma Digital de Asistencia Sindical">
    <meta name="author" content="@JAVYFLORES">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DigitalPASirtrame-Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $(document).ready(function() {
    $('#selectEstado').change(function() {
        var estado = $(this).val();
        var token = $('meta[name="csrf-token"]').attr('content');

        // Realizar una solicitud AJAX al servidor para generar el código
        $.ajax({
            url: '/generar-codigo',
            type: 'POST',
            data: {
                estado: estado
            },
            headers: {
                'X-CSRF-TOKEN': token
            },
            success: function(response) {
                $('#codigousuario').val(response.codigo);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
    </script>

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
                <div class="sidebar-brand-text mx-3">{{$tipouser}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestión
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Nómina de Afiliados</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <a class="collapse-item" href="admnomina">Panel de Control</a>
                        <a class="collapse-item" href="">Registrar</a>
                        <a class="collapse-item" href="">Consultar</a>
                        <a class="collapse-item" href="">Reportes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            @if(Session::get('rol') == 2)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones:</h6>
                        <a class="collapse-item" href="{{ route('registro.formulario') }}">Registrar</a>
                        <a class="collapse-item" href="">Consultar</a>
                        <a class="collapse-item" href="">Reportes</a>
                    </div>
                </div>
            </li>
            @endif
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Otra</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Más:</h6>
                        <a class="collapse-item" href="">Más</a>
                        <a class="collapse-item" href="">Más</a>
                        <a class="collapse-item" href="">Más</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Complementos
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Otra</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Otra</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                        <img src="{{ asset('img/Logo DigitalPAS.png') }}" alt="Logo" style="height:50px;">           
                        <img src="{{ asset('img/Logo SIRTRAME.png') }}" alt="Logo" style="height:50px;">
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('img/camp.svg') }}">
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alertas
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('img/message.svg') }}">
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Mensajes
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->

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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
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
                <!-- aqui el registro de usuarios-->
                    <div class="container-fluid">
                   <!-- <form action="{{ route('registro.guardar') }}" method="POST">-->
                    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="card" style="width: 800px;">
                    <div class="card-body">
                        <h5 class="card-title">Registro de Usuarios</h5>
                        <form action="{{ route('registro.guardar') }}" method="POST">

@csrf

<!-- Estado -->
<div class="form-group">
    <label for="estado">Estado:</label>
    <select class="form-control" name="estado" id="selectEstado" required>
        <option value="" disabled selected>Seleccionar Estado</option>
        @foreach($estados as $row)
            <option value="{{ $row->edo }}">{{ $row->entidad }}</option>
        @endforeach
    </select>
</div>

<!-- Código de usuario -->
<div class="form-group">
    <label for="codigousuario">Código de Usuario:</label>
    <input type="text" class="form-control" id="codigousuario" name="codigousuario" readonly>
</div>

<!-- Cédula -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="form-group">
    <label for="cedula">Cédula:</label>
    <input type="text" class="form-control" id="cedula" name="cedula" maxlength="8" pattern="[0-9]+" required>
    <div class="invalid-feedback">Por favor ingrese una cédula válida (máximo 8 dígitos numéricos).</div>
    <!-- Agrega el mensaje de error personalizado para la validación de cédula -->
    @if(Session::has('error_cedula'))
        <div class="invalid-feedback">{{ Session::get('error_cedula') }}</div>
    @endif
</div>


<!-- Nombre -->
<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[a-zA-Z ]+" required>
    <div class="invalid-feedback">Por favor ingrese un nombre válido (solo letras y espacios).</div>
</div>

<!-- Contraseña -->
<div class="form-group">
    <label for="contrasena">Contraseña:</label>
    <div class="input-group">
        <input type="password" class="form-control" id="contrasena" name="contrasena" pattern="[0-9]+" required>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" onclick="mostrarContrasena()">Mostrar</button>
        </div>
    </div>
    <div id="contrasenaFeedback" class="invalid-feedback" style="display: none;">Por favor ingrese una contraseña válida (solo números).</div>
</div>


<!-- Confirmación de Contraseña -->
<div class="form-group">
    <label for="confirmacion_contrasena">Confirmar Contraseña:</label>
    <input type="password" class="form-control" id="confirmacion_contrasena" name="confirmacion_contrasena" required>
    <div class="invalid-feedback">Por favor confirme la contraseña.</div>
    <div id="passwordMatch" class="invalid-feedback" style="display: none;">Las contraseñas no coinciden.</div>
</div>

<!-- Rol -->
<div class="form-group">
    <label for="rol">Rol:</label>
    <select class="form-control" id="rol" name="rol" required>
        @foreach($roles as $row2)
            <option value="{{ $row2->id }}">{{ $row2->name }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">Por favor seleccione un rol.</div>

    <!--Cargo -->
<div class="form-group">
    <label for="estado">Cargo:</label>
    <select class="form-control" name="cargos" id="cargos" required>
        <option value="" disabled selected>Seleccionar cargo</option>
        @foreach($cargos as $rows)
            <option value="{{ $rows->id }}">{{ $rows->cargo }}</option>
        @endforeach
    </select>
</div>
<!-- Email -->
<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div class="invalid-feedback">Por favor ingrese un correo electrónico válido.</div>
</div>

<div style="display: flex; justify-content: center;">
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-user-plus mr-1"></i> Registrar
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="width: 400px; margin: auto;">
        <strong>¡Registrado con éxito!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


</form>



    </div>
</div>
</div>

<script>
    function mostrarContrasena() {
        var contrasenaInput = document.getElementById("contrasena");
        if (contrasenaInput.type === "password") {
            contrasenaInput.type = "text";
        } else {
            contrasenaInput.type = "password";
        }
    }
    
// Validación de coincidencia de contraseña
document.getElementById("contrasena").addEventListener("input", function() {
    var contrasena = document.getElementById("contrasena").value;
    var confirmacionContrasena = document.getElementById("confirmacion_contrasena").value;
    if (contrasena !== confirmacionContrasena) {
        document.getElementById("passwordMatch").style.display = "block";
    } else {
        document.getElementById("passwordMatch").style.display = "none";
    }
});

document.getElementById("confirmacion_contrasena").addEventListener("input", function() {
    var contrasena = document.getElementById("contrasena").value;
    var confirmacionContrasena = document.getElementById("confirmacion_contrasena").value;
    if (contrasena !== confirmacionContrasena) {
        document.getElementById("passwordMatch").style.display = "block";
    } else {
        document.getElementById("passwordMatch").style.display = "none";
    }
});
document.addEventListener('DOMContentLoaded', function () {
    var contrasenaInput = document.getElementById('contrasena');
    var contrasenaFeedback = document.getElementById('contrasenaFeedback');

    contrasenaInput.addEventListener('input', function () {
        if (!this.validity.valid) {
            contrasenaFeedback.style.display = 'block';
        } else {
            contrasenaFeedback.style.display = 'none';
        }
    });
});
</script>
                    </div>

            
        <!-- Begin Page Content -->
 <!-- /.container-fluid -->


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

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>