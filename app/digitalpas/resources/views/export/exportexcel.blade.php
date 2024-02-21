<table>
    <caption>Encabezado de la tabla</caption>
   
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Afiliados</td>
            <td></td>
            <td></td>
            <td>{{ now()->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Registro de Requerimiento</td>
            <td>Requerimiento</td>
            <td>estado</td>
            <td>Código del usuario</td>
            <td>cédula</td>
            <td>Primer nombre</td>
            <td>primer apellido</td>
            <td>fecha de creación</td>
        </tr>
        @foreach($afiliaciones as $afiliacion) 
            <tr>
                <td>{{ $afiliacion->req_reg }}</td>
                <td>{{ $afiliacion->req }}</td>
                <td>{{ $afiliacion->edo }}</td>
                <td>{{ $afiliacion->cod_usr }}</td>
                <td>{{ $afiliacion->cedula }}</td>
                <td>{{ $afiliacion->p_nombre }}</td>
                <td>{{ $afiliacion->p_apellido }}</td>
                <td>{{ $afiliacion->fec_crea }}</td>
            </tr>
        @endforeach
    </tbody>
</table>