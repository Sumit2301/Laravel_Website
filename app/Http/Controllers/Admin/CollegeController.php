<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\State;
use App\College;
use App\Placement;
use App\Cutoff;
use App\Admission_process;
use App\Photo;
use App\Course;
use App\Exam;
use App\Rranktype;
use App\CollegeCourse;
use App\Tbl_rank;
use App\News;
use App\CollegeVideo;
use App\CollegeReview;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CollegeController extends Controller
{
    //
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {		
		$colleges = College::select("colleges.*","states.state_name","cities.city_name")
		->leftJoin('states','states.id','=','colleges.state')
		->leftJoin('cities','cities.id','=','colleges.city')
		->paginate(20);
		
        return view('admin.college.colleges', compact('colleges'));
    }

	public function add_new()
    {
		$states = State::all()->pluck('state_name', 'id');
		$courselist = Course::all();
		$ranktypelist = Rranktype::all();
        return view('admin.college.add_college', compact('states','courselist','ranktypelist'));
        //return Auth::user();
    }
	
	public function create(Request $request)
    {
       
        
		$this->validate($request, [
			'logo'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'photo'            => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'collegebrochure'  => 'mimes:pdf',
		]);
		
		$urls = College::where('url', 'like', $request->url . '%')->orwhere('url', 'like', $request->url . '-%')->get('url');
		$urlsCount = $urls->count();
		if($urlsCount > 0){
			$url = $request->url . "-" . ($urlsCount + 1);
		} else {
			$url = $request->url;
		}
		$logname = $this->uploadimage($request,"logo");
		$photoname = $this->uploadimage($request,"photo");
		$collegebrochure = $this->uploadFile($request,"collegebrochure","college-brochure");
		
    	$state[0] = 0;
    	$city[0] = 0;
    	$state[1] = '';
    	$city[1] = '';
	
		if($request->country == 'india'):
    		$state = explode(", ",$request->state);
    		$city = explode(", ",$request->city);

		    $search_key_arr = ["name" => $request->name, "streams" => $request->streams, "state" => $state[1], "city"=> $city[1]];
        elseif($request->country == 'nepal'):
		    $search_key_arr = ["name" => $request->name, "streams" => $request->streams];
        endif;

		$course = $request->courses;
		$course_ids = array();
		if($course){
			foreach($course as $kk=>$row){
				$course_ids[$row['course']] = $row['course'];
			}
		}

		$course_names = array();
		$exam_names = array();
		if ($course_ids) {
			$course_data = Course::whereIn('id',$course_ids)->get();
			foreach($course_data as $row){
				if ($row->name) {
					$course_names[] = $row->name;
				}
				if ($row->exam) {
					$exams = json_decode($row->exam);

					foreach ($exams as $e) {
						$exam_names[] = $e;
					}
				}
			}
		}

		if ($course_names) {
			$course_names = array_unique($course_names);
		}

		if ($exam_names) {
			$exam_names = array_unique($exam_names);
		}

		$search_key_arr["degree"] = ($course_names)?implode(",", $course_names):"";
		$search_key_arr["exam"] = ($exam_names)?implode(",", $exam_names):"";

		$search_key = json_encode($search_key_arr);
		$arr = array(
			"name" => $request->name,
			"url" => $url,
			"streams" => $request->streams,
			"photo" => $photoname,
			"logo" => $logname,
			"country"=>$request->country,
			"brochure"=>$collegebrochure,
			"ownership" => $request->ownership,
			"genders_accepted" => $request->genders_accepted,
			"approval" => $request->approval,
			"rank" => $request->rank,
			"campus_size" => $request->campus_size,
			"total_faculty" => $request->total_faculty,
			"estd_year" => $request->estd_year,
			"fee" => $request->fee,
			"student_enrollments" => $request->student_enrollments,
			"description" => $request->description,
			"facilities" => $request->facilities,
			"specialty_services" => $request->specialty_services,
			"requirement" => $request->requirement,
			"degree" => $request->degree,
			"rating" => ($request->rating>0)?$request->rating:0,
			"search_key" => $search_key,
			"email" => $request->email,
			"password" => Hash::make($request->password),
		);
		$values = $this->replaceNull($arr);
		if($request->country == 'india'):
    		$values['state'] = $state[0];
    		$values['city'] = $city[0];
		endif;
		
		$values['featured'] = ($request->featured == 1) ? 1 : 0;
		$values['status'] = ($request->status == 1) ? 1 : 0;
		
		$create_college = College::create($values);


		if($create_college){

			$course = $request->courses;
			$college_id = $create_college->id;
			if($course){
				foreach($course as $kk=>$row){
					if($row['id']){

					}
					else {

						$brochure = $this->uploadbrochure($request,"brochure".$kk);

						$college_course = array(
							'college_id' => $college_id,
							'course_id' => $row['course'],
							'is_featured' => $row['featured'],

							'course_total_fee'        => $row['course_total_fee'],
							'course_seats'            => $row['course_seats'],
							'course_duration'         => $row['course_duration'],
							'course_mode'             => $row['course_mode'],
							'course_approval'         => $row['course_approval'],
							'course_exam'             => $row['course_exam'],
							'description'             => $row['description'],
							'fee_details'             => $row['fee_details'],
							'eligibility_criteria'    => $row['eligibility_criteria'],
							'scope' => $row['scope'],
							'brochure' => $brochure
						);
						$college_course_insert = CollegeCourse::create($college_course);

						if (isset($row['ranks'])) {

							$ranks = $row['ranks'];

							foreach ($ranks as $rr) {
								if($rr['id']){
								    
								    if(empty($rr['rank_rating'])) {
								        Tbl_rank::where('id',$rr['id'])->delete();
								    }
								    else {
    									$rank_array  = array(
    										'collegecourse_id' => $college_course_insert->id,'rank_id' => $rr['rank_id'],'rank_rating' => (!empty($rr['rank_rating']))?$rr['rank_rating']:""
    									);
    									Tbl_rank::where('id',$rr['id'])->update($rank_array);
								    }
								}
								else {
								    if(!empty($rr['rank_rating'])) {
    									$rank_array  = array(
    										'collegecourse_id' => $college_course_insert->id,'rank_id' => $rr['rank_id'],'rank_rating' => (!empty($rr['rank_rating']))?$rr['rank_rating']:""
    									);
    									Tbl_rank::create($rank_array);
								    }
								}
							}
							
						}
					}
				}				
			}

		}
		Session::flash('message', "College added successfully.");

		return redirect('admin/colleges/'.$create_college->id.'/edit');
    }
	
	public function update(Request $request, College $college,$id)
    {
		$this->validate($request, [
			'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'collegebrochure' => 'mimes:pdf',
		]);
		$reqUlr = $request->url;
		$urls = College::where('id', '!=', $id )->where(function($q) use ($reqUlr){
			$q->where('url', 'like', $reqUlr . '%')->orwhere('url', 'like', $reqUlr . '-%');
		})->get('url');
		$urlsCount = $urls->count();
		if($urlsCount > 0){
			$url = $request->url . "-" . ($urlsCount + 1);
		} else {
			$url = $request->url;
		}
		
		$logname = '';
		if($request->hasfile("logo")) {
		    if(!empty($request->oldlogo)){
    			$logo_path = base_path('uploads/logo/' . $request->oldlogo);
    			if(file_exists($logo_path)){
    			   unlink($logo_path);
    			}
		    }
			$logname = $this->uploadimage($request,"logo");
		} else {
			$logname = isset($request->oldlogo) ?  $request->oldlogo : '';
		}
		$photoname = '';
		if($request->hasfile("photo")) {
		    if(!empty($request->oldphoto)){ 
    			$photo_path = base_path('uploads/photo/' . $request->oldphoto);
    			if(file_exists($photo_path)){
    			   unlink($photo_path);
    			}
		    }
			$photoname = $this->uploadimage($request,"photo");
		} else {
			$photoname = isset($request->oldphoto) ?  $request->oldphoto : '';
		}

		$collegebrochure = '';
		if($request->hasfile("collegebrochure")) {
		    if(!empty($request->oldcollegebrochure)){ 
    			$photo_path = base_path('uploads/college-brochure/' . $request->oldcollegebrochure);
    			if(file_exists($photo_path)){
    			   unlink($photo_path);
    			}
		    }
			$collegebrochure = $this->uploadFile($request,"collegebrochure","college-brochure");
		} else {
			$collegebrochure = isset($request->oldcollegebrochure) ?  $request->oldcollegebrochure : '';
		}

		$search_key_arr = (!empty($request->search_key)) ? json_decode($request->search_key, true) : array();
		
	    $state[0] = 0;
    	$city[0] = 0;
    	$state[1] = '';
    	$city[1] = '';
	
		if($request->country == 'india'):
    		$state = explode(", ",$request->state);
    		$city = explode(", ",$request->city);

		    $search_key_arr = ["name" => $request->name, "streams" => $request->streams, "state" => $state[1], "city"=> $city[1]];
        elseif($request->country == 'nepal'):
		    $search_key_arr = ["name" => $request->name, "streams" => $request->streams];
        endif;

		
		
// 		$search_key_arr["name"] =  $request->name;
// 		$search_key_arr["streams"] = $request->streams;
// 		/*$search_key_arr["state"] = $state[1];
// 		$search_key_arr["city"] = $city[1];*/
// 		$search_key_arr["state"] = $state[0];
// 		$search_key_arr["city"] = $city[0];

		$course = $request->courses;
		$course_ids = array();
		if($course){
			foreach($course as $kk=>$row){
				$course_ids[$row['course']] = $row['course'];
			}
		}

		$course_names = array();
		$exam_names = array();
		if ($course_ids) {
			$course_data = Course::whereIn('id',$course_ids)->get();
			foreach($course_data as $row){
				if ($row->name) {
					$course_names[] = $row->name;
				}
				if ($row->exam) {
					$exams = json_decode($row->exam);

					foreach ($exams as $e) {
						$exam_names[] = $e;
					}
				}
			}
		}

		if ($course_names) {
			$course_names = array_unique($course_names);
		}

		if ($exam_names) {
			$exam_names = array_unique($exam_names);
		}

		$search_key_arr["degree"] = ($course_names)?implode(",", $course_names):"";
		$search_key_arr["exam"] = ($exam_names)?implode(",", $exam_names):"";
		
		$search_key = json_encode($search_key_arr);
		
		$arr = array(
			"name" => $request->name,
			"url" => $url,
			"streams" => $request->streams,
			"country" => $request->country,
			"photo" => $photoname,
			"logo" => $logname,
			"brochure"=>$collegebrochure,
			"ownership" => $request->ownership,
			"genders_accepted" => $request->genders_accepted,
			"approval" => $request->approval,
			"rank" => $request->rank,
			"campus_size" => $request->campus_size,
			"total_faculty" => $request->total_faculty,
			"estd_year" => $request->estd_year,
			"fee" => $request->fee,
			"student_enrollments" => $request->student_enrollments,
			"description" => $request->description,
			"facilities" => $request->facilities,
			"specialty_services" => $request->specialty_services,
			"requirement" => $request->requirement,
			"degree" => $request->degree,
			"rating" => ($request->rating>0)?$request->rating:0,
			"search_key" => $search_key
		);
		$values = $this->replaceNull($arr);
		$values['featured'] = ($request->featured == 1) ? 1 : 0;
		$values['status'] = ($request->status == 1) ? 1 : 0;
        
        if($request->country == 'india'):
    		$values['state'] = $state[0];
    		$values['city'] = $city[0];
    	else:
    		$values['state'] = 0;
    		$values['city'] = 0;
    	endif;

		if($id){
			$course = $request->courses;


			//return response()->json($course);

			//exit;

			$college_id = $id;
			if($course){
				foreach($course as $kk=>$row){
					if($row['id']){

						$brochure = $row['oldbrochure'];

						$brochure_data = $this->uploadbrochure($request,"brochure".$kk);

						if($brochure_data) {
							$brochure = $brochure_data;
						}

						$college_course = array(
							'college_id' => $college_id,
							'course_id' => $row['course'],
							'is_featured' => $row['featured'],

							'course_total_fee' => $row['course_total_fee'],
							'course_seats' => $row['course_seats'],
							'course_duration' => $row['course_duration'],
							'course_mode' => $row['course_mode'],
							'course_approval' => $row['course_approval'],
							'course_exam' => $row['course_exam'],
							'description' => $row['description'],
							'fee_details' => $row['fee_details'],
							'eligibility_criteria' => $row['eligibility_criteria'],
							'scope' => $row['scope'],
							'brochure' => $brochure

						);
						$college_course_insert = CollegeCourse::where('id',$row['id'])->update($college_course);
						
						if (isset($row['ranks'])) {

							$ranks = $row['ranks'];

							foreach ($ranks as $rr) {
								if($rr['id']){
								    
								    if(empty($rr['rank_rating'])) {
								        Tbl_rank::where('id',$rr['id'])->delete();
								    }
								    else {
								    
    									$rank_array  = array(
    										'collegecourse_id' => $row['id'],'rank_id' => $rr['rank_id'],'rank_rating' => (!empty($rr['rank_rating']))?$rr['rank_rating']:""
    									);
    									Tbl_rank::where('id',$rr['id'])->update($rank_array);
								    }
								}
								else {
								    if(!empty($rr['rank_rating'])) {
    									$rank_array  = array(
    										'collegecourse_id' => $row['id'],'rank_id' => $rr['rank_id'],'rank_rating' => (!empty($rr['rank_rating']))?$rr['rank_rating']:""
    									);
    									Tbl_rank::create($rank_array);
								    }
								}
							}

						}

					}
					else {

						$brochure = $this->uploadbrochure($request,"brochure".$kk);

						$college_course = array(
							'college_id' => $college_id,
							'course_id' => $row['course'],
							'is_featured' => $row['featured'],

							'course_total_fee' => $row['course_total_fee'],
							'course_seats' => 	$row['course_seats'],
							'course_duration' => $row['course_duration'],
							'course_mode' => $row['course_mode'],
							'course_approval' => $row['course_approval'],
							'course_exam' => $row['course_exam'],
							'description' => $row['description'],
							'fee_details' => $row['fee_details'],
							'eligibility_criteria' => $row['eligibility_criteria'],
							'scope' => $row['scope'],
							'brochure' => $brochure
						);
						$college_course_insert = CollegeCourse::create($college_course);

						if (isset($row['ranks'])) {

							$ranks = $row['ranks'];

							foreach ($ranks as $rr) {
								if($rr['id']){
									$rank_array  = array(
										'collegecourse_id' => $college_course_insert->id,'rank_id' => $rr['rank_id'],'rank_rating' => $rr['rank_rating']
									);
									Tbl_rank::where('id',$rr['id'])->update($rank_array);
								}
								else {
									$rank_array  = array(
										'collegecourse_id' => $college_course_insert->id,'rank_id' => $rr['rank_id'],'rank_rating' => $rr['rank_rating']
									);
									Tbl_rank::create($rank_array);
								}
							}
							
						}

						/*if($college_course_insert){
							 $collegecourseid = $college_course_insert->id;
							for($ci = 0; $ci<count($row['total_rank']);$ci++){
								$rank_detail = array(
									'collegecourse_id' =>$collegecourseid,
									'rank_id' => $row['total_rank_id'][$ci],
									'rank_rating' => $row['total_rank'][$ci]
								);
								$college_course_insert = Tbl_rank::create($rank_detail);
							}
						}*/


					}
				}				
			}

		}
		$college->where('id', $id)->update($values);
		Session::flash('message', "College updated successfully.");
		return back();
    }
	
	public function edit($id,$option='',$id2='')
    {	
		if($option == 'blog'){			
			
			$college = College::find($id);
			$news = News::where('college_id',$id)->get();
			return view('admin.college.edit_college', compact('college','id','news'));
		}
		else if($option == 'admission-process'){
			$college = College::find($id);
			$data = Admission_process::where('college_id', $id)->first();
			return view('admin.college.admission_process', compact('college','id','data'));
		}
		else if($option == 'courses-fee'){			
			
			$college = College::find($id);
			$courses = Course::where('college_id', $id)->paginate(10);
			$exams = Exam::all()->pluck('name','id');
			return view('admin.college.course_fee', compact('college','id','courses','exams'));
			//return compact('college','id','courses','exams');
		}
		else if($option == 'cutoff'){			
			
			$college = College::find($id);
			$data = Cutoff::where('college_id', $id)->first();
			return view('admin.college.cutoff', compact('college','id','data'));
		}
		else if($option == 'placements'){			
			
			$college = College::find($id);
			$data = Placement::where('college_id', $id)->first();
			return view('admin.college.placement', compact('college','id','data'));
		}
		else if($option == 'photos'){			
			
			$college = College::find($id);
			$data = Photo::where('college_id', $id)->get(); 
			return view('admin.college.photos', compact('college','id','data'));
		}
		else if($option == 'blogs'){			
			
			$college = College::find($id);
			$news = News::where('college_id',$id)->get();
			$editnews = array();
			$uid = $id2;
			if($id2){
				$editnews = News::where('id',$id2)->first();
			}
			return view('admin.college.blogs', compact('college','id','news','editnews','uid'));
		} 
		else if($option == 'videos'){			
			
			$college = College::find($id);
			$news = CollegeVideo::where('college_id',$id)->get();
			$collegevideo = array();
			$uid = $id2;
			if($id2){
				$collegevideo = CollegeVideo::where('id',$id2)->first();
			}
			return view('admin.college.videos', compact('college','id','news','collegevideo','uid'));
		}
		else if($option == 'reviews'){			
			
			$college = College::find($id);
			$news = CollegeReview::where('college_id',$id)->get();
			$collegereview = array();
			$uid = $id2;
			if($id2){
				$collegereview = CollegeReview::where('id',$id2)->first();
			}
			return view('admin.college.reviews', compact('college','id','news','collegereview','uid'));
		}
		else {
			$states = State::all()->pluck('state_name', 'id');
			$college = College::find($id);
			if(isset($college->id) && $college->id > 0){
				$courselist = Course::all();
				$ranktypelist = Rranktype::all();
				$tblrank = Tbl_rank::all();
				$college_course_detail = CollegeCourse::select('*')->where('college_id',$id)->get();

				foreach ($college_course_detail as $row) {

					$rid = $row->id;

					$rank_data = Rranktype::select('tbl_rank.id','rank_rating','ranktype.rank_id','rank_type')
					->leftJoin('tbl_rank', function($join) use ($rid)
					{
					    $join->on('tbl_rank.rank_id', '=', 'ranktype.rank_id');
					    $join->where('tbl_rank.collegecourse_id','=', $rid);
					})
					->get();
					$ranks = array();
					foreach ($rank_data as $rr) {
						$rr->rid = ($rr->id)?$rr->id:'';
						$rr->rank_rating = ($rr->rank_rating)?$rr->rank_rating:'';
						$rr->rank_id = ($rr->rank_id)?$rr->rank_id:'';
						$rr->rank_type = ($rr->rank_type)?$rr->rank_type:'';

						$ranks[] = array(
							'id'=>$rr->rid,
							'rank_rating'=>$rr->rank_rating,
							'rank_id'=>$rr->rank_id,
							'rank_type'=>$rr->rank_type
						);
					}
					$row->ranks = ($ranks)?$ranks:array();
				}
				//return response()->json($college_course_detail);
				//print_r($college_course_detail);exit;
				return view('admin.college.edit_college', compact('states','college','id','courselist','ranktypelist','college_course_detail','tblrank'));
				//return compact('states','college','id','exams');
			} else {
				$colleges = College::all();
				return view('admin.college.colleges', compact('colleges'));
			}
			
		}
        //return Auth::user();
    }
	
	public function placement(Request $request,$id)
    {
		$this->validate($request, [
			'description' => 'required'
		]);
		$data = Placement::where('college_id', $id)->first();
		if(!isset($data['id']) || empty($data['id'])){
			$arr = array(
				"description" => $request->description,
				"college_id" => $id
			);
			$values = $this->replaceNull($arr);
			Placement::create($values);			
		} else {
			$values = array(
				"description" =>$request->description
			);
			Placement::where('college_id', $id)->update($values);
		}
		
		Session::flash('message', "Placement Updated Successfully.");
		return back();
    }
	
	public function cutoff(Request $request,$id)
    {
		$this->validate($request, [
			'description' => 'required'
		]);
		$data = Cutoff::where('college_id', $id)->first();
		if(!isset($data['id']) || empty($data['id'])){
			$arr = array(
				"description" => $request->description,
				"college_id" => $id
			);
			$values = $this->replaceNull($arr);
			Cutoff::create($values);			
		} else {
			$values = array(
				"description" =>$request->description
			);
			Cutoff::where('college_id', $id)->update($values);
		}
		
		Session::flash('message', "Cutoff Updated Successfully.");
		return back();
    }
	
	public function admission(Request $request,$id)
    {
		$this->validate($request, [
			'description' => 'required'
		]);
		$data = Admission_process::where('college_id', $id)->first();
		if(!isset($data['id']) || empty($data['id'])){
			$arr = array(
				"description" => $request->description,
				"college_id" => $id
			);
			$values = $this->replaceNull($arr);
			Admission_process::create($values);			
		} else {
			$values = array(
				"description" =>$request->description
			);
			Admission_process::where('college_id', $id)->update($values);
		}
		
		Session::flash('message', "Admission Process Updated Successfully.");
		return back();
    }
	
	public function photos(Request $request,$id)
    {
		$request->validate([
		  'caption' => 'required',
		  'imageFile' => 'required',
		  'imageFile.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
		]);
		$captions = $request->caption;
		foreach($request->imageFile as $k => $imageFile){
			
			$destinationPath = 'uploads/photos';
			$extension = $imageFile->getClientOriginalExtension();
			$filename =time().rand(10,100).'.'.$extension;
			$imageFile->move($destinationPath, $filename);
			
			$arr = array(
				"caption" => $captions[$k],
				"image" => $filename,
				"college_id" => $id
			);
			$values = $this->replaceNull($arr);
			Photo::create($values);
		}
		
		Session::flash('message', "Photos Updated Successfully.");
		return back();
    }
	
	public function photoDel(Request $request,$id,$imgId){
		Photo::where('college_id',$id)->where('id',$imgId)->delete();
		$photo_path = base_path('uploads/photos/' . $request->deleteImg);
		if(file_exists($photo_path)){
		   unlink($photo_path);
		}
		return back();
	}

	public function add_news(Request $request){
		$this->validate($request, [
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);
		$image = $this->uploadimage($request,"news");
		$update_id = $request->update_id;
		$arr = array(
			'title' => $request->title,
			'content' => $request->description,
			'status' => $request->status,
			'college_id' => $request->college_id
		);
		
        $arr['slug'] = Str::slug($request->slug);
        
		if($image){
			$arr['image'] = $image;
		}
		$values = $this->replaceNull($arr);
		if($update_id){
			News::where('id',$request->update_id)->update($values);
			return back()->with('success','News Update Successfully!');
		}else{
			News::create($values);
			return back()->with('success','News Added Successfully!');
		}
		
	}

	public function delete_news($id){

		$news = News::findOrFail($id);
		$news->delete();
		return back()->with('success','News Delete Successfully!');
	}

	public function add_video(Request $request){

		$this->validate($request, [
			'title' => 'required',
		]);
		$update_id = $request->update_id;
		$arr = array(
			'title' => $request->title,
			'youtube_link' => $request->youtube_link,
			'status' => $request->status,
			'college_id' => $request->college_id
		);
		$values = $this->replaceNull($arr);
		if($update_id){
			CollegeVideo::where('id',$request->update_id)->update($values);
			return back()->with('success','Youtube Video Update Successfully!');
		}else{
			CollegeVideo::create($values);
			return back()->with('success','Youtube Video Added Successfully!');
		}
		
	}

	public function delete_video($id){

		$collegevideo = CollegeVideo::findOrFail($id);
		$collegevideo->delete();
		return back()->with('success','News Youtube Video Successfully!');
	}

	public function add_review(Request $request){

		$this->validate($request, [
			'name' => 'required',
			'rating' => 'required',
			'message' => 'required',
		]);
		$update_id = $request->update_id;
		$arr = array(
			'name' => $request->name,
			'message' => $request->message,
			'rating' => $request->rating,
			'status' => $request->status,
			'college_id' => $request->college_id
		);
		//$values = $this->replaceNull($arr);
		if($update_id){
			CollegeReview::where('id',$request->update_id)->update($arr);
			return back()->with('success','Review Update Successfully!');
		}else{
			CollegeReview::create($arr);
			return back()->with('success','Review Added Successfully!');
		}
		
	}

	public function delete_review($id){

		$collegereview = CollegeReview::findOrFail($id);
		$collegereview->delete();
		return back()->with('success','News Review Successfully!');
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

	private function uploadbrochure($request,$file){
		$destinationPath = 'uploads/brochure/';
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

	private function uploadFile($request,$file,$folder){
		$destinationPath = 'uploads/'.$folder.'/';
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

	public function delete_course(Request $request){
		$id = $request->id;
		CollegeCourse::where('id',$id)->delete();
		Session::flash('message', "College Delete successfully.");
		return  response()->json(['status' => 'true']);
	} 

}
