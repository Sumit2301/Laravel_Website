<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;
use Auth;

class StudentController extends Controller
{
    public function index(){
         if(Auth::guard('student')->check()):
            return view('student.dashboard');
        else:
            return redirect()->route('student_login');
        endif;
    }
         
    public function college_predictor(Request $req){
        $req->validate([
            'neet_all_india_overall_rank'                           => 'required',
            'miscellaneous'                                         => 'required',
            'disability'                                            => 'required',
            'caste'                                                 => 'required',
         ]);
        
        
        Student::where('id', Auth::guard('student')->user()->id)->update([
                            'neet_all_india_overall_rank'           => $req->neet_all_india_overall_rank,
                            'miscellaneous'                         => $req->miscellaneous,
                            'disability'                            => $req->disability,
                            'caste'                                 => $req->caste
                        ]);


        return redirect()->route('student-dashborad')->with('message', '<div class="alert alert-success">Form submitted successfully.</div>');
    }
    
    public function request_callback($id){
        Student::where('id', $id)->update(['callback_request' => 'requested']);
        return back()->with('request_callback_msg', '<div class="alert alert-success">Requested successfully.</div>');
    }
}
