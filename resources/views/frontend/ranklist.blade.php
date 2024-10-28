<?php if($rank_data){?>
<div class="col-md-12">
  <div class="row">   
        <?php foreach($rank_data as $rank_row){if($rank_row->rank_type){?>
            <div class="col-md-4" style="margin-bottom: 10px;">
              <div class="col-md-12 ranklist">
              <a href="{{ url('rank/'.$rank_row->slug) }}">
                
                <div class="row">
               <div class="col-md-2"><img src="{{ asset('public/rankicon.png') }}"></div>
               <div class="col-md-7"><b><?=($rank_row->rank_type)?$rank_row->rank_type:''?></b></div>
               <div class="col-md-3"><!-- <i class="fa fa-heart"></i> <span class="fs_bold"><?=$rank_row->rank_rating?></span> --></div>
              </div> 
              
              </a>
            </div>
            </div>
        <?php } }?>
</div>
</div>
<?php } ?>

<div class="courseinfo">
  <hr>
  <b>ELIGIBILITY : </b>
  <div class="info"><?=$course->eligibility_criteria?></div>

 <?=($course_detail)?"<b>FEATURED INSTITUTES : </b>":''?>;
  <div class="info featured_insti">
    <ul>
    <?php foreach($course_detail as $row){?>
      <li><a href=""><?=$row->name?></a></li>
    <?php } ?> 
    </ul>     
    </div>  
</div>