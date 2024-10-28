@extends('layouts.site')
@section('content')

<style>
.news-col {
    width: 100%;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0px 0px 10px #e9e9e9;
  }
  .news-col img,.learn-col img {
    width: 100%;
  }
  .news-col-body {
    padding: 13px 15px 10px 15px;
  }
  .news-col-body h5{
    overflow: hidden;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    line-height: 1.5;
    font-weight: normal;
    min-height: 48px;
  }
</style>

   <section class="learn-single-area bgcolor-23 mt-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            
            <div class="learn-col">
              @if($blog->thumbnail)
              <img src="{{ url('uploads/blog/'.$blog->image) }}"> 
              @endif

        <h1 class="mt-4">{{ $blog->title }}</h1>

        <div class="detail-user-by">
          @if($blog->publish_date)
          <span><i class="fa fa-calendar"></i> {{ date("d M, Y",strtotime($blog->publish_date)) }}</span>@endif <span class="ml-3"><i class="fa fa-user"></i> {{ env('AUTHOR_NAME') }}</span>
        </div>

              <div class="mt-2">{!! $blog->content !!}</div>        
      </div>

          </div>

        <div class="col-md-4">

              <div class="exams-section">
                <h2>Latest News</h2>
                <hr>

                <div class="latest-posts">
                  
                    @foreach($blogs as $key=>$row)
                    <article class="cp-wrap cp-small mh-clearfix">
                      <div class="cp-thumb-small">
                        <a href="{{ url('news/'.$row->slug) }}" title="{{ $row->title }}"><img width="120" height="67" src="{{ url('uploads/blog/'.$row->thumbnail) }}" class="attachment-cp-thumb-small size-cp-thumb-small" alt="{{ $row->title }}" sizes="(max-width: 120px) 100vw, 120px"></a>
                      </div>
                      @if($row->publish_date)
                      <p class="entry-meta"><span class="updated"><?= date("F, d Y",strtotime($row->publish_date)) ?></span></p>
                      @endif
                      <h3 class="cp-title-small"><a href="{{ url('news/'.$row->slug) }}" title="{{ $row->title }}" rel="bookmark">{{ $row->title }}</a></h3>
                    </article>

                    <?php if(count($blogs)-1!=$key) { ?>
                    <hr class="mh-separator">
                    <?php } ?>
                    @endforeach

                  </div>
              </div>

        </div>

      </div>
    </section>

@endsection

@section('scripts')
<script>
$("table").addClass('table table-bordered');
</script>
@endsection