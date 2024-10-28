@extends('layouts.college_panel')
@section('content')
<div class="row">
<div class="card col-md-10 p-0">
    <div class="card-header">
        <strong>Update College</strong> {{ isset($college) ? $college->name : '' }}
    </div>
    <div class="card-body">
        <form action="{{ route("admin.course",$id) }}" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4>Courses And Fees <a href="#allcourse" class="btn btn-sm btn-dark pull-right">View All Course</a></h4>
					<hr/>
				</div>
				@csrf
				<div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">Course Name <span style="color:red">*</span></label>
					<input type="text" id="name" name="name" onkeyup="makeurl(this.value)" onblur="makeurl(this.value)" class="form-control" value="" required >
					@if($errors->has('name'))
						<em class="invalid-feedback">
							{{ $errors->first('name') }}
						</em>
					@endif
				</div>
				<div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="url">SEO Url <span style="color:red">*</span></label>
					<input type="text" id="url" name="url" class="form-control" value="" required >
					@if($errors->has('url'))
						<em class="invalid-feedback">
							{{ $errors->first('url') }}
						</em>
					@endif
				</div>

				
				<div class="col-md-4 form-group {{ $errors->has('mode') ? 'has-error' : '' }}">
					<label for="mode">Mode</label>
					<select name="mode" id="mode" class="form-control" >
						<option value="Full Time">Full Time</option>
						<option value="Part Time">Part Time</option>
					</select>
					@if($errors->has('mode'))
						<em class="invalid-feedback">
							{{ $errors->first('mode') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('approval') ? 'has-error' : '' }}">
					<label for="approval">Approval</label>
					<input type="text" id="approval" name="approval" class="form-control" value="">
				</div>			
				<div class="col-md-4 form-group {{ $errors->has('exam') ? 'has-error' : '' }}">
					<label for="exam">Exams <span style="color:red">*</span></label>
					<select name="exam" id="exam"  class="form-control select2" required>
							<option value="" selected >Select exam</option>
						@foreach($exams as $id => $exam)
							<option value="{{ $exam }}" >{{ $exam }}</option>
						@endforeach
					</select>
					@if($errors->has('exam'))
						<em class="invalid-feedback">
							{{ $errors->first('exam') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('seats') ? 'has-error' : '' }}">
					<label for="seats">Seats <span style="color:red">*</span></label>
					<input type="text" id="seats" name="seats" class="form-control" value="" required />
				</div>
				<div class="col-md-4 form-group {{ $errors->has('total_fees') ? 'has-error' : '' }}">
					<label for="total_fees">Total fees <span style="color:red">*</span></label>
					<input type="text" id="total_fees" name="total_fees" class="form-control" value="" required >
				</div>
				<div class="col-md-4 form-group {{ $errors->has('offer_by') ? 'has-error' : '' }}">
					<label for="offer_by">Offered By <span style="color:red">*</span></label>
					<input type="text" id="offer_by" name="offer_by" class="form-control" value="" required >
				</div>
				<div class="col-md-4 form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
					<label for="duration">Duration <span style="color:red">*</span></label>
					<input type="text" id="duration" name="duration" class="form-control" value="" required >
				</div>
				
				<div class="col-md-12 form-group">
					<label><strong>Description <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="description" required></textarea>
				</div>
				
				<div class="col-md-12 form-group">
					<label><strong>Fee Details </strong></label>
					<textarea class="ckeditor form-control" name="fee_details" ></textarea>
				</div>
				
				<div class="col-md-12 form-group">
					<label><strong>Eligibility Criteria <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="eligibility_criteria" required></textarea>
				</div>
				
								
				<div class="col-md-6 form-group {{ $errors->has('brochure') ? 'has-error' : '' }}">
					<label for="brochure">Brochure <span style="color:red">*</span></label>
					<input type="file" name="brochure" />
					@if($errors->has('brochure'))
						<em class="invalid-feedback">
							{{ $errors->first('brochure') }}
						</em>
					@endif
				</div>
				
				
				<div class="col-12">
					<input class="btn btn-danger" type="submit" value="save">
				</div>
			</div>
			</form>


    </div>
	

	</div>
	@include('admin.college.updatemenu')
</div>
<div class="card" id="allcourse">
	<div class="card-header">
		All Courses
	</div>

	<div class="card-body">
		<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($courses as $k=>$course)
				<tr>
					<td>{{ $k+1 }}</td>
					<td>{{ $course['name'] }}</td>
					<td><a class="btn btn-xs btn-info" href="{{ route('admin.course.edit',['collegeid'=>$college->id,'courseid'=>$course['id']]) }}">Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $courses->links() }}

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
@endsection