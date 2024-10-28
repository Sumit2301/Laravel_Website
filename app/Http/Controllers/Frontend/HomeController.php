<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\College;
use App\Exam;
use App\City;
use App\Course;
use App\Rranktype;
use App\CollegeCourse;
use App\Blog;
use App\Article;
use DB;
use App\CourseEbook;
use App\CourseQuestionAnswer;
use App\CourseInterest;
use App\CourseExpertAdvice;
use App\DownloadBrochure;
use App\Video;
use App\Contact;
use App\Newsletter;
use App\BannerFormEnquire;

use Illuminate\Support\Str;
use Artisan;
class HomeController extends Controller
{

	public function clearCache()
    {
    	Artisan::call('view:clear');
    	Artisan::call('route:clear');
    	Artisan::call('config:clear');
		return 'Cache Cleared';
    }

    public function site()
    {
    	header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		
		$courses = Course::all();

		foreach ($courses as $row) {
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			->where('is_featured','1')
			->take(4)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();

        return view('frontend.site', compact('colleges','exams','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    
    
    
    public function mbbs2022()
    {
    	header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		$examsall = Exam::all();
		$courses = Course::all()->whereIn('id',  [19,22,23]);

		foreach ($courses as $row) {
		    if($row->id==19){ $rr=8; }else{$rr=4;}
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			//->where('is_featured','1')
			->take($rr)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();

        return view('frontend.mbbs2022', compact('colleges','exams','examsall','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    
    # Nepal
    public function nepal()
    {
    	header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		$examsall = Exam::all();
		$courses = Course::all()->whereIn('id',  [19]);

		foreach ($courses as $row) {
		    if($row->id==19){ $rr=8; }else{$rr=4;}
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			//->where('is_featured','1')
			->where('colleges.country', 'nepal')
			->take($rr)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('college_courses.is_featured','1')
		->where('colleges.country', 'nepal')
		->get();
        
        return view('frontend.nepal', compact('colleges','exams','examsall','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    # End nepal
    
    
    public function bds2022()
    {
    	header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		$examsall = Exam::all();
		$courses = Course::all()->whereIn('id',  [22]);

		foreach ($courses as $row) {
		   // if($row->id==19){ $rr=8; }else{$rr=4;}
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			//->where('is_featured','1')
			->take(8)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();

        return view('frontend.mbbs2022', compact('colleges','exams','examsall','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    
    
    
    public function bams2022()
    {
    	header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		$examsall = Exam::all();
		$courses = Course::all()->whereIn('id',  [23,25]);

		foreach ($courses as $row) {
		    //if($row->id==19){ $rr=8; }else{$rr=4;}
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			//->where('is_featured','1')
			->take(8)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();

        return view('frontend.mbbs2022', compact('colleges','exams','examsall','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    
    
    

    public function get_youtube_id_from_url($url)
	{
	    if (stristr($url,'youtu.be/'))
	        {preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
	    else 
	        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
	}

	public function courses(Request $request)
    {

		$option = "rank";

		$courses = Course::all();

		foreach ($courses as $row) {
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			->where('is_featured','1')
			->take(4)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}
        return view('frontend.courses', compact('courses','option'));
	}

    public function index()
    {

		header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();

		$courses = Course::all();

		foreach ($courses as $row) {
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
			->Join('colleges','colleges.id','=','college_courses.college_id')
			->where('college_courses.course_id',$row->id)
			->where('is_featured','1')
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail;
		}

		$blogs = Blog::where('status',1)->paginate(3);
		$articles = Article::where('status',1)->paginate(3);
		$ebooks = CourseEbook::where('status',1)->paginate(3);

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();

        return view('frontend.home', compact('colleges','exams','course_list','state','courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks'));
		//return compact('colleges','exams');
    }
	
	public function search(Request $request)
    {
		//$colleges = College::with('cityname')->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee'])->simplePaginate(3);
		$colle = College::with('cityname')->orderBy('featured', 'desc');

		if(isset($request->college) && !empty($request->college)){
			$colle = $colle->where('search_key','like','%'.$request->college.'%');
		}

		if(isset($request->state) && !empty($request->state)){
			$colle = $colle->where('search_key','like','%'.$request->state.'%');
		}
		if(isset($request->city) && !empty($request->city)){
			$colle = $colle->where('search_key','like','%'.$request->city.'%');
		}

		if(isset($request->exam) && !empty($request->exam)){
			$colle = $colle->where('search_key','like','%'.$request->exam.'%');
		}
		if(isset($request->degree) && !empty($request->degree)){
			$colle = $colle->where('search_key','like','%'.$request->degree.'%');
		}
		if(isset($request->search) && !empty($request->search)){
			$colle = $colle->where('search_key','like','%'.$request->search.'%');
		}
		$colleges = $colle->Paginate(18,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','brochure','rating']);
		
		$state = State::all();		
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();
        return view('frontend.colleges', compact('colleges','exams','state','course_list'));
		//return compact('colleges');
		//return $request
		
	}

	public function videos(Request $request)
    {
		$videos = Video::where('status',1);
		$videos = $videos->Paginate(12);
		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}
        return view('frontend.youtube_videos', compact('videos'));
	}

	public function blogs(Request $request)
    {
		$blog = Blog::where('status',1);
		$blogs = $blog->Paginate(12);
        return view('frontend.blogs', compact('blogs'));
	}

	public function exams(Request $request)
    {
		$exams = Exam::select('*');
		$exams = $exams->Paginate(12);
        return view('frontend.exams', compact('exams'));
	}

	public function contact_us(Request $request)
    {
		$exams = Exam::select('*');
		$exams = $exams->Paginate(12);
		
		$state_list         = State::select('id','state_name')->get();
        return view('frontend.contact_us', compact('exams','state_list'));
	}

	public function exam_details($url)
    {
		$exam_details = Exam::select('*')->where('url',$url)->first();
		if (!$exam_details) {
			return redirect('/');
		}
        return view('frontend.exam_details', compact('exam_details'));
	}


	public function blog_detail($slug)
    {
		$blog = Blog::where('status',1)->where('slug',$slug)->first();

		$blogs = Blog::where('status',1)->whereNotIn('id',[$blog->id])->get()->take(8);

        return view('frontend.blog_detail', compact('blog','blogs'));
	}

	public function city_detail($slug)
    {
		$city = DB::table("cities")->where('slug',$slug)->first();
        return view('frontend.city_detail', compact('city'));
	}

	public function articles(Request $request)
    {
		$article = Article::where('status',1);
		$articles = $article->Paginate(12);
        return view('frontend.articles', compact('articles'));
	}

	public function article_detail($slug)
    {
		$article = Article::where('status',1)->where('slug',$slug)->first();

		$articles = Article::where('status',1)->whereNotIn('id',[$article->id])->get()->take(8);
        return view('frontend.article_detail', compact('article','articles'));
	}

	public function ebooks(Request $request)
    {
		$ebook = CourseEbook::where('status',1);
		$ebooks = $ebook->Paginate(12);
        return view('frontend.ebooks', compact('ebooks'));
	}

	public function ebook_detail($slug)
    {
		$ebook = CourseEbook::where('status',1)->where('slug',$slug)->first();
		$ebooks = CourseEbook::where('status',1)->whereNotIn('id',[$ebook->id])->get()->take(8);
        return view('frontend.ebook_detail', compact('ebook','ebooks'));
	}

	public function getCity(Request $request){
		//$cities = City::getCities($request->id);
		$cities = City::select('cities.id','cities.city_name')->join("colleges","colleges.city","=","cities.id")->distinct('colleges.city')->where('state_code', '=', $request->id)->get();
		foreach($cities as $city){
			echo "<option value=".$city->city_name.">".$city->city_name."</option>";
		}
	}

	public function ranklist(Request $request){
		$id = $request->id;
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$id)
		->get();

/*$qry = "select `college_courses`.`course_id`,`college_courses`.`college_id`, COUNT(ranktype.rank_id) AS college_count,ranktype.rank_type from `tbl_rank` inner join `ranktype` on `ranktype`.`rank_id` = `tbl_rank`.`rank_id` inner join `college_courses` on `college_courses`.`id` = `tbl_rank`.`collegecourse_id` inner join `courses` on `courses`.`id` = `college_courses`.`course_id` group by college_courses.college_id Having college_courses.course_id = $id";

$rank_data = DB::select(DB::raw($qry));*/

		$course = Course::select('id','eligibility_criteria')->where('id',$request->id)->first();
		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$id)
		->where('is_featured','1')
		->get();
		if($course){
			return view('frontend.ranklist',compact('rank_data','course','course_detail'));	
		}else{
			echo "<h2>Any Type Of Rank Not Given Yet!</h2>";
		}	
	}

	public function getcourse_detail(Request $request){

		$course_id = $request->id;

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$default_course_url = $course->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('is_featured','1')
		->get();
		if($course){
			return view('frontend.home_course_detail',compact('default_course_url','course','course_detail','rank_data','option'));	
		}else{
			echo "<h2>Any Type Of Rank Course Not Added Yet!</h2>";
		}	
	}

	public function get_top_destination(Request $request){
		$id = $request->id;
		$top_destination = CollegeCourse::select('colleges.name as college_name','states.state_name')
		->join('colleges','colleges.id','=','college_courses.college_id')
		->Join('states','states.id','=','colleges.state')			
		->where('college_courses.course_id',$id)
		->distinct('states.state_name')
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope')->where('id',$request->id)->first();
		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url as clg_url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$id)
		->where('is_featured','1')
		->distinct('college_courses.college_id')
		->get();
		if($top_destination){
			return view('frontend.topdestination',compact('course','course_detail','top_destination'));	
		}else{
			echo "<h2>Any Type Of Destination Not Given Yet!</h2>";
		}			
	}



	public function get_course_exam(Request $request){
		$id = $request->id;

		$course = Course::select('id','eligibility_criteria','description','scope','exam')->where('id',$request->id)->first();
		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$id)
		->where('is_featured','1')
		->distinct('college_courses.college_id')
		->get();
		if($course){
			return view('frontend.course_exams',compact('course','course_detail'));	
		}else{
			echo "<h2>Any Type Of Exam Not Given Yet!</h2>";
		}			
	}

	public function top_study_destination($slug)
    {
    	$top_destination_state = DB::table("states")->select('id','state_name')
		->where('slug',$slug)
		->first();

		if (!$top_destination_state) {
			return redirect('');
		}

		$title = "Top Colleges In ".$top_destination_state->state_name;
		$colle = College::with('cityname')
		->join('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('states','states.id','=','colleges.state')
		->leftJoin('cities','cities.id','=','colleges.city')		
		->where('colleges.state',$top_destination_state->id)
		//->where('college_courses.course_id',$course->id)
		->orderBy('featured', 'desc');

		$colleges = $colle->Paginate(10,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','state_name','city_name','cities.slug as city_slug','colleges.rating']);
        return view('frontend.course_colleges', compact('colleges','title'));

    }

    public function rank($slug)
    {
    	$ranktype_detail = DB::table("ranktype")->select('rank_id','rank_type')
		->where('slug',$slug)
		->first();

		if (!$ranktype_detail) {
			return redirect('');
		}

		$title = "Top ".$ranktype_detail->rank_type." Ranking Colleges";
		$colle = College::with('cityname')
		->join('college_courses','college_courses.college_id','=','colleges.id')
		->join('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')	
		->leftJoin('states','states.id','=','colleges.state')
		->leftJoin('cities','cities.id','=','colleges.city')
		->where('tbl_rank.rank_id',$ranktype_detail->rank_id)
		//->where('college_courses.course_id',$course->id)
		->orderBy('featured', 'desc');

		$colleges = $colle->Paginate(10,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','state_name','city_name','cities.slug as city_slug','colleges.rating']);
        return view('frontend.course_colleges', compact('colleges','title'));

    }

	public function course($course_url,$option=null,$option_url=null)
    {

		$course = Course::select('id','eligibility_criteria','fee_details','description','scope','url','exam','name')->where('url',$course_url)->first();

		if ($option=="colleges") {
			$colle = College::with('cityname')
			->join('college_courses','college_courses.college_id','=','colleges.id')
			->leftJoin('states','states.id','=','colleges.state')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$course->id)
			->orderBy('is_featured', 'desc');
			$title = $course->name." Colleges";
			$colleges = $colle->Paginate(10,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','state_name','city_name','cities.slug as city_slug','colleges.rating']);
	        return view('frontend.course_colleges', compact('colleges','title'));
		}
		else {

			$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.photo','colleges.logo','city_name')
			->Join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$course->id)
			->where('is_featured','1')
			->get();

			$rank_data = array();
			$ranktype_detail = array();
			$ranktype_colleges = array();
			$top_destinations = array();
			$top_destination_state = array();
			$top_destination_colleges = array();
			$ebooks = array();
			$questionanswers = array();
			$exams = array();
			$exam_details = array();

			if ($option=="rank" && !$option_url) {
				$rank_data_list = DB::table("tbl_rank")->select('ranktype.rank_type','ranktype.slug','tbl_rank.rank_id','tbl_rank.rank_rating','ranktype.image','ranktype.description')
				->join('college_courses','college_courses.id','=','tbl_rank.collegecourse_id')
				->join('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
				->where('college_courses.course_id',$course->id)
				->get();

				foreach ($rank_data_list as $row) {
					$rank_data[$row->rank_id] = $row;
				}
			}
			else if ($option=="rank" && $option_url) {

				/*$ranktype_detail = DB::table("ranktype")->select('rank_id','rank_type')
				->where('slug',$option_url)
				->first();

				if (!$ranktype_detail) {
					return redirect('');
				}

				$ranktype_colleges = CollegeCourse::select('colleges.name as college_name','colleges.url')
				->join('colleges','colleges.id','=','college_courses.college_id')
				->join('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')			
				->where('college_courses.course_id',$course->id)			
				->where('tbl_rank.rank_id',$ranktype_detail->rank_id)
				->distinct('colleges.name')
				->get();*/

				$ranktype_detail = DB::table("ranktype")->select('rank_id','rank_type')
				->where('slug',$option_url)
				->first();

				if (!$ranktype_detail) {
					return redirect('');
				}

				$title = "Top ".$ranktype_detail->rank_type." Ranked ".$course->name." Colleges";
				$colle = College::with('cityname')
				->join('college_courses','college_courses.college_id','=','colleges.id')
				->join('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')	
				->leftJoin('states','states.id','=','colleges.state')
				->leftJoin('cities','cities.id','=','colleges.city')
				->where('tbl_rank.rank_id',$ranktype_detail->rank_id)
				->where('college_courses.course_id',$course->id)
				->orderBy('tbl_rank.rank_rating', 'asc');

				$colleges = $colle->Paginate(10,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','state_name','city_name','cities.slug as city_slug','colleges.rating','colleges.rating','tbl_rank.rank_rating']);

				return view('frontend.course_colleges', compact('colleges','title'));
			}
			else if ($option=="top-study-destination" && !$option_url) {

				$top_destination_list = CollegeCourse::select('colleges.name as college_name','states.state_name','states.slug','states.id')
				->join('colleges','colleges.id','=','college_courses.college_id')
				->Join('states','states.id','=','colleges.state')			
				->where('college_courses.course_id',$course->id)
				->distinct('states.state_name')
				->get();

				foreach ($top_destination_list as $row) {
					$top_destinations[$row->id] = $row;
				}
			}
			else if ($option=="top-study-destination" && $option_url) {

				$top_destination_state = DB::table("states")->select('id','state_name')
				->where('slug',$option_url)
				->first();

				if (!$top_destination_state) {
					return redirect('');
				}

				/*$top_destination_colleges = CollegeCourse::select('colleges.name as college_name','colleges.url')
				->join('colleges','colleges.id','=','college_courses.college_id')
				->Join('states','states.id','=','colleges.state')			
				->where('college_courses.course_id',$course->id)			
				->where('colleges.state',$top_destination_state->id)
				->distinct('colleges.name')
				->get();*/

				$title = "Top Colleges In ".$top_destination_state->state_name;
				$colle = College::with('cityname')
				->join('college_courses','college_courses.college_id','=','colleges.id')
				->leftJoin('states','states.id','=','colleges.state')
				->leftJoin('cities','cities.id','=','colleges.city')		
				->where('colleges.state',$top_destination_state->id)
				//->where('college_courses.course_id',$course->id)
				->orderBy('featured', 'desc');

				$colleges = $colle->Paginate(10,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','state_name','city_name','cities.slug as city_slug','colleges.rating']);
		        return view('frontend.course_colleges', compact('colleges','title'));
			}
			else if ($option=="ebooks") {
				$ebooks = CourseEbook::select('*')
				->where('course_id',$course->id)
				->get();
			}
			else if ($option=="questions-and-anwsers") {
				$questionanswers = CourseQuestionAnswer::select('*')
				->where('course_id',$course->id)
				->get();
			}
			else if ($option=="exams" && !$option_url) {
				if ($course->exam) {
					$exam = (array) json_decode($course->exam);
					if ($course->exam) {
						$exams = Exam::select('id','name','url','description')
						->whereIn('name',$exam)
						->get();
					}
				}
			}
			else if ($option=="exams" && $option_url) {

				$exam_details = DB::table("exams")->select('*')
				->where('url',$option_url)
				->first();

				if (!$exam_details) {
					return redirect('');
				}
			}

	        return view('frontend.course_detail', compact('course','rank_data','course_detail','option','option_url','top_destinations','top_destination_state','top_destination_colleges','ebooks','questionanswers','ranktype_detail','ranktype_colleges','exams','exam_details'));
	    }
	}

	public function showinterest(Request $request){
		$inputs = $request->all();
		$inputs['status'] = 1;
		CourseInterest::create($inputs);

		$to = env('ENQUIRY_EMAIL');
		$from = env('MAIL_FROM_ADDRESS'); 
		$subject = "Show Interest Enquiry"; 
		$html = "Hello";
		$html .= "<br>";
		$html .= "Course Name:".$request->course_name;
		$html .= "<br>";
		$html .= "Name:".$request->name;
		$html .= "<br>";
		$html .= "Email:".$request->email;
		$html .= "<br>";
		$html .= "Mobile:".$request->mobile;
		$html .= "<br>";
		$html .= "Message:".$request->message;
    	sendMail($to,$from,$subject,$html);

		return response()->json(['status' =>true, 'message' => 'Thank you for your interest.']);
	}

	public function newsletter(Request $request){
		$inputs = $request->all();
		$inputs['status'] = 1;
		Newsletter::create($inputs);
		return response()->json(['status' =>true, 'message' => 'Thank you for subscribe.']);
	}

	public function expertadvice(Request $request){
		$inputs = $request->all();
		$inputs['status'] = 1;
		CourseExpertAdvice::create($inputs);

		$to = env('ENQUIRY_EMAIL');
		$from = env('MAIL_FROM_ADDRESS'); 
		$subject = "Free Expert Advice Enquiry"; 
		$html = "Hello";
		$html .= "<br>";
		$html .= "Course Name:".$request->course_name;
		$html .= "<br>";
		$html .= "Name:".$request->name;
		$html .= "<br>";
		$html .= "Email:".$request->email;
		$html .= "<br>";
		$html .= "Mobile:".$request->mobile;
		$html .= "<br>";
		$html .= "Message:".$request->message;
    	sendMail($to,$from,$subject,$html);

		return response()->json(['status' =>true, 'message' => 'Thank you for your interest.']);
	}
	public function contact_process(Request $request){
		$inputs = $request->all();
		$inputs['status'] = 1;
		Contact::create($inputs);

		$to = env('ENQUIRY_EMAIL');
		$from = env('MAIL_FROM_ADDRESS'); 
		$subject = "Contact Enquiry"; 
		$html = "Hello";
		$html .= "<br>";
		$html .= "Name:".$request->name;
		$html .= "<br>";
		$html .= "Email:".$request->email;
		$html .= "<br>";
		$html .= "Mobile:".$request->mobile;
		$html .= "<br>";
		$html .= "Subject:".$request->subject;
		$html .= "<br>";
		$html .= "Message:".$request->message;
    	sendMail($to,$from,$subject,$html);

		return response()->json(['status' =>true, 'message' => 'Thank you for your contact us.']);
	}
	public function collegebrochure_request(Request $request){
		$inputs = $request->all();
		$inputs['status'] = 1;
		DownloadBrochure::create($inputs);
		$msg = "Thank you for your Download Brochure. <br><a id='d-brochure' class='btn btn-dark btn-sm mt-3' href='".asset('uploads/college-brochure/'.$request->brochure)."' download='' >Download Brochure</a>";
		return response()->json(['status' =>true, 'message' =>$msg]);
	}
	
	public function banner_form(Request $req){
	    
	    
	    $req->validate([
	            'name'          => 'required',
	            'mobile'        => 'required|numeric|digits:10',
	            'email'    		=> 'required'
	        ]);
	   
	   $data        =   $req->all();
	   BannerFormEnquire::create($data);
	   
	   return redirect()->back()->with('form_msg', "<div class='alert alert-success'>Form submitted successfully. </div>");
	}
	
	public function student_neet_form(){
        return view('frontend.student_neet_form');
    }

	public function     student_neet_signup_form(Request $request){
	    $states             =   State::get();
        $courses            =   Course::get();
        return view('frontend.student_neet_signup_form', compact('states', 'courses'));
    }
    
    # Nepal
    public function nepal_new(){
        header('Content-Type: application/json');
		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id','19')
		->get();

		//$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$colleges = College::with('cityname')->where('featured','=','1')->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee']);
		$exams = Exam::all()->pluck('name','id');
		$course_list = Course::select('name','id')->get();

		$state = State::select('states.id','states.state_name')->join("colleges","colleges.state","=","states.id")->distinct('colleges.state')->get();
        $state_list         = State::select('id','state_name')->get();
		$examsall = Exam::all();
		$courses = Course::all()->whereIn('id',  [19]);

		foreach ($courses as $row) {
		    if($row->id==19){ $rr=8; }else{$rr=4;}
			$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$row->id)->first();

			$course_detail_row = DB::table('college_courses')->select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url','colleges.logo','colleges.photo','cities.city_name')
			->join('colleges','colleges.id','=','college_courses.college_id')
			->leftJoin('cities','cities.id','=','colleges.city')
			->where('college_courses.course_id',$row->id)
			//->where('is_featured','1')
			->where('colleges.country', 'nepal')
			->take($rr)
			->get();

			$row->course = $course;
			$row->course_detail = $course_detail_row;
		}

		$blogs = Blog::where('status',1)->paginate(8);
		$articles = Article::where('status',1)->paginate(8);
		$ebooks = CourseEbook::where('status',1)->paginate(8);
		$videos = Video::where('status',1)->paginate(4);

		if ($videos) {
			foreach ($videos as $row) {
				$row->url = "https://www.youtube.com/embed/".$this->get_youtube_id_from_url($row->url);
			}
		}

		$course_default = Course::first();

		$course_id = $course_default->id;

		$default_course_url = $course_default->url;

		$option = "rank";

		$rank_data = CollegeCourse::select('*')
		->select('*','college_courses.id as clg_crs_id','college_courses.college_id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->where('college_courses.course_id',$course_id)
		->get();

		$course = Course::select('id','eligibility_criteria','description','scope','url','name')->where('id',$course_id)->first();

		$course_detail = CollegeCourse::select('college_courses.is_featured','college_courses.id as clg_crs_id','college_courses.college_id','college_courses.course_id as clg_crs_course_id','colleges.id as clg_id','colleges.name','colleges.course_id as clg_course_id','colleges.description as college_desc','colleges.url')
		->Join('colleges','colleges.id','=','college_courses.college_id')
		->where('college_courses.course_id',$course_id)
		->where('college_courses.is_featured','1')
		->where('colleges.country', 'nepal')
		->get();
        
        return view('nepal.index', compact('colleges','exams','examsall','course_list','state', 'state_list', 'courses','blogs','default_course_url','course','course_detail','rank_data','option','articles','ebooks','videos'));
    }
    # !Nepal
}
