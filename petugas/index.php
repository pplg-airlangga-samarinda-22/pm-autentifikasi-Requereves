<?php
    session_start();
    require_once '../koneksi.php';
    if (empty($_SESSION['level'])) {
        header("location:../loginAdmin.php");
    }
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
 </head>
 <body>
    <h1>Data Petugas</h1>
    <nav>
        <a href="admin/index.php">Dashboard</a>
        <a href="aduan.php">Aduan</a>
        <a href="masyarakat.php">Aduan</a>
        <a href="tambahPetugas.php">Regis</a>
        <a href="laporan.php">Regis</a>
        <a href="../logout.php">Logout</a>
    </nav>
 </body>
 </html>