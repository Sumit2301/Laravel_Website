<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseExpertAdvice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','email','mobile','email','message','course_name','type'
    ];
}
