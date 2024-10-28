@extends('layouts.admin')
@section('content')
<div class="row">
<div class="card col-md-12 p-0">
    <div class="card-header">
        Ebooks
    </div>
    <div class="card-body">
        <form action="{{ route('admin.courses.add_ebook') }}" method="POST" enctype="multipart/form-data">
		<div class="row">
            @csrf
			<div class="col-md-12 text-center">
				<div>

              	@if($message = Session::get('success'))
              	<div class="alert alert-success text-left">
              		{{ $message }}
              	</div>
              	@elseif($message = Session::get('error'))
              	<div class="alert alert-danger text-left">
              		{{ $message }}
              	</div>
              	@endif

				<?php if($ebook){?>
					<a href="{{ url('admin/ebooks/') }}" class="btn btn-info text-white pull-right">Add New</a>
				<?php } ?>	
			</div>
			</div>
				<div class="col-md-6 form-group {{ $errors->has('title') ? 'has-error' : '' }}" style="margin-top: 20px;">
					<label for="title">Title <span style="color:red">*</span></label>
					<input type="text" id="title" name="title" class="form-control" value="{{ old('title',($ebook)?$ebook->title:'') }}" required >
					@if($errors->has('title'))
						<em class="invalid-feedback">
							{{ $errors->first('title') }}
						</em>
					@endif
				</div>

				<div class="col-md-12 form-group">
					<label>Content</label>
					<textarea class="ckeditor form-control" name="description">{{ old('content',($ebook)?$ebook->content:'')}}</textarea>
				</div>

				<div class="col-md-6 form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
					<label for="news">Thumbnail <span style="color:red">* (Size:275x210)</span></label>
					<input type="file" id="thumbnail" name="thumbnail" class="form-control" value="" <?= (!$ebook)?'required':'' ?> >
					@if($errors->has('thumbnail'))
						<em class="invalid-feedback">
							{{ $errors->first('thumbnail') }}
						</em>
					@endif	

					<?php if($ebook && $ebook->thumbnail){?>
						<a href="{{url('uploads/ebook/'.$ebook->thumbnail)}}" target="_blank"><img src="{{url('uploads/ebook/'.$ebook->thumbnail)}}" style="height: 80px;width: 80px;object-fit: cover;margin-top: 15px;"></a>
					<?php } ?>
				</div>

				<div class="col-md-6 form-group {{ $errors->has('ebook') ? 'has-error' : '' }}">
					<label for="image">Image <span style="color:red">* (Size:780x440)</span></label>
					<input type="file" id="ebook" name="ebook" class="form-control" <?= (!$ebook)?'required':'' ?> accept="image/png, image/gif, image/jpeg" >
					@if($errors->has('ebook'))
						<em class="invalid-feedback">
							{{ $errors->first('ebook') }}
						</em>
					@endif

					<?php if($ebook && $ebook->image){?>
						<a href="{{url('uploads/ebook/'.$ebook->image)}}" target="_blank"><img src="{{url('uploads/ebook/'.$ebook->image)}}" style="height: 80px;width: 80px;object-fit: cover;margin-top: 15px;"></a>
					<?php } ?>	
				</div>

				<div class="col-md-6 form-group {{ $errors->has('document') ? 'has-error' : '' }}">
					<label for="document">Ebook <span style="color:red">*</span></label>
					<input type="file" id="document" name="document" class="form-control" value=""  accept='application/pdf'>
					@if($errors->has('document'))
						<em class="invalid-feedback">
							{{ $errors->first('document') }}
						</em>
					@endif

					<?php if($ebook && $ebook->document){?>
						<a class="btn btn-sm btn-info mt-2" href="{{url('uploads/document/'.$ebook->document)}}" target="_blank">View</a>
					<?php } ?>	
				</div>

				<div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					<label for="status">Status</label>
					<select name="status" id="status" class="form-control" >
						<option value="1" <?php if($ebook && $ebook->status=='1'){echo 'selected';}?>>Active</option>
						<option value="0" <?php if($ebook && $ebook->status=='0'){echo 'selected';}?>>Deactive</option>
					</select>
					@if($errors->has('status'))
						<em class="invalid-feedback">
							{{ $errors->first('status') }}
						</em>
					@endif
				</div>

				<div class="col-md-6 form-group {{ $errors->has('publish_date') ? 'has-error' : '' }}">
					<label for="publish_date">Publish Date <span style="color:red">*</span></label>
					<input type="text" id="publish_date" name="publish_date" class="form-control" value="{{ old('publish_date',($ebook)?$ebook->publish_date:'') }}" required >
					@if($errors->has('publish_date'))
						<em class="invalid-feedback">
							{{ $errors->first('publish_date') }}
						</em>
					@endif
				</div>

				<div class="col-md-12 form-group">
					<h4>SEO Meta</h4>
					<label>Meta Title</label>
					<textarea class="form-control" name="meta_title" rows="2">{{ old('meta_title',($ebook)?$ebook->meta_title:'')}}</textarea>
				</div>

				<div class="col-md-12 form-group">
					<label>Meta Description</label>
					<textarea class="form-control" name="meta_description" rows="2">{{ old('meta_description',($ebook)?$ebook->meta_description:'')}}</textarea>
				</div>

				<div class="col-md-12 form-group">
					<label>Meta Keywords</label>
					<textarea class="form-control" name="meta_keywords" rows="2">{{ old('meta_keywords',($ebook)?$ebook->meta_keywords:'')}}</textarea>
				</div>

				<input type="hidden" name="update_id" value="{{ ($ebook)?$ebook->id:''}}" id="update_id">
            <div class="col-12 mt-3">
                <input class="btn btn-success addNews" type="submit" value="{{ ($ebook)?'Update':'Add New'}}">
            </div>
		</div>
        </form>

			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" style="margin-top: 30px">
				<thead>
					<tr>
						<th class="text-center" style="width: 50px;">SN</th>
						<th class="text-center">Image</th>
						<th class="text-left">Title</th>
						<th class="text-left">Document</th>
						<th class="text-center" style="width: 50px;">Status</th>
						<th class="text-center" style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=0;foreach($ebooks as $k=>$row){ $i++;?>
					<tr align="center">
						<td><?=$i?></td>
						<td class="text-center">
							<?php if($row['thumbnail']){?>
							<a href="{{url('uploads/ebook/'.$row['thumbnail'])}}" target="_blank"><img src="{{url('uploads/ebook/'.$row['thumbnail'])}}" style="height: 80px;width: 80px;object-fit: cover;margin-top: 15px;"></a></a>
						    <?php } ?>
						</td>
						<td class="text-left"><?=$row['title']?></td>
						<td class="text-left"><a href="<?=url('uploads/document/'.$row['document'])?>" target="_blank"><?=url('uploads/document/'.$row['document'])?></a></td>
						<td class="text-center"><?=($row['status']=='1')?'<badge class="label-success btn btn-success btn-sm">Active</badge>':'<badge class="label-danger btn btn-danger btn-sm">Disable</badge>'?></td>		
						<td class="text-center"><a class="btn btn-sm btn-success" href="{{ url('admin/ebooks/'.$row['id']) }}"><i class="fa fa-edit"></i></a><a class="btn btn-sm btn-danger ml-2" href="javascript:void(0)" onclick="deleteRecord(<?=$row['id']?>)"><i class="fa fa-trash"></i></a></td>
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
	$("#publish_date").datetimepicker({
		viewMode: 'days',
		format: 'YYYY-MM-DD'
	});
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
    window.location.href="{{ url('admin/courses/delete_ebook') }}/"+id;
  } 
})
}
</script>
@endsection