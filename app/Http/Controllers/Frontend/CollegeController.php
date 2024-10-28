<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;
use App\College;
use App\Course;
use App\Exam;
use App\Admission;
use App\Placement;
use App\CollegeCourse;
use App\News;
use App\CollegeVideo;
use App\CollegeReview;
use DB;

use App\Library\Pdf;


class CollegeController extends Controller
{

    public function index()
    {
		$colleges = College::with('cityname')->inRandomOrder()->limit(6)->get(['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee', 'featured']);
        return view('frontend.home', compact('colleges'));
		//return College::with('cityname')->get();
    }
	
	public function details($url)
    {
		$college = College::with('cityname')->with('statename')->with('photos')->where('url', '=', $url)->first();
		
		
        $college_tab = College::select("colleges.id","colleges.facilities","news.id as news_id","tbl_rank.rank_rating as rank_rating","college_videos.id as college_video_id","photos.id as photo_id","college_courses.id as college_course_id",
        "placements.id as placement_id","admission_process.id as admission_process_id","cutoffs.id as cutoff_id")->where('colleges.url', '=', $url)
        ->leftJoin('news', 'news.college_id', '=', 'colleges.id')
        ->leftJoin('college_videos', 'college_videos.college_id', '=', 'colleges.id')
        ->leftJoin('photos', 'photos.college_id', '=', 'colleges.id')
		->leftJoin('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->leftJoin('courses','courses.id','=','college_courses.course_id')
        ->leftJoin('placements', 'placements.college_id', '=', 'colleges.id')
		->leftJoin('admission_process','admission_process.college_id','=','colleges.id')
		->leftJoin('cutoffs','cutoffs.college_id','=','colleges.id')
		->first();
		
		$exams = Exam::get();
		$reviews = CollegeReview::where('college_id',$college->id)->where('status',1)->get();

		$avg_stars = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)
                ->avg('rating');

        $avg_stars = number_format((float)$avg_stars, 1, '.', '');

        $avg_stars1 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',1)
                ->avg('rating');
        $avg_stars1 = ($avg_stars1)?$avg_stars1:0;
        $avg_stars1 = number_format((float)$avg_stars1, 1, '.', '');

        $avg_stars2 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',2)
                ->avg('rating');
        $avg_stars2 = ($avg_stars2)?$avg_stars2:0;
        $avg_stars2 = number_format((float)$avg_stars2, 1, '.', '');

        $avg_stars2 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',2)
                ->avg('rating');
        $avg_stars2 = ($avg_stars2)?$avg_stars2:0;
        $avg_stars2 = number_format((float)$avg_stars2, 1, '.', '');

        $avg_stars3 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',3)
                ->avg('rating');
        $avg_stars3 = ($avg_stars3)?$avg_stars3:0;
        $avg_stars3 = number_format((float)$avg_stars3, 1, '.', '');

        $avg_stars4 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',4)
                ->avg('rating');
        $avg_stars4 = ($avg_stars4)?$avg_stars4:0;
        $avg_stars4 = number_format((float)$avg_stars4, 1, '.', '');

        $avg_stars5 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',5)
                ->avg('rating');
        $avg_stars5 = ($avg_stars5)?$avg_stars5:0;
        $avg_stars5 = number_format((float)$avg_stars5, 1, '.', '');

        $total = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)
                ->count();

        $count_stars1 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',1)
                ->count();
        $count_stars1 = ($count_stars1)?$count_stars1:0;
        $count_stars1 = number_format((float)$count_stars1, 0, '.', '');

        $count_stars2 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',2)
                ->count();
        $count_stars2 = ($count_stars2)?$count_stars2:0;
        $count_stars2 = number_format((float)$count_stars2, 0, '.', '');

        $count_stars2 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',2)
                ->count();
        $count_stars2 = ($count_stars2)?$count_stars2:0;
        $count_stars2 = number_format((float)$count_stars2, 0, '.', '');

        $count_stars3 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',3)
                ->count();
        $count_stars3 = ($count_stars3)?$count_stars3:0;
        $count_stars3 = number_format((float)$count_stars3, 0, '.', '');

        $count_stars4 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',4)
                ->count();
        $count_stars4 = ($count_stars4)?$count_stars4:0;
        $count_stars4 = number_format((float)$count_stars4, 0, '.', '');

        $count_stars5 = DB::table('college_reviews')->where('college_id',$college->id)->where('status',1)->where('rating','=',5)
                ->count();
        $count_stars5 = ($count_stars5)?$count_stars5:0;
        $count_stars5 = number_format((float)$count_stars5, 0, '.', '');

        $colle = College::with('cityname')->orderBy('featured', 'desc');
        
        if($college->country == 'nepal'):
            $colle->where('country', 'nepal');    
            $colle->where('status', '1');    
        endif;
		
		$colle = $colle->whereNotIn('id',[$college->id]);
		$colleges = $colle->Paginate(8,['name', 'url', 'streams', 'state', 'city', 'photo', 'logo', 'estd_year', 'total_faculty', 'campus_size', 'rank', 'approval', 'genders_accepted', 'ownership','fee','featured','brochure']);

		$collegevideo_data = CollegeVideo::where('college_videos.college_id',$college->id)->get();
		$collegevideos = array();
		foreach ($collegevideo_data as $row) {
			$youtube_link = $row->youtube_link;

			$link = $youtube_link;
		    $video_id = explode("?v=", $link);

		    if (count($video_id)>=2) {
			    if (!isset($video_id[1])) {
			        $video_id = explode("youtu.be/", $link);
			    }
			    $youtubeID = $video_id[1];
			    if (empty($video_id[1])) $video_id = explode("/v/", $link);
			    $video_id = explode("&", $video_id[1]);
			    $youtubeVideoID = $video_id[0];

			    $thumbURL = 'https://img.youtube.com/vi/' . $youtubeVideoID . '/mqdefault.jpg';

				$row->youtubeVideoID = $youtubeVideoID;
				$row->thumbURL = $thumbURL;

				$collegevideos[] = $row;
			}
		}
		
		// cutoff
		$courses_fee = CollegeCourse::select("courses.name","college_courses.course_approval","college_courses.course_exam","college_courses.course_seats","college_courses.course_total_fee","college_courses.course_duration","college_courses.course_mode","courses.url","courses.brochure")->where('college_courses.college_id',$college->id)
			->leftJoin("courses",'courses.id','=','college_courses.course_id')
			->get();
			
			

		$ranks = array();
		$rank_data_list = DB::table("tbl_rank")->select('ranktype.rank_type','ranktype.slug','tbl_rank.rank_id','tbl_rank.rank_rating','courses.name as course_name')
		->join('college_courses','college_courses.id','=','tbl_rank.collegecourse_id')
		->join('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->join('courses','courses.id','=','college_courses.course_id')
		->where('college_courses.college_id',$college->id)
		->get();

		foreach ($rank_data_list as $row) {
			$ranks[$row->rank_id] = $row;
		}
		
		$news = News::where('news.college_id',$college->id)->get();

        return view('frontend.college', compact('college','exams','reviews','avg_stars','avg_stars1','avg_stars2','avg_stars3','avg_stars4','avg_stars5',
        'count_stars1','count_stars2','count_stars3','count_stars4','count_stars5','total','colleges','collegevideos','college_tab',
        'courses_fee',
        'ranks',
        'news'
        ));
		//return College::with('cityname')->get();
    }
	
	public function college_other_details($url,$detail)
    {
        $college_tab = College::select("colleges.id","colleges.facilities","news.id as news_id","tbl_rank.rank_rating as rank_rating","college_videos.id as college_video_id","photos.id as photo_id","college_courses.id as college_course_id",
        "placements.id as placement_id","admission_process.id as admission_process_id","cutoffs.id as cutoff_id")->where('colleges.url', '=', $url)
        ->leftJoin('news', 'news.college_id', '=', 'colleges.id')
        ->leftJoin('college_videos', 'college_videos.college_id', '=', 'colleges.id')
        ->leftJoin('photos', 'photos.college_id', '=', 'colleges.id')
		->leftJoin('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->leftJoin('courses','courses.id','=','college_courses.course_id')
        ->leftJoin('placements', 'placements.college_id', '=', 'colleges.id')
		->leftJoin('admission_process','admission_process.college_id','=','colleges.id')
		->leftJoin('cutoffs','cutoffs.college_id','=','colleges.id')
		->first();
		
		if($detail == 'course-fee'){
			$college = College::with('cityname')->with('statename')->with('courses')->where('url', '=', $url)->first();
			$exams = Exam::get();

			$courses = CollegeCourse::select("courses.name","college_courses.course_approval","college_courses.course_exam","college_courses.course_seats","college_courses.course_total_fee","college_courses.course_duration","college_courses.course_mode","courses.url","courses.brochure")->where('college_courses.college_id',$college->id)
			->leftJoin("courses",'courses.id','=','college_courses.course_id')
			->get();

			$college->courses = $courses;

			return view('frontend.course_fee', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'cutoff'){
			$college = College::with('cityname')->with('statename')->with('cutoff')->where('url', '=', $url)->first();
			$exams = Exam::get();
			return view('frontend.cutoff', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'admission'){
			$college = College::with('cityname')->with('statename')->with('admission')->where('url', '=', $url)->first();
			$exams = Exam::get();
			return view('frontend.admission', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'placements'){
			$college = College::with('cityname')->with('statename')->with('placement')->where('url', '=', $url)->first();
			$exams = Exam::get();
			return view('frontend.placements', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'news'){
			$college = College::with('cityname')->with('statename')->with('courses')->where('url', '=', $url)->first();
			$exams = Exam::get();

			$news = News::where('news.college_id',$college->id)->get();

			return view('frontend.news', compact('college','exams','news','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'videos'){
			$college = College::with('cityname')->with('statename')->with('courses')->where('url', '=', $url)->first();
			$exams = Exam::get();

			$collegevideo_data = CollegeVideo::where('college_videos.college_id',$college->id)->get();
			$collegevideos = array();
			foreach ($collegevideo_data as $row) {
				$youtube_link = $row->youtube_link;

				$link = $youtube_link;
			    $video_id = explode("?v=", $link);

			    if (count($video_id)>=2) {
				    if (!isset($video_id[1])) {
				        $video_id = explode("youtu.be/", $link);
				    }
				    $youtubeID = $video_id[1];
				    if (empty($video_id[1])) $video_id = explode("/v/", $link);
				    $video_id = explode("&", $video_id[1]);
				    $youtubeVideoID = $video_id[0];

				    $thumbURL = 'https://img.youtube.com/vi/' . $youtubeVideoID . '/mqdefault.jpg';

					$row->youtubeVideoID = $youtubeVideoID;
					$row->thumbURL = $thumbURL;

					$collegevideos[] = $row;
				}
			}

			return view('frontend.videos', compact('college','exams','collegevideos','college_tab'));
			//return College::with('cityname')->get();
		}
		else if($detail == 'photo'){
			$college = College::with('cityname')->with('statename')->with('photos')->where('url', '=', $url)->first();
			$exams = Exam::get();
			return view('frontend.photo', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		} 
		else if($detail == 'facilities'){
			$college = College::where('url', '=', $url)->first();
			$exams = Exam::get();
			return view('frontend.college_facilities', compact('college','exams','college_tab'));
			//return College::with('cityname')->get();
		}

		else if($detail == 'ranks'){
			$college = College::with('cityname')->with('statename')->with('admission')->where('url', '=', $url)->first();
			$exams = Exam::get();

			$rank_data = array();
			$rank_data_list = DB::table("tbl_rank")->select('ranktype.rank_type','ranktype.slug','tbl_rank.rank_id','tbl_rank.rank_rating','courses.name as course_name')
			->join('college_courses','college_courses.id','=','tbl_rank.collegecourse_id')
			->join('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
			->join('courses','courses.id','=','college_courses.course_id')
			->where('college_courses.college_id',$college->id)
			->get();

			foreach ($rank_data_list as $row) {
				$rank_data[$row->rank_id] = $row;
			}

			return view('frontend.college_ranks', compact('college','exams','rank_data','college_tab'));
			//return College::with('cityname')->get();
		}
		else {
			return $this->details($url);
		}
		
		
    }

	public function course($url,$course){
	    
	    
        $college_tab = College::select("colleges.id","colleges.facilities","news.id as news_id","tbl_rank.rank_rating as rank_rating","college_videos.id as college_video_id","photos.id as photo_id","college_courses.id as college_course_id",
        "placements.id as placement_id","admission_process.id as admission_process_id","cutoffs.id as cutoff_id")->where('colleges.url', '=', $url)
        ->leftJoin('news', 'news.college_id', '=', 'colleges.id')
        ->leftJoin('college_videos', 'college_videos.college_id', '=', 'colleges.id')
        ->leftJoin('photos', 'photos.college_id', '=', 'colleges.id')
		->leftJoin('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->leftJoin('courses','courses.id','=','college_courses.course_id')
        ->leftJoin('placements', 'placements.college_id', '=', 'colleges.id')
		->leftJoin('admission_process','admission_process.college_id','=','colleges.id')
		->leftJoin('cutoffs','cutoffs.college_id','=','colleges.id')
		->first();
		
		$college = College::with('cityname')->with('statename')->where('url', '=', $url)->first();
		//$course = Course::where('url', '=', $course)->where('college_id', '=', $college->id)->first();
		$course = CollegeCourse::select("courses.name","college_courses.course_approval","college_courses.course_exam","college_courses.course_seats","college_courses.course_total_fee","college_courses.course_duration","college_courses.course_mode","courses.brochure")->where('college_courses.college_id',$college->id)->where('courses.url',$course)
			->leftJoin("courses",'courses.id','=','college_courses.course_id')
			->first();
		$exams = Exam::get();
		return view('frontend.course', compact('course','college','exams','college_tab')); 
	}

	public function news($url,$news_url){
	    
	    
        $college_tab = College::select("colleges.id","colleges.facilities","news.id as news_id","tbl_rank.rank_rating as rank_rating","college_videos.id as college_video_id","photos.id as photo_id","college_courses.id as college_course_id",
        "placements.id as placement_id","admission_process.id as admission_process_id","cutoffs.id as cutoff_id")->where('colleges.url', '=', $url)
        ->leftJoin('news', 'news.college_id', '=', 'colleges.id')
        ->leftJoin('college_videos', 'college_videos.college_id', '=', 'colleges.id')
        ->leftJoin('photos', 'photos.college_id', '=', 'colleges.id')
		->leftJoin('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->leftJoin('courses','courses.id','=','college_courses.course_id')
        ->leftJoin('placements', 'placements.college_id', '=', 'colleges.id')
		->leftJoin('admission_process','admission_process.college_id','=','colleges.id')
		->leftJoin('cutoffs','cutoffs.college_id','=','colleges.id')
		->first();
		
		$college = College::with('cityname')->with('statename')->where('url', '=', $url)->first();
		//$course = Course::where('url', '=', $course)->where('college_id', '=', $college->id)->first();
		$news = News::where('news.college_id',$college->id)->where('news.slug',$news_url)
			->first();
		$exams = Exam::get();
		return view('frontend.news_detail', compact('news','college','exams','college_tab')); 
	}
	
	public function college_details_pdf($id)
    {
      $college = College::with('cityname')->with('statename')->with('photos')->where('id', '=', $id)->first();
       
       $data = College::select("colleges.*", 'states.state_name', 'cities.city_name',  'cutoffs.description as cutoff_description', 'admission_process.description as admission_description')->where('colleges.id', '=', $id)
        ->leftJoin('states', 'states.id', '=', 'colleges.state')
        ->leftJoin('cities', 'cities.id', '=', 'colleges.city')
        ->leftJoin('news', 'news.college_id', '=', 'colleges.id')
        ->leftJoin('college_videos', 'college_videos.college_id', '=', 'colleges.id')
        ->leftJoin('photos', 'photos.college_id', '=', 'colleges.id')
		->leftJoin('college_courses','college_courses.college_id','=','colleges.id')
		->leftJoin('tbl_rank','tbl_rank.collegecourse_id','=','college_courses.id')
		->leftJoin('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->leftJoin('courses','courses.id','=','college_courses.course_id')
        ->leftJoin('placements', 'placements.college_id', '=', 'colleges.id')
		->leftJoin('admission_process','admission_process.college_id','=','colleges.id')
		->leftJoin('cutoffs','cutoffs.college_id','=','colleges.id')
		->first();
		
		$courses_fee = CollegeCourse::select("courses.name","college_courses.course_approval","college_courses.course_exam","college_courses.course_seats","college_courses.course_total_fee","college_courses.course_duration","college_courses.course_mode","courses.url","courses.brochure")->where('college_courses.college_id',$id)
			->leftJoin("courses",'courses.id','=','college_courses.course_id')
			->get();
			
		$ranks = array();
		$rank_data_list = DB::table("tbl_rank")->select('ranktype.rank_type','ranktype.slug','tbl_rank.rank_id','tbl_rank.rank_rating','courses.name as course_name')
		->join('college_courses','college_courses.id','=','tbl_rank.collegecourse_id')
		->join('ranktype','ranktype.rank_id','=','tbl_rank.rank_id')
		->join('courses','courses.id','=','college_courses.course_id')
		->where('college_courses.college_id',$id)
		->get();

		foreach ($rank_data_list as $row) {
			$ranks[$row->rank_id] = $row;
		}
		
		$collegevideo_data = CollegeVideo::select('title', 'youtube_link')->where('college_videos.college_id',$id)->get();
		$collegevideos = array();
		foreach ($collegevideo_data as $row) {
			$youtube_link = $row->youtube_link;

			$link = $youtube_link;
		    $video_id = explode("?v=", $link);

		    if (count($video_id)>=2) {
			    if (!isset($video_id[1])) {
			        $video_id = explode("youtu.be/", $link);
			    }
			    $youtubeID = $video_id[1];
			    if (empty($video_id[1])) $video_id = explode("/v/", $link);
			    $video_id = explode("&", $video_id[1]);
			    $youtubeVideoID = $video_id[0];

			    $thumbURL = 'https://img.youtube.com/vi/' . $youtubeVideoID . '/mqdefault.jpg';

				$row->youtubeVideoID = $youtubeVideoID;
				$row->thumbURL = $thumbURL;

				$collegevideos[] = $row;
			}
		}
		
    // return compact('data', 'courses_fee', 'ranks', 'collegevideos', 'college');
        // return view('frontend.college_details_view_pdf', $data);
        // $data           = College::findOrFail($id);
    	$html           = view('frontend.college_details_view_pdf', compact('data', 'courses_fee', 'ranks', 'college', 'collegevideos'));
    	$pdf            = new PDF();
    	return $pdf->createPDF($html, $data->name, true);
    }
}
