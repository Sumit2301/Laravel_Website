@extends('layouts.admin')
@section('content')
<div class="row">
<div class="card col-md-10 p-0">
    <div class="card-header">
        <strong>Update College</strong> {{ isset($college) ? $college->name : '' }}
    </div>
    <div class="card-body">
        <form action="{{ url("admin/colleges/cutoff",$id) }}" method="POST" enctype="multipart/form-data">
		<div class="row">
            @csrf
			<div class="col-md-12 text-center">
				<h4>Cutoff</h4>
				<hr/>
			</div>
			<input type="hidden" name="rid" value="" /> 
			<div class="col-md-12 form-group">
				<textarea class="ckeditor form-control" name="description">{{ old('description', isset($data->description) ? $data->description : '') }}</textarea>
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

@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	   var stid = $("#state option").filter(":selected").val();
	   selectCity(stid);
       $('.ckeditor').ckeditor();
    });

</script>
@endsection