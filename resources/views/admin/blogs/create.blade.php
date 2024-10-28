@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.blogs.index") }}">
                News List
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			Add News
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

			<form action="{{ route("admin.blogs.store") }}" method="POST" enctype="multipart/form-data">
				<div class="row">
					@csrf
					<div class="col-md-6 form-group {{ $errors->has('title') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="title">Title <span style="color:red">*</span></label>
						<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required >
						@if($errors->has('title'))
							<em class="invalid-feedback">
								{{ $errors->first('title') }}
							</em>
						@endif
					</div>

					<div class="col-md-6 form-group {{ $errors->has('slug') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="slug">Slug <span style="color:red">*</span></label>
						<input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" required >
						@if($errors->has('slug'))
							<em class="invalid-feedback">
								{{ $errors->first('slug') }}
							</em>
						@endif
					</div>

					<div class="col-md-12 form-group">
						<label>Content</label>
						<textarea class="ckeditor form-control" name="description">{{ old('content')}}</textarea>
					</div>

					<div class="col-md-6 form-group {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
						<label for="news">Thumbnail <span style="color:red">* (Size:292x210)</span></label>
						<input type="file" id="thumbnail" name="thumbnail" class="form-control" value="" >
						@if($errors->has('thumbnail'))
							<em class="invalid-feedback">
								{{ $errors->first('thumbnail') }}
							</em>
						@endif	
					</div>

					<div class="col-md-6 form-group {{ $errors->has('blog') ? 'has-error' : '' }}">
						<label for="news">Image <span style="color:red">* (Size:780x440)</span></label>
						<input type="file" id="blog" name="blog" class="form-control" value="" >
						@if($errors->has('blog'))
							<em class="invalid-feedback">
								{{ $errors->first('blog') }}
							</em>
						@endif	
					</div>
				

					<div class="col-md-6 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control" >
							<option value="1">Active</option>
							<option value="0">Deactive</option>
						</select>
						@if($errors->has('status'))
							<em class="invalid-feedback">
								{{ $errors->first('status') }}
							</em>
						@endif
					</div>

					<div class="col-md-6 form-group {{ $errors->has('publish_date') ? 'has-error' : '' }}">
						<label for="publish_date">Publish Date <span style="color:red">*</span></label>
						<input type="text" id="publish_date" name="publish_date" class="form-control" value="{{ old('publish_date') }}" required >
						@if($errors->has('publish_date'))
							<em class="invalid-feedback">
								{{ $errors->first('publish_date') }}
							</em>
						@endif
					</div>

					<div class="col-md-12 form-group">
						<h4>SEO Meta</h4>
						<label>Meta Title</label>
						<textarea class="form-control" name="meta_title" rows="2">{{ old('meta_title')}}</textarea>
					</div>

					<div class="col-md-12 form-group">
						<label>Meta Description</label>
						<textarea class="form-control" name="meta_description" rows="2">{{ old('meta_description')}}</textarea>
					</div>

					<div class="col-md-12 form-group">
						<label>Meta Keywords</label>
						<textarea class="form-control" name="meta_keywords" rows="2">{{ old('meta_keywords')}}</textarea>
					</div>

					<div class="col-md-12 form-group">
						<input class="btn btn-success" type="submit" value="Add Blog">
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
	$("#publish_date").datetimepicker({
		viewMode: 'days',
		format: 'YYYY-MM-DD'
	});
   $('.ckeditor').ckeditor();
});
</script>
@endsection