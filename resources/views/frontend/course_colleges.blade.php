@extends('layouts.site')
@section('content')


    <!-- Hero Start -->
    <section class="hero-area hero-two-area hero-pagename-area background-image" data-src="{{ asset('assets/images/bg/unnamed.jpg') }}" >
	<div class="bannerOverlay"></div>
      <div class="container" style="position: relative;z-index: 1;">
        <div class="row">
         
          <div class="col-xl-11">
            <div class="">
              
            </div>
          </div>
        </div>
      </div>
    </section>

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
    .course-college-item img { 
      max-width:200px;
    }
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
	.top-list {
		margin-bottom: 0px;
		margin-left: 10px;
	}
	.top-list li {
		display: initial;
	    position: relative;
	    padding-left: 14px;
	    margin-right: 7px;
	}
	.top-list li span {
	    font-size: 13px;
	    color: #999999;
	}
	.top-list li:before {
	    content: '';
	    width: 3px;
	    height: 3px;
	    position: absolute;
	    left: 0;
	    top: 12px;
	    background: #cccccc;
	    -webkit-border-radius: 50%;
	    -moz-border-radius: 50%;
	    -ms-border-radius: 50%;
	    -o-border-radius: 50%;
	    border-radius: 50%;
	}
	.top-list li:last-child {
	    padding-right: 0;
	    margin-right: 0;
	}

	.tab-list {
		margin-bottom: 15px;
		margin-left: 0px;
	}
	.tab-list li {
		display: initial;
	    position: relative;
	    padding-left: 0px;
	    margin-right: 0px;
	}
	.tab-list li a {
	    font-size: 13px;
	    color: #00306B;
	    font-weight: 600;
	    padding-left: 4px;
    	padding-right: 4px;
	}
	.tab-list li a:hover {
	    color: #e9801e;
    	text-decoration: underline;
	}
	.tab-list li:not(:first-child):before {
	    content: "|";
	}
	/*.tab-list li:before {
	    content: '';
	    width: 3px;
	    height: 3px;
	    position: absolute;
	    left: 0;
	    top: 12px;
	    background: #cccccc;
	    -webkit-border-radius: 50%;
	    -moz-border-radius: 50%;
	    -ms-border-radius: 50%;
	    -o-border-radius: 50%;
	    border-radius: 50%;
	}
	.tab-list li:last-child {
	    padding-right: 0;
	    margin-right: 0;
	}*/
    </style>

   <section class="pricing-area bgcolor-2 course_college">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-xl-12 mb-3">
            <div class="mb-2">
              <h1 class="course-title">{{ $title }}</h1>

      		  <small>Showing {{ count($colleges) }}  Colleges</small>

            </div>
          </div>
        </div>

        <div class="row">
		@foreach($colleges as $college)
          <div class="col-lg-12 col-md-12">
            <div class="pricing-col course-college-item">

              <div class="row">
              	<div class="col-md-9">
              		<a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><h5>{{ $college->name }}</h5></a>

          			<ul class="top-list">
          				@if($college->state_name || $college->city_name)
          				<li><span>{{ $college->city_name.', '.$college->state_name }}</span></li>
          				@endif
          				@if($college->approval)
          				<li><span>{{ $college->approval }}</span></li>
          				@endif
          				<!-- <li><span>Type</span></li>
          				<li><span>NIRF Ranking</span></li> -->
          				@if($college->estd_year)
          				<li><span>Estd: {{ $college->estd_year }}</span></li>
          				@endif
          			</ul>

          			<ul class="tab-list">
          				<li><a href="{{ url('college/'.$college->url) }}">About College</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#admission">Admission Process</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#course-fee">Course & Fee</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#cutoff">Cutoff</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#photo">Photo/Video</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#ranks">Ranks</a></li>
          				<li><a href="{{ url('city/'.$college->city_slug) }}">About City</a></li>
          				<li><a href="{{ url('college/'.$college->url) }}#placements">Placements</a></li>
          			</ul>

                    <div class="row btn-form">
                      <div class="col-md-12">
                        <button type="button" class="tag-2" onclick="showInterest('<?= (isset($college) && isset($college->name))?$college->name:'' ?>','College')">Show Interest</button>
                        <button type="button" class="tag-2"><a href="javascript:void(Tawk_API.toggle())">Live Chat</a></button>
                        <!--<button type="button" class="tag-2">Expert Predictor</button>-->
                        <button type="button" class="tag-2" onclick="freeExpertAdvice('<?= (isset($college) && isset($college->name))?$college->name:'' ?>','College')">Free Expert Advice</button>
                      </div>
                    </div>

              	</div>
              	<div class="col-md-3 text-center">

                <div class="star-rating">
                  <b>Rating:</b> 
                  <?php $totalRating = 5; $starRating = (float)$college->rating; 

                    for ($i = 1; $i <= $totalRating; $i++) {
                         if($starRating < $i ) {
                            if(is_float($starRating) && (round($starRating) == $i)){
                                echo "<span class='fa fa-star-half-alt checked'></span>";
                            }else{
                                echo "<span class='fa fa-star'></span>";
                            }
                         }else {
                            echo "<span class='fa fa-star checked'></span>";
                         }
                    }
                   ?>
                </div>

              	@if(isset($college->logo) && !empty($college->logo))
      					<a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><img src="{{ asset('uploads/photo/').'/'.$college->photo }}" alt=""></a>
      				  @else
      	                <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}"><img src="{{ asset('assets/images/logos/no-img.png') }}" alt=""></a>
      				  @endif

              	</div>
              </div>

              @if(isset($college->rank_rating) && $college->rank_rating)
              <p class="college-rank"># {{ $college->rank_rating }}</p>
              @endif

              @if(0)
			  @if(isset($college->featured) && $college->featured == 1)
				<p class="toplist">Featured</p>
			  @endif
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
                  <li>Rate it! (21556)</li>
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
              @endif

            </div>
          </div>
		@endforeach
        </div>		
        <div class="row justify-content-center">
          <div class="col-4">
			{{ $colleges->links() }}
		  </div>
		</div>
      </div>
    </section>

@endsection
@section('scripts')
@parent

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
@endsection