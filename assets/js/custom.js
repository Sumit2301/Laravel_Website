(function($) {

	"use strict";


    // Header Nav
     jQuery('#main-nav').stellarNav({
        theme: 'light',
        breakpoint: 1199,
        openingSpeed: 200,
        closingDelay: 50,
        position: 'right',
        sticky: false,
        menuLabel: '',
        closeLabel: ''
    });


     // scroll to add class jquery
     $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
          $(".myheader").addClass("stickyheader");
        } else {
          $(".myheader").removeClass("stickyheader");
        }
      });




    // Mouse hover layer parallax
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
      this.querySelectorAll('.layer').forEach(layer => {
        const speed = layer.getAttribute('data-speed');
        
        const x = (window.innerWidth - e.pageX * speed)/100;
        const y = (window.innerHeight - e.pageY * speed)/100;
        
        layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
      })
    }

   

    // testimonial-carousel
    if($('.testimonial-carousel').length){
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 70,
            dots: true,
            nav: false,
            autoplayHoverPause: false,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed: 1500,
            center: false,
            // navText: [
            //   '<i class="icofont-swoosh-left"></i>',
            //   '<i class="icofont-swoosh-right"></i>'
            // ],
            responsive: {
                0: {
                    items: 1,
                    center: false
                },
                480:{
                    items:1,
                    center: false
                },
                600: {
                    items: 1,
                    center: false
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        })
    }



    // accordion
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }



    // Background Image Call Script
    if ($('.background-image').length > 0) {
        $('.background-image').each(function () {
            var src = $(this).attr('data-src');
            $(this).css({
                'background-image': 'url(' + src + ')'
            });
        });
    }



    // Back To Top
    var btn = $('#button');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });




})(window.jQuery);