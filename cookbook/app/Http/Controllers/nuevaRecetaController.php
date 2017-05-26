<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use CookBook\Http\Controllers\Controller;
use Session;
use DB;
use Carbon\Carbon;

class nuevaRecetaController extends Controller
{

	public function newRecipe(){
		if(Session::has('usuario')){
			$generos = DB::table('genero')->select('idGenero', 'nombre')->get();
			return view('newRecipe',['generos' => $generos]);
		}else{
			return redirect("/");
		}
	}

	public function editarReceta($idReceta){
		if(Session::has('usuario')){
			$generos = DB::table('genero')->select('idGenero', 'nombre')->get();

			$receta = DB::table('receta')->select('idReceta','nombre')->where('idReceta',$idReceta)->get();
			$generosReceta = DB::table('receta_genero')->where('idReceta',$idReceta)->select('idGenero')->get();
			$pasos = DB::table('paso')->where('idReceta',$idReceta)->select('descripcion')->get();
			$ingredientes = DB::table('ingrediente')->where('idReceta',$idReceta)->select('nombre')->get();

			$receta =  json_decode($receta);
			$receta = $receta[0];
			return view('newRecipe', compact('generos','generosReceta','receta','pasos','ingredientes'));
		}else{
			return redirect("/");
		}
	}

	public function editarRecetaBD(){

			$idReceta = $_POST["idReceta"];
			$nombreReceta = $_POST["nombreReceta"];
			$ingredientes = $_POST["ingredientes"];
			$pasos = $_POST["pasos"];
			$generos = $_POST["generos"];

			
			$receta = DB::table('receta')->select('idReceta','urlFoto')->where('idReceta',$idReceta)->get();

			$urlNueva = $receta[0]->urlFoto;
			
			if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
				$name = "";
				$tmp_name = $_FILES["foto"]["tmp_name"];  
				move_uploaded_file($tmp_name, public_path().$urlNueva);

				 DB::table('receta')->where('idReceta',$idReceta)->update([
				'nombre' => $nombreReceta,
				'urlFoto' => $urlNueva,
				'updated_at' => Carbon::now()
				]);

			}else{
 				DB::table('receta')->where('idReceta',$idReceta)->update([
				'nombre' => $nombreReceta,
				'updated_at' => Carbon::now()
				]);
			}

			
			DB::table('ingrediente')->where('idReceta',$idReceta)->delete();
			DB::table('paso')->where('idReceta',$idReceta)->delete();
			DB::table('receta_genero')->where('idReceta',$idReceta)->delete();

			foreach ($generos as $genero) {
				DB::table('receta_genero')->insert([
					'idGenero' => $genero,
					'idReceta' => $idReceta,
					'created_at' => Carbon::now()
					]);
			}

			foreach ($pasos as $paso) {
				DB::table('paso')->insert([
					'descripcion' => $paso,
					'idReceta' => $idReceta,
					'created_at' => Carbon::now()
					]);
			}

			foreach ($ingredientes as $ingrediente) {
				DB::table('ingrediente')->insert([
					'nombre' => $ingrediente,
					'idReceta' => $idReceta,
					'cantidad' => "",
					'created_at' => Carbon::now()
					]);
			}

			return redirect("/user/profile");
			

	}

	public function agregarReceta(){
		if ($_FILES["foto"]["error"] == UPLOAD_ERR_OK) {

			$nombreReceta = $_POST["nombreReceta"];
			$ingredientes = $_POST["ingredientes"];
			$pasos = $_POST["pasos"];
			$generos = $_POST["generos"];

			$name = "";
			$tmp_name = $_FILES["foto"]["tmp_name"];
			$path = $_FILES['foto']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$name = round(microtime(true) * 1000).".".$ext;  
			move_uploaded_file($tmp_name, public_path()."/usuarios/receta/$name");

			$urlFoto = "/usuarios/receta/$name";

			$idReceta = DB::table('receta')->insertGetId([
				'idUsuario' => Session::get('usuario')->idUsuario,
				'nombre' => $nombreReceta,
				'urlFoto' => $urlFoto,
				'created_at' => Carbon::now()
				]);

			foreach ($generos as $genero) {
				DB::table('receta_genero')->insert([
					'idGenero' => $genero,
					'idReceta' => $idReceta,
					'created_at' => Carbon::now()
					]);
			}

			foreach ($pasos as $paso) {
				DB::table('paso')->insert([
					'descripcion' => $paso,
					'idReceta' => $idReceta,
					'created_at' => Carbon::now()
					]);
			}

			foreach ($ingredientes as $ingrediente) {
				DB::table('ingrediente')->insert([
					'nombre' => $ingrediente,
					'idReceta' => $idReceta,
					'cantidad' => "",
					'created_at' => Carbon::now()
					]);
			}

			return redirect("/user/profile");
		}

	}
}
