<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use CookBook\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use CookBook\usuarioModelo;
use Session;
class registroController extends Controller
{
	public function agregarUser(){

		$usuarioCorreo = usuarioModelo::where('email', $_POST["correo"])->get();
		$usuarioNombre = usuarioModelo::where('nombre', "@".$_POST["nombre"])->get();

		if( count($usuarioCorreo) == 0 && count($usuarioNombre) == 0){
			$name = "";
			if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["foto"]["tmp_name"];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
				$path = $_FILES['foto']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);

				$name = round(microtime(true) * 1000).".".$ext;  
				move_uploaded_file($tmp_name, public_path()."/usuarios/perfil/$name");


				DB::table('usuario')->insert([
					'nombre' => "@".$_POST["nombre"],
					'email' => $_POST["correo"],
					'contrasena' => $_POST["contra"],
					'fechaNacimiento' => $_POST["nac"],
					'genero' =>$_POST["genero"],
					'urlFoto' => "/usuarios/perfil/$name",
					'created_at' => Carbon::now()
					]);

				$user = DB::table('usuario')->where([
					['email','=', $_POST["correo"]],
					['contrasena','=',$_POST["contra"]],
					])->get();

					
				    Session::put('usuario', $user[0]);
    				return redirect("user/newsFeed");
				
				
			}else{
				echo '<script type="text/javascript">alert("Error al subir la imagen, intentelo de nuevo");</script>';
				return view('registro');        
			}		
		}else{
			echo '<script type="text/javascript">alert("El usuario o correo ya existe");</script>';
			return view('registro');        
		}

	}
}
