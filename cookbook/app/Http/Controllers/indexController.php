<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
	/**
	* Muestra la ventana index
	*
	* @return Response
	*/
    public function index(){
    	return view('index');
    }

    /**
	* Muestra la ventana registro
	*
	* @return Response
	*/
    public function registro(){
    	return view('registro');
    }

    public function login($usuario, $contrasena){
    	$user = DB::table('usuario')->where([
    		['usuario','=',$usuario],
    		['contrasena','=',$contrasena],
    		])->get();

    	return $user;
    }

    public function agregarRegistro($nombre,$email,$contrasena,$fechaNacimiento,$genero,$urlFoto){

    	 DB::table('usuario')->insert([
            'nombre' => $nombre,
            'email' => $email,
            'contrasena' => $contrasena,
            'fechaNacimiento' => $fechaNacimiento,
            'genero' => $genero,
            'urlFoto' => $urlFoto,
            'created_at' => Carbon\Carbon::now()
        ]);

    }
}
