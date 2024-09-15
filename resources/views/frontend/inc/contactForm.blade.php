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
