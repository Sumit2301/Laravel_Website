<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
    
    protected $guard = 'student';

    protected $fillable = [
        'name', 
        'mobile', 
        'email', 
        'state', 
        'interested_course', 
        'password', 
        'neet_all_india_overall_rank', 
        'miscellaneous',
        'special_quota',
        'disability',
        'caste',
        'status',
        'remark',
        'remark_date',
        'callback_request'
    ];

    protected $hidden   = [
        'password', 'remember_token',
    ];
}

?>