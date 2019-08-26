<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class languageController extends Controller
{

    public function homeaz(Request $request)
    {

    	$request->session()->put('dil', 'az');
    	return redirect()->action('valyutaController@index');
    	
    }
    public function homeen(Request $request)
    {

    	$request->session()->put('dil', 'en');
    	return redirect()->action('valyutaController@index');
    	
    }
    public function homeru(Request $request)
    {   
    	$request->session()->put('dil', 'ru');
    	return redirect()->action('valyutaController@index');	
    }

    public function exchaz(Request $request)
    {
    	$request->session()->put('dil', 'az');

    	return redirect()->action('valyutaController@exchange');	
    }
    public function exchen(Request $request)
    {
    	$request->session()->put('dil', 'en');
    	return redirect()->action('valyutaController@exchange');
    	
    }
    public function exchru(Request $request)
    {
   
    	$request->session()->put('dil', 'ru');
    	return redirect()->action('valyutaController@exchange');
    	
    }
    public function newsaz(Request $request)
    {
   
    	$request->session()->put('dil', 'az');
    	return redirect()->action('valyutaController@news');
    	
    }

    public function newsen(Request $request)
    {
   
    	$request->session()->put('dil', 'en');
    	return redirect()->action('valyutaController@news');
    	
    }

    public function newsru(Request $request)
    {
   
    	$request->session()->put('dil', 'ru');
    	return redirect()->action('valyutaController@news');
    	
    }
}
