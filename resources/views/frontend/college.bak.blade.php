@extends('layouts.frontend')
@section('content')

	@include('frontend.college_detail_menu')

    <section class="learn-single-area bgcolor-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="learn-col">
			  <h2>About College: {{ $college->name }}</h2>
              <div id="aboutcollege" style="max-height:215px;overflow: hidden;">{!! $college->description !!}</div>
			  <a href="javascript:void(0)" onclick="displayAbout('readmore')" style="float:right;margin-bottom:10px" id="readmore">Read More <i class="fa fa-level-down-alt"></i></a>
			  <a href="#aboutcollege" onclick="displayAbout('readless')" style="float:right;display:none;margin-bottom:10px" id="readless">Read Less <i class="fa fa-level-up-alt"></i></a>
			</div>
			
			<div class="learn-col">
			  <h2>{{ $college->name }} Highlights</h2>
			  <div class="row mt-4">
				@if(!empty($college->approval))
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/quality.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Approval
						<h4>{{ $college->approval }}</h4>						
					</div>
				</div>
				@endif
				@if(!empty($college->genders_accepted))
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/bathroom.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Genders Accepted
						<h4>{{ $college->genders_accepted }}</h4>						
					</div>
				</div>
				@endif
				@if(!empty($college->ownership))
				<div class="col-md-4 highlightbox">
					<div class="highlight_icon">
						<img src="{{ asset('assets/images/ownership.png') }}" width="80%" />
					</div>
					<div class="highlight_content">
						Ownership
						<h4>{{ $college->ownership }}</h4>						
					</div>
				</div>
				@endif
			  </div>
			  <div class="row">
			  	@if(!empty($college->estd_year))
				<div class="col-md-4 mb-3">Estd. Year <strong>{{ $college->estd_year }}</strong></div>
				@endif
				@if(!empty($college->campus_size))
				<div class="col-md-4 mb-3">Campus Size <strong>{{ $college->campus_size }}</strong></div>
				@endif
				@if(!empty($college->total_faculty))
				<div class="col-md-4 mb-3">Total Faculty <strong>{{ $college->total_faculty }}</strong></div>
				@endif
				@if(!empty($college->student_enrollments))
				<div class="col-md-4 mb-3">Student Enrollments <strong>{{ $college->student_enrollments }}</strong></div>
				@endif
			  </div>

				@if($college->brochure)
				<div class="learn-col p-0">
				  <h4 class="d-inline">Want to know more about this college?</h4>
					<div class="d-inline form-group">
					<a href="javascript:void(0)" onclick="downloadBrochure()" class="btn btn-sm btn-success float-end">Download Brochure</a>
					</div>              			  
				</div>
				@endif
              
			</div>
          </div>

        @include('frontend.college_details_sidebar');
		</div>
      </div>
    </section>

<div class="modal fade" id="modalcollegeBrochure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalcollegeBrochureLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFreeExpertAdviceLabel">Download Brochure</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form id="collegebrochure-form" method="post" autocomplete="off">
  @csrf
  <input type="hidden" name="college_name" id="college_name" value="<?= (isset($college) && isset($college->name))?$college->name:'' ?>">
  <input type="hidden" name="college_id" id="college_id" value="<?= (isset($college) && isset($college->id))?$college->id:'' ?>">
  <input type="hidden" name="brochure" id="brochure" value="{{ $college->brochure }}">
  <div class="container">

    <div class="collegebrochure-msg"></div>

    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <label>Name <span class="text-danger">*</span></label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
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
          <button type="submit" class="btn btn-primary collegebrochure-btn hvr-bounce-to-top theme-btn">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>

      </div>
    </div>
  </div>
</div>
   
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

function downloadBrochure() {
$("#modalcollegeBrochure").modal('show');
$("#collegebrochure-form .row").show();
$(".collegebrochure-msg").html('');
}

$('#collegebrochure-form').validate({ 
    ignore: [],
    rules: {
        name: {
          required:true
        },
        email: {
          required:true,
          email:true,
          valid_mail:true
        }
    },
    messages: {
      name: "Please enter name.",
      email: "Please enter valid email address."
    },
    submitHandler: function(form)
    {
         collegebrochure_request();
    }
});

function collegebrochure_request(){

  var select_form = document.getElementById("collegebrochure-form");
  var formData = new FormData(select_form );

  $.ajax({
          url: "{{ url('collegebrochure_request') }}",
          type        : 'post',
          cache       : false,
          contentType : false,
          processData : false,
          data        : formData,
        beforeSend: function() {
          $(".collegebrochure-msg").html('');
          $(".collegebrochure-btn").html('<i class="fa fa-spinner fa-spin"></i>').attr("disabled", true);
        },                        
          success: function(response){
            setTimeout(function() {
              $(".collegebrochure-btn").html("Submit").attr("disabled", false);
              try {
              if (response.status==true) {
                $("#collegebrochure-form .form-control").val('');
                $(".collegebrochure-msg").html(alertDialog('success',response.message));
                $("#collegebrochure-form .row").hide();
                $(".collegebrochure-msg .btn-close").hide();
                setTimeout(function(){
                	var link = document.createElement('a');
					link.href = "{{ asset('uploads/college-brochure/'.$college->brochure) }}";
					link.download = "{{ $college->brochure }}";
					link.click();
					link.remove();
                },500);
              }
              else {
                  $(".collegebrochure-msg").html(alertDialog('error',response.message));
              }
          } catch(e) {
              $(".collegebrochure-msg").html(alertDialog('error',''));
          }
            },1000)
          },
          error: function(){
          $(".collegebrochure-btn").html("Submit").attr("disabled", false);
            $(".collegebrochure-msg").html(alertDialog('error',''));
          }
   });
}
</script>
@parent

@endsection