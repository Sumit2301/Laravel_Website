<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = 'photos';
	
	protected $fillable = ['id','college_id','image','caption'];

}
