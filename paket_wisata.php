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
    <title>Paket Wisata - ayokebleberan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/paket_wisata.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/ayokebleberan.png">
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
    <section>
        <div class="container-ht">
            <h2>Paket Wisata</h2>
            <h3 style="text-align: center;">Paket Wisata Sungai Oyo & Goa Rancang Kencana</h3>
            <div class="ticket-list">
                <div class="ticket-item">
                    <h3>Paket Wisata</h2>
                        <p style="text-align:center;">Harga Rp15.000,-</p>
                        <button class="buy-button" onclick="showPackagePopup('Paket Wisata', 15000, 'Senang-senang dengan mengunjungi air terjun Sungai Oyo dan Goa Rancang Kencana yg eksotis dan Natural.suasana pedesaan yang jauh dg hiruk pikuk kendaraan dan suara mesin,anda bersantai ria,berfoto ria,sambil menikmati nuansa dan segarnya pedesaan,fasilitas yg kami tawarkan adalah berkunjung ke dua obyek dan naik perahu menuju air tejun.')">Baca Selengkapnya..</button>
                </div>
                <div class="ticket-item">
                    <h3>Sewa Perahu</h2>
                        <p style="text-align:center;">Harga Rp10.000,-/Orang</p>
                        <button class="buy-button" onclick="showPackagePopup('Sewa Perahu', 10000, 'Naik perahu untuk menuju ke air terjun')">Baca Selengkapnya..</button>
                </div>

                <div class="ticket-item">
                    <h3>Paket makan khas Gunungkidul</h3>
                    <p style="text-align:center;">Harga: Rp 25.000, - Rp 40.000,-</p>
                    <button class="buy-button" onclick="showPackagePopup('Paket makan khas Gunungkidul ',25000, 'kami juga menawarkan dan menyiapkan paket makan pagi,siang,sore,dg menu khas Gunungkidul yang tentunya nendang rasanya,harga paket makan sangat fleksibel sesuai pesanan dari 25.000,- - 40.000,-')">Baca Selengkapnya..</button>
                </div>

                <div class="ticket-item">
                    <h3>Paket Homestay</h3>
                    <p style="text-align:center;">Harga: Rp 75.000, - Rp 100.000,-</p>
                    <button class="buy-button" onclick="showPackagePopup('Paket Homestay', 75000, 'bagi wisatawan yang ingin lebih lama tinggal dan menikmati nuansa pedesaan kami menyediakan sarana menginap di Tengah Masyarakat di rumah penduduk yang sudah kami siapkan dan di setting dengan harga paket menginap yang relative terjangkau mulai dari 75.000,- s/d 100.000,- per malam .')">Baca Selengkapnya..</button>
                </div>

                <div class="ticket-item">
                    <h3>Paket Wisata dan Game Seru </h3>
                    <p style="text-align:center;">Harga: Rp 25.000, - Rp 35.000,-</p>
                    <button class="buy-button" onclick="showPackagePopup('Paket Wisata dan Game Seru', 25000, 'kami menyediakan game body rafting,flying fox yang bisa menambah dokumentasi wisata anda dg harga 25.000,- untuk body rafting dan 35.000,- untuk flyingfox.')">Baca Selengkapnya..</button>
                </div>

                <div class="ticket-item">
                    <h3>Paket Wisata Study tour dan paket wisata lainnya</h3>

                    <button class="buy-button" onclick="showPackagePopup('Paket wisata study tour dan paket wisata lainnya',0, ' Untuk paket wisata lainnya silakan menghubungi nomor telpon dan whatsapp 081233875545')">Baca Selengkapnya..</button>
                </div>
            </div>
        </div>
    </section>
    <div id="packagePopup" class="popup">
        <div class="popup-content">
            <span class="close" id="closePackagePopup">&times;</span>
            <h2 id="packageName"></h2>
            <p id="packagePrice"></p>
            <p id="packageDescription"></p>
        </div>
    </div>

    <?php include './layout/footer.php'; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script src="js/paket_wisata.js"></script>
    <script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>