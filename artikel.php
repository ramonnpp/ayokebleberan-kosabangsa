<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
  $statusPsn = $sesiData['status']['msg'];
  $jenisStatusPsn = $sesiData['status']['type'];
  unset($_SESSION['sesiData']['status']);
}
?>
<?php
require_once('bdd.php');
$sql = "SELECT id, title, keterangan, start, end, color FROM events ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BLEBERAN</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/flexslider.css">
  <link rel="stylesheet" href="css/jquery.fancybox.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/font-icon.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/artikel.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="images/jogjakublack.png">

</head>

<body>
    
    <!-- header section -->
    <?php include './layout/nav.php'; ?>
    <!-- header section -->

  <section id="intro" class="section intro">
    <div class="container">
      <div class="col-md-8 col-md-offset-2 text-center">
        <?php if (!isset($_SESSION['admin'])) { ?>
          <h6 class="wow fadeInUp" data-wow-delay="0.2s">ARTIKEL</h6>
        <?php } else { ?>
          <h6 class="wow fadeInUp" data-wow-delay="0.2s">ARTIKEL</h6>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="services" class="services service-section">
    <div class="container">
      <div class="article-grid">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM artikel ORDER BY id DESC";
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
    </div>
  </section>

  <!-- Modal untuk artikel lengkap -->
  <div id="articleModal" class="modal">
    <div class="modal-content">
      <span class="close-button" onclick="closeModal()">&times;</span>
      <div id="articleFullContent"></div>
    </div>
  </div>

  <?php if (isset($_SESSION['admin'])) { ?>
    <section class="section intro">
      <div class="container">
        <h6 class="text-center mb-4">Tambah Artikel</h6>
        <form method="post" action="proses_simpan_artikel.php" enctype="multipart/form-data" class="article-form">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Keterangan Singkat</label>
            <textarea name="keterangan" class="form-control" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <label>Konten Lengkap</label>
            <textarea name="konten" class="form-control" rows="8" required></textarea>
          </div>
          <div class="form-group">
            <label>Foto</label>
            <div class="custom-file-input" id="drop-zone">
              <div class="drop-zone-content">
                <i class="fa fa-cloud-upload"></i>
                <span>Tarik dan letakkan file foto di sini atau klik untuk memilih</span>
                <input type="file" id="foto" name="foto" class="file-input" accept="image/*" required>
              </div>
              <div class="file-name" id="file-name"></div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn-submit">Simpan</button>
            <a href="artikel.php" class="btn-submit" style="background: #64748b; text-decoration: none; margin-left: 10px;">Batal</a>
          </div>
        </form>

        <h6 class="text-center" style="margin-top: 60px;">Data Artikel</h6>
        <div class="table-responsive">
          <table class="data-table">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM artikel ORDER BY id DESC";
              $sql = mysqli_query($connect, $query);
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                <tr>
                  <td><img src="images/foto/<?php echo $data['foto']; ?>" width="100" height="60" style="object-fit: cover; border-radius: 4px;"></td>
                  <td><?php echo $data['judul']; ?></td>
                  <td><?php echo substr($data['keterangan'], 0, 100) . '...'; ?></td>
                  <td>
                    <!--<a href="proses_ubah_artikel.php?id=<?php echo $data['id']; ?>" class="action-link">Ubah</a>-->
                    <a href="proses_hapus_artikel.php?id=<?php echo $data['id']; ?>" class="action-link" style="color: #dc2626;" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php include './layout/footer.php'; ?>

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