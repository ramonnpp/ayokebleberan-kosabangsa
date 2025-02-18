<?php
try {
        $bdd = new PDO('mysql:host=localhost;dbname=ayot7765_sungaioyo;charset=utf8', 'root', '');
} catch (Exception $e) {
        die('Error : ' . $e->getMessage());
}
