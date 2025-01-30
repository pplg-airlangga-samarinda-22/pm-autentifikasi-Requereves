<?php
    session_start();
    require_once '../koneksi.php';
    if (empty($_SESSION['nik'])) {
        header("location:../loginMasyarakat.php");
    }
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <h1 class="text-center text-2xl font-bold">MASYARAKAT</h1>
    </header>

    <nav class="bg-white shadow-md py-4 flex justify-center space-x-6">
        <a href="index.php" class="text-blue-600 hover:text-blue-800 font-medium">Dashboard</a>
        <a href="aduan.php" class="text-blue-600 hover:text-blue-800 font-medium">Aduan</a>
        <a href="../logout.php" class="text-red-500 hover:text-red-700 font-medium">Logout</a>
    </nav>

    <main class="p-6">
        <p class="text-center text-gray-700">Selamat datang di halaman masyarakat. Pilih menu di atas untuk melanjutkan.</p>
    </main>
</body>

</html>
