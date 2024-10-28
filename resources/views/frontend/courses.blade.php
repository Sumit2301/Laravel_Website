@extends('layouts.site')
@section('content')

    <!-- Hero Start -->
    <section class="hero-area hero-two-area hero-pagename-area background-image" data-src="{{ asset('assets/images/bg/unnamed.jpg') }}" >
	<div class="bannerOverlay"></div>
      <div class="container" style="position: relative;z-index: 1;">
        <div class="row">
         
          <div class="col-xl-11">
            <div class="">
              
            </div>
          </div>
        </div>
      </div>
    </section>

@include('frontend.course_list')

<br>
<br>
<br>

@endsection