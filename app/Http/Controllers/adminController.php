<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Storage;

class adminController extends Controller
{

	private $language;

    public function __construct()
    {
    	$this->middleware('auth');
    	$language = Storage::disk('dataxml')->get('lang.json');
		$this->language = json_decode($language);
    }

    public function index(Request $request)
    {
    	$user = Auth::user();
    	if($request->session() !== null){
			$session = $request->session()->get('dil');
			if($session == "az"){
				$lang = $this->language->az;
			}
			elseif($session == "ru"){
				$lang = $this->language->ru;
			}
			else{
				$lang = $this->language->en;
			}
		}else{
			$lang = $this->language->en;
		}
		$path = storage_path('app/profil/'.$user->avatar);
        return view('admin.index', compact('lang','user', 'path'));
    }
}
