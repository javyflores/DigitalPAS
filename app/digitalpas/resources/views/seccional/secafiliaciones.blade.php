@extends('layouts.dirsecplantilla')


@section('contenido')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <div class="container-fluid">
                            <h3>Panel de Seguimiento</h3>
                        </div>

                        <!-- Topbar Search -->
                        <div class="container-fluid">
                        <form method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="req_seg" id="req_seg" placeholder="Buscar por N° de Requerimiento" aria-label="Search" aria-describedby="basic-addon2">
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

      <h5>Afiliaciones realizadas por la seccional:</h5>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Item</th>
                    <th>Usuario</th>
                    <th>Requerimiento</th>
                    <th>Progreso</th>

                  </tr>
                </thead>
                <tbody>
                    @if (!empty($requerimientos))

                        @foreach ($itemsPaginados as $index => $requerimiento)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $requerimiento['cod_usr'] }}</td>

                                <td>
                                    <form method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="req_seg" id="req_seg" value="{{ $requerimiento['req_seg'] }}">
                                        <button type="submit" class="btn btn-link">{{ $requerimiento['req_seg'] }}</button>
                                    </form>
                                </td>

                                <td>
                                    @php
                                        $accionesRealizadas = 0;
                                        $totalAcciones = 7;

                                        if ($requerimiento['fec_crea']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_env']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_adm']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_rev']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_consig']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_resl']) {
                                            $accionesRealizadas++;
                                        }

                                        if ($requerimiento['fec_resp']) {
                                            $accionesRealizadas++;
                                        }

                                        $progreso = ($accionesRealizadas / $totalAcciones) * 100;
                                    @endphp
                                    <progress value="{{ $progreso }}" max="100"></progress>

                                </td>

                            </tr>
                        @endforeach
                        @else
                            <h5>No se encontró ningún Requerimiento con ese número</h5>  

                    @endif
                </tbody>
            </table>
        </div>
        <p>Total de Requerimientos: {{ $totalrequerimientos }}</p>
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


@endsection