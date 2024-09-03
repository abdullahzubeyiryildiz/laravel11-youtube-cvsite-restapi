<div id="skills">
    <div class="skills-section-area">
      <div class="container">
        <div class="row">
         <div class="col-lg-10">

          <div class="skills-header-area" data-aos="fade-left" data-aos-duration="800">
            <div class="pbmit-heading-subheading">
              <h4> <img src="assets/img/icons/star3.png" alt="">Yeteneklerim</h4>
              <h2 class="text-anime-style-3">Tecrübelerim</h2>
            </div>
          </div>

          <div class="all-boxes-area" data-aos="fade-left" data-aos-duration="1200">
            <div class="skils-auhtor-area">

                @if (!empty($skills) && $skills->count() > 0)
                @foreach ($skills->take(3) as $skill)
                <div class="skills-all-boxarea box{{$loop->iteration}}" >
                    <img src="assets/img/bg/polygon10.png" alt="" class="polygon2">
                    <img src="assets/img/bg/polygon11.png" alt="" class="polygon4">

                    <div class="content">
                    <div class="icons">
                      <img src="assets/img/icons/skills8.svg" alt="">
                    </div>
                    <p>{{$skill->name}}</p>
                    </div>
                  </div>
                @endforeach
            @endif

            </div>


            <div class="skils-auhtor-area" data-aos="fade-right" data-aos-duration="1000">
                @if (!empty($skills) && $skills->count() > 0)
                @foreach ($skills->skip(3) as $skill)
                <div class="skills-all-boxarea box{{3 + $loop->iteration}}" >
                    <img src="assets/img/bg/polygon10.png" alt="" class="polygon2">
                    <img src="assets/img/bg/polygon11.png" alt="" class="polygon4">

                    <div class="content">
                    <div class="icons">
                      <img src="assets/img/icons/skills8.svg" alt="">
                    </div>
                    <p>{{$skill->name}}</p>
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
  </div>
