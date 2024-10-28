@extends('layouts.frontend')
@section('content')


    <!-- Hero Start -->
    <section class="hero-area hero-two-area hero-pagename-area background-image" @if(!empty($college->photo)) data-src="{{ asset('uploads/photo/').'/'.$college->photo }} @else data-src="{{ asset('assets/images/bg/bg.jpg') }} @endif"> 
	<div class="bannerOverlay"></div>
      <div class="container" style="position: relative;z-index: 1;">
        <div class="row">
          @if(!empty($college->logo))
		  <div class="col-xl-1">
			<img src="{{ asset('uploads/logo/').'/'.$college->logo }}" width="100%" />
		  </div>
		  @endif
          <div class="col-xl-11">
            <div class="">
              <h2>{{ $college->name }}</h2>
              <ul>
                <li><i class="fa fa-map-marker-alt" ></i> {{ $college->cityname->city_name }}, {{ $college->statename->state_name }}</li>
                @if(!empty($college->estd_year))<li><i class="fa fa-thumbtack" ></i> {{ $college->estd_year }}</li>  @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Learn Single Start -->
    <section class="p-0 m-0 bgcolor-1">
      <div class="container">
        <div class="row">
			<ul class="college-detail-menu">
				<li class="{{ !request()->is('college/*/*') ? 'active' : '' }}" ><a  href="{{ url('college/'.$college->url) }}">Overview</a></li>
				<li class="{{ request()->is('college/*/course-fee') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/course-fee">Courses & Fee</a></li>
				<li class="{{ request()->is('college/*/cutoff') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/cutoff">Cutoff</a></li>
				<li class="{{ request()->is('college/*/admission') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/admission">Admission</a></li>
				<li class="{{ request()->is('college/*/photo') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/photo">College Photos</a></li>
				<li class="{{ request()->is('college/*/news') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/news">News</a></li>
				<li class="{{ request()->is('college/*/videos') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/videos">Yotube Videos</a></li>
			</ul>
		</div>
	  </div>
	</section>
    <section class="learn-single-area bgcolor-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
			
			<div class="learn-col">
			  <h2>Quick Facts</h2>
			  <div class="row mt-4">
			  	@if($course->course_total_fee)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/fee.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Total Fee
						<h4>{{ $course->course_total_fee }}</h4>						
					</div>
				</div>
				@endif
				@if($course->course_seats)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/seats.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Seats
						<h4>{{ $course->course_seats }}</h4>						
					</div>
				</div>
				@endif
				@if($course->course_duration)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/duration.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Duration
						<h4>{{ $course->course_duration }}</h4>						
					</div>
				</div>
				@endif
				@if($course->course_mode)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/mode.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Mode
						<h4>{{ $course->course_mode }}</h4>						
					</div>
				</div>
				@endif
				@if($course->course_approval)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/quality.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Approval
						<h4>{{ $course->course_approval }}</h4>						
					</div>
				</div>
				@endif
				@if($course->course_exam)
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/exam.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Exam
						<h4>{{ $course->course_exam }}</h4>						
					</div>
				</div>
				@endif
			  </div>
              
			</div>
				
			@if($course->fee_details)		
            <div class="learn-col">
			  <h2>Fee Details</h2>
              {!! $college->fee_details !!}			  
			</div>
			@endif
			
			@if($course->brochure)
			<div class="learn-col">
			  <h4 class="d-inline">Want to know more about this course?</h4>
				<div class="d-inline form-group">
				<a href="{{ url('public/uploads/brochure/'.$course->brochure) }}" class="btn btn-sm btn-success float-end" target="_blank">Download Brochure</a>
				</div>              			  
			</div>
			@endif
			
			@if($course->description)	
            <div class="learn-col">
			  <h2>Course Description</h2>
              {!! $college->description !!}			  
			</div>
			@endif
			
			@if($course->eligibility_criteria)
            <div class="learn-col">
			  <h2>Eligibility Criteria</h2>
              {!! $college->eligibility_criteria !!}			  
			</div>
			@endif

          </div>

        @include('frontend.college_details_sidebar')
		</div>
      </div>
    </section>
   
@endsection
@section('scripts')
<script>
	function displayAbout(click){
		if(click=="readmore"){
			$('#aboutcollege').css({"maxHeight":"fit-content"});
			$('#readmore').css({"display":"none"});
			$('#readless').css({"display":"block"});
		} else {
			$('#aboutcollege').css({"maxHeight":"150px"});
			$('#readless').css({"display":"none"});
			$('#readmore').css({"display":"block"});
		}
	}
</script>
@parent

@endsection