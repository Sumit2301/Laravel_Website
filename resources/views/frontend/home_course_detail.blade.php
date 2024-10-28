<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/rank') }}"><button class="nav-link{{ ($option=='rank')?'':'' }}" type="button">Rank List</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/scope') }}"><button class="nav-link{{ ($option=='scope')?' active':'' }}" type="button">Scope</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/exams') }}"><button class="nav-link{{ ($option=='exams')?' active':'' }}" type="button">Exams</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/top-study-destination') }}"><button class="nav-link{{ ($option=='top-study-destination')?' active':'' }}" type="button">Top Study Destination</button></a>
  </li>   
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/ebooks') }}"><button class="nav-link{{ ($option=='ebooks')?' active':'' }}" type="button">Ebooks</button></a>
  </li>
  <li class="nav-item" role="presentation">
    <a href="{{ url('course/'.$course->url.'/questions-and-anwsers') }}"><button class="nav-link{{ ($option=='questions-and-anwsers')?' active':'' }}" type="button">Q & A</button></a>
  </li>               
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
   <div class="result">

      @if($course->eligibility_criteria || count($course_detail))
      <div class="courseinfo">
        @if($course->eligibility_criteria)
        <b>ELIGIBILITY : </b>
        <div class="info"><?=$course->eligibility_criteria?></div>
        @endif

        @if(count($course_detail))
        <b>FEATURED INSTITUTES : </b>
        <div class="info featured_insti">
          <ul>
          <?php foreach($course_detail as $row){?>
            <li><a href="{{ url('college/'.$row->url) }}"><?=$row->name?></a></li>
          <?php } ?> 
          </ul>     
        </div> 
         @endif

      </div>
      @endif

      <style>
        .btn-form {
          margin-top: 35px;
          margin-bottom: 10px;
        }
        .btn-form .btn {
          width: 100%;
          text-transform: uppercase;
        }
      </style>

      <div class="row btn-form">
        <div class="col-md-3 col-6">
          <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn" onclick="showInterest('<?= (isset($course) && isset($course->name))?$course->name:'' ?>')">Show Interest</button>
        </div>
        <div class="col-md-3 col-6">
          <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn">Live Chat</button>
        </div>
        <!--<div class="col-md-3 col-6">
          <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn">Expert Predictor</button>
        </div>-->
        <div class="col-md-3 col-6">
          <button type="button" class="btn btn-primary hvr-bounce-to-top theme-btn" onclick="freeExpertAdvice('<?= (isset($course) && isset($course->name))?$course->name:'' ?>')">Free Expert Advice</button>
        </div>
      </div>

   </div>
  </div>

</div>

<script type="text/javascript">
$(".tab-content table").addClass('table table-bordered');
</script>