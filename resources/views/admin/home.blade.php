@extends('layouts.admin')
@section('content')
<style>
.small-box:hover {
    text-decoration: none;
}

.bg-info, .bg-info>a {
    color: #fff!important;
}
.bg-info {
    background-color: #17a2b8!important;
}
.small-box {
    border-radius: 0.25rem;
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
.small-box>.inner {
    padding: 10px;
}
.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
.small-box h3, .small-box p {
    z-index: 5;
}

.small-box p {
    font-size: 15px;
}

.small-box h3 {
    font-size: 23px;
    font-weight: 700;
    margin: 0 0 10px 0;
    padding: 0;
    white-space: nowrap;
}
.dashboard-widget a {
    color: #fff;
    text-decoration: none;
}
.small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.glyphicon, .small-box .icon>i.ion {
    font-size: 58px;
    top: 20px;
}

.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: all .3s linear;
}
</style>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            Dashboard
        </div>
    </div>

    <div class="row dashboard-widget mt-4">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{ url('admin/colleges') }}">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $college_count }}</h3>

                <p>Colleges</p>
              </div>
              <div class="icon">
                <i class="fa fa-university"></i>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{ url('admin/courses') }}">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $course_count }}</h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{ url('admin/exams') }}">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $exam_count }}</h3>

                <p>Exams</p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
            </div>
            </a>
          </div>
          
        </div>

    <!-- <div class="card">
		<div class="card-header">
			Home
		</div>

		<div class="card-body">
		</div>
	</div> -->

</div>
@endsection
@section('scripts')
@parent

@endsection