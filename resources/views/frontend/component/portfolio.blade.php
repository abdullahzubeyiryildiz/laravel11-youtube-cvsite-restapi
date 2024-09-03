<div id="portfolio">
    <div class="portfolio-section-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <div class="portfolio-header-area">
              <div class="pbmit-heading-subheading">

                <span class="marketer">Çalışmalarım
                  <img src="assets/img/elements/elements5.png" alt="" class="elements1" data-aos="fade-left" data-aos-duration="800">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements2" data-aos="fade-right" data-aos-duration="1000">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements3" data-aos="fade-left" data-aos-duration="1100">
                  <img src="assets/img/elements/elements5.png" alt="" class="elements4" data-aos="fade-right" data-aos-duration="1200">
                </span>
              </div>
            </div>
            <div class="row">
                @if (!empty($projects) && $projects->count() > 0)
                    @foreach ($projects as $key => $project)
                    <div class="col-lg-6 col-md-6">
                        <div class="portfolio-box-area {{$key > 0 ? 'box'.$loop->iteration :  '' }} click-here" data-projectItem="{{$project->id}}">
                          <div class="images" data-aos="zoom-in" data-aos-duration="1000">
                            <img  src="{{asset($project->image)}}" alt="">
                          </div>
                          <div class="content-area" data-aos="flip-right" data-aos-duration="1000" style="background-image: url(assets/img/bg/bg6.png); background-position: center; background-size: cover; background-repeat: no-repeat;">
                            <h4>{{$project->name}}</h4>
                            <p>{!! $project->content !!}</p>
                          </div>
                        </div>
                      </div>
                    @endforeach
                @endif


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
