@extends('layouts.site')
@section('content')

<style type="text/css">
  .w-100{
    width: 100%;
  }
  .bgcolor-2{
    background: #f6ecd5;
  }
  .mt-20{
    margin-top:20px;
  }
  #myTabContent{
background: #fff;
    color: #000;
    border: 1px solid #00306B;
    border-bottom: 0px;
    padding: 30px;
    border-bottom: 5px solid #00306B;
  }
  .ranklist .fa-heart{
    color: #e8820f;
  }
  .ranklist b{
    font-weight: bold;
    color: #00306b;
  }
  .nav-tabs .nav-link{
    border-radius: 0px !important;
    background: #00306b;
    color: #fff;
    margin: 0px 3px 0px 0px;
  }
.nav-tabs .nav-link.active {
    color: #fff;
    background-color: #e9801e;
    border-color: #e8820f #dee2e6 #fff;
    border-bottom: 0px;
}
.ranklist{
  border: 1px solid #f1f1f1;
    padding: 10px;
    border-radius: 50px;
    background: #f6ecd5;
}
.ranklist img{
  border-radius: 100%;
  height: 34px;
  margin-right: 4px;
}
.fs_bold{
  font-weight: bold;
}
.courseinfo b{
  font-weight: bold;
}
.courseinfo .info{
  padding-top: 10px;
}
.courseinfo .info p{
    font-weight: 400 !important;
    font-size: 16px;
}
.featured_insti{
  padding-top: 30px;
}
.featured_insti li{
margin-bottom: 5px;
}
.featured_insti ::marker,.featured_insti a{
  color:#0196da !important;
  font-weight: bold !important;
  font-size: 14px;
}
#myTabContent p {
    font-weight: 400 !important;
    font-size: 16px;
}
.exam-content {
    font-weight: 400 !important;
    font-size: 14px;
}
.destination_table p{
  margin-bottom: 2px;
}
.hide{display: none;}
.course_tab_data.pricing-area {
    padding: 15px 0 20px !important;
}
.featured_insti ul{
  display: flex;
    grid-column-gap: 25px;
}
.featured_insti ul li{
  padding: 10px;
    background: #d1e7f1;
}
#destination .featured_insti.dest li{
   padding: 9px 50px !important;
    border-radius: 24px !important;
    border: 1px solid #666 !important;
    background: #fff !important;
    color: #fff !important;
}
#destination .featured_insti.dest li a{
  color: #666 !important;
}

  .news-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
  }
  .news-col img {
    width: 100%;
    height: 210px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  .news-col-body {
    padding: 13px 15px 10px 15px;
  }
  .news-col-body h5{
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    min-height: 48px;
  }

  .course-tab-btn {
    background: #fff;
    padding: 10px 25px;
    border-radius: 50px;
    box-shadow: 0px 10px 30px 0px rgb(0 0 0 / 10%);
    margin-right: 15px;
    margin-bottom: 15px;
    font-weight: 500;
  }
  .course-tab-btn.active{
    background-color: #FF5454;
    color: #fff;
  }


.ebook-box {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
    padding: 13px 15px;
    position: relative;
}
.ebook-box h5 {
    font-size: 13px;
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    height: 38px;
    margin:0px;
    padding: 0px;
    font-weight: 600;
    color: #00306b;
}
.ebook-box i {
  font-size: 18px;
  color: #e9801e;
  line-height: 32px;
}
.accordion-button {
  outline: none!important;
  box-shadow: none!important;
  font-weight: 600!important;
}
.accordion p {
  padding-bottom: 0px;
  margin-bottom: 0px;
}
.accordion-button:not(.collapsed) {
    color: #e9801e;
    background-color: #ffeedf;
    box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
}
.top-colleges li {
  margin-bottom: 7px;
}
.top-colleges li a {
  color: #00306b;
  text-decoration: none;
  font-weight: 600;
  font-size: 14px;
}
.top-colleges li a:hover {
  color: #e9801e;
}
.exam-details label{
  color: #000;
  font-size: 15px;
  font-weight: 430;
}
.exam-details b{
  color: #000;
  font-weight: 600;
}
.nav-tabs {
      margin-top: -15px;
}
.featured_insti ul {
    display: flex;
    grid-column-gap: 25px;
}

.tab-content ul {
    padding-left: 25px;
}

.tab-content .card {
    border: none!important;
    border-radius: 0px!important;
}

.card-header p {
  padding-bottom: 0px;
  margin-bottom: 0px;
  color: #000;
}
.card-header .btn-link {
  display: block;
}
.card-header .btn-link:hover {
    color: #000;
    text-decoration: none!important;
}

.card-header {
  border-radius: 0px!important;
  border: none!important;
  padding: 0px;
}
.card-header .btn-link {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    text-decoration: none!important;
}
.card-header .btn-link {
    color: #e9801e;
    background-color: #fff;
    box-shadow: none;
    font-weight: 600!important;
    border-top: 1px solid rgba(0,0,0,.125);
    outline: none!important;
    box-shadow: none!important;
    /*border-bottom: 1px solid rgba(0,0,0,.125);*/
}
.card:first-child .card-header .btn-link{
    border-top: 0px!important;
}
.card-header .btn-link:not(.collapsed) {
    color: #0196da!important;
    background-color: #e4f2f9;
    box-shadow: none;
    border-top: 1px solid #e4f2f9;
    border-bottom: 1px solid #e4f2f9;
}
.card-header .btn-link:not(.collapsed) p{
    color: #0196da!important;
}
.card-header .btn-link:not(.collapsed)::after {
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    transform: rotate(
-180deg
);
}
.card-header .btn-link::after {
    flex-shrink: 0;
    width: 1.25rem;
    height: 1.25rem;
    margin-left: auto;
    content: "";
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-size: 1.25rem;
    transition: transform .2s ease-in-out;
}
</style>


<style>
.course_college {
      padding-top: 40px;
    }
    .course_college .course-title {
      font-size: 32px;
    }
    .course-college-item {
      position: relative;
      background: #ffffff;
      border-radius: 3px;
      padding: 25px 30px;
      -webkit-box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);
      box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%), 0 3px 1px -2px rgb(0 0 0 / 20%);
      -webkit-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
    .college-rank {
      position: absolute;
    left: 0;
    top: 0;
    z-index: 0;
    padding: 2px 7px;
    background-color: #e9801e;
    font-size: 14px;
    line-height: 20px;
    color: #ffffff;
    }
    .college-rank:before {
      content: "";
    width: 0;
    height: 0;
    position: absolute;
    right: -15px;
    top: 0;
    border-left: 15px solid #e9801e;
    border-top: 24px solid transparent;
    }
    /*.course-college-item img { 
      width: 100%;
    }*/
    .course-college-item h5 { 
      font-size: 18px;
      padding-top: 7px;
      margin-top: 0px;
      margin-bottom: 4px;
      color: #000;
      display: inline-flex;
    }
    .course-college-item .theme-btn {
      padding: 5px 10px;
      height: 46px;
      margin: 0 auto;
      border-radius: 5px;
      border: none;
      line-height: 37px;
      font-size: 16px;
      border-radius: 46px;
      width: 100%;
  }

.exam-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
    margin-bottom: 30px;
  }
  .exam-col img {
    width: 100%;
    height: 210px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  .exam-col-body {
    padding: 13px 15px 10px 15px;
  }
  .exam-col-body h5{
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    color: #FF7B00;
    font-weight: 600;
  }
  .exam-col-body p{
    overflow: hidden;
    -webkit-line-clamp: 3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    min-height: 54px;
  }
</style>

   <section class="course_tab_data pricing-area bgcolor-3">
      <div class="container pb-5">
        <div class="row">
          <div class="col-lg-12">
              <h1 class="mt-2 mb-0">{{ $course->name }}</h1>
          </div>

          <div class="col-lg-12 mt-3 crstabs">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/') }}"><button class="college-section-tag{{ ($option=='')?' active':'' }}" type="button">Overview</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/rank') }}"><button class="college-section-tag{{ ($option=='rank')?' active':'' }}" type="button">Rank List</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/scope') }}"><button class="college-section-tag{{ ($option=='scope')?' active':'' }}" type="button">Scope</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/exams') }}"><button class="college-section-tag{{ ($option=='exams')?' active':'' }}" type="button">Exams</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/top-study-destination') }}"><button class="college-section-tag{{ ($option=='top-study-destination')?' active':'' }}" type="button">Top Study Destination</button></a>
                </li>   
                <!-- <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/ebooks') }}"><button class="nav-link{{ ($option=='ebooks')?' active':'' }}" type="button">Ebooks</button></a>
                </li> -->
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/questions-and-anwsers') }}"><button class="college-section-tag{{ ($option=='questions-and-anwsers')?' active':'' }}" type="button">Q & A</button></a>
                </li>           
              </ul>
              <div class="tab-content" id="{{ ($option=="rank" || $option=="exams")?'':'myTabContent' }}">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                 <div class="result">

                   @if($option=="rank")

                   <div class="mt-4 mb-4">
                      <h3 class="d-none">Ranks</h3>

                      <small>Showing {{ count($rank_data) }}  Ranks</small>

                    </div>

                   @if($option_url=="")
                   <?php if($rank_data){?>
                   <?php foreach($rank_data as $rank_row){?>
                     <div class="pricing-col course-college-item gg">

                        <div class="row">
                          <div class="col-md-9">
                            <a href="{{ url('course/'.$course->url.'/rank/'.$rank_row->slug) }}"><h5><?=($rank_row->rank_type)?$rank_row->rank_type:''?></h5></a>
                            <a href="{{ url('course/'.$course->url.'/rank/'.$rank_row->slug) }}"><p><?=($rank_row->description)? substr($rank_row->description, 0, 200):''?></p></a>

                          </div>
                          <div class="col-md-3 text-center">

                            @if($rank_row->image)
                            <a href="{{ url('course/'.$course->url.'/rank/'.$rank_row->slug) }}"><img src="{{ asset('uploads/rank/'.$rank_row->image) }}" alt=""></a>
                            @endif
                          
                          </div>
                        </div>

                      </div>
                    <?php } ?>
                    <?php } ?>
                    @endif

                      @if($option_url=="")
                     <?php if($rank_data && 0){?>
                        <div class="row">   
                              <?php foreach($rank_data as $rank_row){if($rank_row->rank_type){?>
                                  <div class="col-md-4" style="margin-bottom: 10px;">
                                    <div class="col-md-12 ranklist">

                                      <a href="{{ url('course/'.$course->url.'/rank/'.$rank_row->slug) }}">
                                        <div class="row">
                                         <div class="col-md-7"><img src="{{ asset('public/rankicon.png') }}"> <b><?=($rank_row->rank_type)?$rank_row->rank_type:''?></b></div>
                                        </div>
                                      </a>

                                    </div>
                                  </div>
                              <?php } }?>
                      </div>
                      <?php } ?>
                      @endif

                      @if($option_url)
                      <div class="row" style="padding-top: 0px;">
                        <h3>Top {{ $ranktype_detail->rank_type }} Ranking Colleges</h3>
                        <ul class="mt-3 top-colleges">
                          <?php foreach($ranktype_colleges as $key=>$row){?>
                          <li><a href="{{ url('college/'.$row->url) }}">{{ $key+1 }}. <?=$row->college_name?></a></li>
                           <?php } ?>  
                        </ul>

                      </div>
                      @endif

                    @endif

                    @if($option=="scope" && $course->scope)
                    <div class="info"><?=$course->scope?></div>
                    @endif

                    @if($option=="exams")

                   @if($option_url=="" && $course->exam)
                     <div class="mt-4 mb-4">
                        <h3 class="d-none">Exams</h3>

                        <small>Showing {{ count($exams) }}  Exams</small>

                      </div>

                      <div class="row">
                      @foreach($exams as $row)
                            <div class="col-lg-4 col-md-4">

                              <a href="{{ url('exams/'.$row->url) }}">
                                <div class="exam-col">

                                  <div class="exam-col-body">
                                    <h5 class="mb-0 pb-0">{{ $row->name }}</h5>
                                    <p style="color: #000;font-size: 12px;margin-top: 0px;margin-top: 10px;">{!! strip_tags($row->description) !!}</p>
                                  </div>
                                </div>
                              </a>

                            </div>
                           @endforeach
                      </div>

                    @endif


                      @if($option_url=="" && $course->exam && 0)
                      <div class="courseinfo" style="margin-bottom: 0px;"><b>Exams </b></div>
                      <div class="featured_insti">
                        <ul>
                         <?php 
                          
                          foreach($exams as $row){
                         ?>
                          <li><a href="{{ url('course/'.$course->url.'/exams/'.$row->url) }}"><?=$row->name?></a></li>

                       <?php } ?>
                       </ul>
                     </div>
                     @endif

                     @if($option_url && $exam_details->description)
                     <h2>{{ $exam_details->name }} </h2>

                    <div class="row exam-details">
                      @if(!empty($exam_details->exam_level))
                      <div class="col-md-4 mb-2"><label><b>Exam Level: </b>{{ $exam_details->exam_level }}</label></div>
                      @endif

                      @if(!empty($exam_details->mode_of_application))
                      <div class="col-md-4 mb-2"><label><b>Mode Of Application: </b>{{ ucwords($exam_details->mode_of_application) }}</label></div>
                      @endif

                      @if(!empty($exam_details->mode_of_exam))
                      <div class="col-md-4 mb-2"><label><b>Mode Of Exam: </b>{{ ucwords($exam_details->mode_of_exam) }}</label></div>
                      @endif

                      @if(!empty($exam_details->mode_of_counselling))
                      <div class="col-md-4 mb-2"><label><b>Mode of Counselling: </b>{{ ucwords($exam_details->mode_of_counselling) }}</label></div>
                      @endif

                      @if(!empty($exam_details->streams))
                      <div class="col-md-4 mb-2"><label><b>Streams: </b>{{ ucwords($exam_details->streams) }}</label></div>
                      @endif

                      @if(!empty($exam_details->language))
                      <div class="col-md-4 mb-2"><label><b>Language: </b>{{ $exam_details->language }}</label></div>
                      @endif

                      @if(!empty($exam_details->application_fee))
                      <div class="col-md-4 mb-2"><label><b>Application Fee: </b>{{ $exam_details->application_fee }}</label></div>
                      @endif

                      @if(!empty($exam_details->exam_duration))
                      <div class="col-md-4 mb-2"><label><b>Exam Duration: </b>{{ $exam_details->exam_duration }}</label></div>
                      @endif

                      @if(!empty($exam_details->conducting_body))
                      <div class="col-md-4 mb-2"><label><b>Conducting Body: </b>{{ $exam_details->conducting_body }}</label></div>
                      @endif

                    </div>

                     <div class="info mt-2 exam-content"><?=$exam_details->description?></div>
                     @endif

                    @endif

                    @if($option=="top-study-destination")

                      @if($top_destinations && $option_url=="")
                      <div class="row featured_insti dest" style="padding-top: 0px;">
                        <ul>
                          <?php foreach($top_destinations as $row){?>
                          <li><a href="{{ url('course/'.$course->url.'/top-study-destination/'.$row->slug) }}"><?=$row->state_name?></a></li>
                           <?php } ?>  
                        </ul>

                      </div>
                      @endif

                      @if($option_url)
                      <div class="row" style="padding-top: 0px;">
                        <h3>Top Colleges in {{ $top_destination_state->state_name }}</h3>
                        <ul class="mt-3 top-colleges">
                          <?php foreach($top_destination_colleges as $key=>$row){?>
                          <li><a href="{{ url('college/'.$row->url) }}">{{ $key+1 }}. <?=$row->college_name?></a></li>
                           <?php } ?>  
                        </ul>

                      </div>
                      @endif

                    @endif

                    @if($option=="ebooks")
                     <?php if($ebooks){?>
                        <div class="row"> 
                              <?php foreach($ebooks as $row){?>
                                  <div class="col-md-3" style="margin-bottom: 10px;">
                                    <div class="ebook-box">
                                      <div class="row">
                                        <div class="col-10">
                                          <h5>{{ $row->title }}</h5>
                                        </div>
                                        <div class="col-2">
                                          @if($row->document)
                                          <a href="{{ url('uploads/document/'.$row->document) }}" download ><i class="fa fa-download"></i></a>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              <?php } ?>
                      </div>
                      <?php } ?>
                    @endif

                    @if($option=="questions-and-anwsers" && $questionanswers)


<div id="accordion">

  <?php foreach($questionanswers as $key=>$row){?>
  <div class="card">
    <div class="card-header" id="heading{{ $row->id }}">
      <h5 class="mb-0">
        <button class="btn btn-link<?= ($key==0)?'':' collapsed' ?>" data-toggle="collapse" data-target="#collapse{{ $row->id }}" aria-expanded="true" aria-controls="collapse{{ $row->id }}">
          {!! $row->question !!}
        </button>
      </h5>
    </div>

    <div id="collapse{{ $row->id }}" class="collapse<?= ($key==0)?' show':'' ?>" aria-labelledby="heading{{ $row->id }}" data-parent="#accordion">
      <div class="card-body">
        {!! $row->answer !!}
      </div>
    </div>
  </div>
  <?php } ?>

</div>

                    <!-- <div class="accordion accordion-flush" id="accordionFlushExample">

                      <?php foreach($questionanswers as $row){?>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{ $row->id }}">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $row->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $row->id }}">
                            {!! $row->question !!}
                          </button>
                        </h2>
                        <div id="flush-collapse{{ $row->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $row->id }}" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">{!! $row->answer !!}</div>
                        </div>
                      </div>
                      <?php } ?>

                    </div> -->
                    @endif

                    @if($option=="")
                      @if($course->description || $course->eligibility_criteria || count($course_detail))
                    <div class="courseinfo">
                        @if($rank_data)
                        <hr>
                        @endif

                        @if($course->description)
                        <div class="info pt-0"><?=$course->description?></div>
                        @endif
                      
                        @if($course->eligibility_criteria)
                        <b>ELIGIBILITY : </b>
                        <div class="info"><?=$course->eligibility_criteria?></div>
                        @endif
                      
                        @if($course->fee_details)
                        <b>FEE DETAILS : </b>
                        <div class="info"><?=$course->fee_details?></div>
                        @endif

                        @if(count($course_detail))
                        <b>FEATURED INSTITUTES : </b>
                        <!-- <div class="info featured_insti">
                          <ul>
                          <?php foreach($course_detail as $row){?>
                            <li><a href="{{ url('college/'.$row->url) }}"><?=$row->name?></a></li>
                          <?php } ?> 
                          </ul>     
                        </div>  -->

                        @if(count($course_detail))
                            <div class="institute-cards1 row">
                              <?php foreach($course_detail as $row){?>
                              <div class="col-md-3 col-6 institute-card-column">
                                <a href="{{ url('college/'.$row->url) }}">
                                <div class="institute-single-card">
                                  @if($row->photo)
                                  <img class="college-icon" src="{{ asset('uploads/photo/'.$row->photo) }}" alt="">
                                  @endif
                                  <h3 class="mt-2"><?=$row->name?></h3>
                                  <span class="text-white"><?=$row->city_name?></span>
                                  <button class="btn btn-primary my-button-2 mt-2">View</button>
                                  <button class="btn btn-primary my-button-3"><img src="{{ asset('assets/site') }}/images/download-icon.svg" class="download-icon">Download Brochure</button>
                                </div>
                                </a>
                              </div>
                              <?php } ?>
                          @endif
                         @endif

                      </div>
                      @endif

                    <style>
                      .btn-form {
                        margin-top: 35px;
                        margin-bottom: 10px;
                      }
                      .btn-form .btn {
                        width: 100%;
                        text-transform: uppercase;
                      }
                    </style>

                    <div class="row btn-form">
                      <div class="col-md-12">
                        <button type="button" class="tag-2" onclick="showInterest('<?= (isset($course) && isset($course->name))?$course->name:'' ?>','Course')">Show Interest</button>
                        <button type="button" class="tag-2">Live Chat</button>
                        <button type="button" class="tag-2 d-none">Expert Predictor</button>
                        <button type="button" class="tag-2" onclick="freeExpertAdvice('<?= (isset($course) && isset($course->name))?$course->name:'' ?>','Course')">Free Expert Advice</button>
                      </div>
                    </div>

                    @endif

                 </div>
                </div>

              </div>

          </div>
        </div>
      </div>  
    </section> 

@endsection

@section('scripts')
<script>
/*$(".card-header .btn-link").click(function(){
  //$(this).addClass('collapsed');
  alert($(this).hasClass('collapsed'));
  if ($(this).hasClass('collapsed')===true) {
    $(".card-header .btn-link").removeClass('collapsed');
  }
  else {
    $(".card-header .btn-link").removeClass('collapsed');
    $(this).addClass('collapsed');
  }
});*/
</script>
@endsection