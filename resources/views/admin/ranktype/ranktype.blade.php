@extends('layouts.admin')
@section('content')


<div class="row">
<div class="card col-md-12 p-0">


    <div class="card-header">
        <strong>Add Rank Type</strong>
       
    </div>
    <div class="card-body">
        <form id="ranktypeForm" method="POST" action="<?php if(isset($rank_details)){?>{{ route('admin.ranktypes.update',$rank_details->rank_id) }}<?php }else{?>{{ route('admin.ranktypes.store') }}<?php } ?>" enctype="multipart/form-data">
			<div class="row">
				@csrf
				<?php if(isset($rank_details)){?>
				@method('put');
			<?php } ?>
				<div class="col-md-12 form-group">
					<label><strong>Title <span style="color:red">*</span></strong></label>
					<input type="text" name="rank_type" id="rank_type" class="form-control" value="{{ old('rank_type',(isset($rank_details))?$rank_details->rank_type:'') }}">
				</div>
				<div class="col-md-12 form-group">
					<label><strong>Description</strong></label>
					<textarea type="text" name="description" id="description" class="form-control ckeditor">{{ old('description',(isset($rank_details))?$rank_details->description:'') }}</textarea>
				</div>			
								
				<div class="col-md-12 form-group {{ $errors->has('image') ? 'has-error' : '' }}">
					<label for="image">Image <span style="color:red">*</span></label>
					<input class="form-control" type="file" name="image" id="image" accept="image/*" />
					@if($errors->has('image'))
						<em class="invalid-feedback">
							{{ $errors->first('image') }}
						</em>
					@endif
					<div class="col-md-12">
					<?php if(isset($rank_details) && $rank_details && $rank_details->image){?>
						<a href="{{ asset('uploads/rank/'.$rank_details->image) }}" target="_blank"><img src="{{ asset('uploads/rank/'.$rank_details->image) }}" width="90px" height="90px" class="img img-thumbnail mt-3"></a>
					<?php } ?>
					</div>	
				</div>

				<div class="col-12">
					<input class="btn btn-danger" type="submit" value="Save">
				</div>
			</div>
			</form>


    </div>
	

	</div>
	
</div>

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	   
       $('.ckeditor').ckeditor();
    });
</script>

@endsection