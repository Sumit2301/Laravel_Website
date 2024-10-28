<?php

namespace App\Http\Controllers\AjaxControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
class CityController extends Controller
{
 
	public function index(Request $request)
    {
		$cityid = explode(", ",$request->stateid);
        $cities = City::getCities($cityid[0]);
		$res = '<option value="">Select City</option>';
		foreach($cities as $city){
			$selected = '';
			if($request->slct == $city['id']){
				$selected = 'selected';
			}
			$res .= '<option '.$selected.' value="'.$city['id'].', '.$city['city_name'].'">'.$city['city_name'].'</option>';
		}
		return $res;
    }
}
