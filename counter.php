<?php
// Memulai session untuk melacak pengunjung
session_start();

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "jogjaku";
$connect = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$connect) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil IP address pengunjung
$visitor_ip = $_SERVER['REMOTE_ADDR'];

// Cek apakah pengunjung sudah menghitung sebelumnya (dalam sesi ini)
if (!isset($_SESSION['visited'])) {
  // Pengunjung belum dihitung, maka tambahkan pengunjung baru

  // Ambil jumlah pengunjung saat ini
  $query = "SELECT count FROM visitors WHERE id = 1";
  $result = mysqli_query($connect, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $current_count = $row['count']; // Ambil jumlah pengunjung yang ada

    // Tambahkan satu pengunjung
    $new_count = $current_count + 1;

    // Update jumlah pengunjung di database
    $update_query = "UPDATE visitors SET count = $new_count WHERE id = 1";
    mysqli_query($connect, $update_query);

    // Simpan IP address pengunjung
    $insert_ip_query = "INSERT INTO visitors_ip (visitor_ip) VALUES ('$visitor_ip')";
    mysqli_query($connect, $insert_ip_query);
  } else {
    // Jika tidak ada data, set count awal ke 1
    $insert_query = "INSERT INTO visitors (count) VALUES (1)";
    mysqli_query($connect, $insert_query);

    // Simpan IP address pengunjung
    $insert_ip_query = "INSERT INTO visitors_ip (visitor_ip) VALUES ('$visitor_ip')";
    mysqli_query($connect, $insert_ip_query);
  }

  // Tandai bahwa pengunjung sudah dihitung untuk sesi ini
  $_SESSION['visited'] = true;
}

// Ambil jumlah pengunjung untuk ditampilkan
$query = "SELECT count FROM visitors WHERE id = 1";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$total_visitors = $row['count'];

// Tutup koneksi
mysqli_close($connect);

// Kembalikan data sebagai JSON jika menggunakan AJAX
header("Content-Type: application/json");
echo json_encode(['visitor_counter' => $total_visitors]);
