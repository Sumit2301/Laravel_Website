@extends('layouts.admin')
@section('content')


<style>
    tr{
        white-space: nowrap;
    }
</style>

<section class="college-predictor-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card-header bg-primary">
                        <h2>College Predictor User List</h2>
                    </div>
                <div class="card table-responsive">
                    
                    <div class="card-body p-4">
                        <table class="table table-bordered" id="college-predictor-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>State</th>
                                <th>Interested Course</th>
                                <th>Neet all India overall_rank</th>
                                <th>Miscellaneous</th>
                                <th>Disability</th>
                                <th>Caste</th>
                                <th>Registration Date</th>
                                <th>Callback</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->mobile }}</td>
                                <td>{{ $row->state }}</td>
                                <td>{{ $row->interested_course }}</td>
                                <td>{{ $row->neet_all_india_overall_rank }}</td>
                                <td>{{ $row->miscellaneous }}</td>
                                <td>{{ $row->disability }}</td>
                                <td>{{ $row->caste }}</td>
                                <td>{{ date('Y-M-d',  strtotime($row->created_at)) }}</td>
                                <td>   
                                    @if($row->callback_request ==  'requested')
                                        <div class="btn btn-danger">Requested</div>
                                    @endif
                                </td>
                                <td>
                                    @if($row->status ==  'close')
                                        <div class="btn btn-danger">Close</div>
                                    @elseif($row->status ==  'open')
                                        <div class="btn btn-success">Open</div>
                                    @endif
                                </td>
                                <td>{{ $row->remark }}</td>
                                <td>{{ $row->remark_date }}</td>
                                <td><button type="button" class="btn btn-primary btn-sm" onclick="editStatus({{$row->id}}, '{{$row->status}}', '{{$row->remark_date}}', '{{$row->remark}}')"><i class="fa fa-edit"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Mobel -->

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
                     <option value="open">Open</option>
                     <option value="close">Closed</option>
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

<!-- End Mobel -->

@endsection


@section('afterscript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>
  $(function () {
    $('#college-predictor-table').DataTable({
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

  function editStatus(id,status,remark_date = '', remark = '') {
    $('#editForm').modal({
        backdrop: 'static',
        keyboard: false,
        show:true
    });
    $('#record_id').val(id);
    $('#status').val(status);
    $('#remark_date').val(remark_date);
    $('#remark').val(remark);
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
        url: "<?php echo url('admin/remark_process'); ?>",
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
	format: 'YYYY-MM-DD'
});

</script>
@endsection
