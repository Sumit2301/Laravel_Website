@foreach ($courses as $row)
    <?php $course = $row->course;
    $course_detail = $row->course_detail; ?>
    <section class="institute-section container course-list ">

        <div class="row m-0 p-0">
            <div class="col-md-12 section-heading text-center">
                <a href="{{ url('course/' . $course->url . '/colleges') }}">
                    <h2>{{ $course->name }}</h2>
                </a>
            </div>
        </div>
        <div class="row m-0 p-0 section-upper-tags justify-content-center">
            <a href="{{ url('course/' . $course->url . '/rank') }}">
                <div class="tag-1{{ $option == 'rank' ? '' : '' }}">Rank List</div>
            </a>
            <a href="{{ url('course/' . $course->url . '/scope') }}">
                <div class="tag-1{{ $option == 'scope' ? ' active' : '' }}">Scope</div>
            </a>
            <a href="{{ url('course/' . $course->url . '/exams') }}">
                <div class="tag-1{{ $option == 'exams' ? ' active' : '' }}">Exams</div>
            </a>
            <a href="{{ url('course/' . $course->url . '/top-study-destination') }}">
                <div class="tag-1{{ $option == 'top-study-destination' ? ' active' : '' }}">Top Study Destination</div>
            </a>
            <a href="{{ url('course/' . $course->url . '/questions-and-anwsers') }}">
                <div class="tag-1{{ $option == 'questions-and-anwsers' ? ' active' : '' }}">Q & A</div>
            </a>
        </div>
        @if ($course->eligibility_criteria)
            <div class="section-eligibility">
                <h2>Eligibility</h2>
                <p><?= strip_tags($course->eligibility_criteria) ?></p>
            </div>
        @endif

        @if (count($course_detail))
            <div class="row m-0 p-0 section-featured">
                <h2>Featured Institutes</h2>
                <div class="institute-cards row">
                    <?php foreach($course_detail as $row){?>
                    <div class="col-md-3 col-6 institute-card-column">
                        <a href="{{ url('college/' . $row->url) }}">
                            <div class="institute-single-card">
                                <div class="college-icon-wrapper">
                                    @if ($row->photo)
                                        <img class="college-icon" src="{{ asset('uploads/photo/' . $row->photo) }}"
                                            alt="">
                                    @else
                                        <img class="college-icon" src="{{ asset('uploads/image-not-found.png') }}"
                                            alt="">
                                    @endif
                                </div>
                                <h3 class="mt-2"><?= $row->name ?></h3>
                                <span class=""><?= $row->city_name ?></span>
                                <button class="btn my-button-2 mt-2">View More <i
                                        class="fa fa-arrow-right fa-xs"></i></button>
                                <!--<button class="btn btn-primary my-button-3"><img src="{{ asset('assets/site') }}/images/download-icon.svg" class="download-icon">Download Brochure</button>-->
                            </div>
                        </a>
                    </div>
                    <?php } ?>


                </div>

            </div>
        @endif

        <div class="row m-0 p-0 section-lower-tags">
            <div class="tag-2"
                onclick="showInterest('<?= isset($course) && isset($course->name) ? $course->name : '' ?>','Course')">
                Show Interest</div>
            <div class="tag-2"><a href="javascript:void(Tawk_API.toggle())">LIVE Chat</a></div>
            <!--<div class="tag-2">Expert Predictor</div>-->
            <div class="tag-2 frexadvice"
                onclick="freeExpertAdvice('<?= isset($course) && isset($course->name) ? $course->name : '' ?>','Course')">
                Free Expert Advice</div>
        </div>
    </section>
@endforeach
