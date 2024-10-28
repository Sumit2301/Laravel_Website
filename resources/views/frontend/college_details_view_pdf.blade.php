<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://www.mymedicalcourse.com/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            .logo{ width:100px; }
            .title { font-size: 35px; font-weight: 700; }
            .college-section { padding: 2rem 0; }
            .content { text-align: justify; }
        </style>
</head>

<body>
        <main>
            <section class="college-section">
                <div class="container">
                    <div class="row">
                        <div class="container-fluid college-header">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($data->logo != '')
                                    <div class="logo-container text-center">
                                        <img src="https://www.mymedicalcourse.com/uploads/logo/{{ $data->logo }}" class="logo">
                                    </div>
                                    @endif
                                    <div class="college-header-info text-center">
                                        <div class="row">
                                            <div class="title">{{ $data->name }}</div>
                                        </div>
                
                                        <div class="row">
                                            <div class="location"><i class="fas fa-map-marker-alt"></i>  {{ $data->city_name }}, {{ $data->state_name }}, {{ $data->estd_year }}</div>
                                            <!--<div class="owenership">{{ $data->ownership }}</div>-->
                                            <!--<i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i><i class="fa fa-star checked"></i> <span>(5)</span>              </div>-->
                                        </div>
                                </div> 
                            
                                <div class="col-md-12">
                                    <hr>
                                    <h2 class="text-center title my-4">About</h2>
                                    @if($data->photo != '')
                                    <div class="text-center">
                                        <img src="https://www.mymedicalcourse.com/uploads/photo/{{ $data->photo }}" style="width: 400px; border-radius: 8px;">
                                    </div>   
                                    @endif
                                    <div class="content mt-4">
                                        {!! $data->description  !!}
                                    </div>                
                                </div>
                                
                      @if(count($courses_fee)>0)
        <!-- Courses & Fee -->
        <div id="course-fee" class="section-heading mt-5 title text-center">Courses & Fee</div>

        <div class="section-feedback row m-0 p-0">

          @foreach($courses_fee as $course)
            <div class="learn-col course-row">
                
        <div class="section-feedback row m-0 p-0">
            <div class="learn-col">
                @if(!empty($course->name))  <strong> {{ $course->name }} </strong> @endif
			  
			</div>
        </div>
				<div class="row">
					<div class="col-md-12">			  
					<ul class="college-link2">
						@if(!empty($course->course_approval))<li>Approval: <strong>{{ $course->course_approval }}</strong></li>@endif
						@if(!empty($course->course_exam) && $course->course_exam!="null")<li>Exam: <strong>{{ $course->course_exam }}</strong></li>@endif
						@if(!empty($course->course_seats))<li>Seats: <strong>{{ $course->course_seats }}</strong></li>@endif
						@if(!empty($course->course_total_fee))<li>Total Fees: <strong>{{ $course->course_total_fee }}</strong></li>@endif
						@if(!empty($course->course_duration))<li>Duration: <strong>{{ $course->course_duration }}</strong></li>@endif
						@if(!empty($course->course_mode))<li>Mode: <strong>{{ $course->course_mode }}</strong></li>@endif
					</ul>
					</div>
				</div>

				<!--@if($course->brochure)
				<div class="row"><div class="col-12">
				<a class="btn btn-sm btn-success float-start" href="{{ url('public/uploads/brochure/'.$course->brochure) }}">Download Brochure</a>
				</div></div>
				@endif-->

			</div>
          @endforeach

        </div>
        <!-- Courses & Fee End -->
        @endif
        
        @if(!empty($data->cutoff) && $data->cutoff->description)
        <!-- Cutoff -->
        <div id="cutoff" class="section-heading mt-2  title text-center">Cutoff</div>

        <div class="section-feedback row m-0 p-0">
            <div class="learn-col">
                  {!! !empty($data->cutoff) ? $data->cutoff->description : '' !!}
			  
			</div>
        </div>
        <!-- Cutoff End -->
        @endif
        
        @if(!empty($data->admission) && $data->admission->description)
        <!-- Admission -->
        <div id="admission" class="section-heading mt-2  title text-center">Admission</div>

        <div class="section-feedback row m-0 p-0">
            <div class="learn-col">
                  {!! !empty($data->admission) ? $data->admission->description : '' !!}
			  
			</div>
        </div>
        <!-- Admission End -->
        @endif
        
        @if(!empty($data->facilities))
        <!-- Facilities -->
        <div id="facilities" class="section-heading mt-2  title text-center">Facilities</div>

        <div class="section-feedback row m-0 p-0">
            <div class="learn-col">
                  {!! !empty($data->facilities) ? $data->facilities : '' !!}
			  
			</div>
        </div>
        <!-- Facilities End -->
        @endif
        
        
        @if(count($ranks)>0)
        <!-- Ranks -->
        <div id="ranks" class="section-heading mt-2">Ranks</div>

        <div class="section-feedback m-0 p-0">
              
              <?php if($ranks){?>
				  <div class="row">   
				        <?php foreach($ranks as $rank_row){if($rank_row->rank_type){?>
				            <div class="col-md-6" style="margin-bottom: 10px;">
				              <div class="col-md-12 ranklist">
				                
				                <div class="row">
				               <div class="col-9"><img src="{{ asset('public/rankicon.png') }}"> <b><?= $rank_row->course_name ?>, <?= $rank_row->rank_type ?></b></div>
				               <div class="col-3 text-center"><i class="fa fa-heart"></i> <span class="fs_bold"><?=$rank_row->rank_rating?></span> </div>
				              </div> 

				            </div>
				            </div>
				        <?php } }?>
				</div>
				<?php } ?>
        </div>
        <!-- Ranks End -->
        @endif
        
         @if(count($college->photos)>0)
        <!-- Photos -->
        <div id="facilities" class="section-heading mt-2  title text-center">Photos</div>

        <div class="row">

              @foreach($college->photos as $photo)
                <div class="col-3 mt-3">
                    <img src="{{ asset('uploads/photos') . '/' . $photo->image  }}" style="width:100%;" />
                </div>
              @endforeach

        </div>
        <!-- Photos End -->
        @endif
        
        @if(count($collegevideos)>0)
        <!-- Videos -->
        <div id="facilities" class="section-heading mt-2  title text-center">Videos</div>
        <div class="row m-0 p-0">

          @foreach($collegevideos as $row)
          <div class="col-12">
                <strong>Title : </strong> {{ $row->title }}
                <br>
                <strong>Link : <span style="color:blue; ">{{ $row->youtube_link }}</span></strong>
          </div>
          @endforeach

        </div>
        <!-- Videos End -->
        @endif
        
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
</body>

</html>