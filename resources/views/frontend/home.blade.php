@extends('layouts.frontend')

@section('styles')
<style type="text/css">
    .w-100{ width: 100%; }
    .bgcolor-2{ background: #f6ecd5; }
    .mt-20{ margin-top:20px; }
    #myTabContent{ background: #fff; color: #000; border: 1px solid #e9801e; border-bottom: 0px; padding: 30px; border-bottom: 5px solid #e9801e; }
    .ranklist .fa-heart{ color: #e8820f; }
    .ranklist b{ font-weight: bold; color: #00306b; }
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
  color:#e9801e !important;
  font-weight: bold !important;
  font-size: 14px;
}
#myTabContent p {
    font-weight: 400 !important;
    font-size: 16px;
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
    background: #f6ecd5;
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
  .hero-col {
      position: relative;
      z-index: 2;
      background: rgba(247, 243, 243, 0.87);
      padding-bottom: 15px;
      border-radius: 15px;
      margin-bottom: 20px;
  }
  .top-section h1 {
    font-size: 28px;
    padding-top: 22px;
    margin-bottom: 0px;
  }
  .top-section p {
    font-size: 16px;
  }
  .top-section-box {
    position: relative;
  }
  .top-section-box h5 {
    font-size: 15px;
    position: absolute;
    left: 0px;
    margin-top: 0px;
    border-top-left-radius: 15px;
  }
  .section-col h2 {
    font-size: 25px;
  }
  .section-col .col-5 {
      text-align: right;
  }
  .section-col a {
    font-size: 18px;
    font-weight: 600;
    text-decoration: underline;
    color: #e9801e;
  }
  .section-article:before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 264px;
      background: -webkit-gradient(linear,left top,left bottom,from(#eafff9),to(#fff));
      background: -o-linear-gradient(top,#eafff9,#fff);
      background: linear-gradient(
  180deg,#eafff9,#fff);
      z-index: -1;
  }
  @media only screen and (max-width: 768px) {
  .top-section h1 {
    font-size: 22px;
    padding-top: 48px;
  }
  .top-section p {
    font-size: 16px;
  }
  .top-section-box h5 {
    font-size: 13px;
  }
  }
</style>
@endsection
@section('content')


    <!-- Hero Start -->
    <section class="hero-area background-image" data-src="{{ asset('assets/images/bg/unnamed.jpg') }}">

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-12 text-center">
            <div class="hero-col top-section">
              <div class="top-section-box">
              <h5><img src="{{ asset('assets/images/icons/checked.png') }}" alt=""> A Career is a life</h5>
              <h1>My MBA Course</h1>
              <p>Find Best MBA College in India</p> 
              </div>
			  <form method="get" action="{{url('colleges')}}" >
			  <input type="text" class="searchbox" name="college" placeholder="Search Colleges, Courses & more" />

			  <select type="text" class="searchbox" name="state" onchange="getCity(this.value,this);">
				<option value="" disabled="disabled" selected="selected">Select State</option>
				@foreach($state as $states)
				<option value="{{$states->state_name}}" data-id="{{$states->id}}">{{$states->state_name}}</option>
				@endforeach
			  </select>


			  <select type="text" class="searchbox" name="city" id="city">
				<option value="">Select City</option>

			  </select>
			  <select type="text" class="searchbox" name="exam" >
				<option value="">Select Exam</option>
				@foreach($exams as $exam)
				<option value="{{$exam}}">{{$exam}}</option>
				@endforeach
			  </select>
			  <select type="text" class="searchbox" name="degree" >
				<option value="">Select Degree</option>
        @foreach($course_list as $row)
        <option value="{{$row->name}}">{{$row->name}}</option>
        @endforeach
			  </select>
			  <button type="submit" name="search"  class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Search</button>
			  </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="course_tab_data pricing-area bgcolor-2">
      <div class="container pb-4">
        <div class="row">
          <div class="col-lg-12 justify-content-center">
            <div class="text-center" style="margin-bottom: 30px;">
            </div>
          </div>

          @if(0)
          <div class="col-lg-12">

              @foreach($courses as $key=>$c)
              <a href="{{url('course/'.$c->url.'/rank')}}" class="btn btn-default course-tab-btn{{ ($c->url==$default_course_url)?' active':'' }}" course="{{ $c->id }}">{{ $c->name }}</a>
              @endforeach

              <form method="post" id="course_select" style="display: none;">
                <select type="text" class="searchbox w-100" name="exam" onchange="getinformation(this.value,this);">
                <option value="" disabled="disabled" selected="selected">Select Course</option>
                @foreach($courses as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
                </select>
            </form>
          </div>
          @endif

          <style>
            .course-outer-title {
              font-size: 1.75rem;
              padding-bottom: 10px;
              text-decoration: underline;
              color: #e9801e;
              /*border-bottom: 1px solid #ddd;*/
            }
            .course-outer-title:hover {
              color: #00306b;
            }
            .course-outer {
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
          #myTabContent {
              border: 1px solid #ddd;
              border-bottom: 1px solid #ddd;
          }
          .course-outer .nav-tabs .nav-link:hover {
              color: #fff;
              background-color: #e9801e;
              border-color: #e8820f #dee2e6 #fff;
              border-bottom: 0px;
          }
          </style>

          @foreach($courses as $row)
          <?php $course = $row->course;$course_detail = $row->course_detail; ?>
          <div class="col-lg-12 mt-3 mb-4 crstabs course-details">

              <div class="course-outer">

              <a href="{{url('course/'.$course->url.'/colleges')}}"><h4 class="course-outer-title">{{ $course->name }}</h4></a>

              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/rank') }}"><button class="nav-link{{ ($option=='rank')?'':'' }}" type="button">Rank List</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/scope') }}"><button class="nav-link{{ ($option=='scope')?' active':'' }}" type="button">Scope</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/exams') }}"><button class="nav-link{{ ($option=='exams')?' active':'' }}" type="button">Exams</button></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/top-study-destination') }}"><button class="nav-link{{ ($option=='top-study-destination')?' active':'' }}" type="button">Top Study Destination</button></a>
                </li>   
                <!-- <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/ebooks') }}"><button class="nav-link{{ ($option=='ebooks')?' active':'' }}" type="button">Ebooks</button></a>
                </li> -->
                <li class="nav-item" role="presentation">
                  <a href="{{ url('course/'.$course->url.'/questions-and-anwsers') }}"><button class="nav-link{{ ($option=='questions-and-anwsers')?' active':'' }}" type="button">Q & A</button></a>
                </li>               
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                 <div class="result">

                    @if($course->description|| count($course_detail))
                    <div class="courseinfo">

                      @if($course->description)
                      <div class="info pt-0"><?=$course->description?></div>
                      @endif

                      @if(count($course_detail))
                      <b>FEATURED INSTITUTES : </b>
                      <div class="info featured_insti">
                        <ul>
                        <?php foreach($course_detail as $row){?>
                          <li><a href="{{ url('college/'.$row->url) }}"><?=$row->name?></a></li>
                        <?php } ?> 
                        </ul>     
                      </div> 
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
                      <div class="col-md-3 col-6">
                        <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn" onclick="showInterest('<?= (isset($course) && isset($course->name))?$course->name:'' ?>','Course')">Show Interest</button>
                      </div>
                      <div class="col-md-3 col-6">
                        <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn">Live Chat</button>
                      </div>
                      <div class="col-md-3 col-6">
                        <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn">Expert Predictor</button>
                      </div>
                      <div class="col-md-3 col-6">
                        <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn" onclick="freeExpertAdvice('<?= (isset($course) && isset($course->name))?$course->name:'' ?>','Course')">Free Expert Advice</button>
                      </div>
                    </div>

                 </div>
                </div>

              </div>

              </div>

          </div>
          @endforeach


        </div>
      </div>  
    </section>  


    @if(0)
    <!-- Pricing Start -->
    <section class="pricing-area bgcolor-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="title-col">
              <h2>Top Study Destination</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Ahmedabad.png') }}" />
					<h5>Ahmedabad</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Bangalore.png') }}" />
					<h5>Bangalore</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Bhopal.png') }}" />
					<h5>Bhopal</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Chennai.png') }}" />
					<h5>Chennai</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Hyderabad.png') }}" />
					<h5>Hyderabad</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Indore.png') }}" />
					<h5>Indore</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Jaipur.png') }}" />
					<h5>Jaipur</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Kolkata.png') }}" />
					<h5>Kolkata</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Mumbai.png') }}" />
					<h5>Mumbai</h5>
				</a>
			</div>
			<div class="col-sm-2 text-center">
				<a href="#" class="destination">
					<img src="{{ asset('assets/images/city/Pune.png') }}" />
					<h5>Pune</h5>
				</a>
			</div>
		</div>
	  </div>
	</section>
    <!-- Pricing Start -->
    <section class="pricing-area bgcolor-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="title-col">
              <h2>Choose the best Colleges in India</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
		@foreach($colleges as $college)
          <div class="col-lg-4 col-md-6">
            <div class="pricing-col">
              <p class="toplist">Featured</p>
              <div class="pricing-col-header">
			  @if(isset($college->logo) && !empty($college->logo))
				<img src="{{ asset('uploads/photo/').'/'.$college->photo }}" class="display-photo" alt="">
			  @else
                <img src="{{ asset('assets/images/logos/pricing-1.png') }}" class="display-photo" alt="">
			  @endif
                <!--<img src="{{ asset('assets/images/icons/checked-2.png') }}" alt="">-->
              </div>
              <div class="pricing-col-content">
                <h5>{{ $college->name }}</h5>
                <div class="reviews-bar">
                  <p>{{ $college->cityname->city_name }} <span>{{ !empty($college->ownership) ? "Ownership: " . $college->ownership : '' }}</span></p>
                </div>
				<hr class="m-1"/>
				<ul class="college-link">
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/admission') : '' }}">Admissions</a></li>
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/course-fee') : '' }}">Courses & Fees</a></li>
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/placements') : '' }}">Placements</a></li>
				</ul>
                <!--<ul>
                  <li>Rate it! </li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                </ul>-->
              </div>
              <div class="pricing-col-footer">
                <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}" role="button">Details</a>
                
              </div>
            </div>
          </div>
		@endforeach		  
          <div class="col-md-12 text-center">
              <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#" role="button">More Colleges</a>
		  </div>
        </div>
      </div>
    </section>
    @endif


    @if(count($blogs))
    <section class="pricing-area bgcolor-4" style="padding: 65px 0 35px;">
      <div class="container">

        <div class="row mb-3 section-col">
          <div class="col-7">
              <h2>News</h2>
          </div>
          <div class="col-5">
              <a href="{{ url('news') }}">View All</a>
          </div>
        </div>

        <div class="row">
          @foreach($blogs as $row)
          <div class="col-lg-4 col-md-4">

            <a href="{{ url('news/'.$row->slug) }}">
              <div class="news-col">
                <img src="{{ url('uploads/blog/'.$row->image) }}">

                <div class="news-col-body">
                  <h5>{{ $row->title }}</h5>
                </div>
              </div>
            </a>

          </div>
          @endforeach
        </div>

      </div>
    </section>
    @endif

    @if(count($articles))
    <section class="pricing-area bgcolor-4 section-article" style="padding: 35px 0 35px;">
      <div class="container">

        <div class="row mb-3 section-col">
          <div class="col-7">
              <h2>Medical Courses Blogs</h2>
          </div>
          <div class="col-5">
              <a href="{{ url('medical-course-blogs') }}">View All</a>
          </div>
        </div>

        <div class="row">
          @foreach($articles as $row)
          <div class="col-lg-4 col-md-4">

            <a href="{{ url('medical-course-blogs/'.$row->slug) }}">
              <div class="news-col">
                <img src="{{ url('uploads/article/'.$row->image) }}">

                <div class="news-col-body">
                  <h5>{{ $row->title }}</h5>
                </div>
              </div>
            </a>

          </div>
          @endforeach
        </div>

      </div>
    </section>
    @endif

    @if(count($ebooks))
    <section class="pricing-area bgcolor-4" style="padding: 35px 0 35px;">
      <div class="container">

        <div class="row mb-3 section-col">
          <div class="col-7">
              <h2>Ebooks</h2>
          </div>
          <div class="col-5">
              <a href="{{ url('ebooks') }}">View All</a>
          </div>
        </div>

        <div class="row">
          @foreach($ebooks as $row)
          <div class="col-lg-4 col-md-4">

            <a href="{{ url('ebooks/'.$row->slug) }}">
              <div class="news-col">
                <img src="{{ url('uploads/ebook/'.$row->image) }}">

                <div class="news-col-body">
                  <h5>{{ $row->title }}</h5>
                </div>
              </div>
            </a>

          </div>
          @endforeach
        </div>

      </div>
    </section>
    @endif


    @if(0)
    <!-- About Start -->
    <section class="about-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about-col">
              <h2>Why MBBS</h2>
              <p>The basic medical degree(MBBS) is just the initial stage in gaining knowledge and competence for a future in medicine where you strive for the common good. ... After 5.5 years of training, some graduates decide to practice medicine while others chose to study further specialisations like surgery, dermatology, medicine etc.02-Aug-2017 there is an urgent need to increase the medical institutions and training in the country. The government may further formulate lucrative policies to attract students studying MBBS abroad to practice in India.</p>
              <p>The lack of quality care in the public health sector and the immeasurable wait time has caused the care seekers to increasingly turn towards private sector hospitals. This drives high out-of-pocket costs which escalate the gravity of the problem. The distinct gap in the affordability and accessibility of the Indian health care system is evident across all regions.</p>
              <p>Even during the pandemic situation occurred out of COVID-19, a notable challenge faced by the healthcare industry is the shortage of personal protective equipment due to its high demand in healthcare centres.</p>
              <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="{{url('colleges')}}" role="button">Find Colleges</a>
            </div>
          </div>
          <div class="col-lg-6 pt-5">
            <div class="about-col pt-5">
              <img src="{{ asset('assets/images/about/1.png') }}" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- Company Reviw Start -->
<!--    <section class="company-review-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="title-col">
              <h2>Featured Colleges</h2>
              <p>Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="company-review-col">

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <span class="tagtext">EDITOR CHOICE</span>
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/1.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <span class="tagtext bg-two">EDITOR CHOICE</span>
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/2.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/3.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/4.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/5.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/6.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="company-review-box">
                <div class="company-review-box-text">
                  <h4>Choice Home Warranty</h4>
                  <ul>
                    <li><span>Summer sale: $50 0ff + 1 month free</span></li>
                    <li>Handled over 4,000,000 service requests</li>
                    <li>Fix or replace guarantee</li>
                    <li>First 30 days: free cancellation</li>
                  </ul>
                </div>
                <div class="company-review-box-progress">
                  <p class="progress-toptext">Over 2246 people chose this site today</p>
                  <div class="reviews-bar">
                    <p>Outstanding <span>9.8</span></p>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="ratebox">
                    <ul>
                      <li>Rate it! (24321)</li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                      <li><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="company-review-box-logo">
                  <a href="#." target="_blank" class="companylogo"><img src="images/logos/7.png" alt=""></a>
                  <div class="company-review-box-btn">
                    <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Check Plan</a>
                    
                  </div>
                </div>
              </div>

              <div class="loadmore-btn text-center mt-5">
                <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Load More List</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
-->
    <!-- Testimonial Start -->
<!--    <section class="testimonial-area">

      <div class="testimonial-icon-1 spin">
        <img src="{{ asset('assets/images/icons/3.png') }}" alt="">
      </div>
      <div class="testimonial-icon-2 spin">
        <img src="{{ asset('assets/images/icons/6.png') }}" alt="">
      </div>
      <div class="testimonial-icon-3 spin">
        <img src="{{ asset('assets/images/icons/1.png') }}" alt="">
      </div>
      <div class="testimonial-icon-4 spin">
        <img src="{{ asset('assets/images/icons/5.png') }}" alt="">
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="title-col">
              <span>Clients Testimonials</span>
              <h2>What People’s Say.</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="testimonial-col">
              <div class="testimonial-carousel">
                <div class="testimonial-item">
                  <img src="{{ asset('assets/images/icons/quotation.png') }}" alt="" class="quotation-img">
                  <div class="testimonial-img">
                    <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="" class="img-fluid">
                  </div>
                  <h4>Rasel Al Hossain</h4>
                  <span>Real estate agent</span>
                  <p>Ok firstly, I will clear it out that I do not work for Sun Basket. I am an accountant and I love eating! But my whole world turned upside down after There are many variations of passages of Lorem Ipsum available</p>
                </div>
                <div class="testimonial-item">
                  <img src="{{ asset('assets/images/icons/quotation.png') }}" alt="" class="quotation-img">
                  <div class="testimonial-img">
                    <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="" class="img-fluid">
                  </div>
                  <h4>Rasel Al Hossain</h4>
                  <span>Real estate agent</span>
                  <p>Ok firstly, I will clear it out that I do not work for Sun Basket. I am an accountant and I love eating! But my whole world turned upside down after There are many variations of passages of Lorem Ipsum available</p>
                </div>
                <div class="testimonial-item">
                  <img src="{{ asset('assets/images/icons/quotation.png') }}" alt="" class="quotation-img">
                  <div class="testimonial-img">
                    <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="" class="img-fluid">
                  </div>
                  <h4>Rasel Al Hossain</h4>
                  <span>Real estate agent</span>
                  <p>Ok firstly, I will clear it out that I do not work for Sun Basket. I am an accountant and I love eating! But my whole world turned upside down after There are many variations of passages of Lorem Ipsum available</p>
                </div>
                <div class="testimonial-item">
                  <img src="{{ asset('assets/images/icons/quotation.png') }}" alt="" class="quotation-img">
                  <div class="testimonial-img">
                    <img src="{{ asset('assets/images/testimonial/1.png') }}" alt="" class="img-fluid">
                  </div>
                  <h4>Rasel Al Hossain</h4>
                  <span>Real estate agent</span>
                  <p>Ok firstly, I will clear it out that I do not work for Sun Basket. I am an accountant and I love eating! But my whole world turned upside down after There are many variations of passages of Lorem Ipsum available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
-->
    <!-- About Two -->
    <section class="about-two-area">

      <div class="about-icon-1 spin">
        <img src="{{ asset('assets/images/icons/7.png') }}" alt="">
      </div>
      <div class="about-icon-2 spin">
        <img src="{{ asset('assets/images/icons/8.png') }}" alt="">
      </div>

    </section>

    <!-- Blog Start -->
<!--    <section class="blog-area">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="title-col">
              <h2>Popular Articles</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <div class="imghover">
                <figure>
                  <img src="{{ asset('assets/images/blog/1.jpg') }}" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="blog-content">
                <span>August 15, 2025</span>
                <h5><a href="#.">10 Simple Home Improvement Tips to Help Home Sellers Get</a></h5>
                <a href="#." class="readmore">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <div class="imghover">
                <figure>
                  <img src="{{ asset('assets/images/blog/2.jpg') }}" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="blog-content">
                <span>August 15, 2025</span>
                <h5><a href="#.">We are changing the way the world learns</a></h5>
                <a href="#." class="readmore">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="blog-col">
              <div class="imghover">
                <figure>
                  <img src="{{ asset('assets/images/blog/3.jpg') }}" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="blog-content">
                <span>August 15, 2025</span>
                <h5><a href="#.">Look for These Home Insurance Discounts</a></h5>
                <a href="#." class="readmore">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

-->
@endsection
@section('scripts')

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
<script type="text/javascript">

  $('.course-tab-btn').click(function(event){

    event.preventDefault();
    $('.course-tab-btn').removeClass('active');

    $(this).addClass('active');

    var id = $(this).attr("course");

    $.ajax({
       type:'POST',
       url:'{{ url("getcourse_detail") }}',
       data:{'_token': '<?php echo csrf_token() ?>','id':id},
       success:function(response) {
        $('.course-details').html(response);
       }
    });

  });

  /*function getinformation(id,th){ 
    $.ajax({
       type:'POST',
       url:'{{ url("getcourse_detail") }}',
       data:{'_token': '<?php echo csrf_token() ?>','id':id},
       success:function(response) {
          // $('.courseinfo .info').html(response.course.eligibility_criteria);
       }
    }); 
    if(id){
    $('.crstabs').removeClass('hide');
  }else{

  }
  var tx = $(th).find('option:selected').text();
  $('#scope').html(tx);
  getranklist(id);
  get_scope(id);
  get_destination(id);
  get_exam(id);
  }

  function getranklist(id){
        $.ajax({
           type:'POST',
           url:'{{ url("ranklist") }}',
           data:{'_token': '<?php echo csrf_token() ?>','id':id},
           success:function(response) {
               $('#myTabContent #home .result').html(response);
           }
        });       
  }

  function get_scope(id){
        $.ajax({
           type:'POST',
           url:'{{ url("getcourse_detail") }}',
           data:{'_token': '<?php echo csrf_token() ?>','id':id},
           success:function(response) {
               $('#myTabContent #profile .result').html(response);
           }
        });       
  }

  function get_destination(id){
        $.ajax({
           type:'POST',
           url:'{{ url("get_top_destination") }}',
           data:{'_token': '<?php echo csrf_token() ?>','id':id},
           success:function(response) {
               $('#myTabContent #destination .result').html(response);
           }
        });       
  }

  function get_exam(id){
        $.ajax({
           type:'POST',
           url:'{{ url("get_course_exam") }}',
           data:{'_token': '<?php echo csrf_token() ?>','id':id},
           success:function(response) {
               $('#myTabContent #contact .result').html(response);
           }
        });       
  }  */
</script>
@parent

@endsection