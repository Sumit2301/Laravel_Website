<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollegeVideo extends Model
{
    public $table  = 'college_videos';
    protected $fillable = ["college_id", "title", "youtube_link","status"];
}
