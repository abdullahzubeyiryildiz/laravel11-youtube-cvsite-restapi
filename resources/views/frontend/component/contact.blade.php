<div id="contact">
    <div class="contact-section-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-header-area">
              <div class="row">
                <div class="col-lg-4">
                  <div class="contact-from-area" data-aos="flip-right" data-aos-duration="1000">
                    <h3 class="text-anime-style-3">Bize Mesaj Gönderin</h3>

                    @include('frontend.inc.contactForm')
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="contact-text-area">
                    <div class="pbmit-heading-subheading">
                      <h2 class="text-anime-style-3">{{$setting['content_title']}} </h2>
                    </div>
                    <p data-aos="fade-up" data-aos-duration="800">{!! $setting['content_content'] !!}</p>
                    <div class="contact-info-area">
                      <div class="info-boxarea" data-aos="zoom-out" data-aos-duration="1000">
                        <div class="icons">
                          <img src="assets/img/icons/phone2.svg" alt="">
                        </div>
                        <div class="content">
                          <h5>Telefon</h5>
                          <a href="tel:281-789-6642">{{$setting['phone']}}</a>
                        </div>
                      </div>

                      <div class="info-boxarea" data-aos="fade-up" data-aos-duration="1100">
                        <div class="icons">
                          <img src="assets/img/icons/email2.svg" alt="">
                        </div>
                        <div class="content">
                          <h5>E-Posta</h5>
                          <a href="mailto:">{{$setting['email']}}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="footer-section-area" data-aos="fade-up" data-aos-duration="1200" style="background-image: url(assets/img/bg/footer-bg2.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <div class="footer-form-area text-center pbmit-heading-subheading">
                      <h2 class="text-anime-style-3">Sign up to newsletter</h2>
                      <form>
                        <input type="email" placeholder="Email Address*">
                        <button type="submit">Subscribe now</button>
                      </form>
                    </div>
                    <div class="social-links-area">
                      <ul>
                        <li data-aos="zoom-out" data-aos-duration="800"><a href="#"><img src="assets/img/icons/facebook.svg" alt=""> facebook</a></li>
                        <li data-aos="zoom-out" data-aos-duration="900"><a href="#"><img src="assets/img/icons/instagram.svg" alt=""> Instagram</a></li>
                        <li data-aos="zoom-out" data-aos-duration="1000"><a href="#" class="twitter"><img src="assets/img/icons/twitter.svg" alt=""> twitter</a></li>
                        <li data-aos="zoom-out" data-aos-duration="1100"><a href="#"><img src="assets/img/icons/linkedin.svg" alt=""> linkedin</a></li>
                        <li data-aos="zoom-out" data-aos-duration="1200"><a href="#"><img src="assets/img/icons/dribble.svg" alt=""> Dribbble</a></li>
                      </ul>
                    </div>
                    <div class="copyright-pera">
                      <p>© 2024 Personal Portfolio. All Rights Reserved Designed By Fleexstudio</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
