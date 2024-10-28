@extends('layouts.site')

@section('stylesbefore')
@endsection

@section('styles')
    <style>
        #owl-demo .item,
        #owl_news .item,
        #owl_ebooks .item {
            margin: 3px 15px 3px 3px;
            position: relative;
        }

        #owl-demo .item img,
        #owl_news .item img,
        #owl_ebooks .item img {
            display: none;
            width: 100%;
            height: 210px;
            border-radius: 5px;
        }

        .owl-theme .owl-controls {
            position: absolute;
            top: -84px;
            right: 0px;
        }

        .owl-buttons div {
            display: inline-block;
        }

        .owl-buttons img {
            width: 39px;
            height: 39px;
            margin: 0px 10px;
        }

        .owl-blur-div {
            position: absolute;
            padding: 0px 13px;
            height: 60px;
            border-radius: 10px;
            /* background: rgba(1, 150, 218, 0.25); */
            backdrop-filter: blur(49.0703px);
            /* width: inherit; */
            width: calc(100% - 20px);
            margin: 0 10px;
            bottom: 10px;
            justify-content: center;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            color: #fff;
        }

        .owl-blur-div h3 {
            font-size: 16px;
            overflow: hidden;
            -webkit-line-clamp: 2;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            line-height: 20px;
            margin-bottom: 0px;
        }


        .sticky-header {
            position: fixed;
            width: 100%;
            max-width: 100%;
            padding: 15px 30px;
            z-index: 9;
            left: 0;
            background: linear-gradient(to top, rgb(0 0 0 / 0%) 0%, rgb(0 0 0 / 63%) 100%);
        }

        .bg-banner {
            background: url(assets/site/images/banner01.png);
            background-repeat: no-repeat;
            background-size: cover;
            /*background-position: bottom;*/
        }

        @media(max-width:992px) {
            header {
                padding-top: 80px !important;
            }

            .sticky-header {
                background: #ffffff;
            }
        }

        .college-icon {
            transition: 0.3s;
        }

        .college-icon-wrapper {
            overflow: hidden;
            border-radius: 5px !important;
        }

        .institute-single-card:hover .college-icon {
            transform: scale(1.1);

        }

        .tag-2:hover {
            box-shadow: 0px 0px 5px 4px #011d5c87;
        }

        /* Other styling elements, that are not necessary for the example */
        #owl-demo .item {
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 0px 1px #00000040;
        }

        #owl-demo .item:hover {
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 3px #00000040;
        }

        .owl-blur-div {
            position: unset;
            color: #000
        }
        .news-section .item{
          padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 0px 1px #00000040;
        }
        .news-section .item:hover{
          padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 3px #00000040;
        }
    </style>
@endsection

@section('content')

    <div class="search-form">
        <form method="get" action="{{ url('colleges') }}">
            <input type="text" name="college" class="form-control my-form-element" placeholder="Search Colleges, Courses">
            <select name="state" class="form-control my-form-element" onchange="getCity(this.value,this);">
                <option value="" selected>Select State</option>
                @foreach ($state as $states)
                    <option value="{{ $states->state_name }}" data-id="{{ $states->id }}">{{ $states->state_name }}
                    </option>
                @endforeach
            </select>
            <select name="city" class="form-control my-form-element" id="city">
                <option value="" selected>Select City</option>
            </select>
            <select name="exam" class="form-control my-form-element">
                <option value="" selected>Select Exam</option>
                @foreach ($exams as $exam)
                    <option value="{{ $exam }}">{{ $exam }}</option>
                @endforeach
            </select>
            <select name="degree" class="form-control my-form-element">
                <option value="" selected>Select Degree</option>
                @foreach ($course_list as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                @endforeach
            </select>
            <button type="submit" name="search" class="btn my-button my-form-element">Search</button>

        </form>
    </div>
    <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
        @include('frontend.course_list')
    </div>

    @if (count($blogs))
        <section class="news-section container mt-5">
            <div class="row m-0 p-0">
                <div class="col-md-12 section-heading">
                    <p>Latest News</p>
                    <h2><a href="{{ url('news') }}">NEWS</a></h2>
                </div>
            </div>

            <div id="owl-demo">
                @foreach ($blogs as $row)
                    <div class="item">
                        <a href="{{ url('news/' . $row->slug) }}">
                            <img src="{{ $row->thumbnail ? url('uploads/blog/' . $row->thumbnail) : url('assets/images/no-image-400x400.png') }}"
                                alt="">
                            <div class="owl-blur-div">
                                <h3>{{ $row->title }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </section>
    @endif



    @if (count($articles))
        <section class="news-section container mt-5">
            <div class="row m-0 p-0">
                <div class="col-md-4 section-heading">
                    <p>Latest Blogs</p>
                    <h2><a href="{{ url('mba-course-blogs') }}">MBA Courses Blogs</a></h2>
                </div>
            </div>

            <div id="owl_news">
                @foreach ($articles as $row)
                    <div class="item">
                        <a href="{{ url('blogs/' . $row->slug) }}">
                            <img src="{{ $row->thumbnail ? url('uploads/article/' . $row->thumbnail) : url('assets/images/no-image-400x400.png') }}"
                                alt="">
                            <div class="owl-blur-div">
                                <h3>{{ $row->title }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if (count($ebooks))
        <section class="news-section container mt-5">
            <div class="row m-0 p-0">
                <div class="col-md-4 section-heading">
                    <!--<p>#2 Best Student</p>-->
                    <h2><a href="{{ url('ebooks') }}">Ebooks</a></h2>
                </div>
            </div>
            <div class="books-div">
                <div id="owl_ebooks">
                    @foreach ($ebooks as $row)
                        <div class="item">
                            <a href="{{ url('ebooks/' . $row->slug) }}">
                                <img src="{{ $row->thumbnail ? url('uploads/ebook/' . $row->thumbnail) : url('assets/images/no-image-400x400.png') }}"
                                    alt="">
                                <div class="owl-blur-div">
                                    <h3>{{ $row->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!--<section class="news-section container mt-5">
      <div class="row m-0 p-0">
        <div class="col-md-4 section-heading">
          <p>#2 Best Student</p>
          <h2>Ebooks</h2>
        </div>
        <div class="col-md-8 top-navigation">
          <img src="{{ asset('assets/site') }}/images/icon-right.svg" class="icon-right-books" alt="" srcset="">
          <img src="{{ asset('assets/site') }}/images/icon-left.svg" class="icon-left-books" alt="" srcset="">
        </div>
      </div>
      <div class="books-div">
        <div class="swiper swiper-books">
          <div class="swiper-wrapper">

            @foreach ($ebooks as $row)
    <div class="swiper-slide">
              <div class="single-slide">
                <a href="{{ url('ebooks/' . $row->slug) }}">
                <img src="{{ url('uploads/ebook/' . $row->thumbnail) }}" alt="" srcset="">
                <div class="blur-div">
                  <h3 class="text-white">{{ $row->title }}</h3>
                 
                </div>
                </a>
              </div>
              
            </div>
    @endforeach
      
          </div>
        </div>
      </div>
      
    </section>-->
    @endif

    <section class="news-section container mt-5">
        <div class="row m-0 p-0">
            <div class="col-md-8 section-heading">
                <p>Latest Videos</p>
                <h2><a href="{{ url('videos') }}">Videos</a></h2>
            </div>
            <div class="col-md-4 section-heading text-right pt-3">
                <a href="{{ url('videos') }}" style="color: #FF7B00;font-size: 15px;">
                    <h2>All Video</h2>
                </a>
            </div>

        </div>
        <div class="row m-0 p-0">

            @foreach ($videos as $row)
                <div class="col-md-3">
                    <div class="video-container">
                        <iframe width="100%" height="280" src="{{ $row->url }}">
                        </iframe>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Slider main container -->

    </section>

@endsection

@section('scriptsbefore')
@endsection

@section('scripts')
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.swiper-news', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 0,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    // spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1080: {
                    slidesPerView: 3,
                    spaceBetween: 0
                }
            },
            // If we need pagination
            // pagination: {
            //   el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.icon-left-news',
                prevEl: '.icon-right-news',
            },

            // And if we need scrollbar
            // scrollbar: {
            //   el: '.swiper-scrollbar',
            // },
        });
    </script>
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.swiper-blogs', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 0,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    // spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1080: {
                    slidesPerView: 3,
                    spaceBetween: 0
                }
            },
            // If we need pagination
            // pagination: {
            //   el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.icon-left-blogs',
                prevEl: '.icon-right-blogs',
            },

            // And if we need scrollbar
            // scrollbar: {
            //   el: '.swiper-scrollbar',
            // },
        });
    </script>
    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.swiper-books', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            slidesPerView: 1,
            spaceBetween: 0,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    // spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                1080: {
                    slidesPerView: 3,
                    spaceBetween: 0
                }
            },
            // If we need pagination
            // pagination: {
            //   el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.icon-left-books',
                prevEl: '.icon-right-books',
            },

            // And if we need scrollbar
            // scrollbar: {
            //   el: '.swiper-scrollbar',
            // },
        });

        $('#owl-demo, #owl_news, #owl_ebooks').owlCarousel({
            autoplay: false,
            autoplayTimeout: 4000,
            loop: false,
            navRewind: false,
            items: 4,
            margin: 35,
            dots: false,
            navigation: true,
            navigationText: [
                '<img src="{{ url('assets/site/images/icon-right.svg') }}" class="icon-right-news swiper-button-disabled" alt="" srcset="" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-fde6e81d49257831" aria-disabled="true">',
                '<img src="{{ url('assets/site/images/icon-left.svg') }}" class="icon-right-news swiper-button-disabled" alt="" srcset="" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-fde6e81d49257831" aria-disabled="true">'
            ],
            responsive: {
                0: {
                    items: 1,
                    center: false,
                    stagePadding: 35
                },
                480: {
                    items: 1,
                    center: false,
                    stagePadding: 35
                },
                600: {
                    items: 1,
                    center: false,
                    stagePadding: 35
                },
                750: {
                    items: 1,
                    center: false,
                    stagePadding: 35
                },
                960: {
                    items: 3,
                    stagePadding: 35
                },
                1170: {
                    items: 3,
                    stagePadding: 35
                },
                1300: {
                    items: 3,
                    stagePadding: 35
                }
            }
        });

        $("#owl-demo .item img, #owl_news .item img, #owl_ebooks .item img").show();
    </script>
@endsection
