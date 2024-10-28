<style>
/*.college-div{
    min-height: 75vh;
}  */
</style>
<div class="col-md-3 right-panel" style="display:block;">

      <!--<div class="query-section mb-3">-->
        <!--<h3>Any Query..?</h3>
        <p>Call our 24/7 customer support</p>-->
        <!--<a href="tel:+919176452483"><h3><i class="fas fa-phone"></i> +91 9176452483</h3></a>-->
        <!--<a href="tel:+91962669549"><button class="whatsapp-white-button btn btn-primary"><i class="fab fa-whatsapp"></i>9626695493</button></a>-->
      <!--</div>-->
      <div class="query-section mt-0 mb-3">
        <!--<h3>Any Query..?</h3>
        <p>Call our 24/7 customer support</p>-->
        <a href="tel:+911234567890"><h3><i class="fas fa-phone"></i> +91 1234567890</h3></a>
        <!--<a href="tel:+91962669549"><button class="whatsapp-white-button btn btn-primary"><i class="fab fa-whatsapp"></i>9626695493</button></a>-->
      </div>
      <div class="single-college-card single-college-card-right pt-3 pb-3">
        <div class="row m-0 p-0 buttons">
          <div class="col-12"><button type="button" class="btn btn-primary btn-1" onclick="showInterest('<?= (isset($college) && isset($college->name))?$college->name:'' ?>','College')"><img src="{{ asset('assets/site') }}/images/apply-now-icon.svg" class="download-icon">Apply Now</button></div>
          <div class="col-12 mt-3"> <button type="button" class="btn btn-primary btn-2" onclick="downloadBrochure()"><img src="{{ asset('assets/site') }}/images/download-blue-icon.svg" class="download-icon">Brochure</button></div>
          <div class="col-12 mt-3"> <a href="{{ url('college-details-pdf') }}/<?= $college->id; ?>" class="btn btn-primary btn-2 w-100"><img src="{{ asset('assets/site') }}/images/download-blue-icon.svg" class="download-icon">&nbsp;Download</a></div>
        </div>
      </div>

      <!-- @if(isset($exams))
      <div class="exams-section">
        <h2>Exams</h2>
        <hr>
        <a href="{{ url('exams')}}"><div class="single-exam">All Exams<i class="fas fa-arrow-right"></i></div></a>
        @foreach($exams as $exam)
        <a href="{{url('exams/'.$exam->url)}}"><div class="single-exam">{{$exam->name}}<i class="fas fa-arrow-right"></i></div></a>
        @endforeach
      </div>
      @endif -->
      

      <div class="mb-5">
        <h5 style="margin-top:25px;">Share:</h5>
        <style>
            .product-social-share li {
                display:inline;
                margin-right:8px;
            }
            .product-social-share a {
                height: 30px;
                width: 30px;
                border-radius: 50%;
                display: inline-block;
                text-align: center;
            }
            .product-social-share a i {
                color:#fff;
                font-size: 14px;
            }
            .product-social-share a span {
                color: #fff;
            }
            .product-social-share .svg-inline--fa {
                width: 16px;
                height:16px;
                margin-bottom: -4px;
            }
            .product-social-share .facebook a{
                background-color: #3b5998;
                line-height: 30px;
            }
            .product-social-share .twitter a{
                background-color: #00acee;
                line-height: 30px;
            }
            .product-social-share .viber a{
                background-color: #794f99;
                line-height: 30px;
            }
            .product-social-share .whatsapp a{
                background-color: #12bc19;
                line-height: 30px;
            }
            .product-social-share .linkedin a{
                background-color: #0e76a8;
                line-height: 30px;
            }
            .product-social-share .pinterest a{
                background-color: #cd001f;
                line-height: 30px;
            }
            @media only screen and (min-width: 768px) {
                .fb-mobile {
                    display:none!important;
                }
            }
            @media only screen and (max-width: 768px) {
                .fb-desk {
                    display:none!important;
                }
            }
        </style>

        <ul class="product-social-share">
            <li class="facebook fb-mobile"><a href="javascript:void()" onclick="onShare()" class="social-facebook" rel="external" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="facebook fb-desk"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= request()->url() ?>" class="social-facebook" rel="external" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li class="twitter"><a href="https://twitter.com/intent/tweet?text=<?= str_replace('&','-',$college->name) ?>&amp;url=<?= request()->url() ?>" class="social-twitter" rel="external" target="_blank" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
            <!--<li class="whatsapp"><a href="https://api.whatsapp.com/send?text=<?= str_replace('&','-',$college->name) ?> <?= request()->url() ?>" class="social-google-plus" rel="external" target="_blank" title="Share on Whatsapp"><i class="fab fa-whatsapp"></i></a></li>-->
            <li class="whatsapp"><a href="https://api.whatsapp.com/send?text=<?= str_replace('&','-',$college->name) ?> <?= request()->url() ?>" class="social-google-plus" rel="external" target="_blank" title="Share on Whatsapp"><i class="fab fa-whatsapp"></i></a></li>
            <li class="linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= request()->url() ?>&amp;title=<?= str_replace('&','-',$college->name) ?>" class="social-linkedin" rel="external" target="_blank" title="Share on LinkedIn"><i class="fab fa-linkedin"></i></a></li>
            <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?= request()->url() ?>&amp;description=<?= str_replace('&','-',$college->name) ?>" class="social-pinterest" rel="external" target="_blank" title="Share on Pinterest"><i class="fab fa-pinterest"></i></a></li>
        </ul>
      </div>