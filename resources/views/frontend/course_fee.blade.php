@extends('layouts.site')
@section('content')

	@include('frontend.college_detail_menu')
	
	<section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">
		  <small>Showing {{ count($college->courses) }}  Courses</small><br/><br/>
		  @foreach($college->courses as $course)
            <div class="learn-col course-row">
				<div class="row">
					<div class="col-12">
					<h3><a href="{{ !empty($course->url) ? url('course/'.$course->url) : '' }}" target="_blank">{{ $course->name }}</a></h3>				  
					<ul class="college-link2">
						@if(!empty($course->course_approval))<li>Approval: <strong>{{ $course->course_approval }}</strong></li>@endif
						@if(!empty($course->course_exam))<li>Exam: <strong>{{ $course->course_exam }}</strong></li>@endif
						@if(!empty($course->course_seats))<li>Seats: <strong>{{ $course->course_seats }}</strong></li>@endif
						@if(!empty($course->course_total_fee))<li>Total Fees: <strong>{{ $course->course_total_fee }}</strong></li>@endif
						@if(!empty($course->course_duration))<li>Duration: <strong>{{ $course->course_duration }}</strong></li>@endif
						@if(!empty($course->course_mode))<li>Mode: <strong>{{ $course->course_mode }}</strong></li>@endif
					</ul>
					</div>
				</div>

				@if($course->brochure)
				<div class="row"><div class="col-12">
				<a class="btn btn-sm btn-success float-start" href="{{ url('public/uploads/brochure/'.$course->brochure) }}">Download Brochure</a>
				</div></div>
				@endif

			</div>
		  @endforeach
		  </div>
        @include('frontend.college_details_sidebar');
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