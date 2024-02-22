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
            <td width="200px" style="text-align:left;">Registro de Requerimiento</td>
            <td width="200px" style="text-align:left;">Requerimiento</td>
            <td width="200px" style="text-align:left;">estado</td>
            <td width="200px" style="text-align:left;">Código del usuario</td>
            <td width="200px" style="text-align:left;">cédula</td>
            <td width="200px" style="text-align:left;">Primer nombre</td>
            <td width="200px" style="text-align:left;">primer apellido</td>
            <td width="200px" style="text-align:left;">fecha de creación</td>
        </tr>
        @foreach($afiliaciones as $afiliacion) 
            <tr>
                <td style="text-align:right;">{{ $afiliacion->req_reg }}</td>
                <td style="text-align:right;">{{ $afiliacion->req }}</td>
                <td style="text-align:right;">{{ $afiliacion->edo }}</td>
                <td style="text-align:right;">{{ $afiliacion->cod_usr }}</td>
                <td style="text-align:right;">{{ $afiliacion->cedula }}</td>
                <td style="text-align:right;">{{ $afiliacion->p_nombre }}</td>
                <td style="text-align:right;">{{ $afiliacion->p_apellido }}</td>
                <td style="text-align:right;">{{ $afiliacion->fec_crea }}</td>
            </tr>
        @endforeach
    </tbody>
</table>