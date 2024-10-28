@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="card col-md-12 p-0">
		<div class="card-header">
			Add Exam
		</div>
		<div class="card-body">
			<form action="{{ route("admin.exams.create") }}" method="POST" enctype="multipart/form-data">
			<div class="row">
				@csrf
				<div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Exam Name <span style="color:red">*</span></label>
					<input type="text" id="name" name="name" onkeyup="makeurl(this.value)" onblur="makeurl(this.value)" class="form-control" value="" required >
					@if($errors->has('name'))
						<em class="invalid-feedback">
							{{ $errors->first('name') }}
						</em>
					@endif
				</div>

				<div class="col-md-6 form-group {{ $errors->has('short_name') ? 'has-error' : '' }}">
					<label for="short_name">Short Exam Name <span style="color:red">*</span></label>
				<input type="text" id="short_name" name="short_name" class="form-control" value="" required >
					@if($errors->has('short_name'))
						<em class="invalid-feedback">
							{{ $errors->first('short_name') }}
						</em>
					@endif
				</div>


				<div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="url">SEO Url <span style="color:red">*</span></label>
					<input type="text" id="url" name="url" class="form-control" value="" required >
					@if($errors->has('url'))
						<em class="invalid-feedback">
							{{ $errors->first('url') }}
						</em>
					@endif
				</div>			

				<div class="col-md-6 form-group {{ $errors->has('exam_level') ? 'has-error' : '' }}">
					<label for="exam_level">Exam Level <span style="color:red">*</span></label>
				<input type="text" id="exam_level" name="exam_level" class="form-control" value="" required >
					@if($errors->has('exam_level'))
						<em class="invalid-feedback">
							{{ $errors->first('exam_level') }}
						</em>
					@endif
				</div>	
				<div class="col-md-4 form-group {{ $errors->has('mode_of_application') ? 'has-error' : '' }}">
					<label for="mode_of_application">Mode Of Application</label>
					<select class="form-control" name="mode_of_application" id="mode_of_application" required>
						<option value="" disabled="disabled" selected="selected">--SELECT</option>
						<option value="online">Online</option>
						<option value="offline">Offline</option>
					</select>
				</div>

				<div class="col-md-4 form-group {{ $errors->has('mode_of_exam') ? 'has-error' : '' }}">
					<label for="mode_of_exam">Mode Of Exam</label>
					<select class="form-control" name="mode_of_exam" id="mode_of_exam" required>
						<option value="" disabled="disabled" selected="selected">--SELECT</option>
						<option value="online">Online</option>
						<option value="offline">Offline</option>
					</select>
				</div>

				<div class="col-md-4 form-group {{ $errors->has('mode_of_counselling') ? 'has-error' : '' }}">
					<label for="mode_of_counselling">Mode of Counselling</label>
					<select class="form-control" name="mode_of_counselling" id="mode_of_counselling" required>
						<option value="" disabled="disabled" selected="selected">--SELECT</option>
						<option value="online">Online</option>
						<option value="offline">Offline</option>
					</select>
				</div>

				<div class="col-md-6 form-group {{ $errors->has('streams') ? 'has-error' : '' }}">
					<label for="streams">Streams</label>
					<input type="text" id="streams" name="streams" class="form-control" value="">
				</div>
				
				<div class="col-md-6 form-group {{ $errors->has('language') ? 'has-error' : '' }}">
					<label for="language">Language</label>
					<select class="form-control" name="language" id="language" required>
						<option value="" disabled="disabled" selected="selected">--SELECT</option>
						<option value="English">English</option>
						<option value="Hindi">Hindi</option>
					</select>
				</div>

				<div class="col-md-4 form-group {{ $errors->has('conducting_body') ? 'has-error' : '' }}">
				  <label for="conducting_body">Conducting Body</label>
				  <input type="text" id="conducting_body" name="conducting_body" class="form-control" value="" required>
				</div>

				<div class="col-md-4 form-group {{ $errors->has('application_fee') ? 'has-error' : '' }}">
					<label for="application_fee">Application Fee</label>
					<input type="text" id="application_fee" name="application_fee" class="form-control" value="">
				</div>

				<div class="col-md-4 form-group {{ $errors->has('exam_duration') ? 'has-error' : '' }}">
				<label for="exam_duration">Exam Duration</label>
				<input type="text" id="exam_duration" name="exam_duration" required class="form-control" value="">
				</div>


				<div class="col-md-12 form-group">
					<label><strong>Description <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="description" required></textarea>
				</div>
				
				<div class="col-12">
					<input class="btn btn-danger" type="submit" value="save">
				</div>
			</div>
			</form>


		</div>

	</div>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

       $('.ckeditor').ckeditor();

    });
	function GetCity(stid){
		$.ajax({
		   type:'POST',
		   url:'{{ url("/cities") }}',
		   data:{'_token': '<?php echo csrf_token() ?>','stateid':stid},
		   success:function(data) {
			  $("#city").html(data);
		   }
		});
	}
	function makeurl(val){
		var string =val.toLowerCase().replace(/[^\w\s]/gi, '');
		document.getElementById("url").value = string.replace(/\s/g, '-');
	}
</script>
@endsection