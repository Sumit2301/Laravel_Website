@extends('layouts.site')
@section('content')

  @include('frontend.college_detail_menu')
  
  <section class="container">
    <div class="row m-0 p-0">
      <div class="col-md-9 col-12 left-panel">
            <div class="learn-col">
			  <div class="gallery row">
		 @foreach($college->photos as $photo)
				<a href="{{ asset('uploads/photos') . '/' . $photo->image  }}" class="big col-4 mb-3"><img src="{{ asset('uploads/photos') . '/' . $photo->image  }}" alt="{{ $photo->caption }}" title="{{ $photo->caption }}" /></a>
			  @endforeach
        <div class="clear"></div>
			  </div>
			</div>
		  </div>
        @include('frontend.college_details_sidebar');
		</div>
    </section>
   
@endsection
@section('scripts')
<script src="{{ asset('assets/js/simple-lightbox.js') }}"></script>
<script>

    (function() {
        var $gallery = new SimpleLightbox('.gallery a', {});
    })();
</script>
@parent

@endsection
@section('stylesbefore')
<link href="{{ asset('assets/css/simple-lightbox.css') }}" rel="stylesheet">
<style>
.sl-wrapper .sl-close {
	z-index: 99999999;
}
.sl-wrapper {
	background: rgba(247, 247, 247, 0.96);
    z-index: 999999 !important;
}
</style>
@endsection