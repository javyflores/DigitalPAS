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
                    return redirect('/admin');
                    break;
                case '3':
                    return redirect('/dirnac');
                    break;
                case '4':
                    return redirect('/dirsec');
                    break;
                case '7':
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
}
