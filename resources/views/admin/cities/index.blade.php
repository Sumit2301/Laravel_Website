@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.cities.create") }}">
                Add City
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			All City
		</div>

		<div class="card-body">
		
			<div class="row">
				<div class="form-group col-md-4">
					<label for="first_name">State</label>
					<select class="form-control" name="state_code" id="state_code" onchange="stateChange()">
						<option value="">Select State</option>
						@foreach($states as $state)
						<option value="{{ $state->id }}" <?= ($state_id==$state->id)?'selected':'' ?>>{{ $state->state_name }}</option>
						@endforeach
					</select>
				 </div>
		    </div>
			
			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" id="spTable">
				<thead>
					<tr>
						<th class="text-center" class="text-center" style="width: 50px;">SN</th>
						<th>Name</th>
						<th class="text-center" class="text-center" style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cities as $key=>$row)
					<tr>
						<td class="text-center">{{ $key+1 }}</td>
						<td>{{ $row->city_name }}</td>
						<td class="text-center">
						<a class="btn btn-success btn-sm" href="{{ route('admin.cities.edit',$row->id) }}"><i class="fa fa-edit"></i></a>
						<form method="post" action="{{ route('admin.cities.destroy',$row->id) }}" class="d-inline">
						@csrf
						@method("delete")
						<button type="button" class="btn btn-danger btn-sm ml-2" onclick="deleteRecord(this)"><i class="fa fa-trash"></i></button>	
						</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">


function stateChange() {
	var state_code = $("#state_code").val();
	window.location.href="{{ url('admin/cities?state_id=') }}"+state_code;
}

$(function () {
$('#spTable').DataTable({
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  "responsive": true,
});
});
  
function deleteRecord(th) {
Swal.fire({
  title: 'Do you want to delete this city?',
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Delete',
  //denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
  	$(th).parent().submit();
  } 
  else {
  }
});
}
</script>
@endsection