<?php
include "koneksi.php";

// Pastikan parameter ID adalah angka
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID
if ($id <= 0) {
  http_response_code(400);
  echo json_encode(['error' => 'ID artikel tidak valid']);
  exit;
}

// Query untuk mendapatkan artikel berdasarkan ID
$query = "SELECT * FROM artikel WHERE id = ?";
$stmt = mysqli_prepare($connect, $query);

if (!$stmt) {
  http_response_code(500);
  echo json_encode(['error' => 'Query SQL gagal']);
  exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($data = mysqli_fetch_assoc($result)) {
  $tanggalUpload = date('d F Y', strtotime($data['tanggal']));
  // Kirim data artikel sebagai JSON
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  // Artikel tidak ditemukan
  http_response_code(404);
  echo json_encode(['error' => 'Artikel tidak ditemukan', 'id' => $id]);
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
