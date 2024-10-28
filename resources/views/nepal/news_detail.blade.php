@extends('layouts.site')

@section('stylesbefore')
@endsection

@section('styles')
@endsection

@section('content')

  @include('frontend.college_detail_menu')
    

  <section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">
						
            <div class="learn-col">
              @if($news->image)
              <img src="{{ url('uploads/news/'.$news->image) }}" style="width: 100%;"> 
              @endif

			  <h2 class="mt-4">{{ $news->title }}</h2>

              <div class="mt-2">{!! $news->content !!}</div>			  
			</div>

          </div>

        @include('frontend.college_details_sidebar')
		</div>
    </section>
   
@endsection
@section('scripts')
<script>
$("table").addClass('table table-bordered');

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