<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Course;
use App\College;
use App\Exam;
use App\CourseEbook;
use App\CourseQuestionAnswer;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {		
		//$colleges = College::paginate(4);
        //return view('admin.college.colleges', compact('colleges'));
    }


    public function add_course(){
    	$colleges_list = College::all();
    	$exams = Exam::all()->pluck('name','id');
    	return view('admin/course/course',compact('colleges_list','exams'));
    }

    public function editcourse($id=''){
    	$colleges_list = College::all();
    	$exams = Exam::all()->pluck('name','id');
    	if($id){
    		$course_single = Course::where('id', $id)->first();
    	}
    	return view('admin/course/course',compact('colleges_list','exams','course_single'));
    }

    public function add_course_detail(Request $request){
           
    		$update_id = $request->update_id;
			$fileName = null;
		    if (request()->hasFile('brochure')) {
		        $file = request()->file('brochure');
		        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
		        $file->move(public_path('/uploads/brochure/'), $fileName);    
		    }else{
		    	$fileName = $request->old_brochure;
		    }
            
    	   $result = array();
			$arr = array(
				//"college_id" => null,
				"name" => $request->name,
				"url" => $request->url,
				"approval" => $request->approval,
				// "exam" => '1',
				"exam" => json_encode($request->exam),
				"seats" => $request->seats,
				"mode" => $request->mode,
				"total_fees" => $request->total_fees,
				"fee_details" => $request->fee_details,
				"eligibility_criteria" => $request->eligibility_criteria,
				"duration" => $request->duration,
				"brochure" => $fileName,
				"offer_by" => $request->offer_by,
				"description" => $request->description,
				'scope' => $request->scope,
			);
			$values = $this->replaceNull($arr);
			$values['seats'] = empty($values['seats']) ? 0 : $values['seats'];
			if(empty($update_id)){
            // dd($values);
            
				$chk_course = Course::create($values);
				if($chk_course){
					$result['data'] = array('status' => 'true','msg' => 'Course Added Successfully');
				}else{
					$result['data'] = array('status' => 'false','msg' => 'Some error occured');
				}
			}else{
				$update_course = Course::where('id', $update_id)->update($values);
				if($update_course){
					$result['data'] = array('status' => 'true','msg' => 'Course Update Successfully');
				}else{
					$result['data'] = array('status' => 'false','msg' => 'Some error occured');
				}				
			}
			echo json_encode($result);
    }

    public function courses(){
    	$course = Course::all();
    	return view('admin/course/course_list',compact('course'));
    }
	public function create(Request $request,$id)
    {
		$courseCount = Course::where('college_id', $id)->count();
		$search_key = College::where('id','=',$id)->get('search_key')->first();
		$seachKeyArr = json_decode($search_key['search_key'],true);
		if(isset($seachKeyArr['exam']) && is_array($seachKeyArr['exam']) && $courseCount > 1){
			if(!in_array($request->exam,$seachKeyArr['exam'])) {
				$count = count($seachKeyArr['exam']);
				$seachKeyArr['exam'][$count] = $request->exam;
			}
		} else {
			$seachKeyArr['exam'] = array(0=>$request->exam);
		}
		$valColl['search_key'] = json_encode($seachKeyArr); 
		College::where('id', $id)->update($valColl);		
		
		
		$arr = array(
			"college_id" => $id,
			"name" => $request->name,
			"url" => $request->url,
			"approval" => $request->approval,
			"exam" => $request->exam,
			"seats" => $request->seats,
			"mode" => $request->mode,
			"total_fees" => $request->total_fees,
			"fee_details" => $request->fee_details,
			"eligibility_criteria" => $request->eligibility_criteria,
			"duration" => $request->duration,
			"brochure" => $request->brochure,
			"offer_by" => $request->offer_by,
			"description" => $request->description
		);
		$values = $this->replaceNull($arr);
		Course::create($values);
		
		Session::flash('message', "Course added successfully.");
		return back();
    }
	public function edit($collegeid,$courseid)
    {
		$id = $collegeid;
		$course = Course::where('id', $courseid)->where('college_id', $collegeid)->first();
		$courses = Course::where('college_id', $collegeid)->paginate(10);
		$college = College::find($collegeid);
		$exams = Exam::all()->pluck('name','id');
		if(isset($course->id) && $course->id > 0){
			return view('admin.college.edit_course', compact('course','college','id','courses','exams'));
		} else {
			
			return "Course not found";
		}
	}
	public function update(Request $request,$collegeid, $courseid)
    {
		$courseCount = Course::where('college_id', $collegeid)->count();
		$search_key = College::where('id','=',$collegeid)->get('search_key')->first();
		$seachKeyArr = json_decode($search_key['search_key'],true);
		if(isset($seachKeyArr['exam']) && is_array($seachKeyArr['exam']) && $courseCount > 1){
			if(!in_array($request->exam,$seachKeyArr['exam'])) {
				$count = count($seachKeyArr['exam']);
				$seachKeyArr['exam'][$count] = $request->exam;
			}
		} else {
			$seachKeyArr['exam'] = array(0=>$request->exam);
		}
		$valColl['search_key'] = json_encode($seachKeyArr); 
		College::where('id', $collegeid)->update($valColl);
		
		$arr = array(
			"name" => $request->name,
			"approval" => $request->approval,
			"exam" => $request->exam,
			"seats" => $request->seats,
			"mode" => $request->mode,
			"total_fees" => $request->total_fees,
			"fee_details" => $request->fee_details,
			"eligibility_criteria" => $request->eligibility_criteria,
			"duration" => $request->duration,
			"brochure" => '',
			"offer_by" => $request->offer_by,
			"description" => $request->description
		);
		
		$values = $this->replaceNull($arr);
		Course::where('id', $courseid)->where('college_id', $collegeid)->update($values);
		
		Session::flash('message', "Course updated successfully.");
		return back();
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

	 public function destroy($id){

	    Course::where('id',$id)->delete();
	 	return redirect()->route('admin.courses')->with('success','Course Delete Successfully!');
	 }


	public function ebooks(){
    	$ebook = array();

    	$ebooks = CourseEbook::get();
    	return view('admin/course/ebooks',compact('ebook','ebooks'));
    }

    public function edit_ebooks($id2=''){
    	$ebook = CourseEbook::where('id', $id2)->first();

    	$ebooks = CourseEbook::get();
    	return view('admin/course/ebooks',compact('ebook','ebooks'));
    }

    public function add_ebook(Request $request){
		$this->validate($request, [
			'title' => 'required',
		]);
		$document = $this->uploadimage($request,"document","document");
		$ebook = $this->uploadimage($request,"ebook","ebook");
		$thumbnail = $this->uploadimage($request,"ebook","thumbnail");
		$update_id = $request->update_id; 
		$arr = array(
			'title' => $request->title,
			'content' => $request->description,
			'status' => $request->status,
			'publish_date' => $request->publish_date,
			'meta_title' => $request->meta_title,
			'meta_description' => $request->meta_description,
			'meta_keywords' => $request->meta_keywords
		);
		if($document){
			$arr['document'] = $document;
		}
		if($ebook){
			$arr['image'] = $ebook;
		}
		if($thumbnail){
			$arr['thumbnail'] = $thumbnail;
		}
		//$values = $this->replaceNull($arr);
		if($update_id){
		    $arr['slug'] = Str::slug($request->title);
			CourseEbook::where('id',$request->update_id)->update($arr);
			return back()->with('success','Ebook Update Successfully!');
		}else{
		    $arr['slug'] = Str::slug($request->title);
			CourseEbook::create($arr);
			return back()->with('success','Ebook Added Successfully!');
		}
		
	}

	public function delete_ebook($id){

		$news = CourseEbook::findOrFail($id);
		$news->delete();
		return back()->with('success','Ebook Delete Successfully!');
	}

	public function questionanswers($id=''){
    	$course = Course::where('id', $id)->first();
    	$questionanswer = array();

    	$questionanswers = CourseQuestionAnswer::where('course_id', $id)->get();
    	return view('admin/course/questionanswers',compact('course','questionanswer','questionanswers'));
    }

	public function edit_questionanswers($id='',$id2=''){
    	$course = Course::where('id', $id)->first();
    	$questionanswer = CourseQuestionAnswer::where('id', $id2)->first();

    	$questionanswers = CourseQuestionAnswer::where('course_id', $id)->get();
    	return view('admin/course/questionanswers',compact('course','questionanswer','questionanswers'));
    }

    public function add_questionanswer(Request $request){
		
		$update_id = $request->update_id;
		$arr = array(
			'question' => $request->question,
			'answer' => $request->answer,
			'status' => $request->status,
			'course_id' => $request->course_id
		);
		$values = $this->replaceNull($arr);
		if($update_id){
			CourseQuestionAnswer::where('id',$request->update_id)->update($values);
			return back()->with('success','Questiona Answer Update Successfully!');
		}else{
			CourseQuestionAnswer::create($values);
			return back()->with('success','Questiona Answer Added Successfully!');
		}
		
	}

	public function delete_questionanswer($id){

		$news = CourseQuestionAnswer::findOrFail($id);
		$news->delete();
		return back()->with('success','Questiona Answer Delete Successfully!');
	}

    private function uploadimage($request,$folder,$file){
        $destinationPath = 'uploads/'.$folder;
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

}
