<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PICO || Personal Portfolio</title>

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="assets/img/logo/logo3.png" type="image/x-icon">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/mobile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owlcarousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    <!--=====  JS SCRIPT LINK =======-->
    <script src="{{asset('assets/js/plugins/jquery-3-6-0.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
</head>
<body class="homepage2-body">
    <!--===== PRELOADER STARTS =======-->
    <div class="overlay flex cac vac preloader-parent">
      <div>
          <div class="loader preloader flex vac">
              <svg width="200" height="200" >
                  <circle class="background" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)"/>
                  <circle class="outer" cx="90" cy="90" r="80" transform="rotate(-90, 100, 90)"/>
              </svg>
              <span class="circle-background">
              </span>
              <span class="logo animated keyframe6 fade-in">
                   <img src="assets/img/logo/logo3.png" alt="">
              </span>
          </div>
      </div>
    </div>
  <!--===== PRELOADER ENDS =======-->

<!--===== PROGRESS STARTS=======-->
<div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
      </svg>
    </div>
  </div>
<!--===== PROGRESS ENDS=======-->

<div class="cursor cursor2"></div>
 <!--===== MOBILE HEADER STARTS =======-->
 @include('frontend.inc.mobil-header')
<!--===== MOBILE HEADER STARTS =======-->

<!--===== HEADER STARTS =======-->
<div class="header-section-area" style="background-image: url(assets/img/bg/pagebg2.png); background-position: center; background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
       @include('frontend.inc.mobile-sidebar')
      </div>
      <div class="col-lg-10">
       @yield('content')

    <!--===== SIDEBAR STARTS=======-->
       @include('frontend.inc.modal')
   <!--===== SIDEBAR ENDS STARTS=======-->
    </div>
  </div>
</div>
</div>
<!--===== HEADER ENDS=======-->

<!--===== JS SCRIPT LINK =======-->
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/fontawesome.js')}}"></script>
<script src="{{asset('assets/js/plugins/aos.js')}}"></script>
<script src="{{asset('assets/js/plugins/counter.js')}}"></script>
<script src="{{asset('assets/js/plugins/gsap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/Splitetext.js')}}"></script>
<script src="{{asset('assets/js/plugins/sidebar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/mobilemenu.js')}}"></script>
<script src="{{asset('assets/js/plugins/owlcarousel.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/nice-select.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
