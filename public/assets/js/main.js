;(function($){
 var url = "http://cvsitesi.test";
 var token = "8|hzOBu9PSp9f7XsesRc2mffranH4gSJkwwjiKOxtrc815d1e8";
$(document).ready(function(){

//========== POPUP AREA ============= //
$(".click-here").on('click', function(e) {
    e.preventDefault();
    var projectId = $(this).attr('data-projectItem');

    $.ajax({
        url: url+ '/api/project/' + projectId,
        type: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        },
        dataType: 'json',
        success: function(response) {
            //assets/img/all-images/blog-img1.png
            $('.cardImage').attr('src',url+'/'+response.image);
            $('.cardImage').attr('alt',response.name);
            $('.cardName').text(response.name);
            $('.cardContent').text(response.content);
            $(".custom-model-main").addClass('model-open');
        },
        error: function(xhr, status, error) {

        }
    });

});


$(".blog-click-here").on('click', function(e) {
    e.preventDefault();
    var blogId = $(this).attr('data-blogItem');

    $.ajax({
        url: url+ '/api/blog/' + blogId,
        type: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        },
        dataType: 'json',
        success: function(response) {
            //assets/img/all-images/blog-img1.png
            $('.cardImage').attr('src',url+'/'+response.image);
            $('.cardImage').attr('alt',response.name);
            $('.cardName').text(response.name);
            $('.cardContent').text(response.content);
            $(".custom-model-main").addClass('model-open');
        },
        error: function(xhr, status, error) {

        }
    });

});

$("#formContact").on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: url + '/api/contact/store',
        type: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
        },
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
           $('.status-check').show();

           setTimeout(function(){
            $(".custom-model-main").removeClass('model-open');
            }, 3000);

            $("#formContact")[0].reset();
        },
        error: function(xhr, status, error) {
           console.error(error);
        }
    });
  });




$("#formSubscribe").on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: url + '/api/subscribe/store',
        type: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`,
        },
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
            $("#formSubscribe")[0].reset();
            $('.messageText').text(response.message);
        },
        error: function(xhr, status, error) {
            $('.messageText').css('color','#fff').text(xhr.responseJSON.message);
            $("#formSubscribe")[0].reset();
        }
    });
  });



$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});

//========== PAGE PROGRESS STARTS ============= //
  var progressPath = document.querySelector(".progress-wrap path");
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition =
  "none";
  progressPath.style.strokeDasharray = pathLength + " " + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition =
    "stroke-dashoffset 10ms linear";
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength) / height;
    progressPath.style.strokeDashoffset = progress;
  };
  updateProgress();
  $(window).scroll(updateProgress);
  var offset = 50;
  var duration = 550;
  jQuery(window).on("scroll", function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery(".progress-wrap").addClass("active-progress");
    } else {
      jQuery(".progress-wrap").removeClass("active-progress");
    }
  });
  jQuery(".progress-wrap").on("click", function (event) {
    event.preventDefault();
    jQuery("html, body").animate({ scrollTop: 0 }, duration);
    return false;
  });
//========== PAGE PROGRESS STARTS ============= //

//========== VIDEO POPUP STARTS ============= //
   if ($(".popup-youtube").length > 0) {
    $(".popup-youtube").magnificPopup({
    type: "iframe",
    });
    }
//========== VIDEO POPUP ENDS ============= //
AOS.init;
AOS.init({disable: 'mobile'});

//========== NICE SELECT ============= //
$('select').niceSelect();

});
//========== COUNTER UP============= //
const ucounter = $('.counter');
if (ucounter.length > 0) {
 ucounter.countUp();
};
//========== TESTIMONIAL AREA ============= //
// testimonial //
$('.all-content-testimonial').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots:false,
    items:10,
    navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>",],
    autoplay:true,
    smartSpeed:2000,
    autoplayTimeout:4000,
    responsiveClass:true,
    responsive:{
    0:{
      items:1,
    },
    600:{
      items:1,
    },
    1000:{
      items:1,
    }
    }
});

$('.area2-testimonial').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    dots:false,
    items:10,
    navText: ["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>",],
    autoplay:true,
    rtl:true,
    smartSpeed:2000,
    autoplayTimeout:4000,
    responsiveClass:true,
    responsive:{
    0:{
      items:1,
    },
    600:{
      items:1,
    },
    1000:{
      items:1,
    }
    }
});

//========== PRELOADER ============= //
$(window).on("load", function (event) {
  setTimeout(function () {
    $(".preloader-parent").fadeToggle();
  }, 800);
});
//========== PRELOADER AREA ============= //

//========== CURSOR AREA ============= //
const cursor = document.querySelector('.cursor');
document.addEventListener('mousemove', e => {
cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
})
document.addEventListener('click', () => {
cursor.classList.add("expand");
setTimeout(() => {
cursor.classList.remove("expand");
}, 500)
})

//========== GSAP AREA ============= //

// GSAP TEXT ANIMATION //

if ($('.text-anime-style-1').length) {
  let staggerAmount 	= 0.05,
    translateXValue = 0,
    delayValue 		= 0.5,
     animatedTextElements = document.querySelectorAll('.text-anime-style-1');

  animatedTextElements.forEach((element) => {
    let animationSplitText = new SplitText(element, { type: "chars, words" });
      gsap.from(animationSplitText.words, {
      duration: 1,
      delay: delayValue,
      x: 20,
      autoAlpha: 0,
      stagger: staggerAmount,
      scrollTrigger: { trigger: element, start: "top 85%" },
      });
  });
}

if ($('.text-anime-style-2').length) {
  let	 staggerAmount 		= 0.05,
     translateXValue	= 20,
     delayValue 		= 0.5,
     easeType 			= "power2.out",
     animatedTextElements = document.querySelectorAll('.text-anime-style-2');

  animatedTextElements.forEach((element) => {
    let animationSplitText = new SplitText(element, { type: "chars, words" });
      gsap.from(animationSplitText.chars, {
        duration: 1,
        delay: delayValue,
        x: translateXValue,
        autoAlpha: 0,
        stagger: staggerAmount,
        ease: easeType,
        scrollTrigger: { trigger: element, start: "top 85%"},
      });
  });
}

if ($('.text-anime-style-3').length) {
  let	animatedTextElements = document.querySelectorAll('.text-anime-style-3');

   animatedTextElements.forEach((element) => {
    if (element.animation) {
      element.animation.progress(1).kill();
      element.split.revert();
    }
    element.split = new SplitText(element, {
      type: "lines,words,chars",
      linesClass: "split-line",
    });
    gsap.set(element, { perspective: 400 });

    gsap.set(element.split.chars, {
      opacity: 0,
      x: "50",
    });

    element.animation = gsap.to(element.split.chars, {
      scrollTrigger: { trigger: element,	start: "top 90%" },
      x: "0",
      y: "0",
      rotateX: "0",
      opacity: 1,
      duration: 1,
      ease: Back.easeOut,
      stagger: 0.02,
    });
  });
}


})(jQuery);


