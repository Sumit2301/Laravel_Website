<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title','content','slug','image','status','thumbnail','publish_date','meta_title','meta_description','meta_keywords'
    ];
}
