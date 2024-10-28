<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admission_process extends Model
{
    protected $table = 'admission_process';
	
	protected $fillable = ['id','college_id','description'];

}
