<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class placement extends Model
{
    protected $table = 'placements';
	
	protected $fillable = ['id','college_id','description'];

}
