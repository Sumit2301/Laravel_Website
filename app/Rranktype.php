<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rranktype extends Model
{
    //
	public $table = 'ranktype';
    protected $fillable = ["rank_type","slug","description","image"];

}
