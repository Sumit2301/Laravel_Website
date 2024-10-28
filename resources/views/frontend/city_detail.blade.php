@extends('layouts.site')
@section('content')

<style>
.news-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
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

   <section class="learn-single-area bgcolor-23 mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            <div class="learn-col">

        		<h2 class="mt-0">{{ $city->city_name }}</h2>

              <div class="mt-2">{!! $city->content !!}</div>        
      </div>

          </div>

        @include('frontend.college_details_sidebar')
    </div>
      </div>
    </section>

@endsection