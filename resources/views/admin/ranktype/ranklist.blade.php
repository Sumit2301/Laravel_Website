@extends('layouts.admin')


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
				<th>Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0;foreach($rank_details as $index => $row){ $i++; ?>
				<tr>
					<td><?=$i?></td>
					<td>{{ $row->rank_type }}</td>
					<td class="text-center">
	                    	<a href="{{ route('admin.ranktypes.edit',$row->rank_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
	                    	<form action="{{ route('admin.ranktypes.destroy',$row->rank_id) }}" method="post" class="d-inline">
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