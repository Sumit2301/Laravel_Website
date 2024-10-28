<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\College;
use App\Course;
use App\Exam;
use App\Student;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $college_data = College::select(DB::raw('COUNT(*) as total_count'))->first();
        $college_count = 0;
        if ($college_data && $college_data->total_count) {
            $college_count = $college_data->total_count;
        }

        $course_data = Course::select(DB::raw('COUNT(*) as total_count'))->first();
        $course_count = 0;
        if ($course_data && $course_data->total_count) {
            $course_count = $course_data->total_count;
        }

        $exam_data = Exam::select(DB::raw('COUNT(*) as total_count'))->first();
        $exam_count = 0;
        if ($exam_data && $exam_data->total_count) {
            $exam_count = $exam_data->total_count;
        }

        return view('admin.home',compact('college_count','course_count','exam_count'));
        //return Auth::user();
    }
    
    public function college_predictor(){
        $students            =    Student::select('id', 'name', 'mobile', 'email', 'state', 'interested_course', 'neet_all_india_overall_rank', 'miscellaneous', 'disability', 'caste', 'created_at', 'status', 'remark', 'remark_date', 'callback_request')->get();
        return view('admin.college_predictor.index', compact('students'));
    }
    
    public function remark_process(Request $request)
    {
        $id = $request->record_id;

        $inputs = array(
            'status'                =>  $request->status,
            'remark'                =>  $request->remark,
            'remark_date'           =>  $request->remark_date
        );

        Student::where('id',$id)->update($inputs);

        return response()->json(['status'=>true]);
    }
}
