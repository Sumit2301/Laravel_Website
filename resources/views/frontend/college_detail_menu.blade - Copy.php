
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
                <li>
                  <div class="star-rating mb-0">
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
                   @if($starRating>0)
                   <b>({{ $starRating }})</b>
                   @endif
                </div>
                </li>
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
				<li class="{{ request()->is('college/*/cutoff') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/cutoff">Cutoff</a></li>
				<li class="{{ request()->is('college/*/admission') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/admission">Admission</a></li>
				<li class="{{ request()->is('college/*/photo') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/photo">Photos</a></li>
				<li class="{{ request()->is('college/*/videos') ? 'active' : '' }}" ><a href="{{ url('college/'.$college->url) }}/videos">Videos</a></li>
				<li class="{{ request()->is('college/*/facilities') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/facilities">Facilities</a></li>
				<li class="{{ request()->is('college/*/ranks') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/ranks">Ranks</a></li>
				<li class="{{ request()->is('college/*/placements') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/placements">Placements</a></li>
				<li class="{{ request()->is('college/*/news') ? 'active' : '' }}" ><a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/news">News</a></li>
			</ul>
		</div>
	  </div>
	</section>