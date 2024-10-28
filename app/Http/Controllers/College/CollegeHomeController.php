<?php
namespace App\Http\Controllers\College;
use App\Http\Controllers\Controller;

use App\BannerFormEnquire;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth,Hash;
use App\College;
class CollegeHomeController extends Controller
{
    public function login(){
        return view('college_panel.login');    
    }
    
    public function login_process(Request $request){
        // return Hash::make("neetcollege@123");
        
        $request->validate([
                'email'         => 'required',
                'password'      => 'required',
            ]);
            
        $credentials            =   $request->only('email', 'password');
        
           
        // if(Auth::guard('enquiry_login')->attempt($credentials)):
            
        //     return redirect()->route('college-panel', [Auth::guard('enquiry_login')->user()->url]);
        // else:
        //     return back()->with('message', 'Invalid email or password');        
        // endif;
        
        if(Auth::guard('college_login')->attempt($credentials)):
           
            return redirect()->route('college-panel', [Auth::guard('college_login')->user()->url]);
        else:
            return back()->with('message', 'Invalid email or password');        
        endif;
       
    }
    
    // public function logout(){
    //     Auth::guard('enquiry_login')->logout();
    //     return redirect()->route('enquiry-login');
    // }
    public function logout(){
        Auth::guard('college_login')->logout();
        return redirect()->route('enquiry-login');
    }
    
    public function college_enquires($college_type){
        
         
         //return $college ;
         $college = College::where('url', $college_type)->first();
       
       // $college_enquires = BannerFormEnquire::where('landingpage', $college_type)->get();
        return redirect()->route('college-panel.edit', [$college->id]);
       // return view('college_panel.colleges.index', compact('college'));
    }
    
}