<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeReview extends Model
{
    public $table  = 'college_reviews';
    protected $fillable = ["college_id", "name", "message", "rating","status"];
}
