<?php
// Include file koneksi database
require_once('koneksi.php');

// Periksa apakah metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Tangkap data dari form
  $nama = mysqli_real_escape_string($connect, $_POST['nama']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $komentar = mysqli_real_escape_string($connect, $_POST['komentar']);

  // Validasi inputan
  if (!empty($nama) && !empty($email) && !empty($komentar)) {
    // Simpan data ke tabel 'testimonials'
    $query = "INSERT INTO testimonial (nama, email, komentar) VALUES ('$nama', '$email', '$komentar')";
    if (mysqli_query($connect, $query)) {
      // Redirect ke halaman utama dengan pesan sukses
      session_start();
      $_SESSION['sesiData']['status'] = [
        'type' => 'success',
        'msg' => 'Testimonial berhasil dikirim!'
      ];
      header("Location: index.php#testimonials");
      exit;
    } else {
      // Redirect ke halaman utama dengan pesan error
      session_start();
      $_SESSION['sesiData']['status'] = [
        'type' => 'error',
        'msg' => 'Gagal menyimpan testimonial: ' . mysqli_error($connect)
      ];
      header("Location: index.php#testimonials");
      exit;
    }
  } else {
    // Redirect ke halaman utama dengan pesan validasi
    session_start();
    $_SESSION['sesiData']['status'] = [
      'type' => 'error',
      'msg' => 'Semua kolom wajib diisi!'
    ];
    header("Location: index.php#testimonials");
    exit;
  }
} else {
  // Jika bukan metode POST, redirect ke halaman utama
  header("Location: index.php");
  exit;
}
