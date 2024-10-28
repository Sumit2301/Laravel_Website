<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseEbook extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title','content','document','course_id','status','slug','image','thumbnail','publish_date','meta_title','meta_description','meta_keywords'
    ];
}
