<?php if($top_destination){?>
<div class="col-md-12">
  <div class="row featured_insti dest">
    <ul>
      <?php foreach($top_destination as $row){?>
      <li><a href="#"><?=$row->state_name?></a></li>
       <?php } ?>  
    </ul>

  </div>
<!--   <div class="row">   
    <table class="table table-bordered destination_table">
    	<thead align="center">
    		<tr>
	    		<th>College</th>
	    		<th>State</th>
	    		<th>City</th>
    		</tr>
    	</thead>

    	<tbody align="center">
        <?php foreach($top_destination as $row){?>
    		<tr>
    			<td><p><?=$row->college_name?></p></td>
    			<td><p><?=$row->state_name?></p></td>
    			<td><p><?=$row->city_name?></p></td>
    		</tr>

        <?php } ?>    		

    	</tbody>
    </table>
</div> -->
</div>
<?php } ?>


<div class="courseinfo">
  <hr>
  <b><?=($course->eligibility_criteria)?'ELIGIBILITY':''?></b>
  <div class="info"><?=$course->eligibility_criteria?></div>

 <?=($course_detail)?"<b>FEATURED INSTITUTES : </b>":''?>;
  <div class="info featured_insti">
    <ul>
    <?php foreach($course_detail as $row){?>
      <li><a href="{{ url('college',$row->clg_url) }}"><?=$row->name?></a></li>
    <?php } ?> 
    </ul>     
    </div>  
</div>