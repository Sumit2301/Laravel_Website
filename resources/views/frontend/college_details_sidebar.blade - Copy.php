  <div class="col-lg-4">
            <div class="learn-sidebar">
              <div class="categories-box">
                <h4>Exams</h4>
                <ul>
                  <li><a href="#">All Exams <span class="fa fa-long-arrow-alt-right"></span></a></li>
				  @foreach($exams as $exam)
                  <li><a href="#">{{$exam}}<span class="fa fa-long-arrow-alt-right"></span></a></li>
				  @endforeach
                </ul>
              </div>
              <div class="emergency-call-box">
                <h4>Any Query..?</h4>
                <p>Call our 24/7 customer support team at </p>
                <h3><i class="fa fa-phone"></i> &nbsp;+91 96266 95493</h3>
				<a href="https://wa.me/+919626695493/?text=Hi" class="btn btn-primary hvr-bounce-to-top theme-btn" target="_blank"><i class="fab fa-whatsapp"></i> 9626695493</a>
              </div>
            </div>
          </div>
        