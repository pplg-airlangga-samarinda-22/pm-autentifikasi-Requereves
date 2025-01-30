<?php
session_start();
require "../koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();
    $nik = $row['nik'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
} elseif ($_SERVER['REQUEST_METHOD'] = 'POST') {
    $id_petugas = $_SESSION['id_petugas'];
    $id_pengaduan = $_GET['id'];
    $tanggal = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $status = 'selesai';

    // update pengaduan
    $sql = "UPDATE pengaduan SET status=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$status, $id_pengaduan]);
    // kirim tanggapan
    $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) values (?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$id_pengaduan, $tanggal, $tanggapan, $id_petugas]);
    header("location: pengaduan.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanggapi Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Tanggapi Pengaduan</h1>
        <a href="pengaduan.php" class="text-blue-500 hover:underline">Kembali</a>
        <form action="" method="post" class="mt-4">
            <div class="mb-4">
                <label for="laporan" class="block text-sm font-medium text-gray-700">Isi Laporan</label>
                <textarea name="laporan" id="laporan" readonly class="w-full p-2 border rounded bg-gray-100"><?= $laporan ?></textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
                <img src="../gambar/<?= $foto ?>" alt="Foto Pengaduan" class="w-full rounded-lg">
            </div>
            <div class="mb-4">
                <label for="tanggapan" class="block text-sm font-medium text-gray-700">Tanggapan</label>
                <textarea name="tanggapan" id="tanggapan" class="w-full p-2 border rounded"></textarea>
            </div>
            <button type="submit" name="selesai" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Submit</button>
        </form>
    </div>
</body>

</html>
