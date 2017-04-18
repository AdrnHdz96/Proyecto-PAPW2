<?php

namespace CookBook\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    /**
	* Muestra la ventana newsFeed
	*
	* @return Response
	*/
    public function newsFeed(){
    	return view('newsFeed');
    }

    /**
	* Muestra la ventana profile
	*
	* @return Response
	*/
    public function profile(){
    	return view('profile');
    }

    /**
	* Muestra la ventana de recetario
	*
	* @return Response
	*/
    public function cookbook(){
    	return view('cookbook');
    }

    /**
	* Muestra la ventana de siguiendo
	*
	* @return Response
	*/
    public function follow(){
    	return view('follow');
    }

    /**
	* Muestra la ventana de seguidores
	*
	* @return Response
	*/
    public function follower(){
    	return view('follower');
    }

    /**
	* Muestra la ventana de receta
	*
	* @return Response
	*/
    public function recipe(){
    	return view('recipe');
    }
}
