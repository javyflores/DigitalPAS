<?php

namespace App\Http\Controllers;
use Carbon\Carbon; // Agregar esta línea al principio del archivo de controlador
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entidad;
use App\Models\Role;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Cargos;
use App\Models\Dirnacional;
use App\Models\Dirseccional;

class RegistuserController extends Controller
{
    public function mostrarFormulario()
    {
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        $tipouser = Session::get('tipouser');
        $cargos = Session::get('cargos');
        
        // Obtener todos los estados
        $estados = Entidad::all();
        $roles = Role::all();
        $cargos = Cargos::all();
        
        return view('registerusers', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'rol' => $rol,
            'roles'=> $roles,
            'tipouser' => $tipouser,
            'cargos' => $cargos,
            'estados' => $estados // Pasar los estados a la vista
        ]);
    }

    public function mostrarUsuarios()
    {
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        $tipouser = Session::get('tipouser');
        $cargos = Session::get('cargos');
        
        // Obtener todos los estados
        $estados = Entidad::all();
        $roles = Role::all();
        $cargos = Cargos::all();

        //*datatable*//

        $query = DB::select("SELECT * FROM usuario.usuarios");
/*
       $usuarios = Usuarios::select('usuarios.*', 'roles.name AS rol_descripcion', 'cargos.cargo AS cargo_descripcion')
        ->join('roles', 'usuarios.rol', '=', 'roles.id')
        ->join('cargos', 'usuarios.cod_cargo', '=', 'cargos.id')
        ->get();
*/

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

        
        return view('indexusers', [
            'codigo' => $codigo,
            'usuario' => $usuario,
            'rol' => $rol,
            'roles'=> $roles,
            /*inicio datos datatables*/ 
            'afiliados' => $afiliados,
            'totalAfiliados' => $totalAfiliados,
            'itemsPorPagina' => $itemsPorPagina,
            'paginaActual' => $paginaActual,
            'indiceInicio' => $indiceInicio,
            'itemsPaginados' => $itemsPaginados,
            'totalPaginas' => $totalPaginas,
            'tipouser' => $tipouser,
            /*fin datos datatables*/ 
            'cargos' => $cargos,
            'estados' => $estados // Pasar los estados a la vista
        ]);
    }



    public function consulta()
    {
        $codigo = Session::get('codigo');
        $usuario = Session::get('usuario');
        $rol = Session::get('rol');
        $tipouser = Session::get('tipouser');
        $cargos = Session::get('cargos');
        
        // Obtener todos los estados
        $estados = Entidad::all();
        $roles = Role::all();
        $cargos = Cargos::all();

        //*datatable*//
        if (isset($_POST['cedula'])){

            $cedula= $_POST['cedula'];
            /*
            $query = DB::table('usuario.usuarios as u')
                ->join('usuario.roles as r', 'u.rol', '=', 'r.id')
                ->join('nomina.cargos as c', 'u.cod_cargo', '=', 'c.id')
                ->select('u.*', 'r.name as rol_descripcion', 'c.cargo as cargo_descripcion')
                ->where('u.cedula', $cedula)
                ->get();

                */
                /*
            $query = Usuario::select('usuarios.*', 'roles.name AS rol_descripcion', 'cargos.cargo AS cargo_descripcion')
            ->join('roles', 'usuarios.rol', '=', 'roles.id')
            ->join('cargos', 'usuarios.cod_cargo', '=', 'cargos.id')
            ->where('usuarios.cedula', '=', $cedula)
            ->get();
            */
            $query = DB::select("SELECT * FROM usuario.usuarios WHERE cedula = '$cedula'");
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

            
            return view('indexusers', [
                'codigo' => $codigo,
                'usuario' => $usuario,
                'rol' => $rol,
                'roles'=> $roles,
                /*inicio datos datatables*/ 
                'afiliados' => $afiliados,
                'totalAfiliados' => $totalAfiliados,
                'itemsPorPagina' => $itemsPorPagina,
                'paginaActual' => $paginaActual,
                'indiceInicio' => $indiceInicio,
                'itemsPaginados' => $itemsPaginados,
                'totalPaginas' => $totalPaginas,
                'tipouser' => $tipouser,
                /*fin datos datatables*/ 
                'cargos' => $cargos,
                'estados' => $estados // Pasar los estados a la vista
            ]);
        }
    }




    public function generarCodigo(Request $request)
    {
        $estado = $request->estado;
        //dd($estado); // Verifica el valor del estado
    // Resto de tu lógica para generar el código
        $anio = Carbon::now()->year;
        $numero_aleatorio = mt_rand(1000, 9999);
        $codigo = $estado . $numero_aleatorio . $anio;

        //var_dump($codigo); // Imprimir el valor de $codigo
        return response()->json(['codigo' => $codigo]);
        
    }
    public function guardarUsuario(Request $request)
    {
        // Validar los datos del formulario
       // return "bandera";
        /*
        $request->validate([
            'estado' => 'required',
            'codigo_usuario' => 'required',
            'cedula' => 'required|numeric|max:8',
            'nombre' => 'required|string',
            'contrasena' => 'required|string|min:6|confirmed',
            'rol' => 'required',
            'email' => 'required|email|unique:usuarios',
        ]);
        */

        $cedulaConsulta = $request->cedula;
        $consulta = DB::table('usuario.usuarios')
        ->select('password')
        ->where('cedula', $cedulaConsulta)
        ->first();

        $consulta2 = DB::table('nomina.afiliados')
        ->select('cedula')
        ->where('cedula', $cedulaConsulta)
        ->first();
       // return $consulta;
       
       $dirRol = $request->rol;
       //dir_nac=3
       //dir_sec=4
        if(!$consulta && $consulta2){
            /*
            if($dirRol == 3 ){
                $registerNacional = new Dirnacional();
                $registerNacional->cedula = $request->cedula;
                $registerNacional->nombre = $request->nombre;
                $registerNacional->cod_cargo = $request->cargos;
                $registerNacional->save();
            }

            if($dirRol == 4 ){
                $registerSeccional = new Dirseccional();
                $registerSeccional->cedula = $request->cedula;
                $registerSeccional->nombre = $request->nombre;
                $registerSeccional->cod_cargo = $request->cargos;
                $registerSeccional->save();
            }
*/
            // Crear un nuevo usuario
           // return "no se guardo";
            $usuario = new Usuarios();
            
            $usuario->id_afi = $request->codigousuario;
            $usuario->cedula = $request->cedula;
            $usuario->nombre = $request->nombre;
            $usuario->password = bcrypt($request->contrasena);
            $usuario->rol = $request->rol;
            $usuario->cod_cargo = $request->cargos;
            $usuario->email = $request->email;
            $usuario->save();

            // Redirigir o retornar una respuesta JSON según sea necesario
            return redirect()->route('registro.formulario')->with('success', '¡Registrado con éxito!');
            //se registro el usuario
        }
            // Establecer el mensaje de error en la sesión
            Session::flash('error', 'Este número de cédula ya existe, porfavor ingresa un usuario nuevo');

            return redirect()->back(); // Redirigir de vuelta al formulario
    }
}
