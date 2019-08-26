<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\duzeltController;

use Storage;

use Session;

class valyutaController extends Controller
{
    
	private $lang;

	private $language;

	public function __construct()
	{
		$language = Storage::disk('dataxml')->get('lang.json');
		$this->language = json_decode($language);
	}

	public function index(Request $request)
	{	
		//dd($request);
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

		$data = new duzeltController();

		$pul = $data->getPul();

		$flag = $data->getFlag();

		$pubdate = $data->getPubdate();

		$lang = $this->lang;
		
		return view('valyuta.index', compact('pul', 'flag', 'pubdate', 'lang'));
	}	

	public function exchange(Request $request)
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

		return view('valyuta.exchange', compact('lang'));
	}

	public function news(Request $request)
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

		return view('valyuta.news', compact('lang'));
	}

	public function yenile()
	{
		$usdNew = file_get_contents('http://www.floatrates.com/daily/USD.xml');
		Storage::disk('dataxml')->put('usd.xml', $usdNew);
		return redirect()->action('valyutaController@index');
	}
	
}



