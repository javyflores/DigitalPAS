<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function index(){
    	return view('login');
    }


    public function login(){
		
		$password = $_POST['password'];
		$validacion = preg_match('/[^0-9]/', $password);
		$cedula= $_POST['cedula'];
		$password= $_POST['password'];
	//	preg_match('/[^a-zA-Z0-9]/', $password) // validacion para numeros y letras 
    //	preg_match('/[^0-9]/', $password) // validacion para que sean solo numeros

	  //  if (isset($_POST['cedula']) && isset($_POST['password'])) {
		if (isset($_POST['cedula']) && isset($_POST['password']) && ($validacion==0)) {

			/* //este es el codigo anterior
	        $cedula= $_POST['cedula'];
	        $password= $_POST['password'];
		    $query = DB::select("SELECT id_afi, cod_usr, cedula, nombre
								FROM usuario.usuarios
								Where cedula= $cedula
								AND password = '$password'");
			*/

			$query = DB::table('usuario.usuarios') //este es el codigo actual
			->select('id_afi', 'cod_usr', 'cedula', 'nombre')
			->where('cedula', $cedula)
			->where('password', $password)
			->get();
		    
		    if ($query) {
		    	$result = $query[0];
		    	//Laravel Session
		    	$codigo = $result->cod_usr;
		    	$id_afi = $result->id_afi;
		    	$cedula = $result->cedula;
				$usuario = $result->nombre;
				//Utilizamos el método put() de Facades\Session para guardar los datos necesarios en la sesión.
				Session::start();
				Session::put('codigo', $codigo);
				Session::put('id_afi', $id_afi);
				Session::put('cedula', $cedula);
				Session::put('usuario', $usuario);

		    	//Para validar el rol del usuario.
		    	//primero asignamos a $_SESSION el codigo de usuario.
		    	$_SESSION['cod_usr'] = $result->cod_usr;
		    	//Luego utilizamos la función substr() para obtener el primer carácter del valor del cod_usr.
	            switch(substr($_SESSION['cod_usr'],0,1)){
	            	//Luego la estructura de control switch para realizar diferentes acciones según el valor del primer carácter del cod_usr.
	            	//En el caso de que el primer carácter sea "1", se redirige a la ruta "/administrador" utilizando la función redirect().
	                case 1:
	                    return redirect('/admin');
	                break;
	                case 2:
	                    return redirect('/dirnac');
	                break;
	                case 3:
	                    return redirect('/dirsec');
	                break;
	                case 4:
	                    return redirect('/afiliado');
	                break;
	                //En el caso de que no se cumpla ninguno de los casos anteriores, se ejecuta el bloque default, aca no ejecuta ninguna accion.
	                default:
	                	return redirect('/login')->with('error', 'Usuario no registrado');
	            }        	
	    	}
	        else{
	            //no existe el usuario
	            return redirect('/login')->with('error', 'Credenciales inválidas');
	        }	    	
	    }
    
    }
}