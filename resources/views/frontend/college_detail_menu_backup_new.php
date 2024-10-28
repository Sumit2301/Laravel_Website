<style>
.college-detail-logo {
  width: 72px;
  height: 72px;
  object-fit: cover;
  border-radius: 10px;
}
.college-div {
  background: url({{ asset('uploads/photo/').'/'.$college->photo }}) no-repeat center center fixed !important;
  background-size: 100% 100%!important;
}
.collegeoverlay{position: absolute;
    width: 100%;
    min-height: 193px;
    height: 100%;
    top: 0px;
    background-image:linear-gradient(to top,rgba(0,0,0,0.3),#202020);}
</style>

<div class="nav-div college-div">
     <div class="collegeoverlay"></div> 
      <nav class="navbar navbar-expand-lg container page-navbar navbar-light">
        <div class="navbar-logo">
         <a href="{{ url('/') }}"><img src="{{ asset('assets/site') }}/images/logo1.png" style="width: 120px;" alt="" srcset=""></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
        
        </div>
      </nav>
      <div class="container college-header">
        <div class="row m-0 p-0">
          <div class="col-md-1 col-3">
            <div class="logo-container">
              <img src="{{ asset('uploads/logo/').'/'.$college->logo }}" class="college-detail-logo" alt="">
            </div>
          </div>      
          <div class="col-md-11 col-8 college-header-info">
            <div class="row">
              <div class="title">{{ $college->name }}</div>
            </div>
            <div class="row">
              <div class="location"><i class="fas fa-map-marker-alt"></i> {{ $college->cityname->city_name }}, {{ $college->statename->state_name }}</div>
              @if(!empty($college->estd_year))<div class="pin"><i class="fas fa-thumbtack"></i> {{ $college->estd_year }}</div>@endif
              <?php $totalRating = 5; $starRating = (float)$college->rating; ?>
              <div class="ratings">Ratings: 
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
            </div>
           
          </div>    
        </div>
      </div>
   
  </div>

  <section class="college-nav-section container">
    <div class="row college-section-nav">
     
    <a  href="{{ url('college/'.$college->url) }}"><button type="text" class="college-section-tag{{ !request()->is('college/*/*') ? ' active' : '' }}" >Overview</button></a>
    @if($college_tab->college_course_id)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/course-fee"><button type="text" class="college-section-tag{{ request()->is('college/*/course-fee') ? ' active' : '' }}" >Courses & Fee</button></a>
    @endif
    @if($college_tab->cutoff_id)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/cutoff"><button type="text" class="college-section-tag{{ request()->is('college/*/cutoff') ? ' active' : '' }}" >Cutoff</button></a>
    @endif
    @if($college_tab->admission_process_id)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/admission"><button type="text" class="college-section-tag{{ request()->is('college/*/admission') ? ' active' : '' }}" >Admission</button></a>
    @endif
    <!-- <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/photo"><button type="text" class="college-section-tag{{ request()->is('college/*/photo') ? ' active' : '' }}" >Photos</button></a>
    <a href="{{ url('college/'.$college->url) }}/videos"><button type="text" class="college-section-tag{{ request()->is('college/*/videos') ? ' active' : '' }}" >Videos</button></a> -->
    @if($college_tab->facilities)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/facilities"><button type="text" class="college-section-tag{{ request()->is('college/*/facilities') ? ' active' : '' }}" >Facilities</button></a>
    @endif
    @if($college_tab->rank_rating)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/ranks"><button type="text" class="college-section-tag{{ request()->is('college/*/ranks') ? ' active' : '' }}" >Ranks</button></a>
    @endif
    @if($college_tab->placement_id)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/placements"><button type="text" class="college-section-tag{{ request()->is('college/*/placements') ? ' active' : '' }}" >Placements</button></a>
    @endif
    @if($college_tab->news_id)
    <a href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}/news"><button type="text" class="college-section-tag{{ request()->is('college/*/news') ? ' active' : '' }}" >News</button></a>
    @endif
     
    </div>
  </section>