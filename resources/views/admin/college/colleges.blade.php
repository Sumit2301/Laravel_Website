@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.colleges.add-new") }}">
                Add College
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			All Colleges
		</div>

		<div class="card-body">
			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee" id="spTable">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Featured</th>
						<th>State</th>
						<th>City</th>
						<th class="text-center" style="widows: 50px;">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($colleges as $k=>$college)
					<tr>
						<td>{{ $k+1 }}</td>
						<td>{{ $college['name'] }}</td>
						<td>{{ ($college['featured']==0)? "" : "Featured" }}</td>
						<td>{{ $college['state_name'] }}</td>
						<td>{{ $college['city_name'] }}</td>
						<td class="text-center"><a class="btn btn-xs btn-info" href="{{ route('admin.colleges.edit',$college['id']) }}">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $colleges->links() }}

		</div>
	</div>
</div>
@endsection


@section('script')
<script>
  $(function () {
    $('#spTable').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
    });
  });
</script>
@endsection