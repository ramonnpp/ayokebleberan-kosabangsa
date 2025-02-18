<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - EditGaleri</title>
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/form_galeri.css">
	<link rel="shortcut icon" href="images/ayokebleberan.png">
	<style>

	</style>
</head>

<body>
	<section class="section intro">
		<p align="center" style="color: black; font-size:larger; text-align:center; class="fadeIn first">Edit Data Gambar</p>

		<?php
		// Load file koneksi.php
		include "koneksi.php";

		// Ambil data id yang dikirim oleh galeri.php melalui URL
		$id = isset($_GET['id']) ? $_GET['id'] : "";

		// Query untuk menampilkan data gambar berdasarkan id yang dikirim
		$query = "SELECT * FROM galeri WHERE id='" . $id . "'";
		$sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
		$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
		?>
		<form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
			<table cellpadding="8" align="center">
				<tr class="fadeIn second">
					<td>Nama Tempat Wisata</td>
					<td>
						<p><textarea name="nama_tempat"><?php echo $data['nama_tempat']; ?></textarea></p>
					</td>
				</tr>
				<tr class="fadeIn third">
					<td class="fadeIn third">
						<label for="">Foto</label>
					</td>
					<td class="fadeIn third">
						<div class="form-group">
							<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
							<div class="custom-file-input" id="drop-zone">
								<div class="drop-zone-content">
									<i class="fa fa-cloud-upload"></i>
									<span>Tarik dan letakkan file foto di sini atau klik untuk memilih</span>
									<input type="file" id="foto" name="foto" class="file-input" accept="image/*">
								</div>
								<div class="file-name" id="file-name"></div>
							</div>
						</div>
					</td>
				</tr>
				<!-- <tr>
					<td>Foto</td>
					<td>
						<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
						<input type="file" name="foto">
					</td>
				</tr> -->
				<tr class="fadeIn fourth">
					<td><input type="submit" value="Ubah"></td>
					<td><a href="galeri.php"><input type="button" value="Batal"></a></td>
				</tr>
			</table>
		</form>
	</section>
</body>

</html>