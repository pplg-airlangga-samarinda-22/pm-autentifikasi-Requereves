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
    <title>Laporan Pengaduan</title>
 </head>
 <body>
    <h1>Selamat datang di aplikasi pengaduan masyarakat (ADMIN)</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="pengaduan.php">Aduan</a>
        <a href="masyarakat.php">Masyarakat</a>
        <a href="petugas.php">Petugas</a>
        <a href="laporan.php">Laporan</a>
        <a href="../logout.php">Logout</a>
    </nav>
 </body>
 </html>