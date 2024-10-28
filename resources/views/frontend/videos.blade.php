@extends('layouts.site')
@section('content')

<style>
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
</style>

	@include('frontend.college_detail_menu')
  
  <section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">

		  	<small>Showing {{ count($collegevideos) }}  Youtube Videos</small><br/><br/>

			<div class="row">


			  @if(!$collegevideos)
			  <div class="col-lg-12 col-md-12">
			  	<h5 class="text-center mt-3">No Youtube Videos</h5>
			  </div>
			  @endif

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
			
		  </div>
        @include('frontend.college_details_sidebar')
		</div>
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
</script>
@parent

@endsection