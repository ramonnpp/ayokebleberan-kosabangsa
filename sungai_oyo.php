<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}

require_once('bdd.php');
$sql = "SELECT id, title, keterangan, start, end, color FROM events";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/sungai_oyo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/ayokebleberan.png">
    <script src="js/sungai_oyo.js"></script>
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
    <section id="sungai-oyo" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-slider" id="sliderTentangSungaiOyo">
                        <div class="slides">
                            <img src="images/slide3.jpg" alt="Gambar Terakhir"> <!-- Clone terakhir -->
                            <img src="images/slide1.jpg" alt="Gambar 1">
                            <img src="images/slide2.jpg" alt="Gambar 2">
                            <img src="images/slide3.jpg" alt="Gambar 3">
                            <img src="images/slide1.jpg" alt="Gambar Pertama"> <!-- Clone pertama -->
                        </div>
                        <button class="prev" onclick="moveSlide('sliderTentangSungaiOyo', -1)">&#10094;</button>
                        <button class="next" onclick="moveSlide('sliderTentangSungaiOyo', 1)">&#10095;</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <h2>Tentang Sungai Oyo</h2>
                        <p style="text-align: justify;">Sungai oyo adalah salah satu objek wisata yang baru di Gunung Kidul.Objek wisata ini lebih menyatu ke alam terbuka dan sedikit petualangan. Bagi anda yang suka dengan kegiatan petualangan, musim hujan adalah saatnya Anda mencoba. Dikarenakan pada saat musim hujan, Anda bisa melakukan rafting dengan perahu karet jika debit air memungkinkan. Namun jika debit air tidak memenuhi syarat untuk rafting, kita tetap bisa menyusuri Sungai Oyo dengan ban tubing seperti di Goa Pindul.</p>
                        <p style="text-align: justify;">Pada debit air tertentu, jarak tempuh pada saat musim hujan 2-4 kali lebih jauh daripada musim kemarau. Dengan arus lebih kencang dan beberapa titik ombak cukup akan menguji adrenalin Anda. Jangan khawatir bagi Anda yang kurang punya nyali, River tubing Oyo tidak terlalu ekstrem. Keamanannya sudah diteliti sebelum digunakan sebagai objek wisata. Pengecekan debit air dilakukan setiap hari pada musim hujan. Selama river tubing akan disajikan sebuah air terjun. Adalah Air Terjun Sungai Oyo. Di lokasi air terjun ini adalah saatnya Anda berhenti, ini adalah tempat yang paling menarik untuk mengambil gambar. Di sini pula Anda boleh mencoba melompat dari ketinggian 4 meter atau 9 meter. Anda juga bisa mandi di bawah Air Terjun Sungai Oyo ini dan rasakan sensasi dinginnya air terjun.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br><br><br>
    <section id="spot-wisata" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-slider" id="sliderSpotWisata">
                        <div class="slides">
                            <img src="images/slide3.jpg" alt="Gambar Terakhir"> <!-- Clone terakhir -->
                            <img src="images/slide1.jpg" alt="Gambar 1">
                            <img src="images/slide2.jpg" alt="Gambar 2">
                            <img src="images/slide3.jpg" alt="Gambar 3">
                            <img src="images/slide1.jpg" alt="Gambar Pertama"> <!-- Clone pertama -->
                        </div>
                        <button class="prev" onclick="moveSlide('sliderSpotWisata', -1)">&#10094;</button>
                        <button class="next" onclick="moveSlide('sliderSpotWisata', 1)">&#10095;</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content">
                        <h2>Spot Wisata</h2>
                        <h4>Wisata Air (Arung Jeram)</h4>
                        <p>wisata air arung jeram merupakan salah satu destinasi wisata andalan yang ada di sungai Oyo, Kalurahan Bleberan, Kecamatan Playen,
                            Kabupaten Gunungkidul. Wisata Air arung jeram ini dikelola oleh pokdarwis ( Kelompok Sadar Wisata) yang dibentuk oleh Kelurahan Bleberan.</p>
                        <h4>Naik Perahu Rakit</h4>
                        <p>Naik perahu rakit ini kamu bisa menyusuri sungai Oyo dan melihat keindahan sungai oyo. Di perjalanan naik perahu rakit ini kamu dapat melihat keindahan sungai Oyo yang cantik itu.</p>
                        <h4>Flying Fox</h4>
                        <p>Flying Fox merupakan permainan meluncur menggunakan tali dari atas menuju ke bawahbawah, atau lebih tepatnya dari tempat tinggi menuju ke tempat yang rendah.
                            Untuk Flaying fox di sini kamu bisa melihat sungai Oyo dari atas dengan panjang lintasan ±350 meter. Untuk kembali dari Flaying foxnya kamu bisa naik perahu rakit yang sudah disediakan oleh pengelola sungai Oyo dan Flaying fox.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './layout/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.contact.js"></script>


</html>