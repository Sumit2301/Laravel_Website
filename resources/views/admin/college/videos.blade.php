@extends('layouts.admin')
@section('content')
<div class="row">
<div class="card col-md-10 p-0">
    <div class="card-header">
        <strong>Update College</strong> {{ isset($college) ? $college->name : '' }}
    </div>
    <div class="card-body">
        <form action="{{ route('admin.colleges.add_video') }}" method="POST" enctype="multipart/form-data">
		<div class="row">
            @csrf
			<div class="col-md-12 text-center">
				<div>
				<h4 class="pull-left">Yotube Videos</h4>

              	@if($message = Session::get('success'))
              	<div class="alert alert-success text-left">
              		{{ $message }}
              	</div>
              	@elseif($message = Session::get('error'))
              	<div class="alert alert-danger text-left">
              		{{ $message }}
              	</div>
              	@endif

				<?php if($collegevideo){?>
					<a href="{{ url('admin/colleges/'.$college->id.'/videos/edit') }}" class="btn btn-info text-white pull-right">Add New</a>
				<?php } ?>	
			</div>
			</div>
				<div class="col-md-6 form-group {{ $errors->has('title') ? 'has-error' : '' }}" style="margin-top: 20px;">
					<label for="title">Title <span style="color:red">*</span></label>
					<input type="text" id="title" name="title" class="form-control" value="{{ old('title',($collegevideo)?$collegevideo->title:'') }}" required >
					@if($errors->has('title'))
						<em class="invalid-feedback">
							{{ $errors->first('title') }}
						</em>
					@endif
				</div>

				<div class="col-md-6 form-group {{ $errors->has('youtube_link') ? 'has-error' : '' }}" style="margin-top: 20px;">
					<label for="youtube_link">Youtube Link <span style="color:red">*</span></label>
					<input type="text" id="youtube_link" name="youtube_link" class="form-control" value="{{ old('youtube_link',($collegevideo)?$collegevideo->youtube_link:'') }}" required >
					@if($errors->has('youtube_link'))
						<em class="invalid-feedback">
							{{ $errors->first('youtube_link') }}
						</em>
					@endif
				</div>

				<div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label for="status">Status</label>
					<select name="status" id="status" class="form-control" >
						<option value="1" <?php if($collegevideo && $collegevideo->status=='1'){echo 'selected';}?>>Active</option>
						<option value="0" <?php if($collegevideo && $collegevideo->status=='0'){echo 'selected';}?>>Deactive</option>
					</select>
					@if($errors->has('status'))
						<em class="invalid-feedback">
							{{ $errors->first('status') }}
						</em>
					@endif
				</div>

				<input type="hidden" name="update_id" value="{{ ($collegevideo)?$collegevideo->id:''}}" id="update_id">
				<input type="hidden" name="college_id" value="<?=$college->id?>" id="college_id">
            <div class="col-12 mt-3">
                <input class="btn btn-success addNews" type="submit" value="{{ ($collegevideo)?'Update':'Add New'}}">
            </div>
		</div>
        </form>

			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" style="margin-top: 30px">
				<thead>
					<tr>
						<th class="text-center" style="width: 50px;">SN</th>
						<th class="text-left">Title</th>
						<th class="text-left">Youtube Link</th>
						<th class="text-center" style="width: 50px;">Status</th>
						<th class="text-center" style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=0;foreach($news as $k=>$row){ $i++;?>
					<tr align="center">
						<td><?=$i?></td>
						<td class="text-left"><?=$row['title']?></td>
						<td class="text-left"><a href="<?=$row['youtube_link']?>" target="_blank"><?=$row['youtube_link']?></a></td>
						<td class="text-center"><?=($row['status']=='1')?'<badge class="label-success btn btn-success btn-sm">Active</badge>':'<badge class="label-danger btn btn-danger btn-sm">Disable</badge>'?></td>		
						<td class="text-center"><a class="btn btn-sm btn-success" href="{{ url('admin/colleges/'.$college->id.'/videos/edit/'.$row['id']) }}"><i class="fa fa-edit"></i></a><a class="btn btn-sm btn-danger ml-2" href="javascript:void(0)" onclick="deleteRecord(<?=$row['id']?>)"><i class="fa fa-trash"></i></a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
    </div>
	

	</div>
	@include('admin.college.updatemenu')
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
    window.location.href="{{ url('admin/colleges/delete_video') }}/"+id;
  } 
})
}
</script>
@endsection