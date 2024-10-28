
<div class="col-md-12">
  <div class="row"> 
     <div class="col-md-12">
       <?=$course->scope?>
     </div>
  </div>
</div>


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