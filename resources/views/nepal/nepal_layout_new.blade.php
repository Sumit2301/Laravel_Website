<?php 
    $meta_title                         =   "My Medical Course"; 
    $meta_description                   =   "";
    $meta_keywords                      =   "";
     
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ $meta_title }}</title>
        <meta name="description" content="{{ $meta_description }}" />
        <meta name="keywords" content="{{ $meta_keywords }}" />
        <meta property="og:image:type" content="image/jpg">
        <meta property="og:image:width" content="1024">
        <meta property="og:image:height" content="1024">
        <meta property="og:image" content="{{  asset('public/front') }}/w3.jpg" />
    
        @yield('meta')
    
        <link href="https://fonts.google.com/specimen/Montserrat#glyphs" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
        <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('assets/site') }}/css/desktop.css">
        <link rel="stylesheet" href="{{ asset('assets/site') }}/css/tablet.css">
        <link rel="stylesheet" href="{{ asset('assets/site') }}/css/mobile.css">
        
        <style>
            header .logo, footer .logo { width: 120px; }
            header { all: unset; }
            
            @media(max-width:992px){
                .text-small-center{ text-align:center;}
            }
            
            .signupButton {
                background-color: transparent;
                border-radius: 50px;
                font-size: 14px;
                padding: 5px 20px;
                border: 2px solid #fff;
                color: #134c81;
            }
            
            .fa-phone{ transform: rotate(90deg); }
    
            @yield('styles')
        </style>

    </head>
    <body>
        <header class="header-container">
            <div class="container py-2">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-small-center">
                        <img src="{{ asset('assets/site') }}/images/MMC.jpg" alt="header-logo" class="logo">
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <h5>Study in Nepal's Top Medical Colleges</h5>
                        <h6>MBBS Admission open 2022</h6>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 text-center">
                        <a href="tel:++91 9205679951" class="btn signupButton"><i class="fa fa-phone"></i>&nbsp; +91 9205679951</a>
                        <a href="tel:++91 8448220344" class="btn signupButton"><i class="fa fa-phone"></i>&nbsp;+91 8448220344</a>
                    </div>
                </div>
            </div>
        </header>
        
        
        @yield('content')

        <footer class="section-footer">
            <div class="container">
                <div class="row p-0 m-0 footer-logo-section">
                    <div class="col-md-5 footer-logo">
                        <img src="{{ asset('assets/site') }}/images/MMC.jpg" alt="footer-logo" class="logo">
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
.section-lower-tags div {
  cursor: pointer;
}
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
.popup-footer{
width: 100%;
    background: #F4531F;
    color: #fff;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: sticky;
    bottom: 0;
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
        
        @yield('scripts')
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
    
    $('.close').click(function(){
        $('#sign_up_form')[0].reset();
        $('#sign_up_form label.error').hide();
    });
    
    $('#sign_up_form').validate({  
    rules: {  
      name: 'required',  
      mobile: 'required',  
      email: 'required',  
      state: 'required',  
      interested_course: 'required',  
     },  
    messages: {  
      name: 'This field is required',  
    },  
    submitHandler: function(form) {  
      form.submit();  
    }  
  });

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
<section class="popup-footer">
      <header>Medical Admission Help </header>&nbsp;
       <a href="tel:+91 9205679951" target="blank"><div class="get-call-btn"> +91 9205679951</div></a><a>
</a></section>
    </body>
</html>