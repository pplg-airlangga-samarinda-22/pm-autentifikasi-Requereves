<?php

session_start();
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    var_dump($_POST);
    $tanggal = date('Y-m-d');
    $nik = $_SESSION['nik'];
    $laporan = $_POST['laporan'];
    $foto = (isset($_FILES['foto']))?$_FILES['foto']['name'] : "";
    $status = 0;

    $sql = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES(?,?,?,?,?)";
    $row = $koneksi->execute_query($sql, [$tanggal, $nik, $laporan, $foto, $status]);

    if (!empty($foto)) {
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/' . $_FILES['foto']['name']);
    }

    if ($row) {
        echo "<script>alert('Pengaduan baru telah berhasil disimpan!')</script>";
        header("location:aduan.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Tambah Aduan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="laporan" class="block text-gray-700 font-medium mb-2">Isi Laporan</label>
                <textarea name="laporan" id="laporan" rows="5" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Tulis laporan Anda di sini..." required></textarea>
            </div>
            <div class="mb-4">
                <label for="foto" class="block text-gray-700 font-medium mb-2">Foto Pendukung</label>
                <input type="file" name="foto" id="foto" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</body>

</html>
