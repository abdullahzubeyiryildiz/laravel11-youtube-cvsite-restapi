<div class="custom-model-main">
    <div class="custom-model-inner">
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
              <div class="row">
                <div class="col-lg-12">
                  <div class="opend-section">
                    <div class="row">
                      <div class="col-lg-7">
                        <div class="boxes-area">
                          <div class="img1">
                            <img class="projectImage" src="" alt="">
                          </div>
                          <div class="content">
                            <a href="#" class="projectName"></a>
                            <p class="projectContent"></p>

                          </div>
                        </div>
                      </div>

                      <div class="col-lg-5">
                        <div class="contact-from-area" data-aos="flip-right" data-aos-duration="1000">
                          <h3>Bana Ulaşın</h3>
                         <form id="formContact" method="POST">
                            @csrf
                          <div class="input">
                              <input type="text" name="name" placeholder="Ad Soyad">
                            </div>
                            <div class="input">
                              <input type="number" name="phone" placeholder="Telefon" required>
                            </div>
                            <div class="input">
                              <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input">
                                <input type="text" name="subject" placeholder="Konu" required>
                          </div>
                            <div class="input">
                              <textarea name="body" placeholder="Message" required></textarea>
                            </div>
                            <div class="btn-area text-end" data-aos="fade-up" data-aos-duration="1200">
                              <button type="submit" class="download-btn1">Gönder</button>
                            </div>

                            <div class="input">
                                <div class="alert alert-success status-check" style="display:none">Gönderildi</div>
                              </div>
                         </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
