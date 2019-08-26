<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
use Storage;
class xeberController extends Controller
{

    public function add(Request $request)
    {
    	$request->validate([
		    'xeberAdi' => 'bail|required|max:255',
		    'xeberMetn' => 'required',
		    'image' => 'required'
		]);

    
    	$name = time().".jpg";
    	$data = explode( ',', $request->input('image'));

    	$sekil = base64_decode($data[1]);


    	Storage::disk('xeber')->put($name, $sekil);

    	News::create([
    		"title" => request('xeberAdi'),
    		"description" => request('xeberMetn'),
    		"image" => $name
    	]);

    	return redirect()->action('adminController@index');
    }

}
