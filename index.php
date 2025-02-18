<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
  $statusPsn = $sesiData['status']['msg'];
  $jenisStatusPsn = $sesiData['status']['type'];
  unset($_SESSION['sesiData']['status']);
}

require_once('bdd.php');
require_once('koneksi.php');

// Simpan IP Pengunjung jika belum tercatat
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Cek apakah IP sudah tercatat
$query_check_ip = "SELECT * FROM visitors_ip WHERE visitor_ip = '$visitor_ip'";
$result_check_ip = mysqli_query($connect, $query_check_ip);

if (mysqli_num_rows($result_check_ip) == 0) {
  // Jika belum ada, masukkan IP ke tabel visitors_ip
  $insert_ip_query = "INSERT INTO visitors_ip (visitor_ip) VALUES ('$visitor_ip')";
  mysqli_query($connect, $insert_ip_query);

  // Update visitor counter di site_stats
  $update_counter_query = "UPDATE site_stats SET visitor_counter = visitor_counter + 1 WHERE id = 1";
  mysqli_query($connect, $update_counter_query);
}

// Query untuk mengambil data statistik pengunjung
$query = "SELECT * FROM site_stats ORDER BY id DESC LIMIT 1";
$result = mysqli_query($connect, $query);
$stats = mysqli_fetch_assoc($result);

// Query untuk mengambil artikel
$query_artikel = "SELECT * FROM artikel ORDER BY id DESC";
$artikel_result = mysqli_query($connect, $query_artikel);

// Query untuk mengambil events
$sql = "SELECT id, title, keterangan, start, end, color FROM events";
$req = $bdd->prepare($sql);
// $req->execute(); // Uncomment jika menggunakan database yang terhubung dengan $bdd
$events = $req->fetchAll();

//query testtimonial
$query_testimonial = "SELECT * FROM testimonial ORDER BY created_at DESC";
$result_testimonial = mysqli_query($connect, $query_testimonial);

// Periksa apakah query berhasil
if (!$result_testimonial) {
  echo "Error: " . mysqli_error($connect);
  exit; // Hentikan eksekusi jika query gagal
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website Resmi wisata Desa Bleberan</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/jquery.fancybox.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/font-icon.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/ayokebleberan.png">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/artikel.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
        font-family: "Poppins", sans-serif;
        line-height: 1.6;
      }
     </style>
</head>

<body>
  <!-- Navbar -->
  <?php include './layout/nav.php'; ?>

  <!-- Banner Section -->
  <section class="banner" role="banner">
    <div class="bg-color"></div>
  </section>

  <!-- Intro Section -->
  <section id="intro" class="intro">
    <div class="intro-container">
      <div class="intro-text">
        <h2 class="section-title">Sugeng Rawuh</h2>
        <p class="intro-description">
          Selamat datang di Desa Wisata Bleberan, permata tersembunyi di Gunungkidul, Yogyakarta, yang menghadirkan petualangan alam yang tak terlupakan. Nikmati serunya menyusuri aliran memesona Sungai Oyo, dan temukan keindahan eksotis Goa Rancang Kencono. Ayo, jelajahi pesona alam yang memikat di jantung Bleberan dan ciptakan kenangan penuh kesan!
        </p>

        <div class="intro-stats">
          <div class="stat-item">
            <div class="stat-number"><?php echo isset($stats['destinasi_count']) ? $stats['destinasi_count'] : '5'; ?>+</div>
            <div class="stat-label">Destinasi Wisata</div>
          </div>
          <div class="stat-item">
            <div class="stat-number"><?php echo isset($stats['visitor_counter']) ? $stats['visitor_counter'] : '0'; ?>+</div>
            <div class="stat-label">Pengunjung Website</div>
          </div>
          <div class="stat-item">
            <div class="stat-number"><?php echo isset($stats['rating_value']) ? $stats['rating_value'] : '4.8'; ?></div>
            <div class="stat-label">Rating Wisata</div>
          </div>
        </div>

        <?php if (isset($_SESSION['admin'])) { ?>
          <!-- Admin Update Stats Form -->
          <div class="admin-stats-form">
            <h4>Update Statistik Website</h4>
            <form id="updateStatsForm" method="post" action="proses_update_stats.php">
              <div class="form-group">
                <label>Jumlah Destinasi Wisata</label>
                <input type="text" class="stats-input" name="destinasi" value="<?php echo isset($stats['destinasi_count']) ? $stats['destinasi_count'] : ''; ?>" required>
              </div>

              <div class="form-group">
                <label>Jumlah Pengunjung per Bulan</label>
                <input type="text" class="stats-input" name="pengunjung" value="<?php echo isset($stats['visitor_counter']) ? $stats['visitor_counter'] : ''; ?>" required>
              </div>

              <div class="form-group">
                <label>Rating Wisata</label>
                <input type="number" class="stats-input" name="rating" step="0.1" value="<?php echo isset($stats['rating_value']) ? $stats['rating_value'] : ''; ?>" required>
              </div>

              <div class="form-actions">
                <button type="submit" class="stats-btn">Update Statistik</button>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>

      <div class="intro-gallery">
        <div class="gallery-item">
          <img src="images/IMG_8919.png" alt="Pemandangan Utama">
        </div>
        <div class="gallery-item">
          <img src="images/IMG_9030.png" alt="Spot Wisata 1">
        </div>
        <div class="gallery-item">
          <img src="images/walpaper.png" alt="Spot Wisata 2">
        </div>
      </div>
    </div>
  </section>

  <!-- intro  -->
  <!-- Destinasi wisata -->
  <section class="section text-center">
    <div class="container">
       <h2 class="section-title">Destinasi Wisata</h2>

      <div class="destination">
        <img src="images/home-sungai.jpg" alt="Sungai Oyo" class="img-responsive">
        <div class="destination-content box">
          <h2 class="section-title">Sungai Oyo</h3>
           <p class="intro-description">
            Bleberan adalah destinasi wisata di Kabupaten Gunungkidul yang menawarkan pengalaman seru dan menyenangkan di tengah keindahan alam. Salah satu daya tarik utamanya adalah Sungai Oyo, yang membentang dengan airnya yang jernih dan dikelilingi tebing-tebing karst yang megah. Pengunjung dapat menikmati aktivitas seru seperti menyusuri sungai dengan perahu rakit tradisional, yang memberikan sensasi tenang sambil menikmati panorama alami. Bagi pecinta tantangan, tersedia wahana flying fox yang melintasi sungai, memberikan pengalaman mendebarkan dengan pemandangan luar biasa dari ketinggian.
          </p>
          <a href="sungai_oyo.php" class="btn-custom">Lihat Selengkapnya</a>
        </div>
      </div>

      <div class="destination">
        <img src="images/goa.jpg" alt="Goa Rancang Kencono" class="img-responsive">
        <div class="destination-content box">
          <h2 class="section-title">Goa Rancang Kencono</h3>
           <p class="intro-description">
            Goa Rancang Kencono adalah salah satu daya tarik wisata sejarah dan alam di Bleberan. Goa ini menyimpan cerita dari masa lalu, lengkap dengan keindahan stalaktit dan stalakmit yang memukau. Goa ini sering digunakan untuk kegiatan wisata edukasi maupun eksplorasi. Keunikannya menjadikan Goa Rancang Kencono sebagai destinasi yang wajib dikunjungi bagi wisatawan yang mencintai keindahan alam dan sejarah budaya.
          </p>
          <a href="goa_rancang_kencono.php" class="btn-custom">Lihat Selengkapnya</a>
        </div>
      </div>
    </div>
  </section>

  <style>
    .section-titlee {
      font-size: 2rem;
      font-weight: 700;
      color: #0056b3;
      margin-bottom: 40px;
    }

    .destination {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-around;
      margin-bottom: 40px;
      gap: 20px;
    }

    .img-responsive {
      width: 100%;
      max-width: 400px;
      height: auto;
      border-radius: 10px;
      transition: transform 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .img-responsive:hover {
      transform: scale(1.05);
    }

    .destination-content {
      max-width: 500px;
      text-align: left;
      position: relative;
    }

    .box {
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .destination-content h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #0056b3;
      margin-bottom: 15px;
    }

    .destination-content p {
      text-align: justify;
      margin-bottom: 20px;
      color: #555;
    }

    .btn-custom {
      background-color: #0056b3;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-transform: uppercase;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
      display: inline-block;
    }

    .btn-custom:hover {
      background-color: #003d80;
      transform: scale(1.05);
    }
  </style>


  </style>
  <!-- Destinasi Wisata -->

  <!-- Artikel -->
  <section id="services" class="services service-section">
    <h6 class="wow fadeInUp" data-wow-delay="0.2s">Berita Terkini</h6>
    <div class="container">
      <div class="article-grid">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM artikel ORDER BY id DESC LIMIT 3";
        $sql = mysqli_query($connect, $query);
        while ($data = mysqli_fetch_array($sql)) {
          $tanggalUpload = date('d F Y', strtotime($data['tanggal']));
        ?>
          <div class="article-card">
            <img src="images/foto/<?php echo $data['foto']; ?>" class="article-image" alt="<?php echo $data['judul']; ?>">
            <div class="article-content">
              <h3 class="article-title"><?php echo $data['judul']; ?></h3>
              <p class="article-description"><?php echo substr($data['keterangan'], 0, 150) . '...'; ?></p>
              <p class="article-date"><strong>Dipublikasikan pada:</strong> <?php echo $tanggalUpload; ?></p>
              <button onclick="showArticle(<?php echo $data['id']; ?>)" class="read-more">Baca Selengkapnya</button>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="view-more-container">
        <a href="artikel.php" class="view-more-button">Lihat Artikel Lainnya</a>
      </div>
    </div>
    </div>
  </section>

  <!-- Modal untuk artikel lengkap -->
  <div id="articleModal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="closeModal()">&times;</span>
      <div id="articleFullContent"></div>
    </div>
  </div>
  <!-- Artikel -->

  <!-- Footer  -->
  <?php include './layout/footer.php'; ?>
  <!-- footer -->

  <!-- Footer -->
  <!-- JS FILES -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/retina.min.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/main.js"></script>
  <script src="js/artikel.js"></script>
  <script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>