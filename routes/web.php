<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 
Route::get('/', function () {
    return view('auth.login');
}); */
/* Route::get('/', function () {
    return view('frontend.home');
}); */


Route::redirect('/home', '/');
Route::get('/clearCache', 'Frontend\HomeController@clearCache')->name('clearCache');
//Route::get('/site', 'Frontend\HomeController@site')->name('site');
//Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/', 'Frontend\HomeController@site')->name('site');

Route::get('/mbbs2023', 'Frontend\HomeController@mbbs2022')->name('mbbs2023');
Route::get('/bds2022', 'Frontend\HomeController@bds2022')->name('bds2022');
Route::get('/bams2022', 'Frontend\HomeController@bams2022')->name('bams2022');
Route::get('/nepal', 'Frontend\Nepal\NepalController@nepal')->name('nepal');
Route::get('/nepal2022', 'Frontend\Nepal\NepalController@nepal_new')->name('nepal_new');

Route::get('/college/{url}', 'Frontend\CollegeController@details')->name('home');

Route::get('/nepal/videos', 'Frontend\Nepal\NepalController@videos')->name('nepal_videos');
Route::get('nepal/news/{id}', 'Frontend\Nepal\NepalController@blog_detail')->name('nepal_blog_detail');
Route::get('/nepal/{url}', 'Frontend\Nepal\NepalCollegeController@details')->name('nepal_home');

Route::get('/college/{url}/{detail}', 'Frontend\CollegeController@college_other_details')->name('college_other_details');
Route::get('/college/{url}/course/{course}', 'Frontend\CollegeController@course')->name('college_other_details');
Route::get('/college/{url}/news/{news_slug}', 'Frontend\CollegeController@news')->name('college_news_details');
Route::get('/college/{url}/videos/{video_slug}', 'Frontend\CollegeController@videos')->name('college_video_details');
Route::get('/colleges', 'Frontend\HomeController@search')->name('search_college');

Route::get('/college-details-pdf/{id}', 'Frontend\CollegeController@college_details_pdf')->name('college_details_pdf');

Route::post('/banner-form', 'Frontend\HomeController@banner_form')->name('banner_form');


Route::get('/contact-us', 'Frontend\HomeController@contact_us')->name('contact_us');
Route::post('/contact_process', 'Frontend\HomeController@contact_process')->name('contact_process');
Route::get('/courses', 'Frontend\HomeController@courses')->name('courses');
Route::get('/news', 'Frontend\HomeController@blogs')->name('blogs');

Route::get('/exams', 'Frontend\HomeController@exams')->name('exams');
Route::get('/exams/{id}', 'Frontend\HomeController@exam_details')->name('exam_details');
Route::get('/news/{id}', 'Frontend\HomeController@blog_detail')->name('blog_detail');
Route::get('/videos', 'Frontend\HomeController@videos')->name('videos');

Route::get('/blogs', 'Frontend\HomeController@articles')->name('articles');
Route::get('/blogs/{id}', 'Frontend\HomeController@article_detail')->name('article_detail');




Route::get('/ebooks', 'Frontend\HomeController@ebooks')->name('ebooks');
Route::get('/ebooks/{id}', 'Frontend\HomeController@ebook_detail')->name('ebook_detail');


Route::get('/city/{id}', 'Frontend\HomeController@city_detail')->name('city_detail');

Route::post('/getcity', 'Frontend\HomeController@getCity')->name('getcity');
Route::post('/ranklist', 'Frontend\HomeController@ranklist')->name('ranklist');
Route::post('/getcourse_detail', 'Frontend\HomeController@getcourse_detail')->name('getcourse_detail');
Route::post('/get_top_destination', 'Frontend\HomeController@get_top_destination')->name('get_top_destination');
Route::post('/get_course_exam', 'Frontend\HomeController@get_course_exam')->name('get_course_exam');
Route::post('/showinterest', 'Frontend\HomeController@showinterest')->name('showinterest');
Route::post('/newsletter', 'Frontend\HomeController@newsletter')->name('newsletter');
Route::post('/expertadvice', 'Frontend\HomeController@expertadvice')->name('expertadvice');
Route::post('/collegebrochure_request', 'Frontend\HomeController@collegebrochure_request')->name('collegebrochure_request');


Route::get('/course/{course_url}/{option?}/{option_url?}', 'Frontend\HomeController@course')->name('course_details');
Route::get('/top-study-destination/{slug}', 'Frontend\HomeController@top_study_destination')->name('top_study_destination');
Route::get('/rank/{slug}', 'Frontend\HomeController@rank')->name('rank');



Route::redirect('/admin', '/login');
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::post('/cities', 'AjaxControllers\CityController@index');

# Student

Route::get('/student-neet-form', 'Frontend\HomeController@student_neet_form')->name('student-neet-form');

Route::get('/student-neet-signup-form', 'Frontend\HomeController@student_neet_signup_form')->name('student-neet-signup-form');

Route::get('/college-panel/login', 'College\CollegeHomeController@login')->name('enquiry-login');
Route::get('/college-panel/logout', 'College\CollegeHomeController@logout')->name('enquiry-logout');
Route::post('/college-panel/login_process', 'College\CollegeHomeController@login_process')->name('enquiry-login-process');
Route::get('/college-panel/{college_type}/enquires', 'College\CollegeHomeController@college_enquires')->middleware('auth:college_login')->name('college-panel');
//Route::get('/college-panel/{college_url}', 'College\CollegeHomeController@college_enquires')->middleware('auth:college_login')->name('college-panel');
#college-panel colllege 
Route::get('/college-panel/{id}/edit', 'College\CollegeEditController@edit')->name('college-panel.edit')->middleware('auth:college_login');
Route::get('/college-panel/{id}/{option?}/edit', 'College\CollegeEditController@edit')->name('college-panel.editoption')->middleware('auth:college_login');
Route::post('/college-panel/update/{id}', 'College\CollegeEditController@update')->name('college-panel.college.update')->middleware('auth:college_login');
#college-panel college end 

Route::post('/student_registration', 'Student\StudentAuthController@registration');
Route::get('/student_login', 'Student\StudentAuthController@login_view')->name('student_login');
Route::post('/student_login_process', 'Student\StudentAuthController@login');
Route::get('/student-logout', 'Student\StudentAuthController@logout');
Route::get('/student-dashborad', 'Student\StudentController@index')->middleware('auth:student')->name('student-dashborad');
Route::post('/college-predictor', 'Student\StudentController@college_predictor')->middleware('auth:student')->name('college-predictor');
Route::get('/request_callback/{id}', 'Student\StudentController@request_callback')->name('request_callback');
# End Student


Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');
    
    Route::post('/remark_process', 'HomeController@remark_process')->name('/remark_process');
    Route::get('/college-predictor', 'HomeController@college_predictor')->name('college-predictor');
	
	/* Admin College route */
	Route::get('/colleges', 'CollegeController@index')->name('colleges');
	Route::get('/colleges/add-new', 'CollegeController@add_new')->name('colleges.add-new');
	Route::post('/colleges/create', 'CollegeController@create')->name('colleges.create');
	Route::get('/colleges/{id}/edit', 'CollegeController@edit')->name('colleges.edit');
	Route::get('/colleges/{id}/{option?}/edit', 'CollegeController@edit')->name('colleges.editoption');
	Route::get('/colleges/{id}/edit', 'CollegeController@edit')->name('colleges.edit');
	Route::post('/colleges/update/{id}', 'CollegeController@update')->name('colleges.update');
	Route::post('/colleges/placement/{id}', 'CollegeController@placement')->name('colleges.placement');
	Route::post('/colleges/cutoff/{id}', 'CollegeController@cutoff')->name('colleges.cutoff');
	Route::post('/colleges/admission/{id}', 'CollegeController@admission')->name('colleges.admission');
	Route::post('/colleges/photos/{id}', 'CollegeController@photos')->name('colleges.photos');
	Route::post('/colleges/photos/{id}/{imgId}', 'CollegeController@photoDel')->name('colleges.delete_photos');
	Route::post('/colleges/photos/{id}/{imgId}', 'CollegeController@photoDel')->name('colleges.delete_photos');
	Route::post('/colleges/delete_course', 'CollegeController@delete_course')->name('colleges.delete_course');

	Route::post('/colleges/add_news', 'CollegeController@add_news')->name('colleges.add_news');
	Route::get('/colleges/delete_news/{id}', 'CollegeController@delete_news')->name('colleges.delete_news');
	Route::get('/colleges/{id}/{option?}/edit/{id2}', 'CollegeController@edit')->name('colleges.edit_news');

	Route::post('/colleges/add_video', 'CollegeController@add_video')->name('colleges.add_video');
	Route::get('/colleges/delete_video/{id}', 'CollegeController@delete_video')->name('colleges.delete_video');
	Route::get('/colleges/{id}/{option?}/edit/{id2}', 'CollegeController@edit')->name('colleges.edit_video');

	Route::post('/colleges/add_review', 'CollegeController@add_review')->name('colleges.add_review');
	Route::get('/colleges/delete_review/{id}', 'CollegeController@delete_review')->name('colleges.delete_review');
	Route::get('/colleges/{id}/{option?}/edit/{id2}', 'CollegeController@edit')->name('colleges.edit_review');
	

	Route::get('/exams', 'ExamController@index')->name('exams');
	Route::get('/exams/add-new', 'ExamController@add_new')->name('exams.add-new');
	Route::post('/exams/create', 'ExamController@create')->name('exams.create');
	Route::get('/exams/{id}/edit', 'ExamController@edit')->name('exams.edit');
	Route::post('/exams/update/{id}', 'ExamController@update')->name('exams.update');
	
	Route::post('/course/{id}', 'CourseController@create')->name('course');
	Route::get('/course/{collegeid}/{courseid}/edit', 'CourseController@edit')->name('course.edit');
	Route::post('/course/update/{collegeid}/{courseid}', 'CourseController@update')->name('course.update');
	
	/* Admin Courses */
	Route::get('/courses/','CourseController@courses')->name('courses');
	Route::get('/courses/add-new','CourseController@add_course')->name('courses.add-new');
	Route::get('/courses/add-new/{id}','CourseController@editcourse')->name('courses.edit');


	Route::get('/ebooks','CourseController@ebooks')->name('ebooks');
	Route::post('/courses/add_ebook','CourseController@add_ebook')->name('courses.add_ebook');
	Route::get('/ebooks/{id2}','CourseController@edit_ebooks')->name('edit_ebooks');
	Route::get('/courses/delete_ebook/{id2}','CourseController@delete_ebook')->name('courses.delete_ebook');

	Route::get('/courses/{id}/questionanswers','CourseController@questionanswers')->name('courses.questionanswers');
	Route::post('/courses/add_questionanswer','CourseController@add_questionanswer')->name('courses.add_questionanswer');
	Route::get('/courses/{id}/questionanswers/{id2}','CourseController@edit_questionanswers')->name('courses.edit_questionanswers');
	Route::get('/courses/delete_questionanswer/{id2}','CourseController@delete_questionanswer')->name('courses.delete_questionanswer');

	Route::post('/courses/add_course_detail','CourseController@add_course_detail')->name('course.add_course_detail');

	Route::resource('/course',CourseController::class);

	/* Admin Blog route */
	Route::resource('/blogs', BlogController::class);
	Route::resource('/articles', ArticleController::class);
	Route::resource('/staticpages', StaticPageController::class);
	Route::resource('/cities',CityController::class);
	Route::resource('/videos', VideoController::class);

	Route::get('/courseinterests/updateStatus/{id}/{status}','CourseInterestController@updateStatus');
	Route::post('/courseinterests/remark_process/','CourseInterestController@remark_process');
	Route::resource('/courseinterests', CourseInterestController::class);
	Route::get('/courseexpertadvices/updateStatus/{id}/{status}','CourseExpertAdviceController@updateStatus');
	Route::post('/courseexpertadvices/remark_process/','CourseExpertAdviceController@remark_process');
	Route::resource('/courseexpertadvices', CourseExpertAdviceController::class);
	Route::get('/downloadbrochures/updateStatus/{id}/{status}','DownloadBrochureController@updateStatus');
	Route::post('/downloadbrochures/remark_process/','DownloadBrochureController@remark_process');
	Route::resource('/downloadbrochures', DownloadBrochureController::class);


	Route::get('/newsletters/updateStatus/{id}/{status}','NewsletterController@updateStatus');
	Route::post('/newsletters/remark_process/','NewsletterController@remark_process');
	Route::resource('/newsletters', NewsletterController::class);


	Route::get('/contacts/updateStatus/{id}/{status}','ContactController@updateStatus');
	Route::post('/contacts/remark_process/','ContactController@remark_process');
	Route::resource('/contacts', ContactController::class);
	
	
	Route::get('/college-enquires/updateStatus/{id}/{status}','Mbbs2022Controller@updateStatus');
	Route::post('/college-enquires/remark_process/','Mbbs2022Controller@remark_process');
	Route::resource('/college-enquires', Mbbs2022Controller::class);
	
	
	/* Admin rank type routes */
	//Route::get('/ranktype/ranklist','RankController@ranklist')->name('ranktype.ranklist');

	Route::resource('/ranktypes',RankController::class);
	//Route::resource('/news',NewsController::class);

	//Route::get('/', 'BlogController@index')->name('blog');
	
});