<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerFormEnquire extends Model
{

     protected $fillable = [
        'name', 'mobile', 'state', 'email', 'landingpage', 'status', 'remark', 'remark_date'
    ];
}