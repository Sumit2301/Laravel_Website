
<div class="col-md-12">
  <div class="row"> 
     <div class="courseinfo" style="margin-bottom: 10px;"><b>Exams </b></div>
     <br>
     <div class="col-md-12">
      <div class="info featured_insti">

      <ul>
       <?php 
        $exam = (array) json_decode($course->exam);
        for($i=0;$i<count($exam);$i++){
       ?>
        <li><a href="#"><?=$exam[$i]?></a></li>

     <?php } ?>
     </ul>
   </div>
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