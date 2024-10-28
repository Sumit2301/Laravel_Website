<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseQuestionAnswer extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'question','answer','course_id','status'
    ];
}
