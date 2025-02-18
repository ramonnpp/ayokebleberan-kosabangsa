<?php
include "koneksi.php";

// Validasi file upload
if(!isset($_FILES['foto'])) {
    die("Tidak ada file yang diupload");
}

$nama_tempat = $_POST['nama_tempat'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$fotobaru = date('dmYHis') . $foto;
$path = "images/foto/galeri/" . $fotobaru;

// Cek error upload
if($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
    die("Error upload: " . $_FILES['foto']['error']);
}

// Validasi ekstensi file
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
if(!in_array($ext, $allowed)) {
    die("Format file tidak diizinkan. Gunakan: " . implode(', ', $allowed));
}

// Cek apakah folder exists dan writable
if(!is_dir("images/foto/galeri")) {
    die("Folder upload tidak ditemukan");
}
if(!is_writable("images/foto/galeri")) {
    die("Folder upload tidak writable");
}

// Proses upload dengan error handling
if(!move_uploaded_file($tmp, $path)) {
    die("Gagal memindahkan file. Error: " . error_get_last()['message']);
}

// Proses simpan ke database dengan prepared statement
$query = "INSERT INTO galeri (nama_tempat, foto) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "ss", $nama_tempat, $fotobaru);

if(!mysqli_stmt_execute($stmt)) {
    die("Error database: " . mysqli_error($connect));
}

header("location: galeri.php");
exit();
?>