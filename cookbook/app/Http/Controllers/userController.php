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
}
