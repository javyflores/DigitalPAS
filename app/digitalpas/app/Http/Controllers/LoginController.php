<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importar el facade Auth
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $password = $request->input('password');
        $cedula = $request->input('cedula');

        // Validación: la contraseña debe contener solo números
        if (!ctype_digit($password)) {
            return redirect('/login')->with('error', 'La contraseña debe contener solo números');
        }

        $query = DB::table('usuario.usuarios')
            ->select('id_afi', 'cod_usr', 'cedula', 'nombre', 'rol')
            ->where('cedula', $cedula)
            ->where('password', $password)
            ->first();

        if ($query) {
            // Guardamos la información del usuario en la sesión
            Session::put('codigo', $query->cod_usr);
            Session::put('id_afi', $query->id_afi);
            Session::put('cedula', $query->cedula);
            Session::put('usuario', $query->nombre);
			Session::put('rol', $query->rol);
            
            // Redirigir según el rol del usuario
            switch ($query->rol) {
                case '2':
                    Session::put('tipouser', 'admin');
                    return redirect('/admin');
                    break;
                case '3':
                    Session::put('tipouser', 'nacionales');
                    return redirect('/nacionales');
                    break;
                case '4':
                    Session::put('tipouser', 'dirsec');
                    return redirect('/dirsec');
                    break;
                case '7':
                    Session::put('tipouser', 'afiliado');
                    return redirect('/afiliado');
                    break;
                default:
                    return redirect('/login')->with('error', 'Rol no válido');
            }
        } else {
            // Las credenciales de inicio de sesión son incorrectas
            return redirect('/login')->with('error', 'Credenciales inválidas');
        }
    }


    //la salida del perfil
    public function logout(Request $request)
    {
        // Aquí puedes agregar cualquier lógica de limpieza o registro que necesites antes de salir
        // Por ejemplo, podrías registrar la actividad de salida del usuario en algún lugar.

        // Luego, limpiamos la sesión manualmente
        $request->session()->invalidate();

        // Finalmente, redirigimos al usuario a la página de inicio o a donde quieras después de salir.
        return redirect()->route('login');
    }




}
