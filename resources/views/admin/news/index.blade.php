@extends('layouts.admin')
@section('content')
<div class="content">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.colleges.add-new") }}">
                Add News
            </a>
        </div>
    </div>
	<div class="card">
		<div class="card-header">
			All News
		</div>

		<div class="card-body">
			<table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Employee">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>College</th>
						<th>Image</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i=0;foreach($news as $k=>$row){ $i++;?>
					<tr>
						<td><?=$i?></td>
						<td><?=$row['title']?></td>
						<td><?=$row['college_id']?></td>
						<td><img src=""></td>
						<td></td>						
						<td><a class="btn btn-xs btn-info" href="{{ route('admin.colleges.edit',$college['id']) }}">Edit</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			

		</div>
	</div>
</div>
@endsection