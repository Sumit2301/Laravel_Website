@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="card">
		<div class="card-header">
			Free Expert Advice
		</div>

		<div class="card-body">
			<table class="table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" id="spTable">
				<thead>
					<tr>
						<th class="text-center" class="text-center" style="width: 50px;">SN</th>
						<th style="width: 100px;">Name</th>
						<th style="width: 100px;">Email</th>
						<th style="width: 100px;">Mobile</th>
						<th style="width: 100px;">Type</th>
						<th style="width: 100px;">Course/College</th>
						<th>Message</th>
						<th class="text-center" style="width: 70px;">Status</th>
						<th class="text-center" style="width: 90px;">Date</th>
						<th class="text-center" style="min-width: 100px;">Remark</th>
						<th class="text-center" style="width: 100px;">Created</th>
						<th class="text-center" style="min-width: 70px;">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($courseexpertadvices as $key=>$row)
					<tr>
						<td class="text-center">{{ $key+1 }}</td>
						<td>{{ $row->name }}</td>
						<td>{{ $row->email }}</td>
						<td>{{ $row->mobile }}</td>
						<td>{{ $row->type }}</td>
						<td>{{ $row->course_name }}</td>
						<td>{{ $row->message }}</td>
						<td class="text-center">{!! ($row->status==1)?"<b class='btn btn-success btn-sm'>Open</b>":"<b class='btn btn-danger btn-sm'>Closed</b>" !!}<!-- {!! ($row->status==1)?"<a href='".url("admin/courseexpertadvices/updateStatus/".$row->id."/2")."' class='btn btn-success btn-sm'>Open</a>":"<a  href='".url("admin/courseexpertadvices/updateStatus/".$row->id."/1")."' class='btn btn-danger btn-sm'>Closed</a>" !!} --></td>
						<td><div style="width: 80px;">{{ $row->remark_date }}</div></td>
						<td>{{ $row->remark }}</td>
						<td class="text-center">{{ $row->created_at }}</td>
						<td class="text-center"><button type="button" class="btn btn-primary btn-sm" onclick="editStatus({{ $row->id }},{{ $row->status }})"><i class="fa fa-edit"></i></button></td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editForm">
  <div class="modal-dialog" role="document">
      
    <form method="post" id="edit-form" autocomplete="off">  
    @csrf
    <div class="modal-content">
      <div class="modal-header navbar-white text-white">
        <h5 class="modal-title text-dark">Edit Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <div class="row">
           <div class="col-md-12">
               <div class="form-group" style="position: relative">
                   <label for="date">Date</label>
                   <input type="text" class="form-control remark_date" name="remark_date" id="remark_date" autocomplete="off">
               </div>
           </div> 

           <div class="col-md-12">
               <div class="form-group">
                   <label for="entry_type">Status</label>
                   <select class="form-control" name="status" id="status">
                     <option value="1">Open</option>
                     <option value="2">Closed</option>
                   </select>
               </div>
           </div> 

           <div class="col-md-12">
               <div class="form-group">
                   <label for="remark">Remark</label>
                   <textarea rows="3" name="remark" id="remark" class="form-control"></textarea>
               </div>
           </div> 
       </div>
      </div>
      
      <div class="modal-footer">
          <input type="hidden" value="" name="record_id" id="record_id">
        <button type="submit" class="btn btn-info edit-btn">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
    </form>
    
  </div>
</div>

@endsection


@section('afterscript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
  $(function () {
    $('#spTable').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
    });
  });

  function editStatus(id,status) {
    $('#editForm').modal({
        backdrop: 'static',
        keyboard: false,
        show:true
    });
    $('#record_id').val(id);
    $('#status').val(status);
  }

  $("#edit-form").validate({
  rules: {
      status: {
          required: true
      }   
  },
  messages: {
  },
  submitHandler: function(form) {

   var rechargeform = document.getElementById('edit-form');
    var fd = new FormData(rechargeform);
    $(".edit-btn").html("Wait...").prop("disabled",true);
    $.ajax({
        type: "POST",
        url: "<?php echo url('admin/courseexpertadvices/remark_process'); ?>",
        data: fd,
        contentType: false,           
        processData:false, 
        success: function (response) {
            if(response.status===true){
               window.location.href= "";
            }else{
        			$(".edit-btn").html("Save").prop("disabled",false);
                  alert('Some Error Occured.');
                  //document.getElementById('recharge').reset();
            }
        },
        error: function () {
        	$(".edit-btn").html("Save").prop("disabled",false);
           alert('Some Error Occured.');
             document.getElementById('recharge').reset();
        }

    });
    return false; 

  }
 });  

$('.remark_date').datetimepicker({
	format: 'DD-MM-YYYY'
});

</script>
@endsection