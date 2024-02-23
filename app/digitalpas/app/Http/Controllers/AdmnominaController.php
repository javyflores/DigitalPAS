<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdmnominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');

        $query = DB::select("SELECT * FROM nomina.afiliados");
        $afiliados = json_encode($query);
        $afiliados = json_decode($afiliados, true);
        $totalAfiliados = count($afiliados);
        // Número de ítems por página
        $itemsPorPagina = 20;
        // Número de página actual
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        // Índice de inicio para la paginación
        $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
        // Obtener los ítems para la página actual
        $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
        // Calcular el número total de páginas
        $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

        return view('nomina.admnomina', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'afiliados' => $afiliados,
            'totalAfiliados' => $totalAfiliados,
            'itemsPorPagina' => $itemsPorPagina,
            'paginaActual' => $paginaActual,
            'indiceInicio' => $indiceInicio,
            'itemsPaginados' => $itemsPaginados,
            'totalPaginas' => $totalPaginas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consulta(){
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        if (isset($_POST['cedula'])){

            $cedula= $_POST['cedula'];

            $query = DB::select("SELECT * FROM nomina.afiliados WHERE cedula = '$cedula'");
            $afiliados = json_encode($query);
            $afiliados = json_decode($afiliados, true);
            $totalAfiliados = count($afiliados);
            // Número de ítems por página
            $itemsPorPagina = 50;
            // Número de página actual
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            // Índice de inicio para la paginación
            $indiceInicio = ($paginaActual - 1) * $itemsPorPagina;
            // Obtener los ítems para la página actual
            $itemsPaginados = array_slice($afiliados, $indiceInicio, $itemsPorPagina);
            // Calcular el número total de páginas
            $totalPaginas = ceil(count($afiliados) / $itemsPorPagina);

            return view('nomina.admnomina', [
                'codigo' => $codigo,
                'usuario' => $usuario,
                'afiliados' => $afiliados,
                'totalAfiliados' => $totalAfiliados,
                'itemsPorPagina' => $itemsPorPagina,
                'paginaActual' => $paginaActual,
                'indiceInicio' => $indiceInicio,
                'itemsPaginados' => $itemsPaginados,
                'totalPaginas' => $totalPaginas
            ]);
        };
    }

    /**
    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEmpleadosTable extends Migration
    {
        public function up()
        {
            Schema::create('empleados', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('apellido');
                $table->string('email')->unique();
                $table->string('telefono');
                $table->string('direccion');
                $table->date('fecha_nacimiento');
                $table->string('cargo');
                $table->decimal('salario', 8, 2);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('empleados');
        }
    }


    <html>
    <head>
        <title>Ficha de Empleado</title>
    </head>
    <body>
        <h1>Ficha de Empleado</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Cargo</th>
                <th>Salario</th>
            </tr>
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->direccion }}</td>
                <td>{{ $empleado->fecha_nacimiento }}</td>
                <td>{{ $empleado->cargo }}</td>
                <td>{{ $empleado->salario }}</td>
            </tr>
        </table>
    </body>
    </html>

     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
