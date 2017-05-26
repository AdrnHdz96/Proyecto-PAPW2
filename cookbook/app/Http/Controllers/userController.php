<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use CookBook\usuarioModelo;

class userController extends Controller
{
    /**
	* Muestra la ventana newsFeed
	*
	* @return Response
	*/
	public function newsFeed(){
		if(Session::has('usuario')){
			$recetas = DB::table('receta')->select('idReceta', 'idUsuario','nombre','urlFoto','created_at')->orderBy('created_at', 'desc')->get();
			
			
			$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();
			return view('newsFeed',compact('recetas','generos'));
		}else{
			return redirect("/");
		}
	}


	public function cerrarSesion(){
		Session::flush();
		return redirect("/");
	}

    /**
	* Muestra la ventana profile
	*
	* @return Response
	*/
	public function profile(){
		if(Session::has('usuario')){
			$recetas = DB::table('receta')->select('idReceta', 'idUsuario','nombre','urlFoto','created_at')->where('idUsuario',Session::get('usuario')->idUsuario)->get();

			
			$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();

			return view('profile',compact('recetas','generos'));
		}else{
			return redirect("/");
		}
	}

    /**
	* Muestra la ventana de recetario
	*
	* @return Response
	*/
	public function cookbook(){
		if(Session::has('usuario')){
			return view('cookbook');
		}else{
			return redirect("/");
		}
	}

    /**
	* Muestra la ventana de siguiendo
	*
	* @return Response
	*/
	public function follow(){
		if(Session::has('usuario')){
			return view('follow');
		}else{
			return redirect("/");
		}
	}

    /**
	* Muestra la ventana de seguidores
	*
	* @return Response
	*/
	public function follower(){
		if(Session::has('usuario')){
			return view('follower');
		}else{
			return redirect("/");
		}
	}

    /**
	* Muestra la ventana de receta
	*
	* @return Response
	*/
	public function recipe(){
		if(Session::has('usuario')){
			return view('recipe');
		}else{
			return redirect("/");
		}
	}

    /**
	* Muestra la ventana de nueva receta
	*
	* @return Response
	*/
	

    /**
	* Muestra la ventana de busqueda
	*
	* @return Response
	*/
	public function search(){
		if(Session::has('usuario')){
			return view('search');
		}else{
			return redirect("/");
		}
	}


	public function editarPerfil(){
		if($_POST["contraVieja"] != "" && $_POST["contraVieja"] != null){

			$usuarioContra = usuarioModelo::where([ ['contrasena', $_POST["contraVieja"]],['idUsuario',Session::get('usuario')->idUsuario]])->get();

			if( count($usuarioContra) > 0){
				$cantidadActualizada = 0;
				$mensaje = "";

				//--INICIO DE LOS CAMPOS A ACTUALIZAR

				if($_POST["contraNueva"] != "" && $_POST["contraNueva"] != null){

					if(Session::get('usuario')->contrasena != $_POST["contraNueva"]){
						DB::table('usuario')->where('idUsuario',Session::get('usuario')->idUsuario)->update(['contrasena' => $_POST["contraNueva"]]);
						$usuario = Session::get('usuario');
						$usuario->contrasena = $_POST["contraNueva"];
						Session::put('usuario',$usuario);
						$cantidadActualizada++;
						$mensaje = $mensaje."contraseña";
					}else{
						echo '<script type="text/javascript">alert("La nueva contraseña debe ser diferente a la contraseña actual");</script>';
						return view("profile");
					}
				}

				if($_POST["nac"] != "" && $_POST["nac"] != null){
					DB::table('usuario')->where('idUsuario',Session::get('usuario')->idUsuario)->update(['fechaNacimiento' => $_POST["nac"]]);
					$usuario = Session::get('usuario');
					$usuario->fechaNacimiento = $_POST["nac"];
					Session::put('usuario',$usuario);
					$cantidadActualizada++;
					$mensaje = $mensaje. $cantidadActualizada == 1 ? "fecha de nacimiento" : ", fecha de nacimiento" ;
				}

				if($_POST["genero"] !=  Session::get('usuario')->genero){
					DB::table('usuario')->where('idUsuario',Session::get('usuario')->idUsuario)->update(['genero' => $_POST["genero"]]);
					$usuario = Session::get('usuario');
					$usuario->genero = $_POST["genero"];
					Session::put('usuario',$usuario);
					$cantidadActualizada++;
					$mensaje = $mensaje. $cantidadActualizada == 1 ? "genero" : ", genero" ;
				}

				if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {

					$tmp_name = $_FILES["foto"]["tmp_name"];

					$name = str_replace("/usuarios/perfil/", "", Session::get('usuario')->urlFoto);

					move_uploaded_file($tmp_name, public_path()."/usuarios/perfil/$name");

					$cantidadActualizada++;
					$mensaje = $mensaje. $cantidadActualizada == 1 ? "foto" : ", foto" ;
				}

				//---VERIFICAR QUE MENSAJES VA A ENVIAR

				if($cantidadActualizada == 0){
					return view("profile");
				}else{
					if($cantidadActualizada == 1){
						$mensaje = "El campo ".$mensaje." ha sido actualizado correctamente";
					}else{
						$mensaje = "Los campos ".$mensaje." han sido actualizados correctamente";					
					}
					echo '<script type="text/javascript">alert("'.$mensaje.'");</script>';
					return view("profile");
				}


				//SI HUBO ALGUN ERROR CON LA CONTRASEÑA
			}else{
				echo '<script type="text/javascript">alert("La contraseña actual ingresada es inválida, favor de ingresarla de nuevo");</script>';
				return view("profile");
			}
		}else{
			echo '<script type="text/javascript">alert("Favor de ingresar la contraseña actual");</script>';
			return view("profile");
		}		
	}
}
