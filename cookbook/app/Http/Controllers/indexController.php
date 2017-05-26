<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class indexController extends Controller
{
	/**
	* Muestra la ventana index
	*
	* @return Response
	*/
  public function index(){
    if(Session::has('usuario')){
      return redirect('user/newsFeed');
    }else{
      return view('index');
    }
  }

    /**
	* Muestra la ventana registro
	*
	* @return Response
	*/
  public function registro(){
    if(Session::has('usuario')){
      return redirect('user/newsFeed');
    }else{
      return view('registro');
    }
  }

  public function login(){

   $user = DB::table('usuario')->where([
    ['email','=', $_POST["correo"]],
    ['contrasena','=',$_POST["contra"]],
    ])->get();

     if(count($user) == 1){
      
      Session::put('usuario',$user[0]);
      return redirect("user/newsFeed");
    }else{
      echo '<script type="text/javascript">alert("Los campos usuario o contraseña son incorrectos");</script>';
      return view("index");
    }
  }


}
