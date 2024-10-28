@extends('layouts.college_panel')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
<div class="card col-md-12 p-0">


    <div class="card-header">
        <strong>Add Course</strong>

    </div>
    <div class="card-body">
        <form id="courseForm" method="POST" enctype="multipart/form-data">
			<div class="row">
				@csrf
				<div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Course Name <span style="color:red">*</span></label>
					<input type="text" id="name" name="name" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->name : '') }}" required onkeypress="toSeoUrl();" onkeydown="toSeoUrl();" onkeyup="toSeoUrl();" onblur="toSeoUrl();">
					@if($errors->has('name'))
						<em class="invalid-feedback">
							{{ $errors->first('name') }}
						</em>
					@endif
				</div>
<!-- 
				<div class="col-md-6 form-group {{ $errors->has('clg') ? 'has-error' : '' }}">
					<label for="college">College Name <span style="color:red">*</span></label>
					<select class="form-control" name="clg" id="clg">
						<option value="" selected="selected">--SELECT--</option>
						@foreach($colleges_list as $clglist)
						  <option value="{{ $clglist->id }}">{{ $clglist->name }}</option>

						@endforeach
					</select>
					@if($errors->has('clg'))
						<em class="invalid-feedback">
							{{ $errors->first('clg') }}
						</em>
					@endif
				</div>  -->

				<div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="url">SEO Url <span style="color:red">*</span></label>
					<input type="text" id="url" name="url" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->url : '') }}" required >
					@if($errors->has('url'))
						<em class="invalid-feedback">
							{{ $errors->first('url') }}
						</em>
					@endif
				</div>

				
				<div class="col-md-4 form-group {{ $errors->has('mode') ? 'has-error' : '' }}">
					<label for="mode">Mode</label>
					<select name="mode" id="mode" class="form-control" >
						<option value="Full Time" <?php if(isset($course_single)){if($course_single->mode=='Full Time'){echo 'selected';}}?>>Full Time</option>
						<option value="Part Time" <?php if(isset($course_single)){if($course_single->mode=='Part Time'){echo 'selected';}}?>>Part Time</option>
					</select>
					@if($errors->has('mode'))
						<em class="invalid-feedback">
							{{ $errors->first('mode') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('approval') ? 'has-error' : '' }}">
					<label for="approval">Approval</label>
					<input type="text" id="approval" name="approval" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->approval : '') }}">
				</div>	
<?php 
$available_crs = array();
if(isset($course_single)){
	$available_crs = (array) json_decode($course_single->exam);
}
?>

				<div class="col-md-4 form-group {{ $errors->has('exam') ? 'has-error' : '' }}">
					<label for="exam">Exams <span style="color:red">*</span></label>
					<select name="exam[]" id="exam"  class="form-control basic-multiple" multiple="multiple" style="width: 100%;">
							<option value="" disabled="disabled">Select Exam</option>

						@foreach($exams as $id => $exam) 
							<option value="{{ $exam }}" <?= (isset($course_single) && in_array($exam, $available_crs))?'selected':'' ?>>{{ $exam }}</option>
						@endforeach
					</select>
					@if($errors->has('exam'))
						<em class="invalid-feedback">
							{{ $errors->first('exam') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('seats') ? 'has-error' : '' }}">
					<label for="seats">Seats</label>
					<input type="text" id="seats" name="seats" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->seats : '') }}">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('total_fees') ? 'has-error' : '' }}">
					<label for="total_fees">Total fees</label>
					<input type="text" id="total_fees" name="total_fees" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->total_fees : '') }}">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('offer_by') ? 'has-error' : '' }}">
					<label for="offer_by">Offered By</label>
					<input type="text" id="offer_by" name="offer_by" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->offer_by : '') }}">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
					<label for="duration">Duration</label>
					<input type="text" id="duration" name="duration" class="form-control" value="{{ old('streams', isset($course_single) ? $course_single->duration : '') }}">
				</div>
				

				<div class="col-md-8 form-group">
				</div>				
				<div class="col-md-6 form-group">
					<label><strong>Description <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="description">{{ old('streams', isset($course_single) ? $course_single->description : '') }}</textarea>
				</div>
				
				<div class="col-md-6 form-group">
					<label><strong>Fee Details </strong></label>
					<textarea class="ckeditor form-control" name="fee_details" >{{ old('streams', isset($course_single) ? $course_single->fee_details : '') }}</textarea>
				</div>
				
				<div class="col-md-6 form-group">
					<label><strong>Eligibility Criteria <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="eligibility_criteria">{{ old('streams', isset($course_single) ? $course_single->eligibility_criteria : '') }}</textarea>
				</div>
				
				<div class="col-md-6 form-group">
					<label><strong>Scope <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="scope" id="scope">{{ old('scope', isset($course_single) ? $course_single->scope : '') }}</textarea>
				</div>				
								
				<div class="col-md-6 form-group {{ $errors->has('brochure') ? 'has-error' : '' }}" style="display: none;">
					<label for="brochure">Brochure <span style="color:red">*</span></label>
					<input type="file" name="brochure" id="brochure" />
					@if($errors->has('brochure'))
						<em class="invalid-feedback">
							{{ $errors->first('brochure') }}
						</em>
					@endif
					<div class="col-md-12">
					<?php if(isset($course_single) && $course_single && $course_single->brochure){?>
						<img src="{{ asset('public/uploads/brochure/'.$course_single->brochure) }}" width="90px" height="90px" class="img img-thumbnail"><br>
						<a href="{{ asset('public/uploads/brochure/'.$course_single->brochure) }}" download="download" target="_blank">Download</a>
					<?php } ?>
					</div>	
					<input type="hidden" name="old_brochure" id="old_brochure" value="{{ old('brochure', (isset($course_single)) ? $course_single->brochure : '') }}">
				</div>
				
				
				<div class="col-12">
					<input type="hidden" name="update_id" id="update_id" value="{{ old('id', isset($course_single) ? $course_single->id : '') }}">
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
	function makeurl(val){
		var string =val.toLowerCase().replace(/[^\w\s]/gi, '');
		document.getElementById("url").value = string.replace(/\s/g, '-');
	}

</script>

<script type="text/javascript">
 $("#courseForm").validate({
  rules: {
    /*  name: {
          required: true
      },
      url: {
          required: true,
      },
      mode: {
          required: true,
      },
      approval: {
          required: true,
      },
      exam: {
          required: true,
      },
      seats: {
          required: true,
          number:true
      },
      total_fees: {
          required: true,
      },
      offer_by: {
          required: true,
      },
      duration:{
      	required:true,
      }  */	               
  },
  messages: {

  },
  submitHandler: function(form) {
 	for ( instance in CKEDITOR.instances ) {
        CKEDITOR.instances[instance].updateElement();
    }
 	var expform = document.getElementById('courseForm');
    var fd = new FormData(expform);
    $.ajax({
        type: "POST",
        url: "{{ route('admin.course.add_course_detail') }}",
        data: fd,
        contentType: false,           
        processData:false, 
        success: function (data) {
        	var obj = JSON.parse(data);
        	obj = obj.data;
        	if(obj.status=='true'){
				swal({
				  title: "Success",
				  text: obj.msg,
				  icon: "success",
				  //timer: 2000,
				}).then(function() {
				    window.location.href = '';
				});;
        	}else{
				swal({
				  title: "Error",
				  text: obj.msg,
				  icon: "error",
				});
        	}
        },
        error: function () {
				swal({
				  title: "Error",
				  text: "Some Error Occured",
				  icon: "error",
				});
        }

    });
    return false;	
  }
 });


function toSeoUrl() {
	var url = $('#name').val();
    var seourl = url.toString()               // Convert to string
        .normalize('NFD')               // Change diacritics
        .replace(/[\u0300-\u036f]/g,'') // Remove illegal characters
        .replace(/\s+/g,'-')            // Change whitespace to dashes
        .toLowerCase()                  // Change to lowercase
        .replace(/&/g,'-and-')          // Replace ampersand
        .replace(/[^a-z0-9\-]/g,'')     // Remove anything that is not a letter, number or dash
        .replace(/-+/g,'-')             // Remove duplicate dashes
        .replace(/^-*/,'')              // Remove starting dashes
        .replace(/-*$/,'');             // Remove trailing dashes
        $('#url').val(seourl);
}
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.basic-multiple').select2();
});	
</script>
@endsection