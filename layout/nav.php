<header id="header" class="header-transparent">
  <div class="header-content">
    <div class="logo-container">
      <a href="index.php" class="logo">
        <img src="images/ayokebleberan.png" alt="Logo Bleberan" class="logo-img">
        <!-- <span class="logo-text">AYO KE BLEBERAN</span> -->
      </a>
    </div>

    <nav class="navigation" role="navigation">
      <ul class="nav-list">
        <li><a href="index.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Beranda</a></li>
        <li class="dropdown">
        <li class="dropdown wisata-dropdown">
          <a href="#" class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['sungai_oyo.php', 'goa-rancang-kencono.php']) ? 'active' : ''; ?>">
            Wisata
            <span class="dropdown-icon">▼</span>
          </a>
          <div class="dropdown-menu">
            <a href="sungai_oyo.php" class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'sungai_oyo.php' ? 'active' : ''; ?>">
              <i class="icon-river"></i> Sungai Oyo
            </a>
            <a href="goa_rancang_kencono.php" class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'goa_rancang_kencono.php' ? 'active' : ''; ?>">
              <i class="icon-cave"></i> Goa Rancang Kencono
            </a>
          </div>
        </li>
        <li><a href="galeri.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'galeri.php' ? 'active' : ''; ?>">Galeri</a></li>
        <li><a href="paket_wisata.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'paket_wisata.php' ? 'active' : ''; ?>">Paket Wisata</a></li>
        <li><a href="oleh-oleh.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'oleh-oleh.php' ? 'active' : ''; ?>">Oleh-Oleh</a></li>
        <li><a href="pab.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'pab.php' ? 'active' : ''; ?>">PAB</a></li>
        <li><a href="tentang.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'tentang.php' ? 'active' : ''; ?>">Tentang Kami</a></li>
      </ul>
    </nav>

    <button class="nav-toggle" aria-label="Toggle Menu">
      <span class="hamburger"></span>
    </button>
  </div>
</header>