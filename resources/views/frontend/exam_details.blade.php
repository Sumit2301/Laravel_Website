@extends('layouts.site')
@section('content')

<style>
  .main-content {
    padding-top: 60px;
    padding-bottom: 60px;
  }
  .detail-box {
    background-color: #fff;
    padding: 20px 30px;
    min-height: 450px;
    border-radius: 8px;
  }

  .detail-box hr {
    margin-bottom: 30px;
  }
  .detail-box ul{
    padding-left: 20px;
  }
.exam-details label{
  color: #000;
  font-size: 15px;
  font-weight: 430;
}
.exam-details b{
  color: #000;
  font-weight: 600;
}
</style>

<section class="main-content bgcolor-2">
  <div class="container">

    <div class="detail-box">

    <div class="row">

      <div class="col-md-12" >

        <h1>{{ $exam_details->name }} </h1>

        <hr>

        <div class="row exam-details">
          @if(!empty($exam_details->exam_level))
          <div class="col-md-4 mb-2"><label><b>Exam Level: </b>{{ $exam_details->exam_level }}</label></div>
          @endif

          @if(!empty($exam_details->mode_of_application))
          <div class="col-md-4 mb-2"><label><b>Mode Of Application: </b>{{ ucwords($exam_details->mode_of_application) }}</label></div>
          @endif

          @if(!empty($exam_details->mode_of_exam))
          <div class="col-md-4 mb-2"><label><b>Mode Of Exam: </b>{{ ucwords($exam_details->mode_of_exam) }}</label></div>
          @endif

          @if(!empty($exam_details->mode_of_counselling))
          <div class="col-md-4 mb-2"><label><b>Mode of Counselling: </b>{{ ucwords($exam_details->mode_of_counselling) }}</label></div>
          @endif

          @if(!empty($exam_details->streams))
          <div class="col-md-4 mb-2"><label><b>Streams: </b>{{ ucwords($exam_details->streams) }}</label></div>
          @endif

          @if(!empty($exam_details->language))
          <div class="col-md-4 mb-2"><label><b>Language: </b>{{ $exam_details->language }}</label></div>
          @endif

          @if(!empty($exam_details->application_fee))
          <div class="col-md-4 mb-2"><label><b>Application Fee: </b>{{ $exam_details->application_fee }}</label></div>
          @endif

          @if(!empty($exam_details->exam_duration))
          <div class="col-md-4 mb-2"><label><b>Exam Duration: </b>{{ $exam_details->exam_duration }}</label></div>
          @endif

          @if(!empty($exam_details->conducting_body))
          <div class="col-md-4 mb-2"><label><b>Conducting Body: </b>{{ $exam_details->conducting_body }}</label></div>
          @endif

        </div>

         <div class="info mt-2 exam-content"><?=$exam_details->description?></div>

      </div>


    </div>

    </div>  

  </div>

</section>
@endsection

