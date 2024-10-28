<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeCourse extends Model
{
    public $table  = 'college_courses';
    protected $fillable = ["college_id", "course_id","is_featured","course_total_fee","course_seats","course_duration","course_mode","course_approval","course_exam","description","fee_details","eligibility_criteria","scope","brochure"];
}
