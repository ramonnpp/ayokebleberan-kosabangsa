<?php
// Mulai session
session_start();

// Periksa apakah user adalah admin
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Include koneksi database
include "koneksi.php";

// Validasi parameter ID artikel
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Query untuk mengambil data artikel berdasarkan ID
$query = "SELECT * FROM artikel WHERE id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p class='text-center'>Artikel tidak ditemukan!</p>";
    exit();
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Artikel - BLEBERAN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/artikel.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/jogjakublack.png">
</head>
<body>
    <!-- Header -->
    <?php include './layout/nav.php'; ?>

    <section class="section intro">
        <div class="container">
            <h6 class="text-center mb-4">Ubah Artikel</h6>
            <form method="post" action="proses_ubah_artikel.php" enctype="multipart/form-data" class="article-form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?php echo htmlspecialchars($data['judul']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Keterangan Singkat</label>
                    <textarea name="keterangan" class="form-control" rows="4" required><?php echo htmlspecialchars($data['keterangan']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Konten Lengkap</label>
                    <textarea name="konten" class="form-control" rows="8" required><?php echo htmlspecialchars($data['konten']); ?></textarea>
                </div>
                <div class="form-group">
                    <label>Foto Saat Ini</label>
                    <div>
                        <img src="images/foto/<?php echo htmlspecialchars($data['foto']); ?>" width="200" style="object-fit: cover; border-radius: 4px;">
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="ubah_foto"> Ubah Foto
                    </label>
                    <div class="custom-file-input" id="drop-zone" style="display: none;">
                        <div class="drop-zone-content">
                            <i class="fa fa-cloud-upload"></i>
                            <span>Tarik dan letakkan file foto di sini atau klik untuk memilih</span>
                            <input type="file" id="foto" name="foto" class="file-input" accept="image/*">
                        </div>
                        <div class="file-name" id="file-name"></div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="artikel.php" class="btn-submit" style="background: #64748b; text-decoration: none; margin-left: 10px;">Batal</a>
                </div>
            </form>
        </div>
    </section>

    <?php include './layout/footer.php'; ?>

    <!-- JS FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    // Script untuk menampilkan input file saat checkbox dicentang
    document.querySelector('input[name="ubah_foto"]').addEventListener('change', function() {
        const dropZone = document.getElementById('drop-zone');
        dropZone.style.display = this.checked ? 'block' : 'none';
    });
    </script>
</body>
</html>
