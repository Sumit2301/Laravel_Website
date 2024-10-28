@extends('layouts.admin')
@section('content')
<div class="row">
<div class="card col-md-12 p-0">
    <div class="card-header">
        {{ isset($course) ? $course->name : '' }}
    </div>
    <div class="card-body">
        <form action="{{ route('admin.courses.add_questionanswer') }}" method="POST" enctype="multipart/form-data">
		<div class="row">
            @csrf
			<div class="col-md-12 text-center">
				<div>
				<h4 class="pull-left">Question Answers</h4>

              	@if($message = Session::get('success'))
              	<div class="alert alert-success text-left">
              		{{ $message }}
              	</div>
              	@elseif($message = Session::get('error'))
              	<div class="alert alert-danger text-left">
              		{{ $message }}
              	</div>
              	@endif

				<?php if($questionanswer){?>
					<a href="{{ url('admin/courses/'.$course->id.'/questionanswers/') }}" class="btn btn-info text-white pull-right">Add New</a>
				<?php } ?>	
			</div>
			</div>

				<div class="col-md-12 form-group">
					<label>Question</label>
					<textarea class="ckeditor form-control" name="question">{{ old('question',($questionanswer)?$questionanswer->question:'')}}</textarea>
				</div>

				<div class="col-md-12 form-group">
					<label>Answer</label>
					<textarea class="ckeditor form-control" name="answer">{{ old('answer',($questionanswer)?$questionanswer->answer:'')}}</textarea>
				</div>

				<div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label for="status">Status</label>
					<select name="status" id="status" class="form-control" >
						<option value="1" <?php if($questionanswer && $questionanswer->status=='1'){echo 'selected';}?>>Active</option>
						<option value="0" <?php if($questionanswer && $questionanswer->status=='0'){echo 'selected';}?>>Deactive</option>
					</select>
					@if($errors->has('status'))
						<em class="invalid-feedback">
							{{ $errors->first('status') }}
						</em>
					@endif
				</div>

				<input type="hidden" name="update_id" value="{{ ($questionanswer)?$questionanswer->id:''}}" id="update_id">
				<input type="hidden" name="course_id" value="<?=$course->id?>" id="course_id">
            <div class="col-12 mt-3">
                <input class="btn btn-success addNews" type="submit" value="{{ ($questionanswer)?'Update':'Add New'}}">
            </div>
		</div>
        </form>

			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" style="margin-top: 30px">
				<thead>
					<tr>
						<th class="text-center" style="width: 50px;">SN</th>
						<th class="text-left">Question</th>
						<th class="text-left">Answer</th>
						<th class="text-center" style="width: 50px;">Status</th>
						<th class="text-center" style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=0;foreach($questionanswers as $k=>$row){ $i++;?>
					<tr align="center">
						<td><?=$i?></td>
						<td class="text-left"><?=$row['question']?></td>
						<td class="text-left"><?=$row['answer']?></td>
						<td class="text-center"><?=($row['status']=='1')?'<badge class="label-success btn btn-success btn-sm">Active</badge>':'<badge class="label-danger btn btn-danger btn-sm">Disable</badge>'?></td>		
						<td class="text-center"><a class="btn btn-sm btn-success" href="{{ url('admin/courses/'.$course->id.'/questionanswers/'.$row['id']) }}"><i class="fa fa-edit"></i></a><a class="btn btn-sm btn-danger ml-2" href="javascript:void(0)" onclick="deleteRecord(<?=$row['id']?>)"><i class="fa fa-trash"></i></a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
    </div>
	

	</div>
</div>

@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
	   var stid = $("#state option").filter(":selected").val();
	   selectCity(stid);
       $('.ckeditor').ckeditor();
    });

function deleteRecord(id) {
	Swal.fire({
  title: 'Do you want to delete this news?',
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Delete',
  //denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    window.location.href="{{ url('admin/courses/delete_questionanswer') }}/"+id;
  } 
})
}
</script>
@endsection