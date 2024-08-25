<div id="service">
    <div class="service1-section-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">

            <div class="service-header-area">
              <div class="pbmit-heading-subheading">
                <span class="marketer">Hizmetler
                  <img src="assets/img/elements/elements5.png" alt="" class="elements1" data-aos="fade-left" data-aos-duration="800">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements2" data-aos="fade-right" data-aos-duration="1000">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements3" data-aos="fade-left" data-aos-duration="1100">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements4" data-aos="fade-right" data-aos-duration="1200">
                </span>
              </div>
            </div>

            <div class="service-boxs-area">

                @if (!empty($categories) && $categories->count() > 0)
                @php
                    $animationTimes = 700;
                @endphp
                @foreach ($categories as $key=> $category)
                    @php
                        $animationTimes + 100;
                    @endphp
                    @if ($loop->first)

                        <img src="assets/img/icons/star4.png" alt="" class="star2 keyframe5">
                        <div class="service-author-box box{{$loop->iteration}}" style="background-image: url(assets/img/bg/polygon9.png); background-position: center; background-repeat: no-repeat; background-size: contain;" data-aos="zoom-out" data-aos-duration="{{$animationTimes}}">
                        <div class="content">
                            <div class="icons">
                            <img src="{{asset($category->image)}}" alt="">
                            </div>
                            <p>{{$category->name}}</p>
                        </div>
                        </div>
                @else

                        <div class="service-author-box box{{$loop->iteration}}" data-aos="zoom-out" data-aos-duration="{{$animationTimes}}" style="background-image: url(assets/img/bg/polygon8.png); background-position: center; background-repeat: no-repeat; background-size: contain;">
                            <img src="assets/img/bg/polygon9.png" alt="" class="polygon2">
                            <div class="content">
                            <div class="icons">
                                <img src="{{asset($category->image)}}" alt="">
                            </div>
                            <p>{{$category->name}}</p>
                            </div>
                        </div>

                    @endif

    @endforeach
            @endif

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
