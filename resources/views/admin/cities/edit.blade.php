@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.cities.index") }}">
                City List
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			Edit City
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

			<form action="{{ route("admin.cities.update",$city->id) }}" method="POST" enctype="multipart/form-data">
				<div class="row">
					@csrf
					@method('put')
					<div class="col-md-6 form-group {{ $errors->has('city_name') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="city_name">Name <span style="color:red">*</span></label>
						<input type="text" id="city_name" name="city_name" class="form-control" value="{{ old('city_name',$city->city_name) }}" required >
						@if($errors->has('city_name'))
							<em class="invalid-feedback">
								{{ $errors->first('city_name') }}
							</em>
						@endif
					</div>
					
					<div class="col-md-6 form-group {{ $errors->has('city_code') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="city_code">City Code <span style="color:red">*</span></label>
						<input type="number" id="city_code" name="city_code" class="form-control" value="{{ old('city_code',$city->city_code) }}" required >
						@if($errors->has('city_code'))
							<em class="invalid-feedback">
								{{ $errors->first('city_code') }}
							</em>
						@endif
					</div>

					<div class="col-md-6 form-group {{ $errors->has('slug') ? 'has-error' : '' }}" style="margin-top: 20px;">
						<label for="slug">Slug <span style="color:red">*</span></label>
						<input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug',$city->slug) }}" required >
						@if($errors->has('slug'))
							<em class="invalid-feedback">
								{{ $errors->first('slug') }}
							</em>
						@endif
					</div>

					<div class="col-md-12 form-group">
						<label>Content</label>
						<textarea class="ckeditor form-control" name="content">{{ old('content',$city->content)}}</textarea>
					</div>

				  <div class="form-group col-md-6">
					<label for="first_name">State</label>
					<select class="form-control" name="state_code" id="state_code">
						<option value="">Select State</option>
						@foreach($states as $state)
						<option value="{{ $state->id }}" @if(old('state_code',$city->state_code)==$state->id) selected @endif >{{ $state->state_name }}</option>
						@endforeach
					</select>
				  </div>

					<div class="col-md-12 form-group">
						<input class="btn btn-success" type="submit" value="Update Blog">
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