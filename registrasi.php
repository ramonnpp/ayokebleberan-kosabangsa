<?php
session_start();
$sesiData = !empty($_SESSION['sesiData']) ? $_SESSION['sesiData'] : '';
if (!empty($sesiData['status']['msg'])) {
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/logReg.css">
    <link rel="stylesheet" href="css/responsive.css">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="inactive underlineHover"><a href="index.php">Home</a></h2>
            <h2 class="inactive underlineHover"><a href="login.php">Login</a></h2>
            <h2 class="active"><a href="registrasi.php">Register</a></h2>

            <?php echo !empty($statusPsn) ? '<p class="' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
            <form id="login-form" method="post" action="akunuser.php" role="form">
                <center>Silahkan Register
                </center><br>
                <div class="input-group">
                    <input type="text" class="fadeIn first" name="nama_awal" placeholder="Nama Awal" required class="form-control">
                </div>
                </br>
                <div class="input-group">
                    <input type="text" class="fadeIn second" name="nama_akhir" placeholder="Nama Akhir" required class="form-control">
                </div>
                </br>
                <div class="input-group">
                    <input type="text" class="fadeIn third" name="email" placeholder="Alamat Email" required class="form-control">
                </div>
                </br>
                <div class="input-group">
                    <input type="number" class="fadeIn fourth" name="telp" placeholder="Nomer Telepon" required class="form-control">
                </div>
                </br>
                <div class="input-group">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                </div>
                </br>
                <div class="input-group">
                    <input type="password" id="password" class="fadeIn third" name="confirm_password" placeholder="Konfirmasi Password">
                </div>
                </br>
                <div class="form-group">
                    <input type="submit" name="daftarSubmit" value="Daftar" class="btn btn-primary btn-block" />
                </div>
            </form>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-top section">
            <div class="container" align="center">
                <div class="row1">
                    <br>
                    <p>Copyright © 2024 ayokebleberan.com . Made by Tim Kosabangsa</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>