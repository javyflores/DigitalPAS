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

	    if (isset($_POST['username']) && isset($_POST['password'])) {
	        $usuario= $_POST['username'];
	        $password= $_POST['password'];
		    $query = DB::select("SELECT dp.id_afi, a.cod_usr, a.usuario
								FROM nomina.dat_pers_afi dp
								JOIN (
								  SELECT id_afi, cod_usr, usuario, password
								  FROM usuario.administrador
								  UNION ALL
								  SELECT id_afi, cod_usr, usuario, password
								  FROM usuario.dir_nacional
								  UNION ALL
								  SELECT id_afi, cod_usr, usuario, password
								  FROM usuario.dir_seccional
								  UNION ALL
								  SELECT id_afi, cod_usr, usuario, password
								  FROM usuario.afiliado
								) a ON dp.id_afi = a.id_afi
								GROUP BY dp.id_afi, a.cod_usr, a.usuario, a.password
								HAVING a.usuario = '$usuario' AND a.password = '$password'
								ORDER BY dp.id_afi");
		    $result = $query[0];
		    if ($result) {
		    	//Laravel Session
		    	$codigo = $result->cod_usr;
				$usuario = $result->usuario;
				//Utilizamos el método put() de Facades\Session para guardar los datos necesarios en la sesión.
				Session::start();
				Session::put('codigo', $codigo);
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
	                    return redirect('/dirnacional');
	                break;
	                case 3:
	                    return redirect('/dirseccional');
	                break;
	                case 4:
	                    return redirect('/afiliado');
	                break;
	                //En el caso de que no se cumpla ninguno de los casos anteriores, se ejecuta el bloque default, aca no ejecuta ninguna accion.
	                default:
	            }        	
	    	}
	        else{
	            //no existe el usuario
	            return redirect('/login');
	        }	    	
	    }
    }
}