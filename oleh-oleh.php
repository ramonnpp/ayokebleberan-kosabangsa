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
    <title>Oleh Oleh - ayokebleberan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/oleh-oleh.css">
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
<style>

</style>

<body>
    <!-- header section -->
    <?php include './layout/nav.php'; ?>
    <br>
    <br>
    <br>
    <br>
    <section id="oleh-oleh">
        <div class="container">
            <h1 class="text-center">Oleh-Oleh Khas Desa Wisata</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/oleh-oleh/20241201_125311.jpg" class="card-img-top" alt="Walang Goreng">
                        <div class="card-body">
                            <h3 class="card-title">Oleh-Oleh Khas Menggleng</h3>
                            <p class="card-text">Harga 10.000 Ribu,-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/oleh-oleh/tepungtiwul.jpg" class="card-img-top" alt="Walang Goreng">
                        <div class="card-body">
                            <h3 class="card-title">Tepung Tiwul buat Nasi Tiwul</h3>
                            <p class="card-text">Harga 8.000 Ribu,-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/oleh-oleh/tiwulinstant.jpg" class="card-img-top" alt="Walang Goreng">
                        <div class="card-body">
                            <h3 class="card-title">Tiwul Instan</h3>
                            <p class="card-text">Harga 12.000 Ribu,-</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/oleh-oleh/madu.jpg" class="card-img-top" alt="Walang Goreng">
                        <div class="card-body">
                            <h3 class="card-title">Madu</h3>
                            <p class="card-text">Harga Besar 125.000 ribu,- / Kecil 50.000 Ribu,-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <?php include './layout/footer.php'; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script src="js/oleh-oleh.js"></script>
    <script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>