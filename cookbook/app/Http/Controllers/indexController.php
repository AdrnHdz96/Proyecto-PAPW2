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
}
