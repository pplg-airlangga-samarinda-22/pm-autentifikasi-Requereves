<?php
    session_start();
    require_once '../koneksi.php';
    if (empty($_SESSION['level'])) {
        header("location:../loginAdmin.php");
    }
?>

<h5>PETUGAS</h5>