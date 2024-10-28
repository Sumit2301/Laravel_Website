@extends('layouts.site')
@section('content')

<style>
.ranklist {
    border: 1px solid #f1f1f1;
    padding: 10px;
    border-radius: 50px;
    background: #f6ecd5;
    line-height: 33px;
}
.ranklist img {
	border-radius: 100%;
	height: 34px;
	margin-right: 4px;
}
.ranklist b,.ranklist i,.ranklist span {
    font-weight: bold;
    color: #00306b!important;
}
</style>

	@include('frontend.college_detail_menu')
  
	  <section class="container">
	    <div class="row m-0 p-0">
	      <div class="col-md-9 col-12 left-panel">
            <div class="learn-col">
			  <h2 class="mb-4">Ranking</h2>
              

              <?php if($rank_data){?>
				<div class="col-md-12">
				  <div class="row">   
				        <?php foreach($rank_data as $rank_row){if($rank_row->rank_type){?>
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
				</div>
				<?php } ?>


			  
			</div>
			
		  </div>
        @include('frontend.college_details_sidebar');
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