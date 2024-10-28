@extends('layouts.site')
@section('content')

	@include('frontend.college_detail_menu')
  
  <section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">
            <div class="learn-col">
			  <h2>Facilities:</h2>
              <div id="aboutcollege" style="max-height:215px;overflow: hidden;">{!! !empty($college->facilities) ? $college->facilities : '' !!}</div>
			  
			</div>
			
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