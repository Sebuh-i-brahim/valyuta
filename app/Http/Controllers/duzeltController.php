<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

function objectIntoArray($arrObjData, $arrSkipIndices = array())
{
	$arrData = array();

    if (is_object($arrObjData)) {
        $arrObjData = get_object_vars($arrObjData);
    }

	    if (is_array($arrObjData)) {
	        foreach ($arrObjData as $index => $value) {
	            if (is_object($value) || is_array($value)) {
	                $value = objectIntoArray($value, $arrSkipIndices = array()); // recursive call
	            }
	            if (in_array($index, $arrSkipIndices)) {
	                continue;
	            }
	            $arrData[$index] = $value;
	        }
	    }
    return $arrData;
}

class duzeltController extends Controller
{	

	private $pul;

	private $flag;

	private $pubdate;



	public function __construct()
	{

		$usd = Storage::disk('dataxml')->get('usd.xml');
		$usd = simplexml_load_string($usd);
		$usd = objectIntoArray($usd);

		$newUSD = file_get_contents('http://www.floatrates.com/daily/USD.xml');
		$newUSD2 = simplexml_load_string($newUSD);
		$newUSD3 = objectIntoArray($newUSD2);
		$name = strtolower(preg_replace('/\s+/', '', str_replace(",","",substr($newUSD3['pubDate'],0,16)))).".xml";
		if ($usd['pubDate'][5] . $usd['pubDate'][6] != $newUSD3['pubDate'][5] . $newUSD3['pubDate'][6]){
			Storage::disk('dataxml')->put('usd.xml', $newUSD);
			file_put_contents("usdxml/".$name, $newUSD);
			file_put_contents("aznxml/".$name, file_get_contents('http://www.floatrates.com/daily/AZN.xml'));
		}

		$item = $usd["item"];
		
		$item[148] = array("targetName"=>"United States Dollar","inverseRate"=>"1","targetCurrency"=>"USD");
		$this->pubdate = $usd['pubDate'];
		for ($i=0; $i < count($item); $i++) { 
			$this->pul[$i]['targetName'] = trim(str_replace(".", "", $item[$i]["targetName"]));
			$this->pul[$i]['targetCurrency'] = $item[$i]["targetCurrency"];
			$this->pul[$i]['inverseRate'] = $item[$i]['inverseRate'];
		}
		usort($this->pul, function($a, $b) {
		    $retval = $a['targetName'] <=> $b['targetName'];
		    if ($retval == 0) {
		        $retval = $a['targetCurrency'] <=> $b['targetCurrency'];
		    }
		    return $retval;
		});

		$olke = Storage::disk('dataxml')->get('countries.json');
		$olke = json_decode($olke);
		$olke = objectIntoArray($olke);

		for ($i=0; $i < count($olke); $i++) { 
			$olke[$i]['flag'] = strtolower(trim($olke[$i]['flag']));
			$olke[$i]['ad'] = strtolower(trim($olke[$i]['ad']));
		}
		for ($i=0; $i < count($this->pul); $i++) { 
			for($d=0; $d <count($olke); $d++){
					if (strtolower($this->pul[$i]['targetName']) == $olke[$d]['ad']){
						$this->flag[$i] = '/data/'.$olke[$d]['flag'].'.svg';
					}
			}
		}
		

	}

	public function getPul()
	{		
		return $this->pul;
	}

    public function getFlag()
	{
		return $this->flag;
	}

	public function update()
	{

	}

	public function getPubdate(){
		return $this->pubdate;
	}
}
