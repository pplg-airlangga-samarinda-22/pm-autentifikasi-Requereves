<?php
session_start();
require "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];

    $sql = "SELECT * FROM tanggapan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $tanggal_tanggapan = $row['tgl_tanggapan'];
    $tanggapan = $row['tanggapan'];
    $id_petugas = $row['id_petugas'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Lihat Pengaduan</h1>
        <div class="mb-4">
            <a href="pengaduan.php" class="text-blue-500 hover:text-blue-700 font-medium">&larr; Kembali</a>
        </div>
        <form action="" method="post" class="space-y-6">
            <div>
                <label for="laporan" class="block text-gray-700 font-medium mb-2">Isi Laporan</label>
                <textarea name="laporan" id="laporan" readonly
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 focus:outline-none"><?= $laporan ?></textarea>
            </div>
            <div>
                <label for="foto" class="block text-gray-700 font-medium mb-2">Foto Pendukung</label>
                <div class="flex justify-center">
                    <img src="../gambar/<?= $foto ?>" alt="Foto Pendukung" class="rounded-lg border border-gray-300 w-64">
                </div>
            </div>
            <div>
                <label for="tanggal_tanggapan" class="block text-gray-700 font-medium mb-2">Tanggal Ditanggapi</label>
                <input type="date" name="tanggal_tanggapan" id="tanggal_tanggapan" value="<?= $tanggal_tanggapan ?>" disabled
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 focus:outline-none">
            </div>
            <div>
                <label for="petugas" class="block text-gray-700 font-medium mb-2">Petugas</label>
                <input type="text" name="petugas" id="petugas" value="<?= $id_petugas ?>" disabled
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 focus:outline-none">
            </div>
            <div>
                <label for="tanggapan" class="block text-gray-700 font-medium mb-2">Tanggapan</label>
                <textarea name="tanggapan" id="tanggapan" readonly
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 focus:outline-none"><?= $tanggapan ?></textarea>
            </div>
            <div class="text-center mt-6">
                <a href="pengaduan.php" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>
