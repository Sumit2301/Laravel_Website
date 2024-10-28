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
</style>

   <section class="pricing-area mt-4 mb-5">
      <div class="container">

      	<h1 class="mb-3">MBA Courses Blogs</h1>

      	<small>Showing {{ count($articles) }}  Blogs</small><br/><br/>

        <div class="row">
		@foreach($articles as $row)
          <div class="col-lg-3 col-md-3">

            <a href="{{ url('medical-course-blogs/'.$row->slug) }}"> 
              <div class="news-col">
                <img src="{{ ($row->thumbnail)?url('uploads/article/'.$row->thumbnail):url('assets/images/noimage.jpg') }}">

                <div class="news-col-body">
                  <h5>{{ $row->title }}</h5>
                </div>
              </div>
            </a>

          </div>
         @endforeach
        </div>		
        <div class="row justify-content-center mt-5">
          <div class="col-4">
			{{ $articles->links() }}
		  </div>
		</div>
      </div>
    </section>

@endsection