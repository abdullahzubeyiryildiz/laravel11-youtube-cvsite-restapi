<div id="home">
    <div class="header-textarea">
    <div class="pbmit-heading-subheading">
    <h4 class="text-anime-style-3"><img src="assets/img/icons/hand1.svg" alt="">{{$slider->name}}</h4>
    <h1 class="text-anime-style-3">{{$slider->title}}</h1>
    <span class="marketer">{{$slider->role}}
        <img src="assets/img/elements/elements5.png" alt="" class="elements1" data-aos="fade-left" data-aos-duration="800">
        <img src="assets/img/elements/elements5.png" alt="" class="elements2" data-aos="fade-right" data-aos-duration="1000">
        <img src="assets/img/elements/elements5.png" alt="" class="elements3" data-aos="fade-left" data-aos-duration="1100">
        <img src="assets/img/elements/elements5.png" alt="" class="elements4" data-aos="fade-right" data-aos-duration="1200">
    </span>
    </div>
    <div class="row">
    <div class="col-lg-6">
        <div class="pbmit-animation-style3">
        <div class="progress-one_leftbox">
            <img src="assets/img/elements/elements4.png" alt="" class="elements3 d-lg-block d-none">
            <img src="assets/img/bg/side-bg3.png" alt="" class="side-bg1">
            <img src="assets/img/bg/side-bg4.png" alt="" class="side-bg2">
            <img src="{{asset($slider->image)}}" alt="" class="side-bg3">
        </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="header-pera-area">
        <p data-aos="fade-up" data-aos-duration="900">{!! $slider->content !!}</p>
        <div class="btn-area" data-aos="fade-up" data-aos-duration="1200">
            <a href="assets/img/cv/cv2.pdf" download class="download-btn1"><img src="assets/img/icons/download.svg" alt="">Download CV</a>
            <a href="{{$slider->video_link}}" class="play-btn1 popup-youtube"> <img src="assets/img/elements/elements6.png" alt="" class="elements4"><span><i class="fa-solid fa-play"></i>></span>Play Video</a>
    </div>
    <div class="socila-links-area">
            <h5>Sosyal Medya</h5>
            <ul>
            <li data-aos="zoom-in" data-aos-duration="700"><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li data-aos="zoom-in" data-aos-duration="800"><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li data-aos="zoom-in" data-aos-duration="900"><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li data-aos="zoom-in" data-aos-duration="1000"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li data-aos="zoom-in" data-aos-duration="1100"><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
            </ul>
      </div>
        </div>
    </div>
    </div>
    </div>
</div>
