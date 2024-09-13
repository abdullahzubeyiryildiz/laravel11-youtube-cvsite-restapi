<div id="blog">
    <div class="blog-section-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="blog-header-area">
              <div class="pbmit-heading-subheading">
                <h4> <img src="assets/img/icons/star3.png" alt="">Makaleler</h4>
                <h2 class="text-anime-style-3">Blog</h2>
              </div>
            </div>
            <div class="row">

                @if ($blogs)
                    @foreach ($blogs as $key => $blog)
                    <div class="col-lg-6 col-md-6">
                        <div class="blog-box-area {{$key > 0 ? 'box'.$key+1 : ''}} blog-click-here" data-blogItem="{{$blog->id}}">
                          <div class="images" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="{{$blog->image}}" alt="">
                          </div>
                          <div class="content-area" data-aos="flip-right" data-aos-duration="1000">
                            <div class="tags-area">
                              <a href="#"><img src="assets/img/icons/calender.svg" alt="">{{\Carbon\Carbon::parse($blog->update_at)->format('d.m.Y')}}</a>

                            </div>
                            <a href="javascript:void(0);" class="text-anime-style-3">{{$blog->name}}</a><br>
                            <p>{!! $blog->content !!}</p><br>
                            <a href="javascript:void(0);" class="readmore"><span>Devamını Oku</span><i class="fa-solid fa-arrow-right"></i></a>
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
