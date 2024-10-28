@extends('layouts.site')
@section('content')

<style>
.exam-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
    margin-bottom: 30px;
  }
  .exam-col img {
    width: 100%;
    height: 210px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  .exam-col-body {
    padding: 13px 15px 10px 15px;
  }
  .exam-col-body h5{
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    color: #FF7B00;
    font-weight: 600;
  }
  .exam-col-body p{
    overflow: hidden;
    -webkit-line-clamp: 3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    min-height: 54px;
  }
</style>

   <section class="pricing-area mt-5">
      <div class="container">

      	<h1 class="mb-3">Exams</h1>

      	<small>Showing {{ count($exams) }}  Exams</small><br/><br/>

        <div class="row">
		@foreach($exams as $row)
          <div class="col-lg-4 col-md-4">

            <a href="{{ url('exams/'.$row->url) }}">
              <div class="exam-col">

                <div class="exam-col-body">
                  <h5 class="mb-0 pb-0">{{ $row->name }}</h5>
                  <p style="color: #000;font-size: 12px;margin-top: 0px;margin-top: 10px;">{!! strip_tags($row->description) !!}</p>
                </div>
              </div>
            </a>

          </div>
         @endforeach
        </div>		
        <div class="row justify-content-center mt-5">
          <div class="col-4">
			{{ $exams->links() }}
		  </div>
		</div>
      </div>
    </section>

@endsection