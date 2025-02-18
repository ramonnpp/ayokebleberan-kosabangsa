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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/modern-business.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/logReg.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">



    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link rel="shortcut icon" href="images/jogjakublack.png">

</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="inactive underlineHover"><a href="index.php">Home</a></h2>
            <h2 class="active"><a href="login.php">Login</a></h2>
            <!-- <h2 class="inactive underlineHover"><a href="registrasi.php">Register</a></h2> -->
            <?php
            if (!empty($sesiData['userLoggedIn']) && !empty($sesiData['userID'])) {
                include 'user.php';
                $user = new User();
                $kondisi['where'] = array(
                    'id' => $sesiData['userID'],
                );
                $kondisi['return_type'] = 'single';
                $userData = $user->getRows($kondisi);
            ?>
            <?php } else { ?>
                <h3>
                    <center>Silahkan Login
                    </center></br>
                    <?php echo !empty($statusPsn) ? '<p class="' . $jenisStatusPsn . '">' . $statusPsn . '</p>' : ''; ?>
                    <div class="regisForm">
                        <form id="login-form" action="akunuser.php" method="post" role="form">
                            <div class="input-group">
                                <!-- <input type="text" class="fadeIn second" name="email" placeholder="Email" required class="form-control"> -->
                                <input type="text" class="fadeIn second" name="email" placeholder="Masukkan alamat email" required class="form-control" />

                            </div>
                            </br>
                            <div class="input-group">
                                <!-- <input type="password" class="fadeIn third" name="Password" placeholder="password"> -->
                                <input type="password" class="fadeIn third" name="password" placeholder="Password" required class="form-control" />

                            </div>
                            </br>
                            <div class="form-group">
                                <!-- <input type="submit" name="loginSubmit" value="Masuk" class="btn btn-primary btn-block"> -->
                                <input type="submit" name="loginSubmit" value="Masuk" class="btn btn-primary btn-block">

                            </div>
                        <?php } ?>
                        </form>
                        <?php if (!isset($_SESSION['is_login'])) { ?>
                        <?php } else { ?>
                            <p>Kamu sedang menjadi <?= $_SESSION['namauser']; ?></p>
                            <div class="auth-item">
                                <div class="user-menu" style="margin: 15px;">
                                    <a href="akunuser.php?logoutSubmit=1" class="nav-link logout-btn">Logout</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
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
    </div>
</body>
<!-- <script src="js/jquery.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<!-- <script src="js/bootstrap.min.js"></script> -->

</html>