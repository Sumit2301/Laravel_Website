@extends('layouts.site')

@section('stylesbefore')

<link href="{{ asset('assets/css/simple-lightbox.css') }}" rel="stylesheet">
<style>
.sl-wrapper .sl-close {
  z-index: 99999999;
}
.sl-wrapper {
  background: rgba(247, 247, 247, 0.96);
    z-index: 999999 !important;
}
.video-col {
width: 100%;
border-radius: 8px;
background-color: #fff;
margin-bottom: 35px;
}
.video-col img {
width: 100%;
height: 210px;
border-top-left-radius: 8px;
border-top-right-radius: 8px;
}
.video-col-body {
padding: 13px 15px 10px 15px;
}
.video-col-body h5{
overflow: hidden;
-webkit-line-clamp: 2;
display: -webkit-box;
-webkit-box-orient: vertical;
line-height: 1.5;
font-weight: normal;
min-height: 48px;
}
.label-single{background: #0196da;}
.section-labels{background-color: unset;
    padding: 0px;
    width: 100%;}
.label-single span{color: #ffffff;}
.label-single:first-child{height:auto;min-height: 112px;}
</style>
@endsection

@section('styles')
@endsection

@section('content')

  @include('frontend.college_detail_menu')
<style>
    .review-top .profile-info h3{font-size: 18px;}
    .review-top .profile-avatar img{width: 80px;
    height: 80px;}
    .single-review p{color: #000000;line-height: 25px;}
</style>
  <section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">
        <div class="section-heading">About {{ $college->name }}</div>
        <div class="section-info mb-4">
          {!! $college->description !!}
        </div>

        @if(!empty($college->approval) || !empty($college->estd_year) || !empty($college->student_enrollments) || !empty($college->genders_accepted) || !empty($college->campus_size) || !empty($college->total_faculty))
        <div class="section-labels row">

          @if(!empty($college->approval) || !empty($college->estd_year) || !empty($college->student_enrollments))
          <div class="col-md-6 col-12">
            @if(!empty($college->approval))
            <div class="label-single">
              <!--<img src="{{ asset('assets/site') }}/images/approval-icon.svg" alt="">-->
              <span>Approval:</span>
              <strong>{{ $college->approval }}</strong>
            </div>
            @endif
            @if(!empty($college->estd_year))
            <div class="label-single">Estd. Year: {{ $college->estd_year }}</div>
             @endif
            @if(!empty($college->student_enrollments))
            <div class="label-single">Students Enrollments: {{ $college->student_enrollments }}</div>
             @endif
          </div>
          @endif

          @if(!empty($college->genders_accepted) || !empty($college->campus_size) || !empty($college->total_faculty))
          <div class="col-md-6 col-12">
            @if(!empty($college->genders_accepted))
            <div class="label-single">
              <!--<img src="{{ asset('assets/site') }}/images/gender-icon.svg" alt="">-->
              <span>Genders Accepted:</span>
              <strong>{{ $college->genders_accepted }}</strong>
            </div>
             @endif
             @if(!empty($college->campus_size))
            <div class="label-single">Campus Size: {{ $college->campus_size }}</div>
             @endif
            @if(!empty($college->total_faculty))
            <div class="label-single">Total Faculty: {{ $college->total_faculty }}</div>
            @endif
          </div>
          @endif
        </div>
        @endif

        @if(!empty($college->specialty_services))
        <div class="section-heading">Specialty Services</div>
        <div class="section-list-info row m-0 p-0">
          <div class="col-md-12 col-12">
            <div class="section-list-item">{!! $college->specialty_services !!}</div>
          </div>
        </div>
        @endif

        @if(!empty($college->requirement))
        <!--<div class="section-heading">Requirement</div>
        <div class="section-list-info row m-0 p-0">
          <div class="col-md-12 col-12">
            <div class="section-list-item">{!! $college->requirement !!}</div>
          </div>
        </div>-->
        @endif


        @if(count($college->photos)>0)
        <div class="section-heading mt-5">Photos</div>

        <div class="gallery section-feedback row m-0 p-0">

          @foreach($college->photos as $photo)
          <a href="{{ asset('uploads/photos') . '/' . $photo->image  }}" class="big col-4 mb-3"><img src="{{ asset('uploads/photos') . '/' . $photo->image  }}" alt="{{ $photo->caption }}" title="{{ $photo->caption }}" /></a>
          @endforeach

        </div>
        @endif

        @if(count($collegevideos)>0)
        <div class="section-heading mt-5">Videos</div>

        <div class="section-feedback row m-0 p-0">

          @foreach($collegevideos as $row)
          <div class="col-lg-6 col-md-6">

            <a href="javascript:void(0)" onclick="openVideoPopup('{{ $row->title }}','{{ $row->youtubeVideoID }}')">
              <div class="video-col">
                <img src="{{ $row->thumbURL }}">

                <div class="video-col-body">
                  <h5>{{ $row->title }}</h5>
                </div>
              </div>
            </a>

          </div>
          @endforeach

        </div>
        @endif

        <?php 
        $total_rating = 0;
        foreach($reviews as $row){
          $total_rating += $row->rating;
        } 
        $avg_rating = $total_rating;
        ?>

        <div class="section-heading mt-5">Feedback</div>
        <div class="section-feedback row m-0 p-0">
          <div class="col-md-3 col-12 left-feedback">
            <h2>{{ $avg_stars }}</h2>
            <?php $totalRating = 5; $starRating = (float)$avg_stars; ?>
              <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                ?>
              </div>
            <h4>Course Rating</h4>
          </div>
          <style>
          .single-feedback-bar {
            display: inherit!important;
            margin-bottom: 10px;
          }
          .ratings-count {
            display: flex;
            margin-top: -8px;
          }
          .ratings-count span {
            font-size: 15px;
            font-weight: 500;
          }
          </style>
          <div class="col-md-9 col-12">
            <div class="single-feedback-bar">
              <div class="row">
                <div class="col-7">
                  <?php $percent = ($count_stars1>0)?($count_stars1 / $total * 100):0; ?>
                  <div class="bar-outer" style="width:100%"><div class="bar-inner" style="width:<?= $percent ?>%"></div></div>
                </div>
                <div class="col-5">
                    <div class="ratings-count">
                      <?php $totalRating = 5; $starRating = (float)$avg_stars1; ?>
                      <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                        ?>
                      </div>
                      <span>({{ $count_stars1 }})</span>
                    </div>
                </div>
              </div>
            </div>
            <div class="single-feedback-bar">
              <div class="row">
                <div class="col-7">
                  <?php $percent = ($count_stars2>0)?($count_stars2 / $total * 100):0; ?>
                  <div class="bar-outer" style="width:100%"><div class="bar-inner" style="width:<?= $percent ?>%"></div></div>
                </div>
                <div class="col-5">
                    <div class="ratings-count">
                      <?php $totalRating = 5; $starRating = (float)$avg_stars2; ?>
                      <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                        ?>
                      </div>
                      <span>({{ $count_stars2 }})</span>
                    </div>
                </div>
              </div>
            </div>
            <div class="single-feedback-bar">
              <div class="row">
                <div class="col-7">
                  <?php $percent = ($count_stars3>0)?($count_stars3 / $total * 100):0; ?>
                  <div class="bar-outer" style="width:100%"><div class="bar-inner" style="width:<?= $percent ?>%"></div></div>
                </div>
                <div class="col-5">
                    <div class="ratings-count">
                      <?php $totalRating = 5; $starRating = (float)$avg_stars3; ?>
                      <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                        ?>
                      </div>
                      <span>({{ $count_stars3 }})</span>
                    </div>
                </div>
              </div>
            </div>
            <div class="single-feedback-bar">
              <div class="row">
                <div class="col-7">
                  <?php $percent = ($count_stars4>0)?($count_stars4 / $total * 100):0; ?>
                  <div class="bar-outer" style="width:100%"><div class="bar-inner" style="width:<?= $percent ?>%"></div></div>
                </div>
                <div class="col-5">
                    <div class="ratings-count">
                      <?php $totalRating = 5; $starRating = (float)$avg_stars4; ?>
                      <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                        ?>
                      </div>
                      <span>({{ $count_stars4 }})</span>
                    </div>
                </div>
              </div>
            </div>
            <div class="single-feedback-bar">
              <div class="row">
                <div class="col-7">
                  <?php $percent = ($count_stars5>0)?($count_stars5 / $total * 100):0; ?>
                  <div class="bar-outer" style="width:100%"><div class="bar-inner" style="width:<?= $percent ?>%"></div></div>
                </div>
                <div class="col-5">
                    <div class="ratings-count">
                      <?php $totalRating = 5; $starRating = (float)$avg_stars5; ?>
                      <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                        ?>
                      </div>
                      <span>({{ $count_stars5 }})</span>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="section-heading review">Reviews
        
            <!-- <select name="cars" id="cars" class="review-dropdown">
              <option value="all">All Ratings </option>
              <option value="5">5</option>
              <option value="5">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select> -->
       </div>
       <div class="section-reviews">

         @foreach($reviews as $row)
         <div class="single-review">
          <div class="review-top row m-0 p-0">
            <div class="profile-avatar col-md-2 col-3 ">
              <img src="{{ asset('assets/site') }}/images/approval-icon.svg" alt="">
            </div>
            <div class="profile-info col-md-7 col-5">
              <h3>{{ $row->name }}</h3>
              <?php $totalRating = 5; $starRating = (float)$row->rating; ?>
              <div class="ratings"><?php for ($i = 1; $i <= $totalRating; $i++) {
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
                ?>
              </div>
              <span>{{ date("d M, Y",strtotime($row->created_at)) }}</span>
            </div>
            <!-- <div class="like-dislike col-md-3 col-4">
              <img src="{{ asset('assets/site') }}/images/like-icon.svg" class="like-button" alt="">
              <img src="{{ asset('assets/site') }}/images/dislike-icon.svg" class="dislike-button" alt="">
            </div> -->
          </div> 
          <p>{!! $row->message !!}</p>
          <hr>
         </div>
         @endforeach
     
       
         <!-- <button class="btn more-reviews">More Reviews</button> -->
       </div>
     
    </div>

    @include('frontend.college_details_sidebar')
</div>
  </section>

  <section class="explore-more-section container mt-5">
    <div class="row m-0 p-0">
      <div class="col-md-4 section-heading">
        <h2>Explore More Colleges</h2>
      </div>
     
    </div>
    <div class="colleges-div">
      <div class="swiper swiper-colleges">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->

          @foreach($colleges as $college)
          <div class="swiper-slide">
            <div class="single-college-card">
              <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><img src="{{ asset('uploads/photo/').'/'.$college->photo }}" class="college-image" alt=""></a>
              <img src="{{ asset('uploads/logo/').'/'.$college->logo }}" class="logo" alt="">
              <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><h3 class="college-name">{!! $college->name !!}</h3></a>
              <div class="row m-0 p-0 location-ownership">
                @if($college->cityname->city_name)
                <div class="location"><i class="fas fa-map-marker-alt"></i> {{ $college->cityname->city_name }}</div>
                @endif
                @if($college->ownership)
                <div class="pin"><i class="fas fa-thumbtack"></i> Ownership: {{ $college->ownership }}</div>
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
                <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/course-fee') : '' }}">Courses</a>
                <span class="divider"></span>
                <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/placements') : '' }}">Placements</a>
                <span class="divider"></span>
                <a href="{{ !empty($college->url) ? url('college/'.$college->url.'/admission') : '' }}">Admissions</a>
              </div>
              <div class="row m-0 p-0 buttons">
                <div class="col-6"><button type="button" class="btn btn-primary btn-1" onclick="showInterest('<?= (isset($college) && isset($college->name))?$college->name:'' ?>','College')"><img src="{{ asset('assets/site') }}/images/apply-now-icon.svg" class="download-icon">Apply Now</button></div>
                <div class="col-6"> <button type="button" class="btn btn-primary btn-2" onclick="downloadBrochure()"><img src="{{ asset('assets/site') }}/images/download-blue-icon.svg" class="download-icon">Brochure</button></div>
              </div>
            </div>
          </div>
          @endforeach
            
           
          </div>
         
    
        </div>
        <!-- If we need pagination -->
        <!-- <div class="swiper-pagination"></div> -->
  
        <!-- If we need navigation buttons -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
  
        <!-- If we need scrollbar -->
        <!-- <div class="swiper-scrollbar"></div> -->
      </div>
    </div> 
    <!-- Slider main container -->
    
  </section>

<div class="modal" id="youtubeVideo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      
      <div class="modal-body">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger modal-close" data-dismiss="modal">Close</button>
      </div>
      
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

@section('scriptsbefore')
@endsection

@section('scripts')

<script src="{{ asset('assets/js/simple-lightbox.js') }}"></script>
<script>

    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>

<script>


  
function openVideoPopup(title,id) {
  $("#youtubeVideo").modal('show');
  $("#youtubeVideo .modal-title").html(title);
  $("#youtubeVideo .modal-body").html('<iframe style="width:100%;" height="400" src="https://www.youtube.com/embed/'+id+'">');
}
$('#youtubeVideo').on('hidden.bs.modal', function (e) {
  $("#youtubeVideo .modal-body").html('');
});
$(".modal-close").click(function(){
  $("#youtubeVideo").modal('hide');
  $("#youtubeVideo .modal-body").html('');
});

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

<script type="module">
  import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

  const swiper = new Swiper('.swiper-colleges', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  slidesPerView: 1,
  spaceBetween: 10,
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
      spaceBetween: 20
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
@endsection