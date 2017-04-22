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

    /**
	* Muestra la ventana de nueva receta
	*
	* @return Response
	*/
    public function newRecipe(){
    	return view('newRecipe');
    }

    /**
	* Muestra la ventana de busqueda
	*
	* @return Response
	*/
    public function search(){
    	return view('search');
    }
}
