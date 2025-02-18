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
    <title>TentangKami - ayokebleberan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/tentang.css">
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
    <!-- header section -->
    <?php include './layout/nav.php'; ?>

    <section id="intro" class="section intro">
        <div class="history">
            <div class="container history__wrapper">
                <div class="history__wrap">
                    <div class="history__content">
                        <h1 class="history__content-heading">Profil Desa Wisata</h1>
                        <p>Desa wisata Bleberan adalah merupakan salah satu dari 13 Desa di wilayah Kecamatan Playen Kabupaten Gunungkidul Daerah Istimewa Yogyakarta, Kawasan wisata Goa Rancang Kencono dan air terjun sri gethuk yang didalamnya terdapat wisata air yaitu sungai oyo memiliki luas sekitar 40 Ha sedangkan Luas wilayah desa Bleberan secara keseluruhan 16.262.170 Ha yang terdiri dari tanah sawah tadah hujan : 49.3000 Ha, Sawah irigasi : 15.0000 Ha , Tegalan : 489.2170 Ha.</p>
                        <!-- <div class="history__action">
                            <a href="#">
                                <button class="btn btn-lg btn-primary btn-icon">
                                    Lihat Selengkapnya </button>
                            </a>
                        </div> -->
                    </div>
                    <div class="history__media">
                        <div class="image-stack">
                            <!-- Gambar bawah -->
                            <div class="image-stack__item--bottom">
                                <img src="images/walpaper.png" alt="">
                            </div>
                            <!-- Gambar atas -->
                            <div class="image-stack__item--top">
                                <img src="images/slide33.jpg" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <section>
        <div class="main-container">
            <div class="left-section">
                <img alt="Logo Desa Bleberan" height="300" src="images/ayokebleberan_black.png" width="200" style="border-radius: 8px;" />
                <h1>
                    Desa Bleberan
                </h1>
            </div>
            <div class="right-section">
                <h2>
                    VISI
                </h2>
                <p>
                    Terwujudnya Desa wisata yang Produktif indah tertib aman dan religi
                </p>
                <h2>
                    MISI
                </h2>
                <ol>
                    <li>
                        Mewujudkan pemerintahan Desa bersih aspiratif kreatif serta berkemampuan
                    </li>
                    <li>
                        Mewujudkan pengembangan Desa wisata
                    </li>
                    <li>
                        Mewujudkan pertumbuhan ekonomi masyarakat
                    </li>
                    <li>
                        Mewujudkan pengembangan sumber daya masyarakat
                    </li>
                </ol>
                <h2>
                    Tujuan
                </h2>
                <p>
                    Tujuan dari pengembangan Desa wisata adalah mengembangkan potensi alam, budaya, dan sumber daya masyarakat untuk kesejahteraan masyarakat.
                </p>
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
</body>

</html>