@extends('layouts.admin')
@section('content')
<div class="row">
<div class="card col-md-10 p-0">
    <div class="card-header">
        <strong>Update College</strong> {{ isset($college) ? $college->name : '' }}
    </div>
    <div class="card-body">
        <form action="{{ url("admin/colleges/photos",$id) }}" method="POST" enctype="multipart/form-data">
		<div class="row">
            @csrf
			<div class="col-md-12 text-center">
				<h4>Photos</h4>
				<hr/>
			</div>
			
			<div class="controls col-12">
				<div class="row entry">
					
					<div class="form-group col">
						<input class="form-control" name="caption[]" type="text" value="" placeholder="Image Caption" required />
					</div>
					<div class="form-group col">
						<input class="form-control" name="imageFile[]" type="file" required />
					</div>
					<div class="input-group col-sm-2">			
						<span class="input-group-btn">
							<button class="btn btn-success btn-add" type="button">
								<span class="fa fa-plus"></span>
							</button>
						</span>
					</div>
				</div>
			</div>
            <div class="col-12">
                <input class="btn btn-danger" type="submit" value="save">
            </div>
		</div>
        </form>
		
		<div class="col-md-12 text-center">
				<h4>All Photos</h4>
				<hr/>
			</div>
		<div class="row mt-5">
			@if(!empty($data) )
				@foreach($data as $img)
				<div class="col-sm-2 text-center">
					<form method="post" action="{{ url("admin/colleges/photos",['id'=>$id,'imgId'=>$img->id]) }}" >
					 @csrf
						<input type="submit" name="submit" value="X" class="btn btn-sm btn-danger" style="right:0;margin-bottom: -10px;position: absolute;" />
						<input type="hidden" name="deleteImg" value="{{ $img->image }}" />
					</form>
					<img src="{{ asset('uploads/photos') . '/' . $img->image  }}" width="100px" />
				</div>
				@endforeach
			@endif
			
		</div>

    </div>
	

	</div>
	@include('admin.college.updatemenu')
</div>

@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click', '.btn-add', function(e)
    { //alert();
        e.preventDefault();

        var controlForm = $('.controls'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus"></span>');
    });
	$(document).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
</script>
@endsection