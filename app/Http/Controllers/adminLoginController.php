<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Storage;

use Session;

class adminLoginController extends Controller
{

	private $language;

	private $lang;

    public function __construct()
    {

    	$this->middleware('guest')->except('logout');
    	$language = Storage::disk('dataxml')->get('lang2.json');
		$this->language = json_decode($language);

    }

    public function login(Request $request)
    {
    	if($request->session() !== null){
			$session = $request->session()->get('dil');
			if($session == "az"){
				$this->lang = $this->language->az;
			}
			elseif($session == "ru"){
				$this->lang = $this->language->ru;
			}
			else{
				$this->lang = $this->language->en;
			}
		}else{
			$this->lang = $this->language->en;
		}

		$lang = $this->lang;

		return view('admin.login', compact('lang'));
    }
}
