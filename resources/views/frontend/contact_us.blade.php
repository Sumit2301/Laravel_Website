@extends('layouts.site')
@section('content')

<style>
.contact-info {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
    margin-bottom: 30px;
  }
  .contact-info {
    padding: 20px 15px 20px 25px;
  }
  .contact-info i {
    font-size: 30px;
    color: #FFAA4C;
  }
  .contact-info span {
    font-size: 18px;
    color: #666;
    font-weight: 600;    
    line-height: 31px;
  }
  .contact-us-body {
    padding: 0px 15px 10px 15px;
  }
  .form-group input,.form-group textarea {
    margin-top: 7px;
  }
  .contact-btn {
    width: 130px;
    font-size: 15px;
  }
</style>

<section class="pricing-area">
  <div class="container">

    <div class="row" style="margin-top: 100px;">

      <div class="col-md-4">

        <!--<div class="contact-info">
            <div class="row">
              <div class="col-2 text-center"><i class="fa fa-map-marker"></i></div>
              <div class="col-10"><span>C4, Sector - 63, Noida - 201301</span></div>
            </div>
        </div>-->

        <a href="tel:+911234567890">
          <div class="contact-info">
              <div class="row">
                <div class="col-2 text-center"><i class="fa fa-phone"></i></div>
                <div class="col-10"><span>+91 1234567890</span></div>
              </div>
          </div>
        </a>

        <a href="mailto:example@gmail.com">
          <div class="contact-info">
              <div class="row">
                <div class="col-2 text-center"><i class="fa fa-envelope"></i></div>
                <div class="col-10"><span>example@gmail.com</span></div>
              </div>
          </div>
        </a>

        <a href="#">
          <div class="contact-info">
              <div class="row">
                <div class="col-2 text-center"><i class="fa fa-map-marker"></i></div>
                <div class="col-10"><span>Test Business Tower
                                            H-21, 3rd floor, Block d, Sector 63,
                                            jaipur,  Rajasthan - 302034</span></div>
              </div>
          </div>
        </a>
        
      </div>

      <div class="col-md-8">
        <div class="contact-us-body">
            <h2>Contact Us</h2>

            <form id="contact-form" method="post" autocomplete="off">
@csrf
<div class="form-content">

<div class="contact-msg"></div>

<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label>Name <span class="text-danger">*</span></label>
      <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label>Mobile</label>
        <input type="text" id="phone" name="mobile" class="form-control"  maxlength="10" placeholder="Enter mobile number" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label>Email Address <span class="text-danger">*</span></label>
      <input type="text" id="email" name="email" class="form-control" placeholder="Enter email address">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      <label>Subject</label>
      <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter subject">
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-group">
      <label>Message <span class="text-danger">*</span></label>
      <textarea id="message" name="message" rows="3" class="form-control" style="height: inherit;" placeholder="Enter Message"></textarea>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="form-group text-left mt-3 mb-3">
      <button type="submit" class="btn cta-button contact-btn">Submit</button>
    </div>
  </div>
</div>
</div>
</form>

        </div>
      </div>


    </div>    
    <div class="row justify-content-center mt-5">
      <div class="col-4">
  {{ $exams->links() }}
  </div>
</div>
  </div>

</section>
@endsection

@section('scripts')
<script>
$('#contact-form').validate({ 
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
          required:false,
          //mobileValidation:$('#phone').val()
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
         contact_process();
    }
});

function contact_process(){

  var select_form = document.getElementById("contact-form");
  var formData = new FormData(select_form );

  $.ajax({
          url: "{{ url('contact_process') }}",
          type        : 'post',
          cache       : false,
          contentType : false,
          processData : false,
          data        : formData,
        beforeSend: function() {
          $(".contact-msg").html('');
          $(".contact-btn").html('<i class="fa fa-spinner fa-spin"></i>').attr("disabled", true);
        },                        
          success: function(response){
            setTimeout(function() {
              $(".contact-btn").html("Submit").attr("disabled", false);
              try {
              if (response.status==true) {
                $("#contact-form .form-control").val('');
                $(".contact-msg").html(alertDialog('success',response.message));
              }
              else {
                  $(".contact-msg").html(alertDialog('error',response.message));
              }
          } catch(e) {
              $(".contact-msg").html(alertDialog('error',''));
          }
            },1000)
          },
          error: function(){
          $(".contact-btn").html("Submit").attr("disabled", false);
            $(".contact-msg").html(alertDialog('error',''));
          }
   });
}
</script>
@endsection