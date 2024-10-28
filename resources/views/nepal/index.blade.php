@extends('nepal.nepal_layout_new')

@section('styles')  

    .banner-section .banner-content h2, .banner-content h3 { font-weight: 600; }
    .banner-section .banner-content { padding: 20px; background: #0000005c; color: #fff; }
    .banner-section .banner-card { width: 300px; margin: auto; /*clip-path: polygon(15% 0,100% 0,100% 30%,100% 85%,85% 100%,0 100%,0 70%,0 13%);*/ }
    .banner-section .form-control { font-size: 13px; color: rgba(0,0,0,.8); border: 0; border-bottom: 1px solid #51247a; border-radius: 0; background-color: #fff; margin: 0 auto; padding: 10px 0; height: auto; box-shadow: none; }
    .edge-section { padding:2rem; }
    .edge-row{ justify-content: center; }
    .about-section ul.list { list-style-type: none; }
    .about-section .list li { position:relative; line-height: 45px; }
    /*.about-section .list::before { content: ""; position: absolute; top: 7%; left: 0; width: 1px; bottom: 7%; background-color: #1f9fc7; }*/
    .about-section .list li::before { content: ''; background-color: #ffffff; position: absolute; left: -23px; top: 14px; width: 18px; height: 18px; background-position: top center; background-repeat: no-repeat; background-size: contain; background-image: url({{ asset('assets/images/nepal/t1.png') }}); }
    .features-cards img { width:100px; margin:auto; padding-bottom: 15px; }
    .features-cards { padding: 20px; text-align: center; border: 0; box-shadow: 2px 2px 10px #8080802e; margin-bottom: 20px; border-bottom: 3px solid #fff; }
    .features-cards:hover { border-bottom: 3px solid #1f9fc7; }
    .course-btn { margin: 0 -6px 0 0; border-radius: 0; width:177.7px; height: 60px; background: #fff; color: #007bff !important; }
    .college-icon{ width:100%; }
    .course-btn[aria-expanded=true] { color: #fff !important; background-color: #007bff; }
    .collapse-content{ padding:20px; }
    #it ul li{ width:100%; list-style: none; line-height: 45px; position:relative; }
    #it ul li::before { content: ''; position: absolute; left: -22px; top: 13px; width: 18px; height: 18px; background-position: top center; background-repeat: no-repeat;
    background-size: contain;
    background-image: url({{ asset('assets/images/nepal/t2.jpg') }});
}
   #owl-demo .item, #owl_news .item, #owl_ebooks .item{ margin: 3px 15px 3px 3px; position: relative;}
    #owl-demo .item img, #owl_news .item img, #owl_ebooks .item img{ display: none; width: 100%; height: 210px; border-radius: 15px; }
 .owl-buttons img {
    width: 39px;
    height: 39px;
    margin: 0px 10px;
}
.owl-theme .owl-controls {
    position: absolute;
    top: -84px;
    right: 0px;
}
.owl-buttons div {
    display: inline-block;
}
 .owl-blur-div {
    position: absolute;
    padding: 0px 13px;
    height: 60px;
    border-radius: 10px;
    background: rgba(1, 150, 218, 0.25);
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

.heading {
    font-size: 30px!important;
    margin-bottom: 10px;
    font-weight: 700;
}

.course-section #accordionExample {
    background: #fff;
    color: #000;
    border-radius: 8px;
}
    .course-section { background: linear-gradient(45deg, #000e6e, #6a0202fc); color: #fff; }
    #it .item, #media .item , #hotel .item { background: #223254; padding: 20px; color: #fff; margin-top:10px; }
  .collapse-body{
  padding: 40px 10px;
  }  
  
        
   
        
    @media(min-width:992px){
        .banner-section { height: auto; background-image: url({{ asset('assets/site/images/nepal_banner.png') }}); background-repeat: no-repeat; background-size: cover; background-position: top center; position: relative; }
        .banner-section .banner-content { width: 501px; }
        #it ul { display:flex; flex-wrap: wrap; }
            #it ul li{ width:50%; }
             .c-none{ display:none !important; }
    }
    
    @media(max-width:992px){
        .m-none{ display:none !important; }
        .banner-section .banner-card { background: #134c81; color: #fff; }
        .institute-single-card img { max-width: 100%; }
        <!--.course-btn[aria-expanded=true] ~ .course-btn[aria-expanded=false] { display: none !important; }    -->
        .course-btn { width: 100%; }
    }        
@endsection

@section('content')

    <!-- Banner -->
    <section class="banner-section">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-8 col-md-6 align-self-end mb-5">
                    <div class="banner-content">
                        <h2 class="mb-0">ADMISSIONS OPEN IN NEPAL</h2>
                        <h3>Top Medical Colleges for 2022</h3>
                        <div>
                            <span>We are providing admission in Kathmandu University & Tribhuvan University</span>
                        </div>
                    </div>    
                </div>
                
                <div class="col-lg-4 col-md-6 align-self-center">
                    <div class="form-container">
                        <div class="card banner-card p-4 border-0 rounded-0 my-3">
                        <h2 class="text-center mb-4">Enquire Now</h2>
                    <form method="post" action="{{ url('banner-form') }}">
                        @if(Session::has('form_msg'))
                            {!! Session::get('form_msg') !!}
                        @endif
                        @csrf
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                 <input type="text" name="name" class="form-control" placeholder="Enter name *" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="tel" name="mobile" class="form-control" placeholder="Enter phone *" value="{{ old('mobile') }}" required>
                                @error('mobile')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="state" class="form-control">
                                    <option value="" selected>Select State</option>
                                    @foreach($state_list as $states)
                                        <option value="{{$states->state_name}}" data-id="{{$states->id}}">{{$states->state_name}}</option>
                                    @endforeach
                                </select>
                                
                                @error('state')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group  mb-1">
                                
                                <input type="hidden" name="landingpage"  value="{{ request()->segment(1) }}" required>
                                
                                <input type="email" name="email" class="form-control" placeholder="Enter Email *"  value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="form-field form-check col-lg-12">
							<input class="form-check-input" type="checkbox" name="agree" value="yes" required="">
						    <details>
                            <summary class="form-check-label limit-1">I, hereby authorize.. </summary>
                            <label class="form-check-label" style="text-align: justify;">I, hereby authorize mymedicalcourse.com, to contact me. It will override my registry on the NCPR. 
							By providing your contact details you have expressly authorized mymedicalcourse.com to contact you in future through calls /SMS / E-mails and inform you about our products</label>
                            </details>
						</div>
                                <input type="submit" class="btn my-button mt-2" value="Submit">
                        </div>
                    </div>
                    </form>
                </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !Banner -->
    
    <!-- Edge -->
    <section class="edge-section">
        <div class="container">
                    <h2 class="text-center mb-4">Services</h2>
                    
            <div class="row edge-row">
                <div class="col-lg-3 col-md-2 col-6 text-center">
                    <img alt="" src="{{ asset('assets/images/nepal/f1.png') }}">
                    <h6 class="mt-3">Provide Admission Guidelines </h6>
                </div>
                <div class="col-lg-3 col-md-2 col-6 text-center">
                    <img alt="" src="{{ asset('assets/images/nepal/f2.png') }}">
                    <h6 class="mt-3">Free Counselling By Experts </h6>
                </div>
                <div class="col-lg-3 col-md-2 col-6 text-center">
                    <img alt="" src="{{ asset('assets/images/nepal/f3.png') }}">
                    <h6 class="mt-3">Application Form Assistant</h6>
                </div>
                <div class="col-lg-3 col-md-2 col-6 text-center">
                    <img alt="" src="{{ asset('assets/images/nepal/f4.png') }}">
                    <h6 class="mt-3">Education Loan Assistant</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- !Edge -->
    
    <!-- Study Your Favourite Course -->
    <section class="course-section py-5">
        <div class="container">
            <h2 class="text-center mb-4">Study MBBS in Nepal</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-title-button">
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#engineering" aria-expanded="true" aria-controls="collapseOne">
                                Eligibility
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#business" aria-expanded="false" aria-controls="collapseOne">
                                Required Document
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#hotel" aria-expanded="false" aria-controls="collapseOne">
                                KU Medical
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#it" aria-expanded="false" aria-controls="collapseOne">
                                TU Medical
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#media" aria-expanded="false" aria-controls="collapseOne">
                                Top Colleges in Nepal
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#other" aria-expanded="false" aria-controls="collapseOne">
                                Why Nepal?
                            </button>
                            <button class="btn btn-primary course-btn m-none" type="button" data-toggle="collapse" data-target="#admissionprocess" aria-expanded="false" aria-controls="collapseOne">
                                Admission Process
                            </button>
                        
                        </div>
                    
                        <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#engineering" aria-expanded="true" aria-controls="collapseOne">
                                Eligibility
                        </button>
                        <div id="engineering" class="collapse show collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="col-md-12">
                    <h1 class="heading">Duration & Eligibility</h1>
                    <div>
                        <p>
                            The duration of Nepal MBBS is a total of 5 years and six months.
                            The first four years are reserved for theoretical and clinical education.
                            After completing four years of study, the student is expected to be engaged with an internship. 
                            The age of the medical student must not be less than 17 years.
                            Below 17 years of age, students are not permitted to apply for MBBS admission.
                            For getting MBBS admission in Nepal, the student must complete 12th grade.
                            Physics, Chemistry, and Biology should be the fundamental subjects in the sciences.
                            The candidate must score a minimum of 50% marks in all the subjects mentioned above.
                            Some of the medical universities in Nepal conduct entrance examinations.
                            The rules may be different from one university to another.
                        </p>
                    </div>
                </div>
                        </div>
                        
                        <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#business" aria-expanded="false" aria-controls="collapseOne">
                                Required Document
                            </button>
                        <div id="business" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="col-md-12">
                    <h1 class="heading">Document Required</h1>
                    <div class="p-4">
                        <ul>
                            <li>Birth certificate of the medical candidate.</li>
                            <li>10th and 10+2-mark sheets of the medical candidate.</li>
                            <li>School leaving certificate.</li>
                            <li>Certificate of conduct.</li>
                            <li>Medical fit certificate.</li>
                            <li>Nationality proof in the form of Aadhar card, PAN card, voter I.D., or any other valid I.D. proof. </li>
                            <li>Physics, Chemistry, and Biology should be the fundamental subjects in the sciences.</li>
                            <li>NEET scorecard result is mandatory, which the student must present during the time of admission. </li>
                            <li>For Indian students, there is no requirement to give a visa.</li>
                            <li>The university might ask for other vital documents. The students need to gather and submit them at the time of admission. </li>
                        </ul>
                    </div>
                </div>
                        </div>
                        
                         <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#hotel" aria-expanded="false" aria-controls="collapseOne">
                                KU Medical
                            </button>
                        <div id="hotel" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="col-md-12">
				
				<div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>College of Medical Sciences, Bharatpur</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Birat Medical College, Biratnagar</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Devdaha Medical College, Lumbini</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Kathmandu Medical College, Kathmandu</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Lumbini Medical College, Palpa</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Manipal College of Medical Sciences, Pokhara</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nepal Medical College, Kathmandu</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nepalgunj Medical College, Nepalgunj</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nobel Medical College, Biratnagar</h4>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
				
				
			</div>
                           <!-- <h4><b>Popular Courses :</b></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4><b>Dip. in Engineering</b></h4>
                                                    <h5><b>Duration:</b> 3 Years</h5>
                                                    <h6><b>Eligibility:</b> After 10th</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4><b>B.Tech</b></h4>
                                                    <h5><b>Duration:</b> 4 Years</h5>
                                                    <h6><b>Eligibility:</b> After 12th (PCM)</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4><b>B.Arch</b></h4>
                                                    <h5><b>Duration:</b> 4 Years</h5>
                                                    <h6><b>Eligibility:</b> After 12th (PCM)</h6>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4><b>M.Techg</b></h4>
                                                    <h5><b>Duration:</b> 2 Years</h5>
                                                    <h6><b>Eligibility:</b> B.Tech</h6>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>-->
                        </div>
                        
                         <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#it" aria-expanded="false" aria-controls="collapseOne">
                                TU Medical
                            </button>
                        <div id="it" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <h4><b>Popular Courses :</b></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Chitwan Medical College, Bharatpur</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Gandaki Medical College, Pokhara</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Janaki medical college, Janakpur</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>KIST Medical College & Teaching Hospital, Lalitpur</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>National Medical College, Birgunj</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nepalese Army Institute of Health Sciences (NAIHS),Kathmandu</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nepal Ayurved Medical College & Teaching Hospital, Birgunj</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Peoples Dental College, Nayabazar, Kathmandu</h4>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Lalitpur Nursing Campus, Lalitpur</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Universal College of Medical Sciences, Bhairhawa</h4>
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                         <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#media" aria-expanded="false" aria-controls="collapseOne">
                                Top Colleges in Nepal
                            </button>
                        <div id="media" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <!--<h4><b>Popular Courses :</b></h4>-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>IOM International Organization for Migration Nepal</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>Nepalese Army Institute of Health Sciences</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="item">
                                                    <h4>B.P. Koirala Institute of Health Sciences</h4>
                                                </div>
                                            </div>
                                            
                                
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#other" aria-expanded="false" aria-controls="collapseOne">
                                Why Nepal?
                            </button>
                        <div id="other" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="col-md-12">
                    <h1 class="heading">Why Nepal?</h1>
                    <div>
                        <p>MBBS in Nepal has a similar pattern to the MBBS course in India.
                        Nepal has some of the best medical, educational facilities. The most renowned medical sciences colleges in the country are KIST medical college, Nobel medical college, Lumbini medical college.
                        Medical universities in Nepal are famous for their reliability, security, and their rankings. All the students are offered excellent quality of theoretical and practical knowledge. MBBS in Nepal adopts a unique pattern and syllabus.
                        The cost of studying medicine in Nepal is lower as compared to INDIA.
                        MBBS fees in Nepal are economical when compared to universities in other foreign countries. 
                        The universities have well-equipped hostel facilities.</p>
                    </div>
                </div>
                        </div>
                        
                         <button class="btn btn-primary course-btn c-none w-100" type="button" data-toggle="collapse" data-target="#admissionprocess" aria-expanded="false" aria-controls="collapseOne">
                                Admission Process
                            </button>
                        <div id="admissionprocess" class="collapse collapse-body" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="col-md-12">
                    <h1 class="heading">Admission Process</h1>
                    <div class="p-4">
                        <ul>
                            <li>Birth certificate of the medical candidate.</li>
                            <li>10th and 10+2-mark sheets of the medical candidate.</li>
                            <li>School leaving certificate.</li>
                            <li>Certificate of conduct.</li>
                            <li>Medical fit certificate.</li>
                            <li>Nationality proof in the form of Aadhar card, PAN card, voter I.D., or any other valid I.D. proof. </li>
                            <li>Physics, Chemistry, and Biology should be the fundamental subjects in the sciences.</li>
                            <li>NEET scorecard result is mandatory, which the student must present during the time of admission. </li>
                            <li>For Indian students, there is no requirement to give a visa.</li>
                            <li>The university might ask for other vital documents. The students need to gather and submit them at the time of admission. </li>
                        </ul>
                    </div>
                </div>
                        </div>
                    </div>   
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !Study Your Favourite Course -->
    
    <!-- About -->
    <section class="about-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>About Us</h2>
                    <h3>End-to-End Free Counselling</h3>
                    <h4>Looking to get the best career guidance? Our experts know exactly what you need!</h4>
                    <p>
                        At Mymedicalcourse, academic experts help you evaluate your career and course choices accurately while taking into account your educational background, strengths & skills. From shortlisting the best colleges to tracking your entire admission process, the counselling by our experts will make your higher education journey hassle-free and put you on the path of success.
                    </p>
            
                </div>
                <div class="col-md-12 p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list">
                                <li>Tell us about your Medical College.</li>
                                <li>We will assign Counsellor for you.</li>
                                <li>Discuss about your desired college with counsellor.</li>
                                <li>Share your required document with counsellor for eligibility checking.</li>
                                <li>After verifying with college counsellor, will provide admission guidance.</li>
                                <li>Get your desired college, admission letter.</li>
                                <li>Hurry Up! Your dream college is waiting for you to join !</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i3.png') }}">
                                        <h6>No Hidden Charges</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i1.png') }}">
                                        <h6>1 on 1 Counselling</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i2.png') }}">
                                        <h6>24/7 Support</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i4.png') }}">
                                        <h6>Best Experts in India</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i5.png') }}">
                                        <h6>Travel & Luggage Support</h6>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="card features-cards">
                                        <img src="{{ asset('assets/images/nepal/i6.png') }}">
                                        <h6>Loan Support</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !About -->
    
     <!-- Search Form -->
    <!--<div class="search-form mb-2">
        <form method="get" action="{{url('colleges')}}">
            <input type="text" name="college" class="form-control my-form-element" placeholder="Search Colleges, Courses">
            
            <select name="state" class="form-control my-form-element" onchange="getCity(this.value,this);">
                <option value="" selected>Select Province</option>
                <option value="arun">Arun</option>
                <option value="janakpur">Janakpur</option>
                <option value="kathmandu">Kathmandu</option>
                <option value="gandaki">Gandaki</option>
                <option value="kapilavastu">Kapilavastu</option>
                <option value="karnali">Karnali</option>
                <option value="sudurpashchim">Sudurpashchim</option>
            </select>
            
            <select name="exam" class="form-control my-form-element">
                <option value="" selected>Select Exam</option>
                @foreach($exams as $exam)
                    <option value="{{$exam}}">{{$exam}}</option>
                @endforeach
            </select>
            
            <select name="degree" class="form-control my-form-element">
                <option value="" selected>Select Degree</option>
                <option value="MBBS/MD/MS">MBBS/MD/MS</option>
            </select>
    
            <button type="submit" name="search" class="btn my-button my-form-element">Search</button>
        </form>
    </div>-->
    <!-- ! Search Form -->
    
    @include('nepal.nepal_course_list')
    
    <!-- About -->
    <section class="about-section mt-4 px-4">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- ! About -->

    <!-- DURATION & ELIGIBILITY -->
    <section class="duration-and-eligibility-section px-4">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- ! DURATION & ELIGIBILITY -->
    
    <!-- DOCUMENT REQUIRED -->
    <section class="document-required-section px-4">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- ! DOCUMENT REQUIRED -->
    
    <!-- ADMISSION PROCESS -->
    <section class="admission-process-section px-4">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- ! DOCUMENT REQUIRED -->
    
    <!-- MCI Recognised Medical College -->
    <section class="admission-process-section px-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="heading">MCI Recognised Medical Colleges in Nepal</h1>
                    <div class="p-4">
                        <ul>
                            <li>B.P. Koirala Institute of Health Sciences</li>
                            <li>Kathmandu University</li>
                            <li>Patan Academy of Health Sciences</li>
                            <li>Tribhuvan University</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ! MCI Recognised Medical College -->

    <!-- Blogs -->
    @if(count($blogs))
        <section class="news-section container mt-5">
            <div class="row">
                <div class="col-md-4 section-heading px-4">
                    <p>Latest News</p>
                    <h2><a href="{{ url('news') }}">NEWS</a></h2>
                </div>
            </div>
    
            <div id="owl-demo">
                @foreach($blogs as $row)          
                    <div class="item">
                        <a href="{{ url('nepal/news/'.$row->slug) }}">
                            <img src="{{ ($row->thumbnail)?url('uploads/blog/'.$row->thumbnail):url('assets/images/no-image-400x400.png') }}" alt="">
                            <div class="owl-blur-div">
                                <h3>{{ $row->title }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
    <!-- !Blogs -->
    
    
    <!-- Videos -->
        <section class="news-section container mt-5">
            <div class="row m-0 p-0">
                <div class="col-md-8 section-heading col-6">
                    <p>Latest Videos</p>
                    <h2><a href="{{ url('videos') }}">Videos</a></h2>
                </div>
        
                <div class="col-md-4 section-heading text-right pt-3 col-6 px-2">
                    <a href="{{ url('nepal/videos') }}" style="color: #FF7B00;font-size: 15px;"><h2>All Video</h2></a>
                </div>
            </div>
        
            <div class="row m-0 p-0">
                @foreach($videos as $row)
                    <div class="col-md-3">
                        <div class="video-container">
                            <iframe width="100%" height="280" src="{{ $row->url }}"></iframe>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    <!-- !Videos -->
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
    navigation:true,
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
