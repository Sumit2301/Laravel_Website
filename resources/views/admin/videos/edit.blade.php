@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.videos.index") }}">
                Video List
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			Edit Video
		</div>

		<div class="card-body">

			@if($message = Session::get('success'))
			<div class="alert alert-success mb-3">
				{{ $message }}
			</div>
			@endif
			@if($message = Session::get('error'))
			<div class="alert alert-danger mb-3">
				{{ $message }}
			</div>
			@endif

			<form action="{{ route("admin.videos.update",$video->id) }}" method="POST" enctype="multipart/form-data">
				<div class="row">
					@csrf
					@method('put')
					<div class="col-md-6 form-group {{ $errors->has('url') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="url">Youtube URL <span style="color:red">*</span></label>
						<input type="text" id="url" name="url" class="form-control" value="{{ old('url',$video->url) }}" required >
						@if($errors->has('url'))
							<em class="invalid-feedback">
								{{ $errors->first('url') }}
							</em>
						@endif
					</div>

					<div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control" >
							<option value="1" <?= ($video->status==1)?'selected':'' ?>>Active</option>
							<option value="0" <?= ($video->status==0)?'selected':'' ?>>Deactive</option>
						</select>
						@if($errors->has('status'))
							<em class="invalid-feedback">
								{{ $errors->first('status') }}
							</em>
						@endif
					</div>

					<div class="col-md-6 form-group">
						<input class="btn btn-success" type="submit" value="Update">
					</div>

				</div>

			</form>

		</div>
	</div>
</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function() {
   $('.ckeditor').ckeditor();
});
</script>
@endsection