	<div class="card col-md-2 p-0">
		<div class="card-header">
			Manage Details
		</div>
		<div class="card-body">
			<div class="col-12 p-0">
				<a class="btn btn-{{ (Route::currentRouteName() == 'admin.colleges.edit') ?  'success' : 'danger'  }}  form-control mb-2" href="{{ route('admin.colleges.edit',$college['id']) }}" >OverView</a>
				<!-- <a class="btn btn-{{ request()->is('admin/course/*/*/edit') || request()->is('admin/colleges/*/courses-fee/edit') ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'courses-fee']) }}" >Courses & Fees</a> -->
				<a class="btn btn-{{ request()->is('admin/colleges/*/admission-process/edit') ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'admission-process']) }}" >Admission Process</a>
				<a class="btn btn-{{ request()->is('admin/colleges/*/cutoff/edit') ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'cutoff']) }}" >Cutoff</a>
				<a class="btn btn-{{ request()->is('admin/colleges/*/placements/edit') ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'placements']) }}" >Placements</a>
				<a class="btn btn-{{ request()->is('admin/colleges/*/photos/edit') ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'photos']) }}" >Photos</a>
				<a class="btn btn-{{ (request()->is('admin/colleges/*/blogs/edit') || request()->is('admin/colleges/*/blogs/edit/*')) ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'blogs']) }}" >Blogs</a>
				<a class="btn btn-{{ (request()->is('admin/colleges/*/videos/edit') || request()->is('admin/colleges/*/videos/edit/*')) ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'videos']) }}" >Youtube Videos</a>
				<a class="btn btn-{{ (request()->is('admin/colleges/*/reviews/edit') || request()->is('admin/colleges/*/reviews/edit/*')) ? 'success' : 'danger' }} form-control mb-2 " href="{{ route('admin.colleges.editoption',['id'=>$college['id'],'option'=>'reviews']) }}" >Reviews</a>
			</div>
		</div>
	</div>