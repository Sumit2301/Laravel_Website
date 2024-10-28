<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EnquiryLogin extends Authenticatable
{
    use Notifiable;
    
    protected $table    =   'enquiry_login';
        
    protected $guard = 'enquiry_login';

    protected $hidden   = [
        'password', 'remember_token',
    ];
}

?>