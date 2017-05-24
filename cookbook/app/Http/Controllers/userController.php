<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class userController extends Controller
{
    /**
	* Muestra la ventana newsFeed
	*
	* @return Response
	*/
	public function newsFeed(){
		if(Session::has('usuario')){
			return view('newsFeed');
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
			return view('profile');
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
	public function newRecipe(){
		if(Session::has('usuario')){
			return view('newRecipe');
		}else{
			return redirect("/");
		}
	}

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


		$usuarioContra = "";
		if($_POST["contraVieja"] != "" && $_POST["contraVieja"] != null && $_POST["contraVieja"] != undefined){
			$usuarioContra = usuarioModelo::where('contrasena', $_POST["contraVieja"])->get();
		}


		$update = DB::table('usuario')->where('idUsuario',Session::get('usuario')->idUsuario);

		if($_POST["nombre"] != "" && $_POST["nombre"] != null && $_POST["nombre"] != undefined){
			$update->update('nombre' => "@".$_POST["nombre"]);
		}

		if($_POST["contraNueva"] != "" && $_POST["contraNueva"] != null && $_POST["contraNueva"] != undefined && count($usuarioContra) > 0){
			$update->update('contrasena' => $_POST["contraNueva"]);
		}

		if($_POST["nac"] != "" && $_POST["nac"] != null && $_POST["nac"] != undefined){
			$update->update('fechaNacimiento' => $_POST["nac"]);
		}

		if($_POST["genero"] != "" && $_POST["genero"] != null && $_POST["genero"] != undefined){
			$update->update('genero' => $_POST["genero"]);
		}

		if($_POST["foto"] != "" && $_POST["foto"] != null && $_POST["foto"] != undefined){
			if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {

				$tmp_name = $_FILES["foto"]["tmp_name"];
				$path = $_FILES['foto']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);

				move_uploaded_file($tmp_name, Session::get('usuario')->urlFoto.".".$ext);
				$update->update('urlFoto' => "/usuarios/perfil/$name");
			}
		}else{
			echo '<script type="text/javascript">alert("Error al subir la imagen, intentelo de nuevo");</script>';
			return redirect('user/profile');    
		}	

		$update->update('updated_at' => Carbon::now());


	}
}
