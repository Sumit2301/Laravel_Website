@extends('layouts.admin')

@section('styles')
<style type="text/css">
	.remove_btn{
		margin-top: 0px;
		text-align: right;
	}
	.mb-1{
		margin-bottom: 0px;
	}
</style>

@endsection
@section('content')
<div class="row">
	<div class="card col-md-10 p-0">
		<div class="card-header">
			Add College
		</div>
		<div class="card-body">
			<form action="{{ route("admin.colleges.create") }}" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4>Overview</h4>
					<hr/>
				</div>
				@csrf
				<div class="col-md-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name">College Name <span style="color:red">*</span></label>
					<input type="text" id="name" name="name" onkeyup="makeurl(this.value)" onblur="makeurl(this.value)" class="form-control" value="" required >
					@if($errors->has('name'))
						<em class="invalid-feedback">
							{{ $errors->first('name') }}
						</em>
					@endif
				</div>


<div class="col-md-12">
<label for="courselist"><b>Course Lists</b></label>
<div id="course_and_rank"></div>



<div class="">
	<button type="button" class="btn btn-primary text-white" onclick="addnew_course('')">Add New</button>
</div>

</div>	



				<div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}" style="margin-top: 20px;">
					<label for="url">SEO Url <span style="color:red">*</span></label>
					<input type="text" id="url" name="url" class="form-control" value="" required >
					@if($errors->has('url'))
						<em class="invalid-feedback">
							{{ $errors->first('url') }}
						</em>
					@endif
				</div>			
				<div class="col-md-4 form-group {{ $errors->has('streams') ? 'has-error' : '' }}">
					<label for="streams">Streams</label>
					<input type="text" id="streams" name="streams" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('state') ? 'has-error' : '' }}">
					<label for="state">Select State <span style="color:red">*</span></label>
					<select name="state" id="state" onchange="GetCity(this.value)" class="form-control select2" required>
							<option value="" selected >Select State</option>
						@foreach($states as $id => $state)
							<option value="{{ $id }}, {{ $state }}" >{{ $state }}</option>
						@endforeach
					</select>
					@if($errors->has('state'))
						<em class="invalid-feedback">
							{{ $errors->first('state') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('city') ? 'has-error' : '' }}">
					<label for="city">Select City <span style="color:red">*</span></label>
					<select name="city" id="city" class="form-control select2" required>
						<option>Select State First</option>
					</select>
					@if($errors->has('services'))
						<em class="invalid-feedback">
							{{ $errors->first('services') }}
						</em>
					@endif
				</div>
				
				<div class="col-md-6 form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
					<label for="photo">Photo</label>
					<input type="file" name="photo" />
					@if($errors->has('photo'))
						<em class="invalid-feedback">
							{{ $errors->first('photo') }}
						</em>
					@endif
				</div>
				<div class="col-md-6 form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
					<label for="logo">Logo</label>
					<input type="file" name="logo" />
					@if($errors->has('logo'))
						<em class="invalid-feedback">
							{{ $errors->first('logo') }}
						</em>
					@endif
				</div>
				
				<div class="col-md-12 text-center">
					<h4>Highlights</h4>
					<hr/>
				</div>
				
				<div class="col-md-4 form-group {{ $errors->has('degree') ? 'has-error' : '' }}">
				  <label for="degree">Degree</label>					
				  <select type="text" class="form-control" name="degree" >
					<option value=''>Select Degree</option>
					<option value="MBBS">MBBS</option>
					<option value="BDS">BDS</option>
					<option value="BAMS">BAMS</option>
					<option value="BUMS">BUMS</option>
					<option value="BHMS">BHMS</option>
					<option value="BYNS">BYNS</option>
					<option value="B.V.Sc-AH">B.V.Sc & AH</option>
				  </select>
				</div>
				<div class="col-md-4 form-group {{ $errors->has('ownership') ? 'has-error' : '' }}">
					<label for="ownership">Ownership</label>
					<select name="ownership" id="ownership" class="form-control" >
						<option value="Private">Private</option>
						<option value="Government">Government</option>
					</select>
					@if($errors->has('ownership'))
						<em class="invalid-feedback">
							{{ $errors->first('ownership') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('genders_accepted') ? 'has-error' : '' }}">
					<label for="genders_accepted">Genders Accepted</label>
					<select name="genders_accepted" id="genders_accepted" class="form-control" >
						<option value="Co-Ed">Co-Ed</option>
						<option value="Girls Only">Girls Only</option>
						<option value="Boys Only">Boys Only</option>
					</select>
					@if($errors->has('genders_accepted'))
						<em class="invalid-feedback">
							{{ $errors->first('genders_accepted') }}
						</em>
					@endif
				</div>
				<div class="col-md-4 form-group {{ $errors->has('approval') ? 'has-error' : '' }}">
					<label for="approval">Approval</label>
					<input type="text" id="approval" name="approval" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('rank') ? 'has-error' : '' }}">
					<label for="rank">Rank in Universities</label>
					<input type="text" id="rank" name="rank" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('campus_size') ? 'has-error' : '' }}">
					<label for="campus_size">Campus Size</label>
					<input type="text" id="campus_size" name="campus_size" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('total_faculty') ? 'has-error' : '' }}">
					<label for="total_faculty">Total Faculty</label>
					<input type="text" id="total_faculty" name="total_faculty" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('estd_year') ? 'has-error' : '' }}">
					<label for="estd_year">Estd. Year</label>
					<input type="text" id="estd_year" name="estd_year" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('student_enrollments') ? 'has-error' : '' }}">
					<label for="student_enrollments">Total Student Enrollments</label>
					<input type="text" id="student_enrollments" name="student_enrollments" class="form-control" value="">
				</div>
				<div class="col-md-4 form-group {{ $errors->has('fee') ? 'has-error' : '' }}">
					<label for="fee">Total fee</label>
					<input type="text" id="fee" name="fee" class="form-control" value="">
				</div>
				<div class="col-md-4 pt-4 {{ $errors->has('fee') ? 'has-error' : '' }}">
					<label for="fee">Featured</label>
					<input type="checkbox" id="featured" name="featured" class="" value="1">
				</div>
				
				<div class="col-md-12 text-center">
					<h4>About College (Over View)</h4>
					<hr/>
				</div>
				
				<div class="col-md-12 form-group">
					<label><strong>Description <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="description" required></textarea>
				</div>
				
				<div class="col-md-12 form-group">
					<label><strong>Facilities <span style="color:red">*</span></strong></label>
					<textarea class="ckeditor form-control" name="facilities"></textarea>
				</div>

				<div class="col-md-4 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
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
				
				<div class="col-12">
					<input class="btn btn-success" type="submit" value="Save">
				</div>
			</div>
			</form>


		</div>

	</div>
	<div class="card col-md-2 p-0">
		<div class="card-header">
			Manage Details
		</div>
		<div class="card-body">
			<div class="col-12 p-0">
				<a class="btn btn-success form-control mb-2" href="#" >OverView</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Courses & Fees</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Admission Process</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Cutoff</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Placements</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Photos</a>
				<a class="btn btn-danger form-control mb-2 disabled" href="#" >Blogs</a>
			</div>
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


	function addnew_course(record){
var courseslist = <?=json_encode($courselist)?>;
var ranktypelist = <?=json_encode($ranktypelist)?>;

var course_html = '<option value="">--SELECT--</option>';
for(var i=0;i<courseslist.length;i++){
	course_html +="<option value='"+courseslist[i].id+"'>"+courseslist[i].name+"</option>";
}

var featured_html = '<option value="">--SELECT--</option>';
featured_html +="<option value='1'>Yes</option>";
featured_html +="<option value='0'>No</option>";


var mode_html = '<option value="">--SELECT--</option>';
mode_html +="<option value='English'>English</option>";
mode_html +="<option value='Hindi'>Hindi</option>";

var t = Date.now();

var ranktype_html = '<table class="table table-bordered">';
for(var i=0;i<ranktypelist.length;i++){
	ranktype_html +="<tr><td>"+ranktypelist[i].rank_type+" <input type='hidden' name='courses["+t+"][ranks]["+ranktypelist[i].rank_id+"][rank_id]' value='"+ranktypelist[i].rank_id+"'/></td><td><input type='text' class='form-control' placholder='5' name='courses["+t+"][ranks]["+ranktypelist[i].rank_id+"][rank_rating]' value=''/><input type='hidden' name='courses["+t+"][ranks]["+ranktypelist[i].rank_id+"][id]' value=''></td></td></tr>";
}
ranktype_html +="</table>";

var ht = ""+
"<div style='border-bottom:3px solid #6db5ff;padding-bottom:15px;margin-bottom:15px;'><div class='row'>"+
"  <div class='col-md-6 form-group'>"+
"    <label for='course'>Course<span style='color:red'>*</span></label>"+
"    <input type='hidden' name='courses["+t+"][id]' value=''>"+
"    <select class='form-control' id='course' name='courses["+t+"][course]'>"+course_html+
"    </select>"+
"  </div>"+
"  <div class='col-md-6 form-group'>"+
"    <label for='featured'>Featured<span style='color:red'>*</span></label>"+
"    <select class='form-control' id='featured' name='courses["+t+"][featured]'>"+featured_html+
"    </select>"+
"  </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_total_fee'>Fees<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_total_fee]' id='course_total_fee' class='form-control' value=''>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_seats'>Seats<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_seats]' id='course_seats' class='form-control' value=''>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_duration'>Duration<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_duration]' id='course_duration' class='form-control' value=''>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_mode'>Course Mode<span style='color:red'>*</span></label>"+
" <select class='form-control' name='courses["+t+"][course_mode]' id='course_mode' value=''>"+mode_html+
" </select>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_approval'>Approval<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_approval]' id='course_approval' class='form-control' value=''>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_exam'>Exam<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_exam]' id='course_exam' class='form-control' value=''>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='description'>Description<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][description]' id='description' class='form-control' rows=='2'></textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='fee_details'>Fee Details<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][fee_details]' id='fee_details' class='form-control' rows=='2'></textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='eligibility_criteria'>Eligibility Criteria<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][eligibility_criteria]' id='eligibility_criteria' class='form-control' rows=='2'></textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='scope'>Scope<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][scope]' id='scope' class='form-control' rows=='2'></textarea>"+
" </div>"+

" <div class='col-md-4 form-group'>"+
" <label for='brochure'>Brochure<span style='color:red'>*</span></label>"+
" <input type='file' name='brochure"+t+"' id='brochure' class='form-control' value='' accept='application/pdf'>"+
" </div>"+

"  <div class='col-md-12 form-group mb-1'>"+ranktype_html+
"  </div>"+

"  <div class='col-md-12 remove_btn'>"+
"    <button type='button' class='btn btn-danger' onclick='removecourse(this)'>Delete</button>"+
"  </div>"+
"</div></div>";
$('#course_and_rank').append(ht);

CKEDITOR.replace( "courses["+t+"][description]" );
CKEDITOR.replace( "courses["+t+"][fee_details]" );
CKEDITOR.replace( "courses["+t+"][eligibility_criteria]" );
CKEDITOR.replace( "courses["+t+"][scope]" );

	}


function removecourse(th){
	$(th).parent().parent().remove();
}	
</script>
@endsection