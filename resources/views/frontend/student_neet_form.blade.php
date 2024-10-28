@extends('layouts.site')
@section('content')

<section class="student-neet-form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card p-4 my-5" style="border: 0; box-shadow: 2px 2px 22px #80808047;">
                        <h2 class="text-center">College Predictor</h2>
                       @if(Session::has('msg'))
                                {!! Session::get('msg') !!}
                              @endif
                    <form action="{{ route('get-student-neet-signup-form') }}" method="get" class="mt-2">
                       <div class="form-group">
                            <label>Neet all india overall rank</label>
                            <input type="text" class="form-control" name="neet_all_india_overall_rank" placeholder="Neet all india overall rank" required>
                        </div>
                     
                        <div class="form-group">
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
                     
                        <div class="form-group d-none">
                            <label>Quota</label>
                            <select name="special_quota" id="special_quota" class="form-control parent SumoUnder" required>
                                <option value="ESI Quota" selected="">ESI Quota</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label>Are you Specially abled?</label>
                            <select name="disability" id="disability" class="form-control parent SumoUnder" required>
                                <option value="">Choose</option>
                                <option value="No" selected="">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
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
                        <input type="submit" class="btn btn-primary">
                    </form>
                    <div class="text-center">
                        <a href="{{ route('student_login') }}" class="text-primary">Already have an account?</a>
                    </div>
                </div>
            </div>    
        </div>    
    </div>    
</section>

@endsection