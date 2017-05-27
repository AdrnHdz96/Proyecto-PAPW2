<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use CookBook\usuarioModelo;
use Carbon\Carbon;

class userController extends Controller
{
    /**
	* Muestra la ventana newsFeed
	*
	* @return Response
	*/

	public function agregarComentario(){
		$idReceta= $_POST['idReceta'];
		$comentario = $_POST['comentario'];
		$idUsuario = Session::get('usuario')->idUsuario;

		DB::table('comentario')->insert(
			['idUsuario' => $idUsuario, 
			'idReceta' => $idReceta,
			'comentario' => $comentario,
			'created_at' =>  Carbon::now()]);

		return redirect("/user/recipe/".$idReceta);
	}

	public function buscarPost(){
		$fecha1 = $_POST['from'];
		$fecha2 = $_POST['to'];

		$recetas = DB::table('receta')->join('usuario','receta.idUsuario', '=', 'usuario.idUsuario')->select('receta.idReceta', 'receta.idUsuario','receta.nombre','receta.urlFoto','receta.created_at','usuario.nombre as nombreUsuario','usuario.urlFoto as fotoUsuario')->whereBetween('receta.created_at',   [$fecha1, $fecha2])->orderBy('created_at', 'desc')->get();

		$usuarios = DB::table('usuario')->select('*')->where('idUsuario','<>', Session::get('usuario')->idUsuario)->get();

		$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();
		$likes;
			foreach ($recetas as $receta) {
				$laik = DB::table('likes')->select('*')->where('idUsuario', Session::get('usuario')->idUsuario)->where('idReceta', $receta->idReceta)->get();

				if(count($laik)!=0){
					$aux = json_decode($laik);
					$likes[] = $aux[0]->idReceta;
				}
			}
		return view('search',compact('recetas','generos','usuarios','likes'));
	}

	public function newsFeed(){
		if(Session::has('usuario')){
			$recetas = DB::table('receta')->join('usuario','receta.idUsuario', '=', 'usuario.idUsuario')->select('receta.idReceta', 'receta.idUsuario','receta.nombre','receta.urlFoto','receta.created_at','usuario.nombre as nombreUsuario','usuario.urlFoto as fotoUsuario')->orderBy('created_at', 'desc')->get();
			
			$usuarios = DB::table('usuario')->select('*')->where('idUsuario','<>', Session::get('usuario')->idUsuario)->get();


			$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();
			
			$likes;
			foreach ($recetas as $receta) {
				$laik = DB::table('likes')->select('*')->where('idUsuario', Session::get('usuario')->idUsuario)->where('idReceta', $receta->idReceta)->get();

				if(count($laik)!=0){
					$aux = json_decode($laik);
					$likes[] = $aux[0]->idReceta;
				}
			}
			return view('newsFeed',compact('recetas','generos','usuarios','likes'));
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
	public function profile($idUsuario = ""){
		if(Session::has('usuario')){

			if($idUsuario == "" || $idUsuario == Session::get('usuario')->idUsuario){

				$recetas = DB::table('receta')->select('idReceta', 'idUsuario','nombre','urlFoto','created_at')->where('idUsuario',Session::get('usuario')->idUsuario)->get();

				$usuario = DB::table('usuario')->select('idUsuario','urlFoto','nombre')->where('idUsuario',Session::get('usuario')->idUsuario)->get();



				$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();

				return view('profile',compact('recetas','generos','usuario'));

			}else{
				/*$recetas = DB::table('receta')->select('idReceta', 'idUsuario','nombre','urlFoto','created_at')->where('idUsuario',$idUsuario)->get();*/
				$recetas = DB::table('receta')->join('usuario','receta.idUsuario', '=', 'usuario.idUsuario')->select('receta.idReceta', 'receta.idUsuario','receta.nombre','receta.urlFoto','receta.created_at','usuario.nombre as nombreUsuario','usuario.urlFoto as fotoUsuario')->where('receta.idUsuario',$idUsuario)->orderBy('receta.created_at', 'desc')->get();

				$usuario = DB::table('usuario')->select('idUsuario','urlFoto','nombre')->where('idUsuario',$idUsuario)->get();

				if(count($usuario) != 0){

					$generos = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();
					$busquedaUsuario = true;

					$likes;
					foreach ($recetas as $receta) {
						$laik = DB::table('likes')->select('idReceta')->where('idUsuario', Session::get('usuario')->idUsuario)->where('idReceta', $receta->idReceta)->get();
						if(count($laik) != 0){
							$aux = json_decode($laik);
							$likes[] = $aux[0]->idReceta;
						}
					}

					return view('profile',compact('recetas','generos','busquedaUsuario','usuario','likes'));
				}else{

					return redirect("/");
				}
			}
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
	public function recipe($idReceta){
		if(Session::has('usuario')){


			$receta = DB::table('receta')->select('idReceta','nombre','urlFoto','idUsuario','created_at')->where('idReceta',$idReceta)->get();

			$generosReceta = DB::table('receta_genero')->join('genero', 'receta_genero.idGenero', '=', 'genero.idGenero')->select('receta_genero.idReceta', 'genero.nombre')->get();

			$pasos = DB::table('paso')->where('idReceta',$idReceta)->select('descripcion')->get();
			$ingredientes = DB::table('ingrediente')->where('idReceta',$idReceta)->select('nombre')->get();

			$receta =  json_decode($receta);
			$receta = $receta[0];

			$usuario = DB::table('usuario')->select('*')->where('idUsuario',$receta->idUsuario)->get();

			$usuariosSeguir = DB::table('usuario')->select('*')->where('idUsuario','<>', Session::get('usuario')->idUsuario)->get();

			$comentarios = DB::table('comentario')->join('usuario','comentario.idUsuario','=','usuario.idUsuario')->select('comentario.*','usuario.nombre as nombreUsuario','usuario.urlFoto as fotoUsuario')->where('idReceta', $idReceta)->orderBy('created_at',"desc")->get();

			$like = DB::table('likes')->select('*')->where('idUsuario', Session::get('usuario')->idUsuario)->where('idReceta', $idReceta)->get();
			if(count($like)!=0){
				$like = json_decode($like);
				$like = $like[0]->idReceta;
				return view("recipe",compact('generosReceta','receta','pasos','ingredientes','usuario','usuariosSeguir','comentarios','like'));
			}else{
				return view("recipe",compact('generosReceta','receta','pasos','ingredientes','usuario','usuariosSeguir','comentarios'));
			}
			
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
						return redirect("/user/profile");
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
					return redirect("/user/profile");
					
				}


				//SI HUBO ALGUN ERROR CON LA CONTRASEÑA
			}else{
				echo '<script type="text/javascript">alert("La contraseña actual ingresada es inválida, favor de ingresarla de nuevo");</script>';
				return redirect("/user/profile");
				
			}
		}else{
			echo '<script type="text/javascript">alert("Favor de ingresar la contraseña actual");</script>';
			return redirect("/user/profile");
			
		}		
	}
}
