<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

use Hash, Str, Auth, Session, Mail;

class StudentAuthController extends Controller
{
    public function login_view(){
        if(Auth::guard('student')->check()):
            return redirect()->route('student-dashborad');
        else:
            return view('student.auth.login');
        endif;
        
    }

    public function registration(Request $req){
        $req->validate([
            'name'                                  => 'required',
            'mobile'                                => 'required|unique:students',
            'email'                                 => 'required|unique:students',
            'state'                                 => 'required',
            'interested_course'                     => 'required',
         ]);
        
        $password = Str::random(10);
        Student::create([
                            'name'                                  => $req->name,
                            'mobile'                                => $req->mobile,
                            'email'                                 => $req->email,
                            'state'                                 => $req->state,
                            'interested_course'                     => $req->interested_course,
                            'password'                              => Hash::make("$password"),
                        ]);
                        
        # Mail
        $msg = "Your password is $password \n Click here for login = https://www.mymedicalcourse.com/student_login";
        $msg = wordwrap($msg,70);
        mail($req->email, "Registration successfully", $msg);
        # End Mail

        return redirect()->route('student_login')->with('msg', '<div class="alert alert-success">Please check your email address for login credentials.</div>');
    }

    public function login(Request $req){
        $req->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $credentials = $req->only('email', 'password');

        if(Auth::guard('student')->attempt($credentials, $req->get('remember'))):
            return redirect('student-dashborad');
        else:
            return redirect()->back()->with('login_msg', '<div class="alert alert-danger">Incorrect email or password.</div>');
        endif;
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('student_login');
    }
}
