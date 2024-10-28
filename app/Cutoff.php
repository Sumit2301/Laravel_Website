<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cutoff extends Model
{
    protected $table = 'cutoffs';
	
	protected $fillable = ['id','college_id','description'];
}
