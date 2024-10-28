@extends('layouts.college_panel')

@section('styles')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style type="text/css">
	#courselist{
		text-align: center;
	}
</style>
@endsection
@section('content')



<div class="row table-responsive">
	<table class="table table-bordered" id="courselist">
		<thead>
			<tr>
				<th>Sn.</th>
				<th>Name</th>
				<th>Approval</th>
				<th>Exam</th>
				<th>Seats</th>
				<th>Mode</th>
				<th>Total Fees</th>
				<th>Duration</th><!-- 
				<th>Brochure</th> -->
				<th>Offer By</th>
				<th>Q & A</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0;foreach($course as $index => $row){ $i++; ?>
				<tr>
					<td><?=$i?></td>
					<td>{{ $row->name }}</td>
					<td>{{ $row->approval }}</td>

					<td>{{ $row->exam }}</td>
					<td>{{ $row->seats }}</td>
					<td>{{ $row->mode }}</td>

					<td>{{ $row->total_fees }}</td>
					<td>{{ $row->duration }}</td>
					<td>{{ $row->offer_by }}</td>
					<td><a href="{{ route('admin.courses.questionanswers',$row->id) }}" class="btn btn-dark btn-sm"><i class="fa fa-question"></i></a></td>	
					<td class="text-center">
	                    	<a href="{{ route('admin.courses.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
	                    	<form action="{{ route('admin.course.destroy',$row->id) }}" method="post" class="d-inline">
	                    	@csrf
	                    	 @method('delete')
	                    	<button type="submit" class="btn btn-danger btn-sm ml-2"><i class="fa fa-trash"></i></button>
	                    	</form>
	                    </td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>	
@endsection

@section('script')
<script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#courselist').DataTable();
} );	
</script>
@endsection
