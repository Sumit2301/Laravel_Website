<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My MBA College</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:wght@400;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet"> 

@yield('stylesbefore')
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- font-awesome CSS -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- owl CSS -->
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <!-- stellarnav CSS -->
    <link href="{{ asset('assets/css/stellarnav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
	@yield('styles')


  <style>
    .tab-content ul {
        padding-left: 25px;
    }
    .tab-content ul li {
        list-style-type: inherit;
        margin-bottom: 9px;
    }
    .header-area {
      z-index: 99;
    }
    
  .star-rating {
    text-align: center;
    margin-bottom: 10px;
  }
  .star-rating span {
    color: #ddd;
    font-size: 13px;
  }
  .star-rating .checked {
    color: orange;
  }
  .courseinfo {
    overflow: inherit!important;
}

    @media only screen and (min-width: 768px) {
      .course-college-item img { 
        height: 130px;
      }
    }
    @media only screen and (max-width: 768px) {
      .course-college-item .theme-btn,.tab-content .theme-btn {
        margin-bottom: 15px!important;
        padding: 5px 5px;
        font-size: 14px!important;
      }
      .course-college-item {
        padding: 15px 15px!important;
      }
    }
  </style>
</head>

<body>

    <!-- Header Start -->
    <header class="header-area myheader">
      <div class="header-menubar">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-12">
              <div class="navbar-col">
                <div id="main-nav" class="stellarnav">
                  <div class="header-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid"></a>
                  </div>
                   <!--<ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="about.html">About</a></li>
                      <li><a href="#.">News</a></li>
                   </ul>-->
                   <div class="menu-right-side">
                    <a href="https://wa.me/+919626695493/?text=Hi" target="_blank"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
	@yield('content')
	
    <!-- Footer Start -->
    <section class="footer-area">

      <div class="footer-icon-1 spin">
        <img src="images/icons/dots.png" alt="">
      </div>
      <div class="footer-icon-2 spin">
        <img src="images/icons/dots.png" alt="">
      </div>
      <div class="footer-icon-3 spin">
        <img src="images/icons/round.png" alt="">
      </div>
      <div class="footer-icon-4 spin">
        <img src="images/icons/round-2.png" alt="">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <form class="footer-col footer-form row">
              <!--<img src="{{ asset('assets/images/logo-2.png') }}" alt="" class="img-fluid">-->
              <h5>Quick Contact</h5>
			  <div class="col-md-4">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Name" required />      
				  </div>
              </div>
			  <div class="col-md-4">
				  <div class="form-group">
					<input type="email" class="form-control" placeholder="Email" required />      
				  </div>
              </div>
			  <div class="col-md-4">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Number" required />      
				  </div>
              </div>
			  <div class="col-md-10">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="Message" required />      
				  </div>
              </div>
			  <div class="col-md-2">
				  <div class="form-group">
					<input type="submit" class="form-control btn btn-primary" name="enquiry" value="Submit" />      
				  </div>
              </div>
            </form>
          </div>
          <div class="col-lg-1"></div>
          <div class="col-lg-3">
            <div class="footer-col footer-address-col">
              <h5>Our Contacts</h5>
              <p><i class="fa fa-phone"></i> &nbsp; +91 96266 95493</p>
              <p><i class="fa fa-envelope-open"></i> &nbsp; medicinecourse@gmail.com</p>
              <ul>
                <li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#."><i class="fab fa-twitter"></i></a></li>
                <li><a href="#."><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <p class="copyright">Copyright © 2021 All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </section>

    <a id="button" href="#."><img src="{{ asset('assets/images/next.png') }}" alt=""></a>

<style>
.modal .form-control {
    margin-bottom: 5px;
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- All Included JavaScript -->
    <script src="{{ asset('assets/js/stellarnav.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/html5lightbox.js') }}"></script>
    
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

$(".tab-content table").addClass('table table-bordered');
$.validator.addMethod("mobileValidation", function(value, element) { return !/^[6789]\d{9}$/.test(value) ? false : true;}, "Please enter 10 digit mobile number.");
jQuery.validator.addMethod("valid_mail", function(value, element, param) {
    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
},'Please enter valid email address.');

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

    </script>
@yield('scripts')
</body>
</html>