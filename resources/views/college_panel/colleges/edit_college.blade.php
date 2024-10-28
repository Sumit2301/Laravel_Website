@extends('layouts.college_panel')
@section('styles')
<style type="text/css">
    .remove_btn{
        margin-top: 0px;
    }
</style>
@endsection
@section('content')
<div class="row">
{{-- <div class="card col-md-10 p-0"> --}}
<div class="card col-md-12 p-0">
    <div class="card-header">
        Update College
    </div>
    <div class="card-body">
        <form action="{{ route('college-panel.college.update', [$id]) }}" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4>Overview</h4>
				<hr/>
			</div>
            @csrf
                <input type="hidden" id="search_key" name="search_key" value="{{ old('search_key', isset($college) ? $college->search_key : '') }}" />
            <div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">College Name <span style="color:red">*</span></label>
                <input type="text" id="name" name="name" onkeyup="makeurl(this.value)" onblur="makeurl(this.value)" class="form-control" value="{{ old('name', isset($college) ? $college->name : '') }}" required >
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>

            
<div class="col-md-12">
<label for="courselist"><b>Course Lists</b></label>
<div id="course_and_rank">
    
</div>
<div class="">
    <button type="button" class="btn btn-primary text-white" onclick="addnew_course('')">Add New</button>
</div>

</div>              
            <div class="col-md-12 form-group {{ $errors->has('name') ? 'has-error' : '' }}" style="margin-top: 20px;">
                <label for="url">SEO Url <span style="color:red">*</span></label>
                <input type="text" id="url" name="url" class="form-control" value="{{ old('url', isset($college) ? $college->url : '') }}" required >
                @if($errors->has('url'))
                    <em class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </em>
                @endif
            </div>			
            <div class="col-md-4 form-group d-none">
                <label for="streams">Streams</label>
                <input type="text" id="streams" name="streams" class="form-control" value="{{ old('streams', isset($college) ? $college->streams : '') }}">
            </div>
            
        	<!-- Country -->
			<div class="col-md-4 form-group {{ $errors->has('country') ? 'has-error' : '' }}">
				<label for="country">Select Country <span style="color:red">*</span></label>
				<select name="country" id="country" onchange="checkCountry(this.value)" class="form-control select2" required>
						<option value="india" {{ $college->state == 'india' ? 'selected' : '' }} >India </option>
						<option value="nepal" {{ $college->state == 'nepal' ? 'selected' : '' }}>Nepal</option>
				</select>
				@if($errors->has('country'))
					<em class="invalid-feedback">
						{{ $errors->first('country') }}
					</em>
				@endif
			</div>
			<!-- End Country -->
				
            <div class="col-md-4 form-group {{ $errors->has('state') ? 'has-error' : '' }} state-form-group">
                <label for="state">Select State <span style="color:red">*</span></label>
                <select name="state" id="state" onchange="GetCity(this.value)" class="form-control select2" required>
                        <option value="" >Select State</option>
                    @foreach($states as $id => $state)
                        <option value="{{ $id }}, {{ $state }}" {{ (old("state", $college->state) == $id) ? 'selected' : '' }} >{{ $state }}</option>
                    @endforeach
                </select>
                @if($errors->has('state'))
                    <em class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </em>
                @endif
            </div>
            <div class="col-md-4 form-group {{ $errors->has('city') ? 'has-error' : '' }} city-form-group">
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
			
            <div class="col-md-3 form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">Photo</label>
                <input type="hidden" name="oldphoto" value="{{ old('photo', isset($college) ? $college->photo : '') }}" />
                <input type="file" name="photo" />
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
            </div>
			<div class="col-md-2">
				@if(!empty($college->photo))
					<img src="{{ asset('uploads/photo') . '/' . $college->photo  }}" width="100px" />
				@endif
			</div>
			<div class="col-md-1"></div>
            <div class="col-md-3 form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">Logo</label>
                <input type="file" name="logo" />
                <input type="hidden" name="oldlogo" value="{{ old('logo', isset($college) ? $college->logo : '') }}" />
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>
			<div class="col-md-2">
				@if(!empty($college->logo))
					<img src="{{ asset('uploads/logo') . '/' . $college->logo  }}" width="100px" />
				@endif
			</div>
			<div class="col-md-1"></div>
			
			<div class="col-md-12 text-center">
				<h4>Highlights</h4>
				<hr/>
			</div>
			
			<div class="col-md-4 form-group {{ $errors->has('degree') ? 'has-error' : '' }}" style='display:none;'>
			  <label for="degree">Degree</label>					
			  <select type="text" class="form-control" name="degree" >
				<option {{ (old("degree", $college->degree) == '') ? 'selected' : '' }} value=''>Select Degree</option>
				<option {{ (old("degree", $college->degree) == 'MBBS') ? 'selected' : '' }} value="MBBS">MBBS</option>
				<option {{ (old("degree", $college->degree) == 'BDS') ? 'selected' : '' }} value="BDS">BDS</option>
				<option {{ (old("degree", $college->degree) == 'BAMS') ? 'selected' : '' }} value="BAMS">BAMS</option>
				<option {{ (old("degree", $college->degree) == 'BUMS') ? 'selected' : '' }} value="BUMS">BUMS</option>
				<option {{ (old("degree", $college->degree) == 'BHMS') ? 'selected' : '' }} value="BHMS">BHMS</option>
				<option {{ (old("degree", $college->degree) == 'BYNS') ? 'selected' : '' }} value="BYNS">BYNS</option>
				<option  {{ (old("degree", $college->degree) == 'B.V.Sc-AH') ? 'selected' : '' }}value="B.V.Sc-AH">B.V.Sc & AH</option>
			  </select>
			</div>
            <div class="col-md-4 form-group {{ $errors->has('ownership') ? 'has-error' : '' }}">
                <label for="ownership">Ownership</label>
                <select name="ownership" id="ownership" class="form-control" >
                    <option {{ (old("ownership", $college->ownership) == 'Private') ? 'selected' : '' }} value="Private">Private</option>
                    <option {{ (old("ownership", $college->ownership) == 'Government') ? 'selected' : '' }} value="Government">Government</option>
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
                    <option {{ (old("genders_accepted", $college->genders_accepted) == 'Co-Ed') ? 'selected' : '' }} value="Co-Ed">Co-Ed</option>
                    <option {{ (old("genders_accepted", $college->genders_accepted) == 'Girls Only') ? 'selected' : '' }} value="Girls Only">Girls Only</option>
                    <option {{ (old("genders_accepted", $college->genders_accepted) == 'Boys Only') ? 'selected' : '' }} value="Boys Only">Boys Only</option>
                </select>
                @if($errors->has('genders_accepted'))
                    <em class="invalid-feedback">
                        {{ $errors->first('genders_accepted') }}
                    </em>
                @endif
            </div>
            <div class="col-md-4 form-group {{ $errors->has('approval') ? 'has-error' : '' }}">
                <label for="approval">Approval</label>
                <input type="text" id="approval" name="approval" class="form-control" value="{{ old('approval', isset($college) ? $college->approval : '') }}">
            </div>
            <div class="col-md-4 form-group d-none">
                <label for="rank">Rank in Universities</label>
                <input type="text" id="rank" name="rank" class="form-control" value="{{ old('rank', isset($college) ? $college->rank : '') }}">
            </div>
            <div class="col-md-4 form-group {{ $errors->has('campus_size') ? 'has-error' : '' }}">
                <label for="campus_size">Campus Size</label>
                <input type="text" id="campus_size" name="campus_size" class="form-control" value="{{ old('campus_size', isset($college) ? $college->campus_size : '') }}">
            </div>
            <div class="col-md-4 form-group {{ $errors->has('total_faculty') ? 'has-error' : '' }}">
                <label for="total_faculty">Total Faculty</label>
                <input type="text" id="total_faculty" name="total_faculty" class="form-control" value="{{ old('total_faculty', isset($college) ? $college->total_faculty : '') }}">
            </div>
            <div class="col-md-4 form-group {{ $errors->has('estd_year') ? 'has-error' : '' }}">
                <label for="estd_year">Estd. Year</label>
                <input type="text" id="estd_year" name="estd_year" class="form-control" value="{{ old('estd_year', isset($college) ? $college->estd_year : '') }}">
            </div>
            <div class="col-md-4 form-group {{ $errors->has('student_enrollments') ? 'has-error' : '' }}">
                <label for="student_enrollments">Total Student Enrollments</label>
                <input type="text" id="student_enrollments" name="student_enrollments" class="form-control" value="{{ old('student_enrollments', isset($college) ? $college->student_enrollments : '') }}">
            </div>
            <div class="col-md-4 form-group {{ $errors->has('fee') ? 'has-error' : '' }}">
                <label for="fee">Total Fee</label>
                <input type="text" id="fee" name="fee" class="form-control" value="{{ old('fee', isset($college) ? $college->fee : '') }}">
            </div>
			<div class="col-md-4 {{ $errors->has('fee') ? 'has-error' : '' }}">
				<label for="fee">Featured</label>
				<input type="checkbox" id="featured" name="featured" {{ old('fee', (isset($college) && $college->featured == 1) ? "checked" : '') }} class="" value="1">
			</div>
			
			<div class="col-md-12 text-center">
				<h4>About College (Over View)</h4>
				<hr/>
			</div>
			
			<div class="col-md-12 form-group">
				<label><strong>Description <span style="color:red">*</span></strong></label>
				<textarea class="ckeditor form-control" name="description">{{ old('description', isset($college) ? $college->description : '') }}</textarea>
			</div>
                
            <div class="col-md-12 form-group">
                <label><strong>Facilities <span style="color:red">*</span></strong></label>
                <textarea class="ckeditor form-control" name="facilities">{{ old('facilities', isset($college) ? $college->facilities : '') }}</textarea>
            </div>
                
            <div class="col-md-12 form-group">
                <label><strong>Specialty Services <span style="color:red">*</span></strong></label>
                <textarea class="ckeditor form-control" name="specialty_services">{{ old('specialty_services', isset($college) ? $college->specialty_services : '') }}</textarea>
            </div>
            
            <div class="col-md-12 form-group">
                <label><strong>Requirement <span style="color:red">*</span></strong></label>
                <textarea class="ckeditor form-control" name="requirement">{{ old('requirement', isset($college) ? $college->requirement : '') }}</textarea>
            </div>

            <div class="col-md-4 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" >
                    <option value="1" {{ (old("status", $college->status) == '1') ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (old("status", $college->status) == '0') ? 'selected' : '' }}>Deactive</option>
                </select>
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>

            <!-- <div class="col-md-4 form-group">
                <label for="status">Rating</label>
                <select name="rating" id="rating" class="form-control" >
                    <option value="0">Select Rating</option>
                    <option value="1" {{ (old("status", $college->rating) == '1') ? 'selected' : '' }}>1</option>
                    <option value="2" {{ (old("status", $college->rating) == '2') ? 'selected' : '' }}>2</option>
                    <option value="3" {{ (old("status", $college->rating) == '3') ? 'selected' : '' }}>3</option>
                    <option value="4" {{ (old("status", $college->rating) == '4') ? 'selected' : '' }}>4</option>
                    <option value="5" {{ (old("status", $college->rating) == '5') ? 'selected' : '' }}>5</option>
                </select>
            </div> -->

            <div class="col-md-4 form-group">
                <label for="streams">Rating</label>
                <input type="number" id="rating" name="rating" class="form-control" pattern = "[0-5]" step="0.1" min="0" max="5" value="{{ old("status", $college->rating) }}">
            </div>

            <div class="col-md-4">
            </div>

            <div class="col-md-4 form-group {{ $errors->has('collegebrochure') ? 'has-error' : '' }}">
                <label for="photo">Brochure</label>
                <input type="file" class="form-control" name="collegebrochure" accept='application/pdf' />
                <input type="hidden" name="oldcollegebrochure" value="{{ old('oldcollegebrochure', isset($college) ? $college->brochure : '') }}" />
                @if($errors->has('collegebrochure'))
                    <em class="invalid-feedback">
                        {{ $errors->first('collegebrochure') }}
                    </em>
                @endif

                @if(!empty($college->brochure))
                    <a class="btn btn-dark btn-sm mt-3" href="{{ asset('uploads/college-brochure') . '/' . $college->brochure  }}" target="_blank">View Brochure</a>
                @endif

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

 // Check Counrty
 
    if($('#country').val() == 'nepal'){
            $('.state-form-group').hide();
            $('.city-form-group').hide();
            $('#state').prop('required', false);
            $('#city').prop('required', false);
    }
 
    function checkCountry(country){
        if(country == 'nepal'){
            $('.state-form-group').hide();
            $('.city-form-group').hide();
            $('#state').prop('required', false);
            $('#city').prop('required', false);
        }else{
            $('.state-form-group').show();
            $('.city-form-group').show();
            $('#state').prop('required', true);
            $('#city').prop('required', true);
        }
    }
    // !Check Counrty

    $(document).ready(function() {
	   var stid = $("#state option").filter(":selected").val();
	   selectCity(stid);
       $('.ckeditor').ckeditor();
    });
	function selectCity(stid){		   
	   $.ajax({
		   type:'POST',
		   url:'{{ url("/cities") }}',
		   data:{'_token': '<?php echo csrf_token() ?>','stateid':stid,'slct':{{$college->city ?? '0'}}},
		   success:function(data) {
			  $("#city").html(data);
		   }
		});
	}
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
" <div class='col-md-4 form-group' style='display:none;'>"+
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

"  <div class='col-md-12 text-right remove_btn'>"+
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

<?php 
$college_course_array = array();
if($college_course_detail) { 
    foreach($college_course_detail as $row){
        $row->is_featured = (empty($row->is_featured))?"":$row->is_featured;
        $row->course_total_fee = (empty($row->course_total_fee))?"":$row->course_total_fee;
        $row->college_id = (empty($row->college_id))?"":$row->college_id;
        $row->course_id = (empty($row->course_id))?"":$row->course_id;
        $row->course_total_fee = (empty($row->course_total_fee))?"":$row->course_total_fee;
        $row->course_seats = (empty($row->course_seats))?"":$row->course_seats;
        $row->course_duration = (empty($row->course_duration))?"":$row->course_duration;
        $row->course_mode = (empty($row->course_mode))?"":$row->course_mode;
        $row->course_approval = (empty($row->course_approval))?"":$row->course_approval;
        $row->course_exam = (empty($row->course_exam))?"":$row->course_exam;
        $row->description = (empty($row->description))?"":$row->description;
        $row->fee_details = (empty($row->fee_details))?"":$row->fee_details;
        $row->eligibility_criteria = (empty($row->eligibility_criteria))?"":$row->eligibility_criteria;
        $row->scope = (empty($row->scope))?"":$row->scope;
        $row->brochure = (empty($row->brochure))?"":$row->brochure;
        
        $college_course_array[] = $row;
    }
}
?> 
function updated_course(record){

var courseslist = <?=json_encode($courselist)?>;
var ranktypelist = <?=json_encode($ranktypelist)?>;
var updated_fields = <?=json_encode($college_course_array)?>;
var tbl_rank = <?=json_encode($tblrank)?>

var course_select = '';
var rank_select = '';
var featured_select = '';
var featured_select_no = '';
var mode_selected = '';


var ct = "";
for(var c=0; c<updated_fields.length; c++){
var t = c;
var ranks = updated_fields[c].ranks;

 featured_select = (updated_fields[c].is_featured == '1')?'selected':'';
 featured_select_no = (updated_fields[c].is_featured == '0')?'selected':'';
 //featured_select_no = (updated_fields[c].is_featured == '0')?'selected':'';


var featured_html = '<option value="">--SELECT--</option>';
featured_html +="<option value='1' "+featured_select+">Yes</option>";
featured_html +="<option value='0' "+featured_select_no+">No</option>";
//alert(JSON.stringify(ranks));


var mode_html = '<option value="">--SELECT--</option>';
mode_html +="<option value='English' "+((updated_fields[c].course_mode == 'English')?'selected':'')+">English</option>";
mode_html +="<option value='Hindi' "+((updated_fields[c].course_mode == 'Hindi')?'selected':'')+">Hindi</option>";

var course_html = '<option value="">--SELECT--</option>';
var ranktype_html = '<table class="table table-bordered">';

for(var i=0;i<courseslist.length;i++){
    course_select = (updated_fields[c].course_id == courseslist[i].id)?'selected':'';
    course_html +="<option value='"+courseslist[i].id+"' "+course_select+">"+courseslist[i].name+"</option>";
}

for(var i=0;i<ranks.length;i++){
    ranktype_html +="<tr><td>"+ranks[i].rank_type+" <input type='hidden' name='courses["+t+"][ranks]["+ranks[i].rank_id+"][rank_id]' value='"+ranks[i].rank_id+"'/></td><td><input type='text' class='form-control' name='courses["+t+"][ranks]["+ranks[i].rank_id+"][rank_rating]' value='"+ranks[i].rank_rating+"'/><input type='hidden' name='courses["+t+"][ranks]["+ranks[i].rank_id+"][id]' value='"+ranks[i].id+"'></td></td></tr>";
}
ranktype_html +="</table>";

ct +="<div style='border-bottom:3px solid #6db5ff;padding-bottom:15px;margin-bottom:15px;'><div class='row'>"+
"  <div class='col-md-6 form-group'>"+
"    <label for='course'>Course<span style='color:red'>*</span></label>"+
"    <input type='hidden' name='courses["+t+"][id]' value='"+updated_fields[c].id+"'>"+
"    <select class='form-control' id='course' name='courses["+t+"][course]' required>"+course_html+
"    </select>"+
"  </div>"+
"  <div class='col-md-6 form-group'>"+
"    <label for='featured'>Featured<span style='color:red'>*</span></label>"+
"    <select class='form-control' id='featured' name='courses["+t+"][featured]'>"+featured_html+
"    </select>"+
"  </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_total_fee'>Fees<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_total_fee]' id='course_total_fee' class='form-control' value='"+updated_fields[c].course_total_fee+"'>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_seats'>Seats<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_seats]' id='course_seats' class='form-control' value='"+updated_fields[c].course_seats+"'>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_duration'>Duration<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_duration]' id='course_duration' class='form-control' value='"+updated_fields[c].course_duration+"'>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_mode'>Course Mode<span style='color:red'>*</span></label>"+
" <select class='form-control' name='courses["+t+"][course_mode]' id='course_mode' value=''>"+mode_html+
" </select>"+
" </div>"+
" <div class='col-md-4 form-group'>"+
" <label for='course_approval'>Approval<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_approval]' id='course_approval' class='form-control' value='"+updated_fields[c].course_approval+"'>"+
" </div>"+
" <div class='col-md-4 form-group' style='display:none;'>"+
" <label for='course_exam'>Exam<span style='color:red'>*</span></label>"+
" <input type='text' name='courses["+t+"][course_exam]' id='course_exam' class='form-control' value='"+updated_fields[c].course_exam+"'>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='description'>Description<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][description]' id='description' class='form-control' rows=='2'>"+updated_fields[c].description+"</textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='fee_details'>Fee Details<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][fee_details]' id='fee_details' class='form-control' rows=='2'>"+updated_fields[c].fee_details+"</textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='eligibility_criteria'>Eligibility Criteria<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][eligibility_criteria]' id='eligibility_criteria' class='form-control' rows=='2'>"+updated_fields[c].eligibility_criteria+"</textarea>"+
" </div>"+

" <div class='col-md-6 form-group'>"+
" <label for='scope'>Scope<span style='color:red'>*</span></label>"+
" <textarea type='text' name='courses["+t+"][scope]' id='scope' class='form-control' rows=='2'>"+updated_fields[c].scope+"</textarea>"+
" </div>"+

" <div class='col-md-4 form-group'>"+
" <label for='brochure'>Brochure<span style='color:red'>*</span></label>"+
" <input type='file' name='brochure"+t+"' id='brochure' class='form-control' value='' accept='application/pdf'><input type='hidden' name='courses["+t+"][oldbrochure]' id='oldbrochure' class='form-control' value='"+updated_fields[c].brochure+"'>"+((updated_fields[c].brochure=="")?"":"<a href='{{ url('uploads/brochure') }}/"+updated_fields[c].brochure+"' class='btn btn-primary btn-sm mt-3' target='_blank'>View Brochure</a>")+
" </div>"+

"  <div class='col-md-12 form-group mb-1'>"+ranktype_html+
"  </div>"+
"  <div class='col-md-12 remove_btn text-right'>"+
"    <button type='button' class='btn btn-danger' onclick='removecourse_college("+updated_fields[c].id+",this)'>Delete</button>"+
"  </div>"+
"</div></div>";   
} 

$('#course_and_rank').append(ct);

for(var c=0; c<updated_fields.length; c++){
    
    var t = c;
    CKEDITOR.replace( "courses["+t+"][description]" );
    CKEDITOR.replace( "courses["+t+"][fee_details]" );
    CKEDITOR.replace( "courses["+t+"][eligibility_criteria]" );
    CKEDITOR.replace( "courses["+t+"][scope]" );

}

}


<?php if(isset($college)){?>
updated_course('');
<?php } ?>


function removecourse_college(id,th){
        $.ajax({
           type:'POST',
           url:'{{ url("admin/colleges/delete_course") }}',
           data:{'_token': '<?php echo csrf_token() ?>','id':id},
           success:function(response) {
               $(th).parent().parent().remove();
           }
        });    

}
</script>
@endsection