@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.exams.add-new") }}">
                Add College
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			All Exams
		</div>

		<div class="card-body">
			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Streams</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($exams as $k=>$exam)
					<tr>
						<td>{{ $k+1 }}</td>
						<td>{{ $exam['name'] }}</td>
						<td>{{ $exam['streams'] }}</td>
						<td><a class="btn btn-xs btn-info" href="{{ route('admin.exams.edit',$exam['id']) }}">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{{ $exams->links() }}

		</div>
	</div>
</div>
@endsection