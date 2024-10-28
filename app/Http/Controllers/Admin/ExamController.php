<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Exam;
class ExamController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {		
		$exams = Exam::paginate(10);
        return view('admin.exam.exams', compact('exams'));
    }

	public function add_new()
    {
        return view('admin.exam.add_exam');
        //return Auth::user();
    }
	
	public function create(Request $request)
    {
		
		$urls = Exam::where('url', 'like', $request->url . '%')->orwhere('url', 'like', $request->url . '-%')->get('url');
		$urlsCount = $urls->count();
		if($urlsCount > 0){
			$url = $request->url . "-" . ($urlsCount + 1);
		} else {
			$url = $request->url;
		}
		
		$arr = array(
			"name" => $request->name,
			"url" => $url,
			"streams" => $request->streams,
			"description" => $request->description,

			"short_name" => $request->short_name,
			"conducting_body" => $request->conducting_body,
			"exam_level" => $request->exam_level,

			"Language" => $request->language,
			"mode_of_application" => $request->mode_of_application,
			"application_fee" => $request->application_fee,

			"mode_of_exam" => $request->mode_of_exam,
			"mode_of_counselling" => $request->mode_of_counselling,
			"exam_duration" => $request->exam_duration

		);
		$values = $this->replaceNull($arr);

		Exam::create($values);
		
		Session::flash('message', "Exam added successfully.");
		return back();
    }
	
	public function update(Request $request, Exam $exam,$id)
    {
		
		$reqUlr = $request->url;
		$urls = Exam::where('id', '!=', $id )->where(function($q) use ($reqUlr){
			$q->where('url', 'like', $reqUlr . '%')->orwhere('url', 'like', $reqUlr . '-%');
		})->get('url');
		$urlsCount = $urls->count();
		if($urlsCount > 0){
			$url = $request->url . "-" . ($urlsCount + 1);
		} else {
			$url = $request->url;
		}
		
		
		$arr = array(
			"name" => $request->name,
			"url" => $url,
			"streams" => $request->streams,
			"description" => $request->description,

			"short_name" => $request->short_name,
			"conducting_body" => $request->conducting_body,
			"exam_level" => $request->exam_level,

			"Language" => $request->language,
			"mode_of_application" => $request->mode_of_application,
			"application_fee" => $request->application_fee,

			"mode_of_exam" => $request->mode_of_exam,
			"mode_of_counselling" => $request->mode_of_counselling,
			"exam_duration" => $request->exam_duration

		);
		$values = $this->replaceNull($arr);
		$exam->where('id', $id)->update($values);
		
		Session::flash('message', "Exam updated successfully.");
		return back();
    }
	
	public function edit($id)
    {	
		$exam = Exam::find($id);
		return view('admin.exam.edit_exam', compact('exam','id'));
        //return Auth::user();
    }
	
	private function uploadimage($request,$file){
		$destinationPath = 'uploads/'.$file;
        $imgName='';
        //if($request->hasfile('logo')) 
        if($request->hasfile($file)) 
        { 
          $file = $request->file($file);
          $extension = $file->getClientOriginalExtension();
          $filename =time().rand(10,100).'.'.$extension;
          $file->move($destinationPath, $filename);
          $imgName = $filename;
        }
		return $imgName;
	}
	private function replaceNull($request){
			foreach($request as $key => $val){
				if(is_array($val)){
					$request[$key] = $this->replaceNull($val);
				} else {
					$request[$key] = !empty($val) ? $val : '';
				}					
			}
			return $request;
	 }
}
