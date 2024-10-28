@extends('layouts.site')
@section('content')

<style>
	.news-col {
		width: 100%;
		border-radius: 8px;
		background-color: #fff;
    	margin-bottom: 30px;
	}
	.news-col img {
		width: 100%;
		height: 210px;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
	}
	.news-col-body {
		padding: 13px 15px 10px 15px;
	}
	.news-col-body h5{
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

		  	<small>Showing {{ count($news) }}  News</small><br/><br/>

			<div class="row">


			  @if(!$news)
			  <div class="col-lg-12 col-md-12">
			  	<h5 class="text-center mt-3">No News</h5>
			  </div>
			  @endif

			  @foreach($news as $row)
			  <div class="col-lg-6 col-md-6">

			  	<a href="{{ !empty($row->slug) ? url('college/'.$college->url.'/news/'.$row->slug) : '' }}">
				    <div class="news-col">
				    	<img src="{{ url('uploads/news/'.$row->image) }}">

				    	<div class="news-col-body">
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