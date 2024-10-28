<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = 'cities';
	
	protected $fillable = ['id','city_name','state_code','slug','content'];
	protected static function getCities($stateId){
		$res = self::where('state_code', '=', $stateId)->get();
		return $res;
	}
}
