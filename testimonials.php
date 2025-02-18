<?php
include('koneksi.php'); // Pastikan sudah menyertakan koneksi database Anda

$query_testimonial_all = "SELECT * FROM testimonial ORDER BY created_at DESC";
$result_testimonial_all = mysqli_query($connect, $query_testimonial_all);

// Fungsi untuk membuat URL Gravatar berdasarkan email
function getGravatarUrl($email, $size = 80)
{
  $emailHash = md5(strtolower(trim($email))); // Hash email menggunakan MD5
  return "https://www.gravatar.com/avatar/$emailHash?s=$size&d=identicon";
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semua Testimonial</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Semua Testimonial</h2>
    <div class="row">
      <?php
      if ($result_testimonial_all && mysqli_num_rows($result_testimonial_all) > 0) {
        while ($row = mysqli_fetch_assoc($result_testimonial_all)) {
          // Ambil URL Gravatar berdasarkan email pengguna
          $gravatarUrl = getGravatarUrl($row['email']);
      ?>
          <div class="col-md-4 mb-4">
            <div class="card testimonial-card">
              <div class="card-body text-center">
                <img src="<?php echo $gravatarUrl; ?>" alt="User Image" class="rounded-circle mb-3">
                <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                <p class="card-text">
                  "<?php echo htmlspecialchars($row['komentar']); ?>"
                </p>
                <small class="text-muted"><?php echo date("d M Y", strtotime($row['created_at'])); ?></small>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "<p class='text-center'>Belum ada testimonial.</p>";
      }
      ?>
    </div>
    <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
  </div>
</body>

<style>
  .testimonial-card {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
  }

  .testimonial-card:hover {
    transform: translateY(-5px);
  }

  .testimonial-card img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .testimonial-card .card-body {
    padding: 20px;
  }

  .testimonial-card .card-title {
    font-weight: bold;
    color: #333;
  }

  .testimonial-card .card-text {
    font-style: italic;
    color: #666;
  }
</style>

</html>