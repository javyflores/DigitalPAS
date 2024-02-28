@extends('layouts.admplantilla')


@section('contenido')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                        <div class="container-fluid">
                            <h3>Panel de Control</h3>
                        </div>
                    
                        <!-- Topbar Search -->
                        <div class="container-fluid">
                        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cedula" placeholder="Buscar por Cédula" aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>



                    </div>
                </div>

    <div class="container mt-3">

      <h2>Nómina de Afiliados</h2>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Estado</th>
                    <th>Seccional</th>
                    <th>Cédula</th>
                    <th>ID-Afiliado</th>
                    <th>1er Nombre</th>
                    <th>2do Nombre</th>
                    <th>1er Apellido</th>
                    <th>2do Apellido</th>
                    <th>Fecha de Nac.</th>
                    <th>Sexo</th>
                    <th>Edo. Cívil</th>
                    <th>Hijos</th>
                    <th>Discapacidad</th>
                    <th>Grado Disc.</th>
                    <th>Nivel Aca.</th>
                    <th>Prof. u Oficio</th>
                  </tr>
                </thead>
                <tbody>
                    @if (!empty($afiliados))
                        @foreach ($itemsPaginados as $index => $afiliado)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $afiliado['edo'] }}</td>
                                <td>{{ $afiliado['cod_sec'] }}</td>
                                <td>{{ $afiliado['cedula'] }}</td>
                                <td>{{ $afiliado['id_afi'] }}</td>
                                <td>{{ $afiliado['p_nombre'] }}</td>
                                <td>{{ $afiliado['s_nombre'] }}</td>
                                <td>{{ $afiliado['p_apellido'] }}</td>
                                <td>{{ $afiliado['s_apellido'] }}</td>
                                <td>{{ $afiliado['fec_nac'] }}</td>
                                <td>{{ $afiliado['sexo'] }}</td>
                                <td>{{ $afiliado['est_civ'] }}</td>
                                <td>{{ $afiliado['hijos'] }}</td>
                                <td>{{ $afiliado['discap'] }}</td>
                                <td>{{ $afiliado['gra_disc'] }}</td>
                                <td>{{ $afiliado['niv_aca'] }}</td>
                                <td>{{ $afiliado['prof_ofc'] }}</td>
                            </tr>
                        @endforeach
                        @else
                            <h5>No se encontró ningún Afiliado con ese número de Cédula</h5>             
                    @endif
                </tbody>
            </table>
        </div>
        <p>Total de Afiliados: {{ $totalAfiliados }}</p>
        <p>Pag actual: {{ $paginaActual }}</p>
        <p>Pag:

        <!-- Para mostrar la paginación -->
        @php
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo '<a href="?pagina=' . $i . '">' . $i . '</a> ';
        }
        @endphp

        </p>

        <div class="container-fluid" align="right">
            <a href="{{ route('afiliado.report') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
        </div>

    </div>


@endsection