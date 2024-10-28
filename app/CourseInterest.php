<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseInterest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name','email','mobile','message','course_name','type'
    ];
}
