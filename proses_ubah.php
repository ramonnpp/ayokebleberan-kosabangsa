<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
// $jenis_wisata = $_POST['jenis_wisata'];
$nama_tempat = $_POST['nama_tempat'];
// Cek apakah user ingin mengubah fotonya atau tidak
if (isset($_POST['ubah_foto'])) { // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis') . $foto;

  // Set path folder tempat menyimpan fotonya
  $path = "images/foto/" . $fotobaru;
  // Proses upload
  if (move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data galeri berdasarkan id yang dikirim
    $query = "SELECT * FROM galeri WHERE id='" . $id . "'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if (is_file("images/foto/" . $data['foto'])) // Jika foto ada
      unlink("images/foto/" . $data['foto']); // Hapus file foto sebelumnya yang ada di folder images

    // Proses ubah data ke Database
    $query = "UPDATE galeri SET  nama_tempat='" . $nama_tempat . "', foto='" . $fotobaru . "' WHERE id='" . $id . "'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: galeri.php"); // Redirect ke halaman galeri.php
    } else {
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    }
  } else {
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
} else { // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE galeri SET nama_tempat='" . $nama_tempat . "' WHERE id='" . $id . "'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: galeri.php"); // Redirect ke halaman galeri.php
  } else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}
