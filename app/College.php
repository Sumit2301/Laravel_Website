<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\City;
class College extends Model
{
	public $table = 'colleges';
    protected $fillable = ["name", "email", "password", "url", "streams", "country", "state", "city", "photo", "logo", "ownership", "genders_accepted", "approval", "rank", "campus_size", "total_faculty", "estd_year", "student_enrollments", "description","fee","degree","search_key","facilities","status","rating","brochure"];
	
	public function cityname()
    {
        return $this->hasOne('App\City','id','city')->select(['city_name','id']);
    }
	public function statename()
    {
        return $this->hasOne('App\State','id','state')->select(['state_name','id']);
    }
	public function placement()
    {
        return $this->hasOne('App\Placement','college_id','id');
    }
	public function courses()
    {
        return $this->hasMany('App\Course','college_id','id');
    }
	public function admission()
    {
        return $this->hasOne('App\Admission_process','college_id','id')->select(['description','college_id']);
    }
	public function cutoff()
    {
        return $this->hasOne('App\Cutoff','college_id','id')->select(['description','college_id']);
    }
	public function photos()
    {
        return $this->hasMany('App\Photo','college_id','id');
    }
}
