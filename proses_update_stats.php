<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $destinasi = mysqli_real_escape_string($connect, $_POST['destinasi']);
  $pengunjung = mysqli_real_escape_string($connect, $_POST['pengunjung']);
  $rating = mysqli_real_escape_string($connect, $_POST['rating']);

  // Update data
  $query = "UPDATE site_stats SET 
              destinasi_count = '$destinasi',
              visitor_count = '$pengunjung',
              rating_value = '$rating',
              updated_at = CURRENT_TIMESTAMP
              WHERE id = 1";

  if (mysqli_query($connect, $query)) {
    $_SESSION['sesiData']['status'] = [
      'type' => 'success',
      'msg' => 'Statistik berhasil diupdate!'
    ];
  } else {
    $_SESSION['sesiData']['status'] = [
      'type' => 'error',
      'msg' => 'Gagal mengupdate statistik: ' . mysqli_error($connect)
    ];
  }

  header("Location: index.php");
  exit();
}
