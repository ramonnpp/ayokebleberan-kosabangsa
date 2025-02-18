<?php
// proses_simpan_artikel.php
include "koneksi.php";

// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if(empty($_POST['judul']) || empty($_POST['keterangan']) || empty($_POST['konten'])) {
        die("Error: Semua field harus diisi!");
    }
    
    $judul = trim($_POST['judul']);
    $keterangan = trim($_POST['keterangan']);
    $konten = trim($_POST['konten']);
    
    // Validasi file upload
    if(!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
        die("Error: Silakan pilih file foto!");
    }

    // Konfigurasi upload
    $allowed_types = ['image/jpeg', 'image/png', 'image/heic'];  // Mendukung JPEG, PNG, dan HEIC
    $max_size = 5 * 1024 * 1024; // 5MB
    $upload_path = "images/foto/";

    // Buat folder jika belum ada
    if (!file_exists($upload_path)) {
        mkdir($upload_path, 0755, true);
    }

    // Cek permission folder
    if (!is_writable($upload_path)) {
        die("Error: Folder {$upload_path} tidak memiliki izin write!");
    }

    $foto = $_FILES['foto'];
    
    // Validasi tipe file
    if (!in_array($foto['type'], $allowed_types)) {
        die("Error: Tipe file tidak diizinkan! Hanya JPEG, PNG, dan HEIC yang diperbolehkan.");
    }

    // Validasi ukuran file
    if ($foto['size'] > $max_size) {
        die("Error: Ukuran file terlalu besar! Maksimal 5MB.");
    }

    // Generate nama file baru
    $file_extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $fotobaru = date('dmYHis') . '_' . uniqid() . '.' . $file_extension;
    $path = $upload_path . $fotobaru;

    // Upload file
    try {
        if (!move_uploaded_file($foto['tmp_name'], $path)) {
            $error_message = "";
            switch ($foto['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $error_message = "File melebihi upload_max_filesize pada php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $error_message = "File melebihi MAX_FILE_SIZE pada form HTML";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $error_message = "File hanya terupload sebagian";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $error_message = "Folder temporary tidak ada";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $error_message = "Gagal menulis file ke disk";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $error_message = "Upload dihentikan oleh ekstensi PHP";
                    break;
                default:
                    $error_message = "Error upload tidak diketahui: " . $foto['error'];
            }
            die("Error upload file: " . $error_message);
        }

        // Simpan ke database menggunakan prepared statement
        $query = "INSERT INTO artikel (judul, keterangan, konten, foto) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);
        
        if (!$stmt) {
            throw new Exception("Error dalam prepared statement: " . mysqli_error($connect));
        }

        mysqli_stmt_bind_param($stmt, "ssss", $judul, $keterangan, $konten, $fotobaru);
        
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error saat menyimpan data: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
        
        // Redirect jika berhasil
        header("Location: artikel.php?status=success");
        exit;

    } catch (Exception $e) {
        // Hapus file yang sudah terupload jika ada error database
        if (file_exists($path)) {
            unlink($path);
        }
        die("Error: " . $e->getMessage());
    }
}

// Jika bukan POST request
else {
    die("Error: Invalid request method!");
}
?>
