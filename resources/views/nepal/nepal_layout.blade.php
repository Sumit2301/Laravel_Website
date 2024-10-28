<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
<?php 
    $meta_title                         =   "My Medical Course"; 
    $meta_description                   =   "";
    $meta_keywords                      =   "";
    
    if(isset($blog)){
      $meta_title                       =   $blog->meta_title; 
      $meta_description                 =   $blog->meta_description; 
      $meta_keywords                    =   $blog->meta_keywords; 
    }else if(isset($article)){
      $meta_title                       =   $article->meta_title; 
      $meta_description                 =   $article->meta_description; 
      $meta_keywords                    =   $article->meta_keywords; 
    }else if(isset($ebook)){
      $meta_title                       =   $ebook->meta_title; 
      $meta_description                 =   $ebook->meta_description; 
      $meta_keywords                    =   $ebook->meta_keywords; 
    }else {
        $url                            =   url()->current();
        $slug1                          =   str_replace(url(''),"",$url);
        if (empty($slug1)) {
          $slug1                        =   "/";
        }
    
        $slug2                          =   str_replace(url('').'/',"",$url);

        $staticpage                     =   \App\StaticPage::where('slug','=',$url)->orWhere('slug',$slug1)->orWhere('slug',$slug2)->first();
        
    if($staticpage){
        $meta_title                     =   $staticpage->meta_title; 
        $meta_description               = $staticpage->meta_description; 
        $meta_keywords = $staticpage->meta_keywords;
    }
}


# Segments  
    $url_segment        =   request()->segment(1);
    $mobile_number      =   "+91 9176406999";
    if($url_segment == 'mbbs2022'):
        $mobile_number      =   "+91 9096964645";
    endif;
    
        $is_nepal      =   false;
    if($url_segment == 'nepal'):
        $is_nepal      =   true;
    endif;
# !Segments

?>
    
@if($meta_title)
<title>{!!$meta_title!!}</title>
@endif
@if($meta_description)
<meta name="description" content="{!!$meta_description!!}" />
@endif
@if($meta_keywords)
<meta name="keywords" content="{!!$meta_keywords!!}" />
@endif
<meta property="og:image:type" content="image/jpg">
<meta property="og:image:width" content="1024">
<meta property="og:image:height" content="1024">
    <meta property="og:image" content="{{  asset('public/front') }}/w3.jpg" />

@yield('meta')

<!--   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.google.com/specimen/Montserrat#glyphs" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

<!-- font-awesome CSS -->
<link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>

<link rel="stylesheet" href="{{ asset('assets/site') }}/css/desktop.css">
<link rel="stylesheet" href="{{ asset('assets/site') }}/css/tablet.css">
<link rel="stylesheet" href="{{ asset('assets/site') }}/css/mobile.css">
@yield('stylesbefore')
@yield('styles')
<style>

* {
    font-family: 'Montserrat', sans-serif;
}

    .sitelogo, .footer-logo img{width: 120px;}


.nav-div {
    border-radius: 0px;
}

label.error {
  color: red;
  margin-top: 3px;
}
.bgcolor-2 {
    background-color: #EFF7FB;
}
.course-list .section-heading h2{
  font-size: 30px!important;
  margin-bottom: 10px;
}
.section-eligibility {
  padding: 18px 26px;
  margin: 18px 10px;
}
.institute-section {
    padding: 25px 26px 20px 26px;
}
.section-eligibility p {
  padding-bottom:0px;
  margin-bottom: 0px;
}
.course-list {
  margin-top: 40px;
}
.footer-logo-section {
    padding: 50px 0px 15px 0px !important;
}
.blur-div {
  padding: 10px 16px;
  height: 74px;
  bottom: 15px;
}
.swiper-books .blur-div {
  padding: 10px 16px;
  height: 54px;
  bottom: 15px;
}
.books-div {
    padding: 35px 35px;
    border-radius: 35px;
}
.learn-col h1{color: #0196da;}
@media only screen and (min-width: 992px){
.search-form {
    height: 120px;
}
}

</style>

<style>
.section-heading a,.section-heading h2{
  display: inline-block;;
}
.section-upper-tags .active {
  background-color: #FFAA4C;
}
.section-eligibility h2 {
  display: flex;
}
.institute-single-card h3 {
  overflow: hidden;
  -webkit-line-clamp: 2;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  height: 40px;
}
.section-lower-tags div {
  cursor: pointer;
}
.swiper-news img {
  border-radius: 25px;
  object-fit: cover!important;
}
.swiper-news h3 {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 24px;
}
.swiper-news p {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 15px;
  margin-bottom: 0px;
}
.swiper-blogs img {
  border-radius: 25px;
  object-fit: fill!important;
}
.swiper-blogs h3 {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 24px;
}
.swiper-blogs p {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 15px;
  margin-bottom: 0px;
}
.swiper-books img {
  border-radius: 25px;
  object-fit: cover!important;
}
.swiper-books h3 {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 24px;
}
.swiper-books p {
  overflow: hidden;
  -webkit-line-clamp: 1;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  line-height: 15px;
  margin-bottom: 0px;
}
.top-navigation img{
  cursor: pointer;
}
.college-icon {
  height: 120px;
  width: 100%;
  border-radius: 8px;
  object-fit: cover;
}
.tag-1 {
    font-size: 16px;
    background: #fff;
    border: 2px solid #0196da;
    color:black;
    font-weight: 600;
}
.tag-2 {
    font-size: 16px;border: none;
}
.section-eligibility h2 {
    font-size: 22px;
}
.section-heading h2 {
    font-size: 24px;
}
.header-left .heading {
    font-size: 35px;
    line-height: 39px;
}
.header-left .heading span {
  margin-top: 5px;
  font-size: 33px;
    line-height: 33px;
}
.cta-button {
  padding-left: 20px;
  padding-right: 20px;
}
.cta-button:hover {
  color: #fff;
}
.single-slide img {
    border: 1px solid #eee;
}
.video-container {
  margin-bottom: 25px;
}
.college-image {
  border-radius: 10px!important;
}
.single-college-card .logo {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
}
.single-college-card h3 {
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    height: 56px;
}
.ratings i {
    color: #ddd!important;
}
.ratings .checked {
    color: #FAA307!important;
}
.college-image {
  width: 100%;
}
.course-row {
    margin-bottom: 30px;
    padding: 30px 25px;
    background-color: #EFF7FB;
    border-radius: 10px;
    width: 100%;
}
.learn-col h3 {
    color: #020015;
    line-height: 1.3;
    font-weight: 500;
    margin-top: 0;
    margin-bottom: 10px;
    padding: 0;
    text-transform: capitalize;
    width: 100%;
}
.learn-col h2 {
  font-size: 24px;
}
.learn-col .btn {
  color: #fff;
}
.gallery img {
    height: 167px;
    width: 100%;
    object-fit: cover;
}
.college-link li, .college-link2 li {
    display: inline-block;
}

.college-link2 li {
    font-size: 15px;
    padding-right: 50px;
}
.college-link2 li strong {
    font-weight: 600;
}
.star-rating {
    text-align: center;
    margin-bottom: 10px;
}
.star-rating .checked {
    color: orange;
}
.course-college-item {
    margin-bottom: 35px;
}
@media only screen and (min-width: 768px){
  .college-image {
    height: 180px;
  }
  .course-college-item img { 
    height: 130px;
  }
.institute-single-card h3{font-size: 18px;}
}
@media only screen and (max-width: 768px){
.institute-single-card img {max-width: unset;}
.institute-single-card h3{height: 26px;}
.institute-section {
    padding: 15px 11px 15px 11px;
}
#owl-demo {
  padding: 0px 10px;
}
.course-college-item .theme-btn,.tab-content .theme-btn {
  margin-bottom: 15px!important;
  padding: 5px 5px;
  font-size: 14px!important;
}
.course-college-item {
  padding: 15px 15px!important;
}
.section-lower-tags div{width: calc( 50% - 6px );text-align: center;}
.section-lower-tags div.frexadvice{width:100%;}

.topmob{display:none;}
}
.detail-user-by {
  color: #072e6c;
  font-size: 16px;
  font-weight: 600;
}
.detail-user-by i {
  margin-right: 4px;
}
.cp-thumb-small {
    float: left;
    max-width: 120px;
    margin: 0 20px 0 0;
}
.cp-small {
  margin-bottom: 5px;
}
.entry-meta {
    font-size: 12px;
    font-size: 0.75rem;
    margin-bottom: 5px;
    text-transform: uppercase;
}
.cp-title-small {
    font-size: 15px;
    line-height: 20px;
    font-weight: 600;
    color: #212529;
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
.mh-separator {
  clear: both;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border: 0;
    border-bottom: 1px dotted #cdcdcd;
}

.single-college-card-right {
  width: 100%;
}

.left-panel ul {
  margin-left: 20px!important;
}
.section-featured h2{font-size: 25px;}

/*.college-header-info .title{color: #0196da;}*/


.bg-banner .nav-link { color: #ffaa4c !important; }
.bg-banner .banner-card{ border: 0; box-shadow: 2px 2px 10px #80808057; border: 0; box-shadow: 2px 2px 10px #80808057; background: #00000042; color: #fff; }
.bg-banner .banner-card .error { color: red; font-size:14px; }
.bg-banner .banner-card { background: #f08417; }
.limit-1 {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    line-height: 21px;
    max-height: 24px;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
 }
 
 @media(min-width:992px){
     
     .bg-banner .nav-link {  color: #ffffff !important;
    font-weight: bold;
    font-size: 20px; }
    
    
     .col-md-7.header-left { margin-top: 80px; }
    .banner-card{ padding:2rem;}
    .header-right{ padding:3rem;}
    .header-left{justify-content: end;}
 }
    .md-show{ display:none; }

 @media(max-width:992px){
     .col-md-7.header-left { margin-top: 80px; }
    .banner-card{ padding:1rem; margin-top:20px;}
    .header-right{ padding:1rem;}
 
    .md-show{ display:block !important; }
    .sticky-header { padding: 15px 16px; }
    .topmob{ display:none; }
 }
 
    header .heading { background: #00000073; padding: 10px; }
</style>
</head>
<body>

@if(request()->segment(1)=="colleges")
<div class="nav-div college-all-div">
    <nav class="navbar navbar-expand-lg container page-navbar navbar-light">
        <div class="navbar-logo">
         <a href="{{ url('/') }}"><img src="{{ asset('assets/site') }}/images/course/college-logo.png" alt="" srcset=""></a>
        </div>
        <div class="mob-whatsapp"><a href="https://wa.me/+918448220344" target="_blank" class="btn btn-primary whatsappbutton">Whatsapp</a></div>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto search-menu navbar-customize-menu">
            <!-- <li class="nav-item active nav-search">
              <input type="search" placeholder="Search bar" class="form-control">
            </li>
            <li class="nav-item nav-dropdown">
              <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Category A</a>
                  <a class="dropdown-item" href="#">Category B</a>
                  <a class="dropdown-item" href="#">Category C</a>
                </div>
              </div>
              
            </li> -->
          </ul>
          <ul class="navbar-nav navbar-customize-menu">
            <li><a target="_blank" href="https://wa.me/+918448220344" class="btn btn-primary whatsappbutton">Whatsapp</a></li>
          </ul>
        </div>
      </nav>
      <div class="container college-all-header">
        <div class="row m-0 p-0">
            <div class="col-md-12">
              
              <!-- <li class="nav-item active nav-search">
                <input type="search" placeholder="Search bar" class="form-control">
             
              </li> 
              <li class="nav-item nav-dropdown">
                <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                  </a>
                
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Category A</a>
                    <a class="dropdown-item" href="#">Category B</a>
                    <a class="dropdown-item" href="#">Category C</a>
                  </div>
                </div>
                
              </li>  -->       
                <h2 class="header-heading mt-2 text-center">Medical colleges in India</h2>      
                
            </div>
         
        </div>

      </div>
</div>
@elseif(request()->segment(1)=="college")
@else
<div class="nav-div bg-banner">
    <nav class="navbar navbar-expand-lg container page-navbar navbar-light sticky-header">
        <div class="navbar-logo">
         <a href="{{ url('/') }}"><img class="sitelogo" src="{{ asset('assets/site') }}/images/MMC.jpg" alt="" srcset=""></a>
        </div>
        <div class="md-show">
            <a href="tel:{{ $mobile_number }}" class="btn btn-primary signupButton">{{ $mobile_number }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-customize-menu">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('colleges') }}">Colleges <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#coursehome">Courses <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#examshome">Exams <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-customize-menu topmob">
            <li><a href="tel:+{{ $mobile_number }}" class="btn btn-primary signupButton">{{ $mobile_number }}</a></li>
          </ul>
          <!--<ul class="navbar-nav ml-auto navbar-customize-menu d-none">

            <li><a href="#" class="signinButton">Sign Up</a></li>
            <li><a href="#" class="btn btn-primary signupButton">Signup</a></li>
          </ul>-->
        </div>
      </nav>

      
      <header class="container">
        <div class="row m-0 p-0">
            <div class="col-md-8 header-left">
                <div class="row heading">Your Dream of Medical College is Fulfilled Here <span>MBBS/MD/MS<br>BDS/MDS</span></div>
            </div>
            <div class="col-md-4 header-right pb-0" style="padding-top:0 !important;">
                <img src="{{ asset('assets/site') }}/images/hero-image.png" alt="" class="d-none">
                <div class="card banner-card">
                    <form method="post" action="{{ url('banner-form') }}">
                        @if(Session::has('form_msg'))
                            {!! Session::get('form_msg') !!}
                        @endif
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="tel" name="mobile" class="form-control" placeholder="Enter phone" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="state" class="form-control" value="{{ old('state') }}" required>
                                      <option value="" selected>Select Province</option>
                                        <option value="arun">Arun</option>
                                        <option value="janakpur">Janakpur</option>
                                        <option value="kathmandu">Kathmandu</option>
                                        <option value="gandaki">Gandaki</option>
                                        <option value="kapilavastu">Kapilavastu</option>
                                        <option value="karnali">Karnali</option>
                                        <option value="sudurpashchim">Sudurpashchim</option>
            
                                </select>
                                @error('state')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group  mb-1">
                                
                                <input type="hidden" name="landingpage" class="form-control" placeholder="Enter neet score"  value="{{ request()->segment(1) }}" required>
                                
                                <input type="text" name="neet_score" class="form-control" placeholder="Enter neet score"  value="{{ old('neet_score') }}" required>
                                @error('neet_score')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-field form-check col-lg-12">
							<input class="form-check-input" type="checkbox" name="agree" value="yes" required="">
						    <details>
                            <summary class="form-check-label limit-1">I, hereby authorize mbbschennai.com,.. </summary>
                            <label class="form-check-label" style="text-align: justify;">I, hereby authorize mbbschennai.com, to contact me. It will override my registry on the NCPR. 
							By providing your contact details you have expressly authorized mbbschennai.com to contact you in future through calls /SMS / E-mails and inform you about our products</label>
                            </details>
						</div>
                                <input type="submit" class="btn my-button mt-2" value="Submit">
                        </div>
                    </div>
                    </form>
                </div>    
            </div>
        </div>

    </header>
   
</div>
@endif

@yield('content')

<footer class="section-footer">
 <div class="container">
   <div class="row p-0 m-0 footer-logo-section">
     <div class="col-md-5 footer-logo">
       <img src="{{ asset('assets/site') }}/images/MMC.jpg" alt="">
       <h4 class="mt-3">My Medical Course</h4>
     </div>
     <div class="col-md-6 footer-socials">
      <div class="row">
        <img src="{{ asset('assets/site') }}/images/fb-icon.svg" alt="" srcset="">
        <img src="{{ asset('assets/site') }}/images/twitter-icon.svg" alt="" srcset="">
        <img src="{{ asset('assets/site') }}/images/insta-icon.svg" alt="" srcset="">
      </div>
     </div>
   </div>
   <div class="divider"></div>
  <div class="row p-0 m-0">
    <div class="col-md-3 col-6">
      <ul class="footer-menu-links">
        <li><strong>Get Started</strong></li>
        <li><a href="{{ url('news') }}">News</a></li>
        <li><a href="{{ url('mba-course-blogs') }}">MBA Courses Blogs</a></li>
      </ul>
    </div>
    <div class="col-md-3 col-6" >
      <ul class="footer-menu-links">
        <li><strong>About Us</strong></li>
        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
        <li><a href="{{ url('colleges') }}">Colleges</a></li>
        <li><a href="{{ url('exams') }}">Exams</a></li>
      </ul>
    </div>
    <div class="col-md-3">
      <ul class="footer-menu-links">
        <li><strong>Learn & Studing</strong></li>
        <li><a href="{{ url('ebooks') }}">Ebooks</a></li>
        <li><a href="{{ url('videos') }}">Videos</a></li>
        <li><a href="{{ url('courses') }}">Courses</a></li>
      </ul>
    </div>
    <!-- <div class="col-md-2 col-6">
      <ul class="footer-menu-links">
        <li><strong>Help</strong></li>
        <li>Report incident</li>
        <li>Request transcripts</li>
        <li>Alumnus</li>
        <li>Visitors</li>
        <li>Parents</li>
      </ul>
    </div> -->
    <div class="col-md-3 col-6">
      <ul class="footer-menu-links">
        <li><strong>Get in Touch</strong></li>
        <li><a href="mailto:info@mymedicalcourse.com">info@mymedicalcourse.com</a></li>
      </ul>
    </div>
  </div>
 </div>
 
</footer>

<style>
.modal .form-control {
    margin-bottom: 5px;
    border: 1px solid #0196da;
}
.modal .form-group > label{
  margin-top: 10px;
  margin-bottom: 5px;
}
.modal label.error{
  margin-top: 0px;
  margin-bottom: 5px;
  color: red;
}
.course-interest-btn {
  width: 150px;
}
.course-expertadvice-btn {
  width: 150px;
}
#modalShowInterest .modal-body {
  min-height: 200px;
}
#modalFreeExpertAdvice .modal-body {
  min-height: 200px;
}
</style>
<div class="modal fade" id="modalShowInterest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalShowInterestLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalShowInterestLabel">Show Interest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form id="course-interest-form" method="post" autocomplete="off">
  @csrf
  <input type="hidden" name="course_name" id="interest_course_name" value="<?= (isset($course) && isset($course->name))?$course->name:'' ?>">
  <input type="hidden" name="type" id="interest_type" value="">
  <div class="container">

    <div class="course-interest-msg"></div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Mobile <span class="text-danger">*</span></label>
            <input type="text" id="mobile" name="mobile" class="form-control"  maxlength="10" placeholder="Enter mobile number" onkeyup="this.value=this.value.replace(/[^\d]/,'')" pattern = "[0-5]">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Email Address <span class="text-danger">*</span></label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Message <span class="text-danger">*</span></label>
          <textarea id="message" name="message" rows="3" class="form-control" style="height: inherit;" placeholder="Enter Message"></textarea>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group text-center mt-4 mb-3">
          <button type="submit" class="btn btn-primary course-interest-btn hvr-bounce-to-top theme-btn">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFreeExpertAdvice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalFreeExpertAdvicetLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFreeExpertAdviceLabel">Free Expert Advice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form id="course-expertadvice-form" method="post" autocomplete="off">
  @csrf
  <input type="hidden" name="course_name" id="expertadvice_course_name" value="<?= (isset($course) && isset($course->name))?$course->name:'' ?>">
  <input type="hidden" name="type" id="expertadvice_type" value="">
  <div class="container">

    <div class="course-expertadvice-msg"></div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Mobile <span class="text-danger">*</span></label>
            <input type="text" id="mobile" name="mobile" class="form-control"  maxlength="10" placeholder="Enter mobile number" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Email Address <span class="text-danger">*</span></label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Message <span class="text-danger">*</span></label>
          <textarea id="message" name="message" rows="3" class="form-control" style="height: inherit;" placeholder="Enter Message"></textarea>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group text-center mt-4 mb-3">
          <button type="submit" class="btn btn-primary course-expertadvice-btn hvr-bounce-to-top theme-btn">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalnewsletter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalnewsletterLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalnewsletterLabel">Subscribe for Newsletter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form id="newsletter-form" method="post" autocomplete="off">
  @csrf
  <div class="container">

    <div class="newsletter-msg"></div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label>Mobile <span class="text-danger">*</span></label>
            <input type="text" id="mobile" name="mobile" class="form-control"  maxlength="10" placeholder="Enter mobile number" onkeyup="this.value=this.value.replace(/[^\d]/,'')" pattern = "[0-5]">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Email Address <span class="text-danger">*</span></label>
          <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address">
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group text-center mt-4 mb-3">
          <button type="submit" class="btn btn-primary newsletter-btn hvr-bounce-to-top theme-btn">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</div>


<style>
.snews{
  position: fixed;
  right: -82px;
  top: 50%;
  transform: translateY(-50%) rotate(-90deg);
  padding: 10px 15px;
  background-color: #03a84e;
  color: #fff;
  cursor: pointer;
}
</style>
<div class="snews" onclick="showNewsletter()">
  Subscribe for Newsletter
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>

@yield('scriptsbefore')

<script>

$(".tab-content table").addClass('table table-bordered');
$.validator.addMethod("mobileValidation", function(value, element) { return !/^[6789]\d{9}$/.test(value) ? false : true;}, "Please enter 10 digit mobile number.");
jQuery.validator.addMethod("valid_mail", function(value, element, param) {
    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
},'Please enter valid email address.');
</script>

@yield('scripts')

<script>
$("table").addClass('table table-bordered');
    function showInterest(title,type) {
      $("#interest_course_name").val(title);
      $("#interest_type").val(type);
      $("#modalShowInterest").modal('show');
      $("#course-interest-form .row").show();
      $(".course-interest-msg").html('');
    }
    function freeExpertAdvice(title,type) {
      $("#modalFreeExpertAdvice").modal('show');
      $("#course-expertadvice-form .row").show();
      $(".course-expertadvice-msg").html('');
      $("#expertadvice_course_name").val(title);
      $("#expertadvice_type").val(type);
    }

function alertDialog(type,message) {
  if (type=='error') {
    type = 'danger';
  }
  if (message=='') {
    message = 'Some problem occurred, please try again.';
  }
  return "<div class='alert alert-"+type+" alert-dismissible fade show'>"+message+" <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}

$('#course-interest-form').validate({ 
    ignore: [],
    rules: {
        name: {
          required:true
        },
        email: {
          required:true,
          email:true,
          valid_mail:true
        },
        mobile: {
          required:true,
          mobileValidation:$('#mobile').val()
        },
        message: {
          required:true
        },
        best_time: {
          required:true
        },
    },
    messages: {
      name: "Please enter name.",
      email: "Please enter valid email address.",
      mobile: "Please enter 10 digit mobile number.",
      message: "Please enter message.",
      best_time: "Please enter message."
    },
    submitHandler: function(form)
    {
         showinterest();
    }
});

function showinterest(){

  var select_form = document.getElementById("course-interest-form");
  var formData = new FormData(select_form );

  $.ajax({
          url: "{{ url('showinterest') }}",
          type        : 'post',
          cache       : false,
          contentType : false,
          processData : false,
          data        : formData,
        beforeSend: function() {
          $(".course-interest-msg").html('');
          $(".course-interest-btn").html('<i class="fa fa-spinner fa-spin"></i>').attr("disabled", true);
        },                        
          success: function(response){
            setTimeout(function() {
              $(".course-interest-btn").html("Submit").attr("disabled", false);
              try {
              if (response.status==true) {
                $("#course-interest-form .form-control").val('');
                $(".course-interest-msg").html(alertDialog('success',response.message));
                $("#course-interest-form .row").hide();
                $(".course-interest-msg .btn-close").hide();
              }
              else {
                  $(".course-interest-msg").html(alertDialog('error',response.message));
              }
          } catch(e) {
              $(".course-interest-msg").html(alertDialog('error',''));
          }
            },1000)
          },
          error: function(){
          $(".course-interest-btn").html("Submit").attr("disabled", false);
            $(".course-interest-msg").html(alertDialog('error',''));
          }
   });
}

$('#course-expertadvice-form').validate({ 
    ignore: [],
    rules: {
        name: {
          required:true
        },
        email: {
          required:true,
          email:true,
          valid_mail:true
        },
        mobile: {
          required:true,
          mobileValidation:$('#mobile').val()
        },
        message: {
          required:true
        },
        best_time: {
          required:true
        },
    },
    messages: {
      name: "Please enter name.",
      email: "Please enter valid email address.",
      mobile: "Please enter 10 digit mobile number.",
      message: "Please enter message.",
      best_time: "Please enter message."
    },
    submitHandler: function(form)
    {
         expertadvice();
    }
});

function expertadvice(){

  var select_form = document.getElementById("course-expertadvice-form");
  var formData = new FormData(select_form );

  $.ajax({
          url: "{{ url('expertadvice') }}",
          type        : 'post',
          cache       : false,
          contentType : false,
          processData : false,
          data        : formData,
        beforeSend: function() {
          $(".course-expertadvice-msg").html('');
          $(".course-expertadvice-btn").html('<i class="fa fa-spinner fa-spin"></i>').attr("disabled", true);
        },                        
          success: function(response){
            setTimeout(function() {
              $(".course-expertadvice-btn").html("Submit").attr("disabled", false);
              try {
              if (response.status==true) {
                $("#course-expertadvice-form .form-control").val('');
                $(".course-expertadvice-msg").html(alertDialog('success',response.message));
                $("#course-expertadvice-form .row").hide();
                $(".course-expertadvice-msg .btn-close").hide();
              }
              else {
                  $(".course-expertadvice-msg").html(alertDialog('error',response.message));
              }
          } catch(e) {
              $(".course-expertadvice-msg").html(alertDialog('error',''));
          }
            },1000)
          },
          error: function(){
          $(".course-expertadvice-btn").html("Submit").attr("disabled", false);
            $(".course-expertadvice-msg").html(alertDialog('error',''));
          }
   });
}

function showNewsletter() {
      $("#modalnewsletter").modal('show');
      $("#newsletter-form .row").show();
      $(".newsletter-msg").html('');
}

$('#newsletter-form').validate({ 
    ignore: [],
    rules: {
        name: {
          required:true
        },
        email: {
          required:true,
          email:true,
          valid_mail:true
        },
        mobile: {
          required:true,
          mobileValidation:$('#mobile').val()
        },
        message: {
          required:true
        },
        best_time: {
          required:true
        },
    },
    messages: {
      name: "Please enter name.",
      email: "Please enter valid email address.",
      mobile: "Please enter 10 digit mobile number.",
      message: "Please enter message.",
      best_time: "Please enter message."
    },
    submitHandler: function(form)
    {
         newsletter();
    }
});

function newsletter(){

  var select_form = document.getElementById("newsletter-form");
  var formData = new FormData(select_form );

  $.ajax({
          url: "{{ url('newsletter') }}",
          type        : 'post',
          cache       : false,
          contentType : false,
          processData : false,
          data        : formData,
        beforeSend: function() {
          $(".newsletter-msg").html('');
          $(".newsletter-btn").html('<i class="fa fa-spinner fa-spin"></i>').attr("disabled", true);
        },                        
          success: function(response){
            setTimeout(function() {
              $(".newsletter-btn").html("Submit").attr("disabled", false);
              try {
              if (response.status==true) {
                $("#newsletter-form .form-control").val('');
                $(".newsletter-msg").html(alertDialog('success',response.message));
              }
              else {
                  $(".newsletter-msg").html(alertDialog('error',response.message));
              }
          } catch(e) {
              $(".newsletter-msg").html(alertDialog('error',''));
          }
            },1000)
          },
          error: function(){
          $(".newsletter-btn").html("Submit").attr("disabled", false);
            $(".newsletter-msg").html(alertDialog('error',''));
          }
   });
}

    </script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61ea60949bd1f31184d8879a/1fptoii41';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
	function getCity(id='',th){
    var id = $('option:selected', th).attr('data-id');
		var _token = "{{ csrf_token() }}";
		$.ajax({
		        type: "POST",
		        url: "{{ route('getcity') }}",
		        data: {id:id,_token:_token},
		        success: function (response) {
		        	$('#city').html(response);
		        },
		        error: function () {
		           alert('Some Error Occured.');
		        }

		    });
	}

</script>

</body>
</html>