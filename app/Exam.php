<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\City;
class Exam extends Model
{
	public $table = 'exams';
    protected $fillable = ["name", "url", "streams", "description","short_name","conducting_body","exam_level","Language","mode_of_application","application_fee","mode_of_exam","mode_of_counselling","exam_duration"];
	
}
