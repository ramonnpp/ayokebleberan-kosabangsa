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
    <title>Galeri - ayokebleberan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/ayokebleberan.png">
    <link rel="stylesheet" href="css/galeri.css">
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
    <!-- header section -->

    <!-- intro section -->
    <section id="intro" class="section intro">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 text-center">
                <?php
                if (!isset($_SESSION['admin'])) {
                ?>
                    <h6 style="color: black;">GALERI</h6>
                    <p class="text-center">
                        Galeri ini menampilkan koleksi foto dan video yang menggambarkan keindahan alam, budaya, serta kehidupan masyarakat Desa Bleberan.
                    </p>
                    <br>
                    </li>
                <?php } else { ?>
                    <h6 style="color: black;">GALERI</h6>
                    <p class="text-center">
                        Mode Admin
                    </p>
                    <br>
                    </li>
                <?php } ?>


            </div>
        </div>

        <div class="container-fluid">
            <div class="row no-gutter">

                <?php
                // Load file koneksi.php
                include "koneksi.php";

                $query = "SELECT * FROM galeri"; // Query untuk menampilkan semua data galeri
                $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query

                while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 work">
                        <a <?php echo "href='images/foto/galeri/" . $data['foto'] . "'"; ?> class="work-box">
                            <?php echo "<img src='images/foto/galeri/" . $data['foto'] . "'>" ?>
                            <div class="overlay">
                                <div class="overlay-caption">
                                    <h5> <?php echo "" . $data['nama_tempat'] . ""; ?></h5>
                                </div>

                            </div>
                        </a>
                    </div>

                <?php
                }
                ?>
            </div>
            <br>
            <br>

            <?php
            if (!isset($_SESSION['admin'])) {
            ?>
                <br>
                </li>
            <?php } else { ?>
                <h6 align="center" style="color: black;">Data Gambar</h6>
                <br>
                <br>
                <a href="form_simpan.php"><input type="submit" class="btn btn-large" value="Tambah Data"></a>
                <br>
                <br>
                <table border="2" width="100%">
                    <tr>
                        <th width=600px>Gambar</th>
                        <th>Nama Tempat</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";

                    $query = "SELECT * FROM galeri"; // Query untuk menampilkan semua data galeri
                    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query

                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td align='center'><img class='img-g' src='images/foto/galeri/" . $data['foto'] . "' width='400' height='200' ></td>";
                        echo "<td>" . $data['nama_tempat'] . "</td>";
                        echo "<td><a class='a-g'; href='form_ubah.php?id=" . $data['id'] . "'>Edit</a></td>";
                        echo "<td><a class='a-g'; href='proses_hapus.php?id=" . $data['id'] . "'>Hapus</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>

            <?php } ?>
        </div>
    </section>


    <!-- work section -->
    <!-- our team section -->
    <!-- our team section -->
    <!-- Testimonials section -->
    <!-- Testimonials section -->
    <!-- contact section -->
    <!-- contact section -->
    <!-- Footer section -->
    <?php include './layout/footer.php'; ?>
    <!-- Footer section -->
    <!-- JS FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/retina.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/main.js"></script>
    <script src="js/galeri.js"></script>

    <script type="text/javascript" src="js/jquery.contact.js"></script>
</body>

</html>