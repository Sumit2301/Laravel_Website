@extends('layouts.site')

@section('stylesbefore')
@endsection

@section('styles')
@endsection

@section('content')
<style>
        .ribbon-title {
            position: relative;
            text-align-last: center;
            padding: 2px 0px;color: white;
        }

        .ribbon-title:after {
            width: 100%;
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            background: linear-gradient(to right, rgb(249 249 249) 0%, rgba(255, 255, 255, 0) 69%);
            height: 100%;
        }

        .ribbon-section {
            width: 150px;
            margin: 7px 0px;
            background-color: #FF7B00;
            clip-path: polygon(100% 0%, 91% 51%, 100% 100%, 0 100%, 0 52%, 0 0);
        }
        .visiblehide{visibility:hidden;}
    </style>
<div class="search-form" style="margin-top: -80px;">
  <form method="get" action="{{url('colleges')}}">
    <input type="text" name="college" class="form-control my-form-element" placeholder="Search Colleges, Courses" value="{{ request()->college }}">
    <select name="state" class="form-control my-form-element" onchange="getCity(this.value,this);">
      <option value="" selected>Select State</option>
      @foreach($state as $states)
      <option value="{{$states->state_name}}" data-id="{{$states->id}}">{{$states->state_name}}</option>
      @endforeach
    </select>
    <select name="city" class="form-control my-form-element" id="city">
      <option value="" selected>Select City</option>
    </select>
    <select name="exam" class="form-control my-form-element">
      <option value="" selected>Select Exam</option>
      @foreach($exams as $exam)
      <option value="{{$exam}}">{{$exam}}</option>
      @endforeach
    </select>
    <select name="degree" class="form-control my-form-element">
      <option value="" selected>Select Degree</option>
        @foreach($course_list as $row)
        <option value="{{$row->name}}">{{$row->name}}</option>
        @endforeach
    </select>
    <button type="submit" name="search" class="btn my-button my-form-element">Search</button>
   
  </form>
</div>

<div class="container all-colleges">
  <div class="row m-0 p-0">
     
    @if(count($colleges)==0) 
    <div class="col-lg-12" style="padding-top:50px;padding-bottom:200px;">
    <h5 class="text-center">No colleges were found matching your selection.</h5>
    </div>
    @endif

    @foreach($colleges as $college)
    <div class="col-lg-4 col-md-6 col-12 mt-4 mb-3">
      <div class="single-college-card">
        <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><img src="{{ asset('uploads/photo/').'/'.$college->photo }}" class="college-image" alt=""></a>
        <img src="{{ asset('uploads/logo/').'/'.$college->logo }}" class="logo" alt="">
        
        <div class="ribbon-section {{ ($college->featured != 1) ? 'visiblehide' : '' }}">
            <div class="ribbon-title">
                Featured
            </div>
        </div>
        
        <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><h3 class="college-name">{!! $college->name !!}</h3></a>
        <div class="row m-0 p-0 location-ownership">
            
        @if(!is_null($college->cityname))
            @if($college->cityname->city_name)
                <div class="location"><i class="fas fa-map-marker-alt"></i> {{ $college->cityname->city_name }}</div>
            @endif
        @endif
          
          @if($college->ownership)
          <!--<div class="pin"><i class="fas fa-thumbtack"></i> Ownership: {{ $college->ownership }}</div>-->
          @endif
        </div>
        <?php $totalRating = 5; $starRating = (float)$college->rating; ?>
        <div class="ratings">
          <?php for ($i = 1; $i <= $totalRating; $i++) {
                 if($starRating < $i ) {
                    if(is_float($starRating) && (round($starRating) == $i)){
                        echo "<i class='fa fa-star-half-alt checked'></i>";
                    }else{
                        echo "<i class='fa fa-star'></i>";
                    }
                 }else {
                    echo "<i class='fa fa-star checked'></i>";
                 }
            }
          ?> @if($starRating>0)<span>({{ $starRating }})</span>@endif
        </div>
        <div class="row m-0 p-0 links">
          <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/#course-fee') : '' }}">Courses</a>
          <span class="divider"></span>
          <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/#placements') : '' }}">Placements</a>
          <span class="divider"></span>
          <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/#admission') : '' }}">Admissions</a>
        </div>
        <div class="row m-0 p-0 buttons">
          <div class="col-6"><button type="button" class="btn btn-primary btn-1" onclick="showInterest('<?= (isset($college) && isset($college->name))?$college->name:'' ?>','College')"><img src="{{ asset('assets/site') }}/images/apply-now-icon.svg" class="download-icon">Apply Now</button></div>
          <!--<div class="col-6"> @if($college->brochure)<button type="button" class="btn btn-primary btn-2" onclick="downloadBrochure()"><img src="{{ asset('assets/site') }}/images/download-blue-icon.svg" class="download-icon">Brochure</button>@endif</div>-->
          <div class="col-6"> <button type="button" class="btn btn-primary btn-2" onclick="downloadBrochure()"><img src="{{ asset('assets/site') }}/images/download-blue-icon.svg" class="download-icon">Brochure</button></div>
        </div>
      </div>
    </div>
    @endforeach
  
   
  </div>

  <div class="row justify-content-center">
    <div class="col-4">
    {{ $colleges->appends($_GET)->links() }}
    </div>
  </div>

</div>

<div class="modal fade" id="modalcollegeBrochure" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalcollegeBrochureLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFreeExpertAdviceLabel">Download Brochure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form id="collegebrochure-form" method="post" autocomplete="off">
  @csrf
  <input type="hidden" name="college_name" id="college_name" value="<?= (isset($college) && isset($college->name))?$college->name:'' ?>">
  <input type="hidden" name="college_id" id="college_id" value="<?= (isset($college) && isset($college->id))?$college->id:'' ?>">
  <input type="hidden" name="brochure" id="brochure" value="<?= (isset($college) && isset($college->brochure))?$college->brochure:'' ?>">
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

@section('scriptsbefore')
@endsection

@section('scripts')
<script>
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
          link.href = "{{ (isset($college) && isset($college->brochure))?asset('uploads/college-brochure/'.$college->brochure):'' }}";
          link.download = "{{ (isset($college) && isset($college->brochure))?$college->brochure:'' }}";
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
<script type="module">
  import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper-news', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  slidesPerView: 1,
  spaceBetween: 0,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      // spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    1080: {
      slidesPerView: 3,
      spaceBetween: 0
    }
  },
  // If we need pagination
  // pagination: {
  //   el: '.swiper-pagination',
  // },

  // Navigation arrows
  navigation: {
    nextEl: '.icon-left-news',
    prevEl: '.icon-right-news',
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: '.swiper-scrollbar',
  // },
});
</script>
<script type="module">
  import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper-blogs', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  slidesPerView: 1,
  spaceBetween: 0,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      // spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    1080: {
      slidesPerView: 3,
      spaceBetween: 0
    }
  },
  // If we need pagination
  // pagination: {
  //   el: '.swiper-pagination',
  // },

  // Navigation arrows
  navigation: {
    nextEl: '.icon-left-blogs',
    prevEl: '.icon-right-blogs',
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: '.swiper-scrollbar',
  // },
});
</script>
<script type="module">
  import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper-books', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  slidesPerView: 1,
  spaceBetween: 0,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
      // spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    // when window width is >= 640px
    1080: {
      slidesPerView: 3,
      spaceBetween: 0
    }
  },
  // If we need pagination
  // pagination: {
  //   el: '.swiper-pagination',
  // },

  // Navigation arrows
  navigation: {
    nextEl: '.icon-left-books',
    prevEl: '.icon-right-books',
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: '.swiper-scrollbar',
  // },
});
</script>
@endsection