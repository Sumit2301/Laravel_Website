<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_rank extends Model
{
    //
    public $table = 'tbl_rank';
    protected $fillable = ["collegecourse_id", "rank_id", "rank_rating"];
}
