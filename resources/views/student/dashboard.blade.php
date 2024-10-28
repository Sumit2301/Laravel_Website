@extends('layouts.student')

@section('content')

<section class="neet-counsellin-process-section"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h2 class="text-center heading">NEET Counselling Process 2022</h2>
                    
                    <p>NEET Counselling 2022 process is completely online and will begin with the online registration for round 1 from Oct 11 to 17, 2022. Choice filling and locking will be available from Oct 14 to 18, 2022. After every round of counselling, you will be able to check NEET admission cut off, i.e opening and closing ranks for all the participating colleges. Check NEET 2022 Cut off
                    PwD candidates must get their disability certificates issued by any of the 16 designated NEET Disability Certificate Centers before round 1 of NEET UG 2022 counselling begins. To change nationality from Indian to NRI, mail the documents at ug.nri.mcc@gmail.com.</p>
                    
                    <p>Note that MCC will only conduct NEET Counselling 2022 for 15% AIQ seats in government colleges, 100% seats in deemed/ central universities, AIIMS, JIPMER, ESIC, and AFMS. College-wise NEET 2022 Seat Matrix for each round of counselling will be released by MCC on the official website.</p>
                    
                    <ul>
                        <li>For admission to AYUSH courses (BAMS/ BHMS/ BUMS), NEET Counselling 2022 will be conducted by AACCC. Check AYUSH NEET Counselling 2022</li>
                        <li>NEET Counselling 2022 for 85% State Quota Seats and 100% seats in private colleges has been started by various state authorities. Check State NEET Counselling 2022</li>
                        <li>Earlier allowed to apply only under the NRI category, OCI candidates can now apply under the Open Category. Check NEET 2022 Reservation</li>
                    </ul>
                    
                    <p>NEET Counselling 2022 will be conducted for admission to 91,927 MBBS, 27,698 BDS, 52,720 AYUSH, 603 BVSc seats in around 612 medical and 315 dental colleges of India including AIIMS and JIPMER. Candidates can use NEET College Predictor to get the list of eligible colleges based on their scores and rank. Check NEET 2022 College Predictor</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cut-off-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <h2 class="heading text-center">Cut off marks for NEET 2022</h2>
                <table class="table table-bordered caption-top bg-white">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Qualifying Criteria</th>
                            <th colspan=2>NEET(UG) 2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <th>Marks Range</th>
                            <th>No. of Candidates</th>
                        </tr>
                        <tr>
                            <td>UR/EWS</td>
                            <td>50th Percentile</td>
                            <td>715-117</td>
                            <td>881402</td>
                        </tr>
                        <tr>
                            <td>OBC</td>
                            <td>40th Percentile</td>
                            <td>116-93</td>
                            <td>74458</td>
                        </tr>
                        <tr>
                            <td>SC</td>
                            <td>40th Percentile</td>
                            <td>116-93</td>
                            <td>26087</td>
                        </tr>
                        <tr>
                            <td>ST</td>
                            <td>40th Percentile</td>
                            <td>116-93</td>
                            <td>10565</td>
                        </tr>
                        <tr>
                            <td>UR / EWS & PH </td>
                            <td>45th Percentile</td>
                            <td>116-105</td>
                            <td>328</td>
                        </tr>
                        <tr>
                            <td>OBC & PH</td>
                            <td>40th Percentile</td>
                            <td>104-93</td>
                            <td>160</td>
                        </tr>
                        <tr>
                            <td>SC & PH</td>
                            <td>40th Percentile</td>
                            <td>104-93</td>
                            <td>56</td>
                        </tr>
                        <tr>
                            <td>ST & PH</td>
                            <td>40th Percentile</td>
                            <td>104-93</td>
                            <td>13</td>
                        </tr>
                        <tr>
                            <th colspan=3>Total</th>
                            <th>993069</th>
                        </tr>
                    </tbody>
                </table>
               
                <h2 class="heading text-center">NEET MBBS/BDS Cut off 2022</h2>
                <table class="table table-bordered caption-top bg-white">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>NEET cutoff percentile</th>
                            <th>NEET cut-off 2022 scores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unreserved</td>
                            <td>50th percentile</td>
                            <th>715-117</th>
                        </tr>
                        <tr>
                            <td>SC/ST/OBC</td>
                            <td>40th Percentile</td>
                            <td>116-93</td>
                        </tr>
                        <tr>
                            <td>Unreserved-PH</td>
                            <td>45th percentile</td>
                            <td>116-93</td>
                        </tr>
                        <tr>
                            <td>SC/ST/OBC-PH</td>
                            <td>40th percentile</td>
                            <td>104-93</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<section class="student-neet-form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                        <h2 class="text-center heading">College Predictor</h2>
                       @if(Session::has('message'))
                                {!! Session::get('message') !!}
                              @endif
                    @if(empty(auth()->guard('student')->user()->neet_all_india_overall_rank))
                        <form action="{{ route('college-predictor') }}" method="post" class="mt-2">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Neet all india overall rank</label>
                                    <input type="text" class="form-control" name="neet_all_india_overall_rank" placeholder="Neet all india overall rank" required>
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Seat type in Neet all india counselling</label>
                                    <select name="miscellaneous" id="miscellaneous" class="form-control parent SumoUnder" required>
                                        <option value="">Choose</option>
                                        <option value="All India Quota Seats">All India Quota Seats</option>
                                        <option value="Aligarh Muslim University NRI Quota">Aligarh Muslim University NRI Quota</option>
                                        <option value="ESI Quota">ESI Quota</option>
                                        <option value="Central Universities Internal Quota">Central Universities Internal Quota</option>
                                        <option value="Jamia Muslim Quota">Jamia Muslim Quota</option>
                                        <option value="Deemed Universities">Deemed Universities</option>
                                        <option value="Delhi University Defense Quota">Delhi University Defense Quota</option>
                                    </select>
                                </div>
                            </div>
                     
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Are you Specially abled?</label>
                                    <select name="disability" id="disability" class="form-control parent SumoUnder" required>
                                        <option value="">Choose</option>
                                        <option value="No" selected="">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Caste group</label>
                                    <select name="caste" id="caste" class="form-control SumoUnder" required="" tabindex="-1">
                                        <option value="" selected="">Choose</option>
                                        <option value="Economically Weaker Section">Economically Weaker Section</option>
                                        <option value="General">General</option>
                                        <option value="Other Backward Class">Other Backward Class</option>
                                        <option value="Scheduled Caste">Scheduled Caste</option>
                                        <option value="Scheduled Tribe">Scheduled Tribe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group my-4 text-center">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
            
                    </form>
                    @else
                    <div class="text-center">
                        @if(Session::has('request_callback_msg'))
                            {!! Session::get('request_callback_msg') !!}
                        @endif
                        <a href="#" class="btn btn-success">Download</a>
                        @if(auth()->guard('student')->user()->callback_request != '')
                            <div class="text-success py-2">Callback Requested</div>
                        @else
                            <a href="{{ route('request_callback', auth()->guard('student')->user()->id) }}" class="btn btn-info text-white">Callback</a>
                        @endif
                    </div>
                    @endif
                </div>
        </div>    
    </div>    
</section>


<section class="faq-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center heading">Frequently Asked Questions</h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- 1 -->
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Accordion Item #1
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Accordion Item #2
                                            </button>
                                        </h2>
                                        
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Accordion Item #3
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</section>

@endsection