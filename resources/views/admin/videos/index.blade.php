@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.videos.create") }}">
                Add Video
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			Videos
		</div>

		<div class="card-body">
			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
				<thead>
					<tr>
						<th class="text-center" class="text-center" style="width: 50px;">SN</th>
						<th>Youtube URL</th>
						<th class="text-center" class="text-center" style="width: 70px;">Status</th>
						<th class="text-center" class="text-center" style="width: 100px;">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($videos as $key=>$row)
					<tr>
						<td class="text-center">{{ $key+1 }}</td>
						<td>{{ $row->url }}</td>
						<td class="text-center">{!! ($row->status==1)?"<span class='btn btn-success btn-sm'>Active</span>":"<span class='btn btn-danger btn-sm'>Deactive</span>" !!}</td>
						<td class="text-center">
						<a class="btn btn-success btn-sm" href="{{ route('admin.videos.edit',$row->id) }}"><i class="fa fa-edit"></i></a>
						<form method="post" action="{{ route('admin.videos.destroy',$row->id) }}" class="d-inline">
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
function deleteRecord(th) {
Swal.fire({
  title: 'Do you want to delete this article?',
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