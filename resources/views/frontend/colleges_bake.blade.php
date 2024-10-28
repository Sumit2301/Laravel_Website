@extends('layouts.frontend')
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

   <section class="pricing-area bgcolor-2">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-12 text-center mb-5">
            <div class="hero-col"  style="padding-top: 12px;">
              <p class=""> </p>

        <form method="get" action="{{url('colleges')}}" >
        <input type="text" class="searchbox" name="college" placeholder="Search Colleges, Courses & more" />

        <select type="text" class="searchbox" name="state" onchange="getCity(this.value,this);">
        <option value="" disabled="disabled" selected="selected">Select State</option>
        @foreach($state as $states)
        <option value="{{$states->state_name}}" data-id="{{$states->id}}">{{$states->state_name}}</option>
        @endforeach
        </select>


        <select type="text" class="searchbox" name="city" id="city">
        <option value="">Select City</option>

        </select>
        <select type="text" class="searchbox" name="exam" >
        <option value="">Select Exam</option>
        @foreach($exams as $exam)
        <option value="{{$exam}}" <?= (request()->input('exam')==$exam)?'selected':'' ?> >{{$exam}}</option>
        @endforeach
        </select>
        <select type="text" class="searchbox" name="degree" >
        <option value="">Select Degree</option>
        @foreach($course_list as $row)
        <option value="{{$row->name}}" <?= (request()->input('degree')==$row->name)?'selected':'' ?> >{{$row->name}}</option>
        @endforeach
        </select>
        <button type="submit" name="search"  class="btn btn-primary hvr-bounce-to-top theme-btn" href="#." role="button">Search</button>
        </form>

            </div>
          </div>
        </div>
        <div class="row justify-content-center">
		@foreach($colleges as $college)
          <div class="col-lg-4 col-md-6">
            <div class="pricing-col">
			  @if(isset($college->featured) && $college->featured == 1)
				<p class="toplist">Featured</p>
			  @endif
              <div class="pricing-col-header">
			  @if(isset($college->logo) && !empty($college->logo))
				<img src="{{ asset('uploads/photo/').'/'.$college->photo }}" class="display-photo" alt="">
			  @else
                <img src="{{ asset('assets/images/logos/pricing-1.png') }}" class="display-photo" alt="">
			  @endif
                <!--<img src="{{ asset('assets/images/icons/checked-2.png') }}" alt="">-->
              </div>
              <div class="pricing-col-content">
                <h5>{{ $college->name }}</h5>
                <div class="reviews-bar">
                  <p>{{ $college->cityname->city_name }} <span>{{ !empty($college->ownership) ? "Ownership: " . $college->ownership : '' }}</span></p>
                </div>
				<hr class="m-1"/>
				<ul class="college-link">
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/admission') : '' }}">Admissions</a></li>
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/course-fee') : '' }}">Courses & Fees</a></li>
					<li><a href="{{ !empty($college->url) ? url('college/'.$college->url.'/placements') : '' }}">Placements</a></li>
				</ul>
                <!--<ul>
                  <li>Rate it! (21556)</li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                  <li><i class="fas fa-star"></i></li>
                </ul>-->
              </div>
              <div class="pricing-col-footer">
                <a class="btn btn-primary hvr-bounce-to-top theme-btn" href="{{ !empty($college->url) ? url('college/'.$college->url) : '' }}" role="button">Details</a>
                
              </div>
            </div>
          </div>
		@endforeach
        </div>		
        <div class="row justify-content-center">
          <div class="col-4">
			{{ $colleges->links() }}
		  </div>
		</div>
      </div>
    </section>

@endsection
@section('scripts')
@parent

<script type="text/javascript">
  function getCity(id='',th){
    var id = $('option:selected', th).attr('data-id');
    var _token = "{{ csrf_token() }}";
    $.ajax({
            type: "POST",
            url: "{{ route('getcity') }}",
            data: {id:id,_token:_token},
            success: function (response) {
              $('#city').html(response);
            },
            error: function () {
               alert('Some Error Occured.');
            }

        });
  }

</script>
@endsection