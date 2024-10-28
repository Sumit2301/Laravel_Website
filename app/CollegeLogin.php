<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CollegeLogin extends Authenticatable
{
    use Notifiable;
    
    protected $table    =   'colleges';
        
    protected $guard    =   'college_login';

    protected $hidden   = [
        'password', 'remember_token',
    ];
}

?>