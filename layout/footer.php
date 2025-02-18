<!-- sponsorship -->
<section class="sponsorship">
  <div class="sponsorship-container">
    <div class="sponsor-logos">
      <div class="sponsor-logo">
        <img src="images/KOSABANGSA.png" alt="Kosabangsa">
      </div>
      <div class="sponsor-divider"></div>
      <div class="sponsor-logo">
        <div class="vertical-logos">
          <img src="images/amikom.png" alt="Amikom" width="150">
          <img src="images/akprind.png" alt="Akprind" width="150">
        </div>
      </div>
    </div>
    <div class="social-links">
      <a href="#" class="social-link">
        <img src="images/icon/instagram.svg" alt="Instagram">
      </a>
      <a href="#" class="social-link">
        <img src="images/icon/google.svg" alt="YouTube">
      </a>
    </div>
  </div>
</section>
<!-- sponsorship -->

<!-- Informasi  -->
<section class="contact-section">
  <div class="contact-grid">
    <div class="contact-item">
      <div class="icon">📍</div>
      <h5>LOKASI KAMI</h5>
      <p style="text-align:center;">Jl. Sisingamangaraja, Bleberan, Playen, Gunungkidul</p>
    </div>
    <div class="contact-item">
      <div class="icon">✉️</div>
      <h5>EMAIL</h5>
      <p style="text-align:center;">ayokebleberan.com</p>
    </div>
    <div class="contact-item">
      <div class="icon">📞</div>
      <h5>TELEPON</h5>
      <p style="text-align:center;">081233875545</p>
    </div>
  </div>
  <div class="map-container">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31611.194655717994!2d110.48381580016398!3d-7.957619039479377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7bad4c6d57fea1%3A0x170469182a5afcfe!2sBleberan%2C%20Playen%2C%20Gunung%20Kidul%20Regency%2C%20Special%20Region%20of%20Yogyakarta!5e0!3m2!1sen!2sid!4v1730470528230!5m2!1sen!2sid"
      width="100%"
      height="250"
      frameborder="0"
      style="border:0"
      allowfullscreen>
    </iframe>
  </div>
</section>
<!-- Informasi  -->
<!-- footer.php -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container" align="center">
      <div class="row1">
        <p>Copyright © 2024 ayokebleberan.com . Made by Tim Kosabangsa</p>
      </div>
    </div>
  </div>
</footer>

<div class="whatsapp-float-container">
  <div class="whatsapp-contact-menu" id="whatsappMenu">
    <a href="https://wa.me/6281233875545?text=Saya%20ingin%20bertanya%20tentang%20Wisata" target="_blank">Kontak Wisata</a>
    <a href="https://wa.me/6281233875545=Saya%20ingin%20bertanya%20tentang%20Pengelolaan%20Air%20Bersih" target="_blank">Kontak Pengelolaan Air Bersih</a>
  </div>
  <div class="whatsapp-float-btn" onclick="toggleWhatsappMenu()">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
  </div>
</div>

<style>
  /* Sponsorship */
  .sponsorship {
    min-height: 200px;
    padding: 50px 20px;
    background: linear-gradient(to bottom, #ffffff, #f8f8f8);
    border-top: 1px solid #eaeaea;
  }

  .sponsorship-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 40px;
  }

  .sponsor-logos {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 30px;
    width: 100%;
  }

  .sponsor-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 60px;
    transition: transform 0.3s ease;
  }

  /*logo Kosabangsa */
  .sponsor-logo img {
    height: 60px;
    width: auto;
    object-fit: contain;
    transition: all 0.3s ease;
  }

  /* logos (Amikom & Akprind) */
  .vertical-logos {
    display: flex;
    flex-direction: column;
    gap: 15px;
    align-items: center;
  }

  .vertical-logos img {
    width: 150px;
    height: auto;
    object-fit: contain;
  }

  .sponsor-logo:hover {
    transform: translateY(-2px);
  }

  .sponsor-divider {
    height: 1px;
    width: 100%;
    background: linear-gradient(to right,
        transparent,
        rgba(0, 0, 0, 0.1),
        transparent);
    margin: 20px 0;
  }

  .social-links {
    display: flex;
    gap: 18px;
    align-items: center;
  }

  .social-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background-color: #f8f8f8;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
  }

  .social-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
  }

  .social-link img {
    width: 22px;
    height: 22px;
    object-fit: contain;
  }

  @media (min-width: 768px) {
    .sponsorship-container {
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
    }

    .sponsor-logos {
      flex-direction: row;
      justify-content: center;
      gap: 40px;
    }

    .sponsor-divider {
      height: 80px;
      width: 1px;
      margin: 0 25px;
      background: linear-gradient(to bottom,
          transparent,
          rgba(0, 0, 0, 0.1),
          transparent);
    }
  }

  /* Desktop */
  @media (min-width: 1200px) {
    .sponsorship {
      padding: 60px 20px;
    }

    .sponsor-logo img {
      height: 60px;
    }

    .vertical-logos img {
      width: 150px;
    }
  }

  .contact-section {
    padding: 4rem 0;
    background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h20v20H0z' fill='%233498db' fill-opacity='0.05'/%3E%3Cpath d='M0 0h10v10H0zm10 10h10v10H10z' fill='%232980b9' fill-opacity='0.03'/%3E%3C/svg%3E");
    background-repeat: repeat;
    background-size: contain;

  }

  .contact-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }

  .contact-item {
    text-align: center;
    /* background-color: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
    transition: transform 0.3s ease;
  }

  .contact-item:hover {
    transform: translateY(-10px);
  }

  .contact-item .icon {
    font-size: 2.5rem;
    color: var(--secondary-color);
    margin-bottom: 1rem;
  }

  .contact-item h5 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
  }

  .map-container {
    max-width: 1200px;
    margin: 2rem auto;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  @media (max-width: 768px) {
    .contact-grid {
      grid-template-columns: 1fr;
    }
  }

  /* Gaya untuk tombol WhatsApp */
  .whatsapp-float-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
  }

  .whatsapp-float-btn {
    width: 60px;
    height: 60px;
    background-color: #25D366;
    color: white;
    border-radius: 50%;
    text-align: center;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .whatsapp-float-btn img {
    width: 35px;
    height: 35px;
  }

  .whatsapp-contact-menu {
    position: absolute;
    bottom: 70px;
    right: 0;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    display: none;
    width: 250px;
  }

  .whatsapp-contact-menu.show {
    display: block;
  }

  .whatsapp-contact-menu a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #333;
    border-bottom: 1px solid #eee;
    transition: background-color 0.3s;
  }

  .whatsapp-contact-menu a:hover {
    background-color: #f0f0f0;
  }

  .whatsapp-contact-menu a:last-child {
    border-bottom: none;
  }

  @media (max-width: 768px) {
    .whatsapp-float-container {
      position: fixed;
      bottom: 30px;
      right: 30px;
      z-index: 1000;
    }
  }
</style>

<script>
  function toggleWhatsappMenu() {
    const menu = document.getElementById('whatsappMenu');
    menu.classList.toggle('show');
  }

  // Tutup menu jika mengklik di luar area
  document.addEventListener('click', function(event) {
    const container = document.querySelector('.whatsapp-float-container');
    const menu = document.getElementById('whatsappMenu');

    if (!container.contains(event.target) && menu.classList.contains('show')) {
      menu.classList.remove('show');
    }
  });
</script>