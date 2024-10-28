@extends('layouts.site')
@section('content')

<style>
.news-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
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

  .video-container {
  	margin-bottom: 25px;
  }
  .video-container iframe{
      border-radius: 20px;
  }
</style>

   <section class="pricing-area mt-4 mb-5">
      <div class="container">

      	<h1 class="mb-3">Videos</h1>

      	<small>Showing {{ count($videos) }}  Videos</small><br/><br/>

        <div class="row">
			@foreach($videos as $row)
			<div class="col-md-3">
				<div class="video-container">
				<iframe width="100%" height="280" src="{{ $row->url }}">
				</iframe>
				</div>
			</div>
			@endforeach
        </div>		
        <div class="row justify-content-center mt-5">
          <div class="col-4">
			{{ $videos->links() }}
		  </div>
		</div>
      </div>
    </section>

@endsection