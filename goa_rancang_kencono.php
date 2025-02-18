<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
	$statusPsn = $sesiData['status']['msg'];
	$jenisStatusPsn = $sesiData['status']['type'];
	unset($_SESSION['sesiData']['status']);
}
?>
<?php
require_once('bdd.php');


$sql = "SELECT id, title, keterangan, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<title>GoaRancangKencono - ayokebleberan</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/font-icon.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="shortcut icon" href="images/ayokebleberan.png">
	<link rel="stylesheet" href="css/goa_rancang_kencono.css">
	<script src="js/goa_rancang_kencono.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
	<style>
		body {
			font-family: "Poppins", sans-serif;
			line-height: 1.6;
		}
	</style>
</head>

<body>
	<?php include './layout/nav.php'; ?>
	<br>
	<br>
	<br>
	<br>
	<section id="services" class="services section container">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="image-slider" id="slidegoarancang">
						<div class="slides">
							<img src="images/slide33.jpg" alt="Gambar Terakhir"> <!-- Clone terakhir -->
							<img src="images/slide11.jpg" alt="Gambar 1">
							<img src="images/slide22.jpg" alt="Gambar 2">
							<img src="images/slide33.jpg" alt="Gambar 3">
							<img src="images/slide11.jpg" alt="Gambar Pertama"> <!-- Clone pertama -->
						</div>
						<button class="prev" onclick="moveSlide('slidegoarancang', -1)">&#10094;</button>
						<button class="next" onclick="moveSlide('slidegoarancang', 1)">&#10095;</button>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content">
						<h2>Goa Rancang Kencono</h2>
						<p>Goa Rancang Kencono yang terletak di Padukuhan Menggoran, Desa Bleberan, Kecamatan Playen, Gunungkidul, Yogyakarta, merupakan salah satu goa yang dihuni manusia prasejarah hingga modern. Diperkirakan goa yang terletak di kawasan air terjun Sri Getuk ini sudah dihuni sejak 3000 tahun lalu.</p>
						<p>Dari buku *Ragam Warisan Budaya dan Cagar Budaya Gunungkidul* yang ditulis oleh Winarsih (Kepala Seksi Kepurbakalaan dan Permuseuman, Bidang Pelestarian Warisan dan Nilai Budaya, Dinas Kebudayaan Gunungkidul), Arkeologi UGM Yogyakarta pada tahun 2001 sudah pernah melakukan penelitian tersebut. Goa Rancang Kencono sudah dihuni manusia sejak 3000 tahun yang lalu dengan bukti temuan tulang manusia.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<section id="services" class="services section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="image-slider" id="slidesejarahgoa">
						<div class="slides">
							<img src="images/slide33.jpg" alt="Gambar Terakhir"> <!-- Clone terakhir -->
							<img src="images/slide11.jpg" alt="Gambar 1">
							<img src="images/slide22.jpg" alt="Gambar 2">
							<img src="images/slide33.jpg" alt="Gambar 3">
							<img src="images/slide11.jpg" alt="Gambar Pertama"> <!-- Clone pertama -->
						</div>
						<button class="prev" onclick="moveSlide('slidesejarahgoa', -1)">&#10094;</button>
						<button class="next" onclick="moveSlide('slidesejarahgoa', 1)">&#10095;</button>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content">
						<h2>Sejarah Goa Rancang Kencono</h2>
						<p>Sejarah dari Goa Rancang Kencono berada di dalam buku *Mozaik Pustaka Budaya Yogyakarta* yang dibuat oleh Balai Pelestarian Peninggalan Purbakala Yogyakarta pada tahun 2003. Menurut seorang peneliti yang pernah meneliti goa ini, goa ini merupakan sebuah goa purba. Hal tersebut terbukti karena ditemukan adanya artefak batu dan tulang yang berumur ribuan tahun.</p>
						<p>Kisah pelarian Laskar Mataram untuk melakukan perlawanan penjajah Belanda sekitar pada tahun 1720 di Goa Rancang Kencono ini. Pada tahun tersebut terjadi pengusiran penjajah Belanda yang dilakukan oleh kerajaan yang ada di Jawa, salah satu kerajaan tersebut yaitu Kerajaan Mataram. Goa ini merupakan salah satu tempat persembunyian Laskar Mataram.</p>
						<p>Dulu goa ini sering digunakan sebagai tempat bersemedi dan menyusun strategi perang untuk melawan penjajah dari Belanda. Karena hal tersebut menjadi asal-usul pemberian nama Goa Rancang Kencono, kata rancang dari bahasa Jawa artinya rencana dan kencono artinya emas atau mulia. Jadi Goa Rancang Kencono dapat diartikan sebagai tempat untuk merancang atau merencanakan perbuatan yang baik atau mulia.</p>
					</div>
				</div>

			</div>
		</div>
	</section>

	<?php include './layout/footer.php'; ?>


	<!-- JS FILES -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="jquery.flexslider.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/retina.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>